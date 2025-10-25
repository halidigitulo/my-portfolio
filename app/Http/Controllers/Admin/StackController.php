<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriStack;
use App\Models\Stack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class StackController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Stack::with('kategori')->select('*')->get();
            return DataTables::of($data)
                ->addColumn('kategori', function ($kategori) {
                    return optional($kategori->kategori)->nama ?: 'N/A';
                })
                ->addColumn('aksi', function ($stack) {
                    if (!auth()->user()->can('stack.update') && !auth()->user()->can('stack.delete')) {
                        return '<span class="text-muted">No Access</span>';
                    }
                    $editButton = '<button type="button" class="btn btn-sm btn-icon btn-outline-warning edit-stack" data-id="' . $stack->id . '" name="edit"><span class="tf-icons bx bxs-edit"></span></button>';
                    $spasi = ' ';

                    $deleteButton = '<button type="button" class="btn btn-sm btn-outline-danger btn-icon hapus-stack" data-id="' . $stack->id . '" name="edit"><span class="tf-icons bx bx-trash"></span></button>';
                    return $editButton . ' ' . $spasi . ' ' . $deleteButton;
                })
                ->rawColumns(['aksi'])
                ->make(true);
        }

        $kategoristack = KategoriStack::all();
        return view('admin.stack.index',compact('kategoristack'));
    }

    public function storeOrUpdate(Request $request, $id = null)
    {
        $stack = [
            'nama' => 'required|string|max:255',
            'nilai' => 'nullable|string',
            'kategori_id' => 'nullable|string',
        ];

        $validatedData = $request->validate($stack);
        $stack = $id ? Stack::findOrFail($id) : new Stack();

        // Save stack data
        $stack->fill($validatedData)->save();

        return response()->json([
            'message' => $id ? 'Stack updated successfully!' : 'Stack created successfully!',
            // 'icon' => $stack->icon ?? null
        ]);
    }

    public function edit($id)
    {
        if (!Auth::user()->can('stack.update')) {
            abort(403, 'Anda tidak punya akses untuk mengedit stack');
        }
        $stack = Stack::findOrFail($id);
        return response()->json($stack);
    }

    public function destroy($id)
    {
        if (!Auth::user()->can('stack.delete')) {
            abort(403, 'Anda tidak punya akses untuk menghapus stack');
        }
        $stack = Stack::findOrFail($id);
        $stack->delete();

        return response()->json([
            'message' => 'Stack successfully deleted.',
        ]);
    }
}
