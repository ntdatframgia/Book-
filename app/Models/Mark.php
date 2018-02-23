<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    public function user()
    {
    	return $this->hasOne('User');
    }

    public function activites()
    {
    	return $this->morphMany('Activity', 'activitytable');
    }
}
