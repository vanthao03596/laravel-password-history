<?php

namespace Vanthao03596\LaravelPasswordHistory;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Vanthao03596\LaravelPasswordHistory\LaravelPasswordHistory
 */
class LaravelPasswordHistoryFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-password-history';
    }
}
