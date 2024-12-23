<?php

namespace Henset11\OneSender\Facades;

use Illuminate\Support\Facades\Facade;

class OneSender extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'onesender';
    }
}
