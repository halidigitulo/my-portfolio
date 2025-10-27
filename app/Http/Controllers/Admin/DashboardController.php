<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Logic to retrieve data for the dashboard view
        $totalClients = \App\Models\Client::count();
        $totalProjects = \App\Models\Project::count();
        $totalProducts = \App\Models\Product::count();
        $totalInvoices = \App\Models\Invoice::count();

        return view('admin.dashboard',compact('totalClients','totalProjects','totalProducts','totalInvoices'));
    }
}
