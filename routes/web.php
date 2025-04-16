<?php

use App\Http\Controllers\EmployerController;
use App\Http\Controllers\JobController;
use App\Models\Employer;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home');
Route::view('/about', 'about');
Route::resource('jobs', JobController::class);
Route::resource('employers', EmployerController::class, [
    'only' => ['index', 'show']
]);

//Route::controller(JobController::class)->group(function () {
//    Route::get('jobs', 'index');
//    Route::get('/jobs/create', 'create');
//    Route::get('/jobs/{job}', 'show');
//    Route::post('/jobs', 'store');
//    Route::get('/jobs/{job}/edit', 'edit');
//    Route::patch('/jobs/{job}', 'update');
//    Route::delete('/jobs/{job}',  'destroy');
//});

//Route::resource('jobs', JobController::class, [
//    'only' => ['edit'],
//    'except' => []
//]);
