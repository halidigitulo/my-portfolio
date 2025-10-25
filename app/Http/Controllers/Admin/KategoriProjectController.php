<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KategoriProjectController extends Controller
{
    public function index()
    {
        // Load all nasabah with their roles
        if (request()->ajax()) {
            $jenis = KategoriProject::all();
            return datatables()->of($jenis)

                ->addColumn('aksi', function ($kategori_project) {
                    $button = '';

                    // Cek permission edit
                    if (Auth::user()->can('kategori-project.update')) {
                        $button .= '<button class="btn btn-sm btn-icon btn-outline-warning edit-kategori-project" data-id="' . $kategori_project->id . '" name="edit"><span class="tf-icons bx bxs-edit"></span></button> ';
                    }

                    // Cek permission delete
                    if (Auth::user()->can('kategori-project.delete')) {
                        $button .= '<button class="btn btn-sm btn-icon btn-outline-danger hapus-kategori-project" data-id="' . $kategori_project->id . '" name="delete"><span class="tf-icons bx bx-trash"></span></button>';
                    }

                    return $button !== '' ? $button : '<span class="text-muted">No Access</span>';
                })

                ->rawColumns(['aksi'])
                ->make(true);
        }
    }

    public function storeOrUpdate(Request $request, $id = null)
    {
        $rules = [
            'nama' => $id
                ? 'nullable|string|max:255' . $id
                : 'required|string|max:255',
        ];

        $validatedData = $request->validate($rules);
        $kategori_project = $id ? KategoriProject::findOrFail($id) : new KategoriProject();

        // Save user data
        $kategori_project->fill($validatedData)->save();

        return response()->json([
            'message' => $id ? 'Kategori Project updated successfully!' : 'Kategori Project created successfully!',
        ]);
    }

    public function edit($id)
    {
        if (!Auth::user()->can('kategori-project.update')) {
            abort(403, 'Anda tidak punya akses untuk mengedit data');
        }
        $kategori_project = KategoriProject::findOrFail($id);
        return response()->json($kategori_project);
    }

    public function destroy($id)
    {
        if (!Auth::user()->can('kategori-project.delete')) {
            abort(403, 'Anda tidak punya akses untuk menghapus data');
        }
        $kategori_project = KategoriProject::findOrFail($id);
        $kategori_project->delete();

        return response()->json([
            'message' => 'Kategori Project successfully deleted.',
        ]);
    }
}
