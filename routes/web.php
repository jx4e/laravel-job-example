<?php

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
Route::get('/jobs', function () {
    $jobs = Job::with('employer', 'tags')->latest()->paginate(5);

    return view('jobs.index', [
        'jobs' => $jobs
    ]);
});

// Create
Route::get('/jobs/create', function () {
    return view('jobs.create');
});

// Show
Route::get('/jobs/{job}', function ($id) {
    return view('jobs.show', ['job' => Job::find($id)]);
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
Route::get('/jobs/{id}/edit', function ($id) {
    return view('jobs.edit', ['job' => Job::find($id)]);
});

// Update
Route::patch('/jobs/{id}', function ($id) {
    // validate
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => 'integer',
        'description' => ['required', 'min:25'],
    ]);

    // authorize
    // TODO

    // update job
    $job = Job::findOrFail($id);
    $job->title = request('title');
    $job->salary = request('salary');
    $job->description = request('description');

    // and persist
    $job->save();

    // redirect to job page
    return redirect('/jobs/' . $job->id);
});

// Destroy
Route::delete('/jobs/{id}', function ($id) {
    // authorize
    // TODO

    // delete
    $job = Job::findOrFail($id);
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

Route::get('/employers/{id}', function ($id) {
    return view('employers.show', ['employer' => Employer::find($id)]);
});
