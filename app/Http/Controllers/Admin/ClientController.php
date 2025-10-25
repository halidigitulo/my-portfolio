<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Client::select('*')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('aksi', function ($client) {
                    if (!auth()->user()->can('client.update') && !auth()->user()->can('client.delete')) {
                        return '<span class="text-muted">No Access</span>';
                    }
                    $editButton = '<button type="button" class="btn btn-sm btn-icon btn-outline-warning edit-client" data-id="' . $client->id . '" name="edit"><span class="tf-icons bx bxs-edit"></span></button>';
                    $spasi = ' ';
                    
                    $deleteButton = '<button type="button" class="btn btn-sm btn-outline-danger btn-icon hapus-client" data-id="' . $client->id . '" name="edit"><span class="tf-icons bx bx-trash"></span></button>';
                    return $editButton . ' ' . $spasi . ' ' . $deleteButton;
                })
                ->rawColumns(['aksi'])
                ->make(true);
        }

        return view('admin.master.client');
    }

    public function storeOrUpdate(Request $request, $id = null)
    {
        $client = [
            'nama' => 'nullable|string|max:255',
            'pic' => 'nullable|string',
            'no_wa' => 'nullable|string',
            'email' => 'nullable|string',
            'alamat' => 'nullable|string',
            'logo' => 'nullable|image|max:2048',
        ];

        $validatedData = $request->validate($client);
        $client = $id ? Client::findOrFail($id) : new Client();

        // Handle avatar upload
        if ($request->hasFile('logo')) {
            if ($id && $client->logo && file_exists(public_path('uploads/clients/' . $client->logo))) {
                unlink(public_path('uploads/clients/' . $client->logo));
            }

            $logo = $request->file('logo');
            $logoName = time() . '.' . $logo->getClientOriginalExtension();
            $logo->move(public_path('uploads/clients/'), $logoName);
            $validatedData['logo'] = $logoName;
        }

        // Save client data
        $client->fill($validatedData)->save();

        return response()->json([
            'message' => $id ? 'Client updated successfully!' : 'Client created successfully!',
            'logo' => $client->logo ?? null
        ]);
    }

    public function edit($id)
    {
        if (!Auth::user()->can('client.update')) {
            abort(403, 'Anda tidak punya akses untuk mengedit client');
        }
        $client = Client::findOrFail($id);
        return response()->json($client);
    }

    public function destroy($id)
    {
        if (!Auth::user()->can('client.delete')) {
            abort(403, 'Anda tidak punya akses untuk menghapus client');
        }
        $client = Client::findOrFail($id);

        if ($client->logo && file_exists(public_path('uploads/clients/' . $client->logo))) {
            unlink(public_path('uploads/clients/' . $client->logo));
        }
        
        $client->delete();

        return response()->json([
            'message' => 'Client successfully deleted.',
        ]);
    }
}
