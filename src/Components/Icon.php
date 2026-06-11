<?php

namespace Zayne\UI\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Zayne\UI\Icons\IconMap;

class Icon extends Component
{
    public ?string $svg;

    public function __construct(
        public ?string $name = null,
        public ?string $color = null,
        public string  $size  = '1em',
    ) {
        $this->svg = $name ? IconMap::get($name) : null;
    }

    public function render(): View
    {
        return view('zayne::icon');
    }
}
