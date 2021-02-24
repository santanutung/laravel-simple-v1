<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\course;

class courseController extends Controller
{
    function courseIndex()
    {
        return view('courses');
    }

    function get_course_data()
    {
        $get_courses_data = json_encode(course::orderBy('id','desc')->get());
        return $get_courses_data;
    }

    function get_course_details(Request $request)
    {
        $id = $request->input('id');
        $courses_data = json_encode(course::where('id', '=', $id)->get());
        return $courses_data;
    }

    function course_delete(Request $request)
    {
        $id = $request->input('id');
        $result = course::where('id', '=', $id)->delete();
        if ($result) {
            return 1;
        } else {
            return 0;
        }
    }

    function course_update(Request $request)
    {
        $id = $request->input('id');
        $course_name = $request->input('course_name');
        $course_des = $request->input('course_des');
        $course_fee = $request->input('course_fee');
        $course_totalenroll = $request->input('course_totalenroll');
        $course_totalclass = $request->input('course_totalclass');
        $course_link = $request->input('course_link');
        $course_img = $request->input('course_img');


        $result = course::where('id', '=', $id)->update([
            'course_name' => $course_name,
            'course_des' => $course_des,
            'course_fee' => $course_fee,
            'course_totalenroll' => $course_totalenroll,
            'course_totalclass' => $course_totalclass,
            'course_link' => $course_link,
            'course_img' => $course_img
        ]);
        if ($result) {
            return 1;
        } else {
            return 0;
        }
    }

    function course_add(Request $request)
    {
        $course_name = $request->input('course_name');
        $course_des = $request->input('course_des');
        $course_fee = $request->input('course_fee');
        $course_totalenroll = $request->input('course_totalenroll');
        $course_totalclass = $request->input('course_totalclass');
        $course_link = $request->input('course_link');
        $course_img = $request->input('course_img');

        $result = course::insert([
            'course_name' => $course_name,
            'course_des' => $course_des,
            'course_fee' => $course_fee,
            'course_totalenroll' => $course_totalenroll,
            'course_totalclass' => $course_totalclass,
            'course_link' => $course_link,
            'course_img' => $course_img
        ]);
        if ($result) {
            return 1;
        } else {
            return 0;
        }
    }
}
