<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 use App\Models\visitorModel;

class homeCrontoller extends Controller
{
    function home()
    {
        $UserIP = $_SERVER['REMOTE_ADDR'];
        date_default_timezone_set('Asia/Kolkata');
        $timeDate = date("Y-m-d h:i:sa");

        visitorModel::insert([
            'ip_address' => $UserIP,
            'visit_time' => $timeDate
        ]);;


        return view('home');

    }
}
