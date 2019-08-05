<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobRequest;
use App\Models\Job;
use App\Models\JobNotificationEmail;

class HRController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::allJobsFromUser()->get();
        return view('user.hr.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.hr.add-new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JobRequest $request)
    {
        $request->merge([
            'user_id' => auth()->user()->id
        ]);

        $job = Job::create($request->all());

        
        $notification = new JobNotificationEmail;

        if( $notification->check($job->email) ){
        
            $notification->send($job);
        }

        return redirect()->route('hr.home')->with(['success' => 'You successfully added a job']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        abort_unless($job->belongsToUser(), 403);

        return view('user.hr.show', compact('job'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        $job->delete();

        return redirect()->route('hr.home')->with(['success' => 'You deleted added a job']);
    }
}
