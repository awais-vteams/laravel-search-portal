<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserCategories extends Model
{
    protected $fillable = [
        'user_id', 'category_id', 'category_detail_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function category()
    {
        return $this->hasOne('App\Models\Category', 'id', 'category_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function details()
    {
        return $this->hasOne('App\Models\CategoryDetails', 'id', 'category_detail_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function images()
    {
        return $this->hasMany('App\Models\Images', 'category_detail_id', 'category_detail_id');
    }
}
