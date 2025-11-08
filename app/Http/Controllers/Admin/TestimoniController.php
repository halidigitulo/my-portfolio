<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestimoniController extends Controller
{
    public function index()
    {
        // Load all testimonis with their roles
        if (request()->ajax()) {
            $testimonis = Testimoni::select('*')->get();
            return datatables()->of($testimonis)
                
                ->addColumn('aksi', function ($testimoni) {
                    $button = '';

                    // $button .= '<button class="btn btn-warning btn-sm edit-testimoni" data-id="' . $testimoni->id . '" name="edit"><i class="ri-pencil-line"></i></button> ';

                    // Cek permission edit
                    if (Auth::user()->can('testimoni.update')) {
                        $button .= '<button class="btn btn-sm btn-outline-warning btn-icon edit-testimoni" data-id="' . $testimoni->id . '" name="edit"><span class="tf-icons bx bxs-edit"></span></button> ';
                    }

                    // Cek permission delete
                    if (Auth::user()->can('testimoni.delete')) {
                        $button .= '<button class="btn btn-sm btn-outline-danger btn-icon hapus-testimoni" data-id="' . $testimoni->id . '" name="delete"><span class="tf-icons bx bx-trash"></span></button>';
                    }

                    return $button !== '' ? $button : '<span class="text-muted">No Access</span>';
                })

                ->rawColumns(['aksi'])
                ->make(true);
        }
        return view('admin.testimoni.index');
    }

    public function storeOrUpdate(Request $request, $id = null)
    {
        // Validation rules
        $rules = [
            'nama' => $id
                ? 'nullable|string|max:255' . $id
                : 'required|string|max:255',
            'pekerjaan' => 'nullable|string|max:255',
            'testimoni' => 'nullable|string|max:1000',
            'rating' => 'nullable|numeric',
            'foto' => 'nullable|image|max:2048',
            'status' => 'nullable|in:0,1',
        ];

        // Validasi request
        $validatedData = $request->validate($rules);

        // Menentukan apakah ini create atau update
        $testimoni = $id ? testimoni::findOrFail($id) : new testimoni();

        // Handle foto upload
        if ($request->hasFile('foto')) {
            if ($id && $testimoni->foto && file_exists(public_path('uploads/testimonis/' . $testimoni->foto))) {
                unlink(public_path('uploads/testimonis/' . $testimoni->foto));  // Hapus foto lama jika update
            }

            $foto = $request->file('foto');
            $fotoName = time() . '.' . $foto->getClientOriginalExtension();
            $foto->move(public_path('uploads/testimonis/'), $fotoName);
            $validatedData['foto'] = $fotoName;
        }

        // Save testimoni data
        $testimoni->fill($validatedData)->save();

        // Return response
        return response()->json([
            'message' => $id ? 'Testimoni updated successfully!' : 'Testimoni created successfully!',
            'foto' => $testimoni->foto ?? null
        ]);
    }

    public function edit($id)
    {
        if (!Auth::user()->can('testimoni.update')) {
            abort(403, 'Anda tidak punya akses untuk mengedit testimoni');
        }
        $testimoni = testimoni::findOrFail($id);
        return response()->json($testimoni);
    }

    public function destroy($id)
    {
        if (!Auth::user()->can('testimoni.delete')) {
            abort(403, 'Anda tidak punya akses untuk menghapus testimoni');
        }
        $testimoni = testimoni::findOrFail($id);

        if ($testimoni->foto && file_exists(public_path('uploads/testimonis/' . $testimoni->foto))) {
            unlink(public_path('uploads/testimonis/' . $testimoni->foto));
        }
        $testimoni->delete();

        return response()->json([
            'message' => 'Testimoni successfully deleted.',
        ]);
    }
}
