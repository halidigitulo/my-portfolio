<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GeneralController extends Controller
{
    public function index()
    {
        $general = GeneralSetting::first();
        return view('admin.master.index', compact('general'));
    }

    public function update(Request $request)
    {
        // Tangani checkbox (jika tidak dicentang, otomatis set 0)
        $request->merge([
            'pets_enabled' => $request->has('pets_enabled') ? 1 : 0,
        ]);

        $validator = Validator::make($request->all(), [
            // tambahkan validasi jika ada field lain
            'pets_enabled' => 'boolean',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Ambil record pertama, atau buat baru jika belum ada
        $general = GeneralSetting::firstOrNew();
        $general->fill($request->all());
        $general->save();

        return response()->json([
            'status' => 'success',
            'message' => $general->wasRecentlyCreated ? 'Master berhasil disimpan' : 'Master berhasil diupdate',
            'general' => $general,
        ]);
    }
}
