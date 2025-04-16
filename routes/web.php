<?php

use App\Http\Controllers\JobController;
use App\Models\Employer;
use App\Models\Job;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

/*
 *
 * jobs
 *
 */

// Index
Route::get('jobs', [JobController::class, 'index']);

// Create
Route::get('/jobs/create', function () {
    return view('jobs.create');
});

// Show
Route::get('/jobs/{job}', function (Job $job) {
    return view('jobs.show', ['job' => $job]);
});

// Store
Route::post('/jobs', function () {
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => 'integer',
        'description' => ['required', 'min:25'],
    ]);

    $job = Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'description' => request('description'),
        'employer_id' => 1,
    ]);

    return view('jobs.show', ['job' => $job]);
});

// Edit
Route::get('/jobs/{job}/edit', function (Job $job) {
    return view('jobs.edit', ['job' => $job]);
});

// Update
Route::patch('/jobs/{job}', function (Job $job) {
    // authorize
    // TODO

    // validate
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => 'integer',
        'description' => ['required', 'min:25'],
    ]);

    // update job
    $job->title = request('title');
    $job->salary = request('salary');
    $job->description = request('description');

    // and persist
    $job->save();

    // redirect to job page
    return redirect('/jobs/' . $job->id);
});

// Destroy
Route::delete('/jobs/{job}', function (Job $job) {
    // authorize
    // TODO

    // delete
    $job->delete();

    // redirect
    return redirect('/jobs/');
});

/*
 *
 * EMPLOYERS
 *
 */

Route::get('/employers', function () {
    $employers = Employer::latest()->paginate(5);

    return view('employers.index', [
        'employers' => $employers
    ]);
});

Route::get('/employers/{employer}', function (Employer $employer) {
    return view('employers.show', ['employer' => $employer]);
});
