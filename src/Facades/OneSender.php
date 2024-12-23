<?php

namespace Henset11\OneSenderLaravel\Facades;

use Illuminate\Support\Facades\Facade;

class OneSender extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'onesender';
    }
}
