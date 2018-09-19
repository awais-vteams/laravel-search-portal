<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryDetails extends Model
{
    use SoftDeletes;

    /**
     * @var array
     */
    protected $fillable = [
        'name', 'description'
    ];

    static $rules = [
        'category_id' => 'required',
        'name' => 'required',
        'description' => 'required',
        'images.*' => 'image|mimes:jpeg,png,jpg,svg|max:4048'
    ];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function images()
    {
        return $this->hasMany('App\Models\Images');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userCategory()
    {
        return $this->belongsTo('App\Models\UserCategories', 'category_detail_id');
    }
}
