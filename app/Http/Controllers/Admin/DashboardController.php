<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class DashboardController extends Controller
{
    public function index()
    {
        $count_projects = Project::count();
        $last_project = Project::orderBy('id', 'desc')->first();

        return view('admin.home', compact('count_projects', 'last_project'));
    }
}
