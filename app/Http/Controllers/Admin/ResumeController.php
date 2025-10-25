<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Resume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class ResumeController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = resume::select('*')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('aksi', function ($resume) {
                    if (!auth()->user()->can('resume.update') && !auth()->user()->can('resume.delete')) {
                        return '<span class="text-muted">No Access</span>';
                    }
                    $editButton = '<button type="button" class="btn btn-sm btn-icon btn-outline-warning edit-resume" data-id="' . $resume->id . '" name="edit"><span class="tf-icons bx bxs-edit"></span></button>';
                    $spasi = ' ';

                    $deleteButton = '<button type="button" class="btn btn-sm btn-outline-danger btn-icon hapus-resume" data-id="' . $resume->id . '" name="edit"><span class="tf-icons bx bx-trash"></span></button>';
                    return $editButton . ' ' . $spasi . ' ' . $deleteButton;
                })
                ->rawColumns(['aksi'])
                ->make(true);
        }

        return view('admin.resume.index');
    }

    public function storeOrUpdate(Request $request, $id = null)
    {
        $resume = [
            'judul' => 'required|string|max:255',
            'lokasi' => 'nullable|string',
            'deskripsi' => 'nullable|string',
            'jenis' => 'nullable|string',
            'mulai_dari' => 'nullable|string',
            'sampai_dengan' => 'nullable|string',
        ];

        $validatedData = $request->validate($resume);
        $resume = $id ? Resume::findOrFail($id) : new Resume();

        // Save resume data
        $resume->fill($validatedData)->save();

        return response()->json([
            'message' => $id ? 'Resume updated successfully!' : 'Resume created successfully!',
            // 'icon' => $resume->icon ?? null
        ]);
    }

    public function edit($id)
    {
        if (!Auth::user()->can('resume.update')) {
            abort(403, 'Anda tidak punya akses untuk mengedit resume');
        }
        $resume = Resume::findOrFail($id);
        return response()->json($resume);
    }

    public function destroy($id)
    {
        if (!Auth::user()->can('resume.delete')) {
            abort(403, 'Anda tidak punya akses untuk menghapus resume');
        }
        $resume = resume::findOrFail($id);
        $resume->delete();

        return response()->json([
            'message' => 'resume successfully deleted.',
        ]);
    }
}
