<?php

namespace App\View\Components\Zayne\Layout;

class Main extends \App\View\Components\Zayne\ZayneComponent
{public string $classes;

    public function __construct(
        string $classes = '',
    ) {
        $this->classes = $this->mergeClasses(
            'zaynemain',
            $classes,
        );
    }

    public function render()
    {
        return view('components.zayne.layout.main');
    }
}
