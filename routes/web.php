<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\ValidUser;
use App\Http\Middleware\ValidAdmin;

Route::get('/', function () {
    return view('index');
});
Route::view('signup','singup');
Route::view('login','login');
Route::get('/loginForm',[AdminController::class,'loginForm']);
Route::get('logout',[AdminController::class,'logout']);
Route::post('signup',[AdminController::class,'signup']);


Route::middleware(['User:user'])->group(function(){


Route::view('addProject','addProject');
Route::get('profile',[AdminController::class,'userprofile']);
Route::view('anotheruser','anotheruser');
Route::get('otp_verify/{id}',[AdminController::class,'otp_verify']);
Route::view('notification','notification');
Route::get('dashboard',[AdminController::class,'dashboard']);
Route::get('editprofile',[AdminController::class,'editprofile']);
Route::post('add_project',[AdminController::class,'add_project']);
Route::get('/pending',[AdminController::class,'pending_requesr']);   
Route::post('/project_request',[AdminController::class,'project_request']);
Route::get('active',[AdminController::class,'activeproject']);
Route::get('opration/{id}/{num}',[AdminController::class,'opration']);
Route::get('deactive/{id}',[AdminController::class,'deactive']);
Route::get('/detail/{id}',[AdminController::class,'projectDetail']);
Route::post('/upload_file/{id}',[AdminController::class,'upload_file']);
Route::get('download/{id}',[AdminController::class,'download']);
Route::get('/delete/{id}',[AdminController::class,'delete']);
});
Route::middleware(['Admin:admin'])->group(function(){});