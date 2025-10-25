<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriStack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KategoriStackController extends Controller
{
    public function index()
    {
        // Load all nasabah with their roles
        if (request()->ajax()) {
            $jenis = KategoriStack::all();
            return datatables()->of($jenis)

                ->addColumn('aksi', function ($kategori_stack) {
                    $button = '';

                    // Cek permission edit
                    if (Auth::user()->can('kategori-stack.update')) {
                        $button .= '<button class="btn btn-sm btn-icon btn-outline-warning edit-kategori-stack" data-id="' . $kategori_stack->id . '" name="edit"><span class="tf-icons bx bxs-edit"></span></button> ';
                    }

                    // Cek permission delete
                    if (Auth::user()->can('kategori-stack.delete')) {
                        $button .= '<button class="btn btn-sm btn-icon btn-outline-danger hapus-kategori-stack" data-id="' . $kategori_stack->id . '" name="delete"><span class="tf-icons bx bx-trash"></span></button>';
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
            'icon' => 'nullable|string',
        ];

        $validatedData = $request->validate($rules);
        $kategori_stack = $id ? Kategoristack::findOrFail($id) : new Kategoristack();

        // Save user data
        $kategori_stack->fill($validatedData)->save();

        return response()->json([
            'message' => $id ? 'Kategori stack updated successfully!' : 'Kategori stack created successfully!',
        ]);
    }

    public function edit($id)
    {
        if (!Auth::user()->can('kategori-stack.update')) {
            abort(403, 'Anda tidak punya akses untuk mengedit data');
        }
        $kategori_stack = Kategoristack::findOrFail($id);
        return response()->json($kategori_stack);
    }

    public function destroy($id)
    {
        if (!Auth::user()->can('kategori-stack.delete')) {
            abort(403, 'Anda tidak punya akses untuk menghapus data');
        }
        $kategori_stack = Kategoristack::findOrFail($id);
        $kategori_stack->delete();

        return response()->json([
            'message' => 'Kategori stack successfully deleted.',
        ]);
    }
}
