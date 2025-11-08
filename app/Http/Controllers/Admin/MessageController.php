<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index()
    {
        // Load all messages with their roles
        if (request()->ajax()) {
            $messages = Message::select('*')->get();
            return datatables()->of($messages)
                ->addColumn('created_at', function (Message $message) {
                    return \App\Helpers\FormatHelper::tanggalIndonesia($message->created_at);
                })
                ->addColumn('aksi', function ($message) {
                    $button = '';

                    // Cek permission delete
                    if (Auth::user()->can('message.delete')) {
                        $button .= '<button class="btn btn-sm btn-outline-danger btn-icon hapus-message" data-id="' . $message->id . '" name="delete"><span class="tf-icons bx bx-trash"></span></button>';
                    }

                    return $button !== '' ? $button : '<span class="text-muted">No Access</span>';
                })

                ->rawColumns(['aksi'])
                ->make(true);
        }
        return view('admin.message.index');
    }

    public function destroy($id)
    {
        if (!Auth::user()->can('message.delete')) {
            abort(403, 'Anda tidak punya akses untuk menghapus message');
        }
        $message = Message::findOrFail($id);

        $message->delete();

        return response()->json([
            'message' => 'Message successfully deleted.',
        ]);
    }
}
