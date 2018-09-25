<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tagable extends Model
{
    protected $fillable = ['taggable_type', ''];
}
