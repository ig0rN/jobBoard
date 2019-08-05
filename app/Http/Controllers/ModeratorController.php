<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobRequest;
use App\Models\Job;

class ModeratorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.moderator.index');
    }

    /**
     * Display a listing of the jobs based on status which you have in wildcard.
     *
     * @return \Illuminate\Http\Response
     */
    public function jobs($status)
    {
        $jobs = Job::allJobsBasedOnStatus($status)->get();
        $status = (new Job)->getStatus($status);

        return view('user.moderator.jobs', compact('jobs', 'status'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        return view('user.moderator.show', compact('job'));
    }

    /**
     * Update the status of Job based on ID to APPROVED.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function approve(Job $job)
    {
        $job->update([
            'status' => 1
        ]);

        return redirect()->back()->with(['success' => 'You successfully approved a job']);
    }

    /**
     * Update the status of Job based on ID to DECLINED.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function decline(Job $job)
    {
        $job->update([
            'status' => 0
        ]);

        return redirect()->back()->with(['success' => 'You successfully declined a job']);
    }
}
