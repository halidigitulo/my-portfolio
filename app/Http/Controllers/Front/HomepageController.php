<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        // Logic to retrieve data for the homepage view
        $generalsettings = GeneralSetting::first();
        return view('front.homepage.index',compact('generalsettings'));
    }
}
