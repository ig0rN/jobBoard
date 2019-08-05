<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\User;

use App\Mail\FirstJobNotificationHR;
use App\Mail\FirstJobNotificationModerator;

class JobNotificationEmail extends Model
{
    protected $guarded = ['id'];

    public function check($job_mail)
    {
        $email = self::where('email', $job_mail)->first();

        if(is_null($email)){
            self::create([
                'email' => $job_mail
            ]);

            return true;
        }

        return false;
    }

    public function send(Job $job)
    {
        $emails = User::where('role_id', 1)->pluck('email');

        foreach ($emails as $email){
            \Mail::to($email)->send(new FirstJobNotificationModerator($job));
        }
        \Mail::to($job->email)->send(new FirstJobNotificationHR());
    }
}
