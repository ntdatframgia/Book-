<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;


class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
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

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function activities()
    {
        return $this->hasMany('Activity');
    }

    public function marks()
    {
        return $this->hasMany('Mark');
    }

    public function requests()
    {
        return $this->hasMany('Request');
    }

    public function votes()
    {
        return $this->hasMany('Vote');
    }

    public function follows()
    {
        return $this->hasMany('Follow');
    }
}
