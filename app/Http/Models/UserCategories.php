<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserCategories extends Model
{
    protected $fillable = [
        'user_id', 'category_relation_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function details()
    {
        return $this->hasMany('App\Models\CategoryRelations');
    }
}
