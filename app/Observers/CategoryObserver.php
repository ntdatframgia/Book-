<?php

namespace App\Observers;

use Cache;
use App\Models\Category;

class CategoryObserver
{
    public function saved(Category $category)
    {
        Cache::forget('category');
    }

    public function deleted(Category $category)
    {
        Cache::forget('category');
    }       

}