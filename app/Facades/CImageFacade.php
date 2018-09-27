<?php

namespace App\Facades;


use Illuminate\Support\Facades\Facade;

class CImageFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'cimage';
    }
}