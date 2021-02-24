<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    function  photoIndex()
    {
        return view('Photo');
    }

    function photosUpload(Request $request)
    {
        $photoPath = $request->file('photo')->store('public');

        $host = $_SERVER['HTTP_HOST'];
        $photoName = explode('/', $photoPath)[1];
        $location = 'http://'.$host . '/storage/' . $photoName;

        $Result =  Photo::insert(['location' => $location]);
        return $Result;
    }
    function  photoLoad()
    {
        return Photo::orderby('id','asc')->limit(4)->get();
    }

     function  PhotoJSONByID(Request $request)
    {
       $FirstId= $request->id;
       $lastId=   $FirstId+4;
        return Photo::where('id','>',$FirstId)->where('id','<=',$lastId)->get();
    }


  function PhotoDelete(Request  $request){

      $OldPhotoURL=$request->input('OldPhotoURL');
      $OldPhotoID=$request->input('id');

      $OldPhotoURLArray= explode("/", $OldPhotoURL);
      $OldPhotoName=end($OldPhotoURLArray);
     // $DeletePhotoFile= Storage::delete('public/'.$OldPhotoName);

      $DeleteRow= Photo::where('id','=',$OldPhotoID)->delete();
      return  $DeleteRow;
  }

}
