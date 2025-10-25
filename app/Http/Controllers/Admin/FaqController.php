<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class FaqController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Faq::select('id','question','answer')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('aksi', function ($faq) {
                    if (!auth()->user()->can('faq.update') && !auth()->user()->can('faq.delete')) {
                        return '<span class="text-muted">No Access</span>';
                    }
                    $editButton = '<button type="button" class="btn btn-sm btn-icon btn-outline-warning edit-faq" data-id="' . $faq->id . '" name="edit"><span class="tf-icons bx bxs-edit"></span></button>';
                    $spasi = ' ';
                    
                    $deleteButton = '<button type="button" class="btn btn-sm btn-outline-danger btn-icon hapus-faq" data-id="' . $faq->id . '" name="edit"><span class="tf-icons bx bx-trash"></span></button>';
                    return $editButton . ' ' . $spasi . ' ' . $deleteButton;
                })
                ->rawColumns(['aksi'])
                ->make(true);
        }

        return view('admin.faq.index');
    }

    public function storeOrUpdate(Request $request, $id = null)
    {
        $faq = [
            'question' => 'required|string',
            'answer' => 'required|string',
        ];

        $validatedData = $request->validate($faq);
        $faq = $id ? Faq::findOrFail($id) : new Faq();

        // Save faq data
        $faq->fill($validatedData)->save();

        return response()->json([
            'message' => $id ? 'FAQ updated successfully!' : 'FAQ created successfully!',
        ]);
    }

    public function edit($id)
    {
        if (!Auth::user()->can('faq.update')) {
            abort(403, 'Anda tidak punya akses untuk mengedit FAQ');
        }
        $faq = faq::findOrFail($id);
        return response()->json($faq);
    }

    public function destroy($id)
    {
        if (!Auth::user()->can('faq.delete')) {
            abort(403, 'Anda tidak punya akses untuk menghapus faq');
        }
        $faq = faq::findOrFail($id);

        $faq->delete();

        return response()->json([
            'message' => 'FAQ successfully deleted.',
        ]);
    }
}
