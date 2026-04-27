<?php

namespace App\View\Components\Zayne;

use App\View\Components\Zayne\ZayneComponent;

class Tree extends ZayneComponent
{
    public function __construct(
        public ?string $icon  = null,
        public ?string $label = null,
        public ?int    $badge = null,
    ) {}

    public function render()
    {
        return view('components.zayne.tree');
    }
}