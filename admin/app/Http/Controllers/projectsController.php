<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class projectsController extends Controller
{
   function projectsIndex(){
       return view('projects');
   }
}
