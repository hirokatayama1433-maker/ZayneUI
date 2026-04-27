<?php

namespace App\View\Components\Zayne\Data;

use App\View\Components\Zayne\ZayneComponent;

class Board extends ZayneComponent
{
    public string $classes;

    public function __construct()
    {
        $this->classes = $this->mergeClasses(
            'flex gap-4 items-start overflow-x-auto pb-4',
        );
    }

    public function render()
    {
        return view('components.zayne.data.board');
    }
}
