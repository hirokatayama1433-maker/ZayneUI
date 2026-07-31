<?php

namespace Zayne\UI\Components\Timeline;

use Illuminate\View\Component;
use Illuminate\View\View;

class Item extends Component
{
    public function __construct(
        public ?string $title     = null,
        public ?string $timestamp = null,
        public string  $color     = 'primary',  // primary | success | danger | warning | info | base
        public ?string $icon      = null,
        public bool    $last      = false,
    ) {}

    public function render(): View
    {
        return view('zayne::timeline.item');
    }
}
