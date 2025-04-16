<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::with('employer', 'tags')->latest()->paginate(5);

        return view('jobs.index', [
            'jobs' => $jobs
        ]);
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function show(Job $job)
    {
        return view('jobs.show', ['job' => $job]);
    }

    public function store()
    {
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
    }

    public function edit(Job $job)
    {
        return view('jobs.edit', ['job' => $job]);
    }

    public function update(Job $job)
    {
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
    }

    public function destroy(Job $job)
    {
        // authorize
        // TODO

        // delete
        $job->delete();

        // redirect
        return redirect('/jobs/');
    }
}
