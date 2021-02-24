<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\visitorModel;
use App\Models\service;
use App\Models\course;
use App\Models\project;
use App\Models\Contact;
use App\Models\Reviews;

class homeCrontoller extends Controller
{
    function homeIndex()
    {
        $UserIP = $_SERVER['REMOTE_ADDR'];
        date_default_timezone_set('Asia/Kolkata');
        $timeDate = date("Y-m-d h:i:sa");

        visitorModel::insert([
            'ip_address' => $UserIP,
            'visit_time' => $timeDate
        ]);

        $service_data = json_decode(service::all());
        $course_data = json_decode(course::orderBy('id', 'desc')->limit(6)->get());
        $project_data = json_decode(project::orderBy('id', 'desc')->limit(10)->get());
        $Reviews_data = json_decode(Reviews::orderBy('id', 'desc')->limit(10)->get());

        return view('home', [
            'service_data' => $service_data,
            'course_data'  => $course_data,
            'project_data' => $project_data,
            'Reviews_data'=> $Reviews_data
        ]);
    }
    function contactsSend(Request $request)
    {
        $contact_name = $request->input('contact_name');
        $contact_email =  $request->input('contact_email');
        $contact_mobile =  $request->input('contact_mobile');
        $contact_msg = $request->input('contact_msg');



        $result =  Contact::insert(
            [
                'contact_name' => $contact_name,
                'contact_email' => $contact_email,
                'contact_mobile' => $contact_mobile,
                'contact_msg' => $contact_msg,
            ]
        );

        if ($result) {
            return 1;
        } else {
            return 0;
        }
    }
}
