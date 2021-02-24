<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\visitorModel;
class vigitorController extends Controller
{
    function visitorIndex()
    {
        $visitor_data = json_decode(visitorModel::orderBy('id', 'desc')->take(500)->get(), true);
       
        return view('visitor', ['visitors' => $visitor_data]);
    }
}
