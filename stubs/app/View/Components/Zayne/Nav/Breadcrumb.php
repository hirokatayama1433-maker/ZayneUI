<?php

namespace App\View\Components\Zayne;

use App\View\Components\Zayne\ZayneComponent;

class Breadcrumb extends ZayneComponent
{
    public string $separator; // icon name or custom string
    public string $classes;

    public function __construct(
        string $separator = 'chevron-right',
    ) {
        $this->separator = $separator;

        $this->classes = $this->mergeClasses(
            'flex items-center flex-wrap gap-1',
        );
    }

    public function render()
    {
        return view('components.zayne.breadcrumb');
    }
}