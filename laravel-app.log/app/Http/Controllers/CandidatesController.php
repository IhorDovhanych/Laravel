<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\RedirectResponse;
use App\Http\Requests\CandidateRequest;

class CandidatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidates = Candidate::all();
        $vacancies = Vacancy::all();
        return view('candidates.index', ['candidates' => $candidates, 'vacancies' => $vacancies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('candidates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CandidateRequest $request): RedirectResponse
    {
        $validatedCandidate = $request->validate($request->rules());
        $candidate = Candidate::create([
            'first_name' => $validatedCandidate['first_name'],
            'last_name' => $validatedCandidate['last_name'],
            'gender' => $validatedCandidate['gender'],
            'birth_year' => $validatedCandidate['birth_year'],
            'education' => $validatedCandidate['education'],
            'specialization' => $validatedCandidate['specialization'],
            'vacancy_id' => $validatedCandidate['vacancy_id']
        ]);
        return redirect(route('candidates.index'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Candidate $candidate)
    {
        return view('candidates.edit', ['candidate' => $candidate]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CandidateRequest $request, Candidate $candidate)
    {
        $validatedCandidate = $request->validate($request->rules());
        $candidate->update([
            'first_name' => $validatedCandidate['first_name'],
            'last_name' => $validatedCandidate['last_name'],
            'gender' => $validatedCandidate['gender'],
            'birth_year' => $validatedCandidate['birth_year'],
            'education' => $validatedCandidate['education'],
            'specialization' => $validatedCandidate['specialization'],
            'vacancy_id' => $validatedCandidate['vacancy_id']
        ]);
        return redirect(route('candidates.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Candidate::destroy($id);
        return redirect(route('candidates.index'));
    }
}
