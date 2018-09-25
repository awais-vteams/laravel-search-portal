<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    protected $fillable = ['name', 'taggable_id'];
    /**
     * Get all of the posts that are assigned this tag.
     */
    public function details()
    {
        return $this->morphedByMany('App\Models\CategoryDetails', 'taggable');
    }

    /**
     * Get all of the videos that are assigned this tag.
     */
    public function categories()
    {
        return $this->morphedByMany('App\Models\Category', 'taggable');
    }
}
