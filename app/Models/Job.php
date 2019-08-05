<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $guarded = ['id'];

    const STATUS = array(
        0 => 'Declined',
        1 => 'Approved',
        2 => 'Waiting for moderator respond'
    );

    public static function allJobsFromUser()
    {
        return self::where('user_id', auth()->user()->id)->orderBy('created_at', 'DESC');
    }

    public static function allJobsBasedOnStatus(int $status)
    {
        return self::where('status', $status)->orderBy('created_at', 'ASC');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getStatus($statusID)
    {
        return self::STATUS[ $statusID ];
    }

    public function belongsToUser()
    {
        return auth()->user()->id == $this->user_id;
    }

    public function isDeclined()
    {
        return $this->status == 0;
    }

    public function isApproved()
    {
        return $this->status == 1;
    }

    public function isPublished()
    {
        return $this->status != 2;
    }
}
