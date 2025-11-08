<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Resume;
use App\Models\Service;
use Illuminate\Http\Request;

class OtherController extends Controller
{
    public function about()
    {
        $resumes = Resume::all();
        return view('front.others.about',compact('resumes'));
    }

    public function services()
    {
        $services = Service::all();
        $projects = Project::inRandomOrder()->take(6)->get();
        return view('front.others.services',compact('services','projects'));
    }

    public function contact()
    {
        return view('front.others.contact');
    }

    public function faq()
    {
        $faqs = \App\Models\Faq::all();
        return view('front.others.faq',compact('faqs'));
    }

    public function privacy()
    {
        return view('front.others.privacy');
    }

    public function terms()
    {
        return view('front.others.terms');
    }
}
