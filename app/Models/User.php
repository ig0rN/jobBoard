<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Models\Job;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function redirectRouteBasedOnRole(){
        $role = strtolower($this->role->name);
        
        return $role . '.home';
    }

    public function isModerator(){
        // Also I can go with $this->role->name == "HR";
        return $this->role_id == 1;
    }

    public function isHR(){
        // Also I can go with $this->role->name == "Moderator";
        return $this->role_id == 2;
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

}
