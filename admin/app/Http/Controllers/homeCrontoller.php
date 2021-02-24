<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\visitorModel;
use App\Models\service;
use App\Models\course;

class homeCrontoller extends Controller
{
    function homeIndex()
    {
        $TotalVisitor =  visitorModel::count();
        $TotalService = service::count();
        $TotalCours = course::count();
        return view('home', [
            'TotalVisitor' => $TotalVisitor,
            'TotalService' => $TotalService,
            'TotalCours' => $TotalCours
        ]);
    }

    
}
