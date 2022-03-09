<?php

namespace Amal\Generator\Facade;

use Illuminate\Support\Facades\Facade;

class  Generator extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'GeneratorService';
    }

}