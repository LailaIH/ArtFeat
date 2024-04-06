<?php

namespace App\Http\Controllers;

use App\Models\JobTitle;
use Illuminate\Http\Request;

class JobTitlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        // Retrieve all job titles from the database
        $jobTitles = JobTitle::all();

        // Pass the job titles to the view
        return view('jobtitles.index', ['jobTitles'=>$jobTitles]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jobtitles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Create a new job title
        JobTitle::create($validatedData);
        

        // Redirect to the job titles index page with a success message
        return redirect()->route('job_titles.index')->with('success', 'Job Title created successfully');
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
    public function edit($id)
    {
        $jobTitle = JobTitle::findOrFail($id);
        return view('jobtitles.edit',['jobTitle'=>$jobTitle]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $jobTitle = JobTitle::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $jobTitle->name= strip_tags($request->input('name'));
        $jobTitle->description= strip_tags($request->input('description'));
        $jobTitle->is_online= $request->has('is_online')?1:0;

        $jobTitle->save();
        return redirect()->route('job_titles.index')->with('success','Job Title has been updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        JobTitle::destroy($id);
        return redirect()->route('job_titles.index')->withErrors(['fail' => 'Job Title has been deleted']);
    }
    public function updateStatus(Request $request, JobTitle $jobTitle)
    {
        // Toggle the is_online status
        $jobTitle->update(['is_online' => !$jobTitle->is_online]);

        return back()->with('success', 'Status updated successfully');
    }
}
