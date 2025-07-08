<?php

namespace App\Http\Controllers;

use App\Models\Candidate;

use Illuminate\Http\Request;

class CandidateController extends Controller
{

    //
    public function create()
    {
        return view('candidate.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'candidate_name' => 'required|string|max:255',
            // Optional: validate other fields
        ]);

        Candidate::create($request->all());

        // Return JSON for SPA behavior
        return response()->json([
            'status' => 'success',
            'message' => 'Candidate added successfully!',
            'redirect' => '/section/candidate' // your SPA route
        ]);
    }
}
