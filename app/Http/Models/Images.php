<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $fillable = [
        'category_detail_id', 'path'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function categoryDetails()
    {
        return $this->hasOne('App\Models\CategoryDetails', 'id', 'category_detail_id');
    }
}
