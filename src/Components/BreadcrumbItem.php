<?php

namespace Zayne\UI\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class BreadcrumbItem extends Component
{
    public function __construct(
        public ?string $href    = null,
        public bool    $current = false,
    ) {}

    public function render(): View
    {
        return view('zayne::breadcrumb-item');
    }
}
