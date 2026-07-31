<?php

namespace Zayne\UI\Components\Breadcrumb;

use Illuminate\View\Component;
use Illuminate\View\View;

class Item extends Component
{
    public function __construct(
        public ?string $href    = null,
        public bool    $current = false,
    ) {}

    public function render(): View
    {
        return view('zayne::breadcrumb.item');
    }
}
