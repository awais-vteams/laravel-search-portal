<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Category
 * @package App\Models
 */
class Category extends Model
{
    use SoftDeletes;

    static $rules = [
        'name' => 'required',
        'description' => 'required',
    ];

    protected $fillable = [
        'name', 'description'
    ];
}