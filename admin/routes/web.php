<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeCrontoller;
use App\Http\Controllers\vigitorController;
use App\Http\Controllers\serviceController;
use App\Http\Controllers\courseController;
use App\Http\Controllers\projectsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PhotoController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [homeCrontoller::class, 'homeIndex'])->middleware('loginCheck');


Route::get('/visitors', [vigitorController::class, 'visitorIndex'])->middleware('loginCheck');

//  admin routes for service manegement
Route::get('/services', [serviceController::class, 'servicesIndex'])->middleware('loginCheck');
Route::get('/serviceget', [serviceController::class, 'get_services_data'])->middleware('loginCheck');
Route::post('/servicesdelete', [serviceController::class, 'services_delete'])->middleware('loginCheck');
Route::post('/servicesdetails', [serviceController::class, 'get_services_details'])->middleware('loginCheck');
Route::post('/servicesUpdate', [serviceController::class, 'services_update'])->middleware('loginCheck');
Route::post('/servicesAdd', [serviceController::class, 'services_add'])->middleware('loginCheck');

//  admin routes for course manegement
Route::get('/course', [courseController::class, 'courseIndex'])->middleware('loginCheck');
Route::get('/courseGet', [courseController::class, 'get_course_data'])->middleware('loginCheck');
Route::post('/courseDelete', [courseController::class, 'course_delete'])->middleware('loginCheck');
Route::post('/courseDetails', [courseController::class, 'get_course_details'])->middleware('loginCheck');
Route::post('/courseUpdate', [courseController::class, 'course_update'])->middleware('loginCheck');
Route::post('/courseAdd', [courseController::class, 'course_add'])->middleware('loginCheck');

//  admin routes for Project manegement
Route::get('/projects', [projectsController::class, 'projectsIndex'])->middleware('loginCheck');



//  admin routes for Login manegement
Route::get('/login', [LoginController::class, 'LoginIndex']);
Route::get('/logout', [LoginController::class, 'Logout'])->middleware('loginCheck');
Route::post('/onLogin', [LoginController::class, 'onLogin']);


//  admin photo gallary
Route::get('/photo', [PhotoController::class, 'photoIndex']);
Route::post('/photosUpload', [PhotoController::class, 'photosUpload']);
Route::get('/PhotoLode', [PhotoController::class, 'photoLoad']);
Route::get('/PhotoJSONByID/{id}', [PhotoController::class, 'PhotoJSONByID']);
Route::post('/PhotoDelete', [PhotoController::class, 'PhotoDelete']);



