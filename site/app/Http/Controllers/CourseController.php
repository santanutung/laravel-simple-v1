<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\course;

class CourseController extends Controller
{
    function CoursePage()
    {
        $course_data = json_decode(course::orderBy('id', 'desc')->get());
        return view("Course", ['course_data' => $course_data]);
    }
}
