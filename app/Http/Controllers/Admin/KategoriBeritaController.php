<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriBerita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KategoriBeritaController extends Controller
{
    public function index()
    {
        // Load all nasabah with their roles
        if (request()->ajax()) {
            $jenis = KategoriBerita::all();
            return datatables()->of($jenis)

                ->addColumn('aksi', function ($kategori_berita) {
                    $button = '';

                    // Cek permission edit
                    if (Auth::user()->can('kategori-berita.update')) {
                        $button .= '<button class="btn btn-sm btn-icon btn-outline-warning edit-kategori-berita" data-id="' . $kategori_berita->id . '" name="edit"><span class="tf-icons bx bxs-edit"></span></button> ';
                    }

                    // Cek permission delete
                    if (Auth::user()->can('kategori-berita.delete')) {
                        $button .= '<button class="btn btn-sm btn-icon btn-outline-danger hapus-kategori-berita" data-id="' . $kategori_berita->id . '" name="delete"><span class="tf-icons bx bx-trash"></span></button>';
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
        $kategori_berita = $id ? Kategoriberita::findOrFail($id) : new Kategoriberita();

        // Save user data
        $kategori_berita->fill($validatedData)->save();

        return response()->json([
            'message' => $id ? 'Kategori berita updated successfully!' : 'Kategori berita created successfully!',
        ]);
    }

    public function edit($id)
    {
        if (!Auth::user()->can('kategori-berita.update')) {
            abort(403, 'Anda tidak punya akses untuk mengedit data');
        }
        $kategori_berita = Kategoriberita::findOrFail($id);
        return response()->json($kategori_berita);
    }

    public function destroy($id)
    {
        if (!Auth::user()->can('kategori-berita.delete')) {
            abort(403, 'Anda tidak punya akses untuk menghapus data');
        }
        $kategori_berita = KategoriBerita::findOrFail($id);
        $kategori_berita->delete();

        return response()->json([
            'message' => 'Kategori berita successfully deleted.',
        ]);
    }
}
