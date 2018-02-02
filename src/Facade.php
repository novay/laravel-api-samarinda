<?php

namespace Novay\ApiSamarinda;

use Illuminate\Support\Facades\Facade as BaseFacade;

class Facade extends BaseFacade
{
    protected static function getFacadeAccessor() { 
        return 'api-samarinda';
    }
}