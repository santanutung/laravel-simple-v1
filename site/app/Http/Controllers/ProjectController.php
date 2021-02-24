<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\project;

class ProjectController extends Controller
{
    function projectsPage()
    {
        $project_data = json_decode(project::orderBy('id', 'desc')->get());
        return view("projects", ['project_data' => $project_data]);
    }
}
