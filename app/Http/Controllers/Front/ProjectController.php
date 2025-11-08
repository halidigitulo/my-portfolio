<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\KategoriProject;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function project_listing()
    {
        $projects = Project::all();
        $categories = KategoriProject::all();
        return view('front.project.index', compact('projects', 'categories'));
    }

    public function project_detail($slug)
    {
        $data = Project::with('stack')->where('slug', $slug)->firstOrFail();
        // Ambil 1 project random selain yang aktif
        // $nextProject = Project::inRandomOrder()
        //     ->where('id', '!=', $data->id)
        //     ->first();
        $nextProject = Project::where('id', '>', $data->id)
            ->orderBy('id', 'asc')
            ->first();

        if (!$nextProject) {
            // Kalau sudah di project terakhir, ambil project pertama
            $nextProject = Project::orderBy('id', 'asc')->first();
        }
        $randomData = Project::inRandomOrder()->where('id', '!=', $data->id)->take(6)->get();
        return view(
            'front.project.detail',
            [
                'data' => $data,
                'randomData' => $randomData,
                'nextProject' => $nextProject,
                'nama' => $data->nama
            ]
        );
    }
}
