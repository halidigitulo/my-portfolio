<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class ServicesController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Service::select('*')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('aksi', function ($service) {
                    if (!auth()->user()->can('services.update') && !auth()->user()->can('services.delete')) {
                        return '<span class="text-muted">No Access</span>';
                    }
                    $editButton = '<button type="button" class="btn btn-sm btn-icon btn-outline-warning edit-service" data-id="' . $service->id . '" name="edit"><span class="tf-icons bx bxs-edit"></span></button>';
                    $spasi = ' ';

                    $deleteButton = '<button type="button" class="btn btn-sm btn-outline-danger btn-icon hapus-service" data-id="' . $service->id . '" name="edit"><span class="tf-icons bx bx-trash"></span></button>';
                    return $editButton . ' ' . $spasi . ' ' . $deleteButton;
                })
                ->rawColumns(['aksi'])
                ->make(true);
        }

        return view('admin.services.index');
    }

    public function cekSlug(Request $request)
    {
        $slug = SlugService::createSlug(Service::class, 'slug', $request->judul);
        return response()->json(['slug' => $slug]);
    }

    public function storeOrUpdate(Request $request, $id = null)
    {
        $service = [
            'judul' => 'required|string|max:255',
            'slug' => $id
                ? 'nullable|string|max:255' . $id
                : 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            // 'icon' => 'nullable|image|max:2048',
            'icon' => 'nullable|string',
        ];

        $validatedData = $request->validate($service);
        $service = $id ? Service::findOrFail($id) : new Service();

        // Handle avatar upload
        // if ($request->hasFile('icon')) {
        //     if ($id && $service->icon && file_exists(public_path('uploads/services/' . $service->icon))) {
        //         unlink(public_path('uploads/services/' . $service->icon));
        //     }

        //     $icon = $request->file('icon');
        //     $iconName = time() . '.' . $icon->getClientOriginalExtension();
        //     $icon->move(public_path('uploads/services/'), $iconName);
        //     $validatedData['icon'] = $iconName;
        // }

        // Save service data
        $service->fill($validatedData)->save();

        return response()->json([
            'message' => $id ? 'Service updated successfully!' : 'Service created successfully!',
            // 'icon' => $service->icon ?? null
        ]);
    }

    public function edit($id)
    {
        if (!Auth::user()->can('services.update')) {
            abort(403, 'Anda tidak punya akses untuk mengedit service');
        }
        $service = service::findOrFail($id);
        return response()->json($service);
    }

    public function destroy($id)
    {
        if (!Auth::user()->can('services.delete')) {
            abort(403, 'Anda tidak punya akses untuk menghapus service');
        }
        $service = Service::findOrFail($id);
        $service->delete();

        return response()->json([
            'message' => 'service successfully deleted.',
        ]);
    }
}
