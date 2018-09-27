<?php

namespace App\Services;


use Illuminate\Support\Facades\File;

class CImageService
{
    private $path = 'images/';

    public function getImagePath($name)
    {
        if (!File::exists($this->path . $name)) {
            $name = '/images/default.png';
        }

        return asset($this->path . $name);
    }
}