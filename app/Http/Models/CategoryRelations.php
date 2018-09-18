<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryRelations extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userCategories()
    {
        return $this->belongsTo('App\Models\UserCategories');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function category()
    {
        return $this->hasOne('App\Models\Category');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function categoryDetails()
    {
        return $this->hasOne('App\Models\CategoryDetails');
    }
}
