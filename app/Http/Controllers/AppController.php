<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;

class AppController extends Controller
{
    //
    public function index()
    {
        return view('pages.dashboard');
    }

    public function dashboard()
    {
        return view('content.dashboard');
    }

    public function settings()
    {
        return view('content.settings');
    }

    public function candidate()
    {
        $candidates = Candidate::all();

        return view('content.candidate', compact('candidates'));
    }
}
