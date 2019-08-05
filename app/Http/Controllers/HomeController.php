<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::with('user')->where('status', 1)->orderBy('created_at', 'DESC')->paginate(10);

        return view('home.index', compact('jobs'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        return view('home.show', compact('job'));
    }

    /**
     * Change status from email for specific ID.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function changeStatus($status, Job $job)
    {
        $job->update([
            'status' => $status
        ]);

        return view('email.statusChangeMessage');
    }
}
