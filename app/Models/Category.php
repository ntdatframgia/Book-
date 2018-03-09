<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Category extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    protected $fillable = ['name', 'parent_id'];
    
    public function books()
    {
        return $this->hasMany('Book');
    }

    public function children()
    {
        return $this->hasMany('App\Models\Category', 'parent_id', 'id');
    }

    public function childrenRecursion()
    {
        return $this->children()->with('childrenRecursion');
    }

    public function parent()
    {
        return $this->belongTo('Category', 'parent_id');
    }

    public function parentRecursion()
    {
        return $this->parent()->with('parentRecursion');
    }
}
