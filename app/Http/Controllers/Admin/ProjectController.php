<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectGallery;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index()
    {
        // Load all projects with their roles
        if (request()->ajax()) {
            $projects = Project::with(['client', 'kategori','galleries','stack','feature'])->select('projects.*')->get();
            return datatables()->of($projects)
                
                ->addColumn('kategori', function ($project) {
                    return $project->kategori ? $project->kategori->nama : '-';
                })
                
                ->addColumn('client', function ($project) {
                    return $project->client ? $project->client->nama : '-';
                })
                ->addColumn('aksi', function ($project) {
                    $button = '';

                    // $button .= '<button class="btn btn-warning btn-sm edit-project" data-id="' . $project->id . '" name="edit"><i class="ri-pencil-line"></i></button> ';

                    // Cek permission edit
                    if (Auth::user()->can('project.update')) {
                        $button .= '<button class="btn btn-sm btn-outline-warning btn-icon edit-project" data-id="' . $project->id . '" name="edit"><span class="tf-icons bx bxs-edit"></span></button> ';
                    }

                    // Cek permission delete
                    if (Auth::user()->can('project.delete')) {
                        $button .= '<button class="btn btn-sm btn-outline-danger btn-icon hapus-project" data-id="' . $project->id . '" name="delete"><span class="tf-icons bx bx-trash"></span></button>';
                    }

                    return $button !== '' ? $button : '<span class="text-muted">No Access</span>';
                })

                ->rawColumns(['aksi'])
                ->make(true);
        }
        $clients = \App\Models\Client::all();
        $categories = \App\Models\KategoriProject::all();
        $stacks = \App\Models\Stack::all();
        $features = \App\Models\Feature::all();
        return view('admin.project.index', compact('clients', 'categories','stacks','features'));
    }

    public function cekSlug(Request $request)
    {
        $slug = SlugService::createSlug(project::class, 'slug', $request->nama);
        return response()->json(['slug' => $slug]);
    }

    public function storeOrUpdate(Request $request, $id = null)
    {
        // Validation rules
        $rules = [
            'nama' => 'nullable|string|max:255',
            'slug' => $id
                ? 'nullable|string|max:255' . $id
                : 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'category_id' => 'nullable|string',
            'client_id' => 'nullable|string',
            'link' => 'nullable|string',
            'video_url' => 'nullable|string',
            'status' => 'nullable|string',
            'stack' => 'nullable|array',
            'feature' => 'nullable|array',
            'thumbnail' => 'nullable|image|max:2048',
            'gallery.*' => 'nullable|image|max:2048',
        ];

        // Validasi request
        $validatedData = $request->validate($rules);

        // Menentukan apakah ini create atau update
        $project = $id ? Project::findOrFail($id) : new Project();

        // Handle thumbnail upload
        if ($request->hasFile('thumbnail')) {
            if ($id && $project->thumbnail && file_exists(public_path('uploads/projects/' . $project->thumbnail))) {
                unlink(public_path('uploads/projects/' . $project->thumbnail));  // Hapus thumbnail lama jika update
            }

            $thumbnail = $request->file('thumbnail');
            $thumbnailName = time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('uploads/projects/'), $thumbnailName);
            $validatedData['thumbnail'] = $thumbnailName;
        }

        // Upload multiple gallery
        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $image) {
                $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/projects/gallery/'), $imageName);

                // Save to project_galleries table
                $project->galleries()->create([
                    'filename' => $imageName
                ]);
            }
        }

        // Save project data
        $project->fill($validatedData)->save();

        // Handle many-to-many relationship for stacks (relasi many-to-many)
        if ($request->has('stacks')) {
            // Menyimpan relasi many-to-many dengan menggunakan sync
            $project->stack()->sync($request->stacks);  // sync() akan memperbarui relasi dengan stacks yang dipilih
        }
        if ($request->has('features')) {
            // Menyimpan relasi many-to-many dengan menggunakan sync
            $project->feature()->sync($request->features);  // sync() akan memperbarui relasi dengan stacks yang dipilih
        }

        // Return response
        return response()->json([
            'message' => $id ? 'Project updated successfully!' : 'Project created successfully!',
            'thumbnail' => $project->thumbnail ?? null
        ]);
    }

    public function edit($id)
    {
        if (!Auth::user()->can('project.update')) {
            abort(403, 'Anda tidak punya akses untuk mengedit project');
        }
        $project = Project::with(['client', 'kategori','stack','feature'])->findOrFail($id);
        return response()->json($project);
    }

    public function show($id)
    {
        $project = Project::with(['kategori', 'client', 'galleries','stack','feature'])->findOrFail($id);

        return response()->json($project);
    }

    public function deleteGallery($id)
    {
        try {
            $gallery = ProjectGallery::findOrFail($id);
            $path = public_path('uploads/projects/gallery/' . $gallery->filename);

            if (file_exists($path)) {
                unlink($path);
            }

            $gallery->delete();

            return response()->json([
                'success' => true,
                'message' => 'Gambar gallery berhasil dihapus.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus gambar: ' . $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        if (!Auth::user()->can('project.delete')) {
            abort(403, 'Anda tidak punya akses untuk menghapus project');
        }
        $project = Project::findOrFail($id);
        $project->stack()->detach();
        $project->feature()->detach();

        if ($project->thumbnail && file_exists(public_path('uploads/projects/' . $project->thumbnail))) {
            unlink(public_path('uploads/projects/' . $project->thumbnail));
        }

        $project->delete();

        return response()->json([
            'message' => 'Project successfully deleted.',
        ]);
    }
}
