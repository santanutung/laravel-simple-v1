<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\service;


class serviceController extends Controller
{
    function servicesIndex()
    {
        return view('services');
    }

    function get_services_data()
    {
        $get_services_data = json_encode(service::orderBy('id', 'desc')->get());
        return $get_services_data;
    }

    function services_delete(Request $request)
    {
        $id = $request->input('id');
        $result = service::where('id', '=', $id)->delete();
        if ($result) {
            return 1;
        } else {
            return $result;
        }
    }


    function get_services_details(Request $request)
    {
        $id = $request->input('id');
        $services_data = json_encode(service::where('id', '=', $id)->get());
        return $services_data;
    }

    function services_update(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $desc = $request->input('desc');
        $img = $request->input('img');

        // return ([$id, $name, $desc, $img]);
        $result = service::where('id', '=', $id)->update(['service_name' => $name, 'service_des' => $desc, 'service_img' => $img]);
        if ($result) {
            return $result;
        } else {
            return $result;
        }
    }

    function services_add(Request $request)
    {
        $name = $request->input('name');
        $desc = $request->input('desc');
        $img = $request->input('img');

        // return ([$id, $name, $desc, $img]);
        $result = service::insert(['service_name' => $name, 'service_des' => $desc, 'service_img' => $img]);
        if ($result) {
            return $result;
        } else {
            return $result;
        }
    }
}
