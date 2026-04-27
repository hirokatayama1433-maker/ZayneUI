<?php

namespace View\Components\Zayne\Data;

use App\View\Components\Zayne\ZayneComponent;

class Timeline extends ZayneComponent
{
    public string $classes;

    public function __construct()
    {
        $this->classes = $this->mergeClasses(
            'flex flex-col',
        );
    }

    public function render()
    {
        return view('zayne.data.timeline');
    }
}
