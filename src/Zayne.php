<?php

namespace Zayne\UI;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Zayne\UI\ZayneManager
 */
class Zayne extends Facade
{
    public static function getFacadeAccessor(): string
    {
        return 'zayne';
    }
}
