<?php

namespace App\Models;

use App\Models\Status;
use App\Notifications\ResetPassword;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function statuses(){
        return $this->hasMany(Status::class);
    }

    public static function boot(){
        parent::boot();

        static::creating(function($user){
            $user->activation_token = str_random(30);
        });
    }

    public function sendPasswordResetNotification($token){
        $this->notify(new ResetPassword($token));
    }

    public function gravatar($size = '100'){
        $hash = md5(strtolower(trim($this->attribute['email'])));
        return "http://www.gravatar.com/avatar/$hash?s=$size";
    }

    public function feed(){
        return $this->statuses()
                    ->orderBy('created_at', 'desc');
    }
}
