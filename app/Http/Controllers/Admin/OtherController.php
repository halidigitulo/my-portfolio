<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OtherController extends Controller
{
    public function index()
    {
        return view('admin.master.other');
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'privacy' => 'nullable|string',
            'terms' => 'nullable|string',
        ]);

        $general = \App\Models\GeneralSetting::firstOrNew();
        $general->privacy = $validatedData['privacy'] ?? $general->privacy;
        $general->terms = $validatedData['terms'] ?? $general->terms;
        $general->save();

        return response()->json([
            'status' => 'success',
            'message' => $general->wasRecentlyCreated ? 'Data berhasil disimpan' : 'Data berhasil diperbarui',
            'general' => $general
        ]);
    }
}
