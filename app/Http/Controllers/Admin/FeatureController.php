<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeatureController extends Controller
{
    public function index()
    {
        // Load all nasabah with their roles
        if (request()->ajax()) {
            $jenis = Feature::all();
            return datatables()->of($jenis)

                ->addColumn('aksi', function ($feature) {
                    $button = '';

                    // Cek permission edit
                    if (Auth::user()->can('feature.update')) {
                        $button .= '<button class="btn btn-sm btn-icon btn-outline-warning edit-feature" data-id="' . $feature->id . '" name="edit"><span class="tf-icons bx bxs-edit"></span></button> ';
                    }

                    // Cek permission delete
                    if (Auth::user()->can('feature.delete')) {
                        $button .= '<button class="btn btn-sm btn-icon btn-outline-danger hapus-feature" data-id="' . $feature->id . '" name="delete"><span class="tf-icons bx bx-trash"></span></button>';
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
                'deskripsi' => 'nullable|string',
        ];

        $validatedData = $request->validate($rules);
        $feature = $id ? feature::findOrFail($id) : new feature();

        // Save user data
        $feature->fill($validatedData)->save();

        return response()->json([
            'message' => $id ? 'Feature updated successfully!' : 'Feature berita created successfully!',
        ]);
    }

    public function edit($id)
    {
        if (!Auth::user()->can('feature.update')) {
            abort(403, 'Anda tidak punya akses untuk mengedit data');
        }
        $feature = Feature::findOrFail($id);
        return response()->json($feature);
    }

    public function destroy($id)
    {
        if (!Auth::user()->can('feature.delete')) {
            abort(403, 'Anda tidak punya akses untuk menghapus data');
        }
        $feature = Feature::findOrFail($id);
        $feature->delete();

        return response()->json([
            'message' => 'Kategori berita successfully deleted.',
        ]);
    }
}
