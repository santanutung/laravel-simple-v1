<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeCrontoller;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\PrivacyController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TermsController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
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

Route::get('/', [homeCrontoller::class, 'homeIndex']);
Route::post('/contctSend', [homeCrontoller::class, 'contactsSend']);

// page route
Route::get('/course', [CourseController::class, 'CoursePage']);
Route::get('/privacy', [PrivacyController::class, 'PrivacyPage']);
Route::get('/projects', [ProjectController::class, 'projectsPage']);
Route::get('/terms', [TermsController::class, 'TermsPage']);
Route::get('/blog', [BlogController::class, 'BolgPage']);
Route::get('/contact', [ContactController::class, 'concatPage']);

