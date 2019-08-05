<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Job;

class FirstJobNotificationModerator extends Mailable
{
    use Queueable, SerializesModels;

    private $job;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($job)
    {
        // dd($job->user->name);
        $this->job = $job;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.ModeratorNotification')
                    ->subject('HR first job')
                    ->from('jobboard@noreplay.com')
                    ->with('job', $this->job);
    }
}
