<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    function BolgPage()
    {
        return view("Bolg");
    }
}
