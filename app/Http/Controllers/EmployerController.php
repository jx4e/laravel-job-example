<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use Illuminate\Http\Request;

class EmployerController extends Controller
{
    public function index()
    {
        $employers = Employer::latest()->paginate(5);

        return view('employers.index', [
            'employers' => $employers
        ]);
    }

    public function show(Employer $employer)
    {
        return view('employers.show', ['employer' => $employer]);
    }
}
