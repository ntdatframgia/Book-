<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    public function book()
    {
    	return $this->hasOne('Book');
    }

    public function user()
    {
    	return $this->hasOne('User');
    }

    public function activities()
    {
    	return $this->morphMany('Activity', 'activitytable');
    }
}
