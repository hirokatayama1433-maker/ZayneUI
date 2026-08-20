<?php

namespace Zayne\UI\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class AccordionItem extends Component
{
    public function __construct(
        public string $value    = '',
        public bool   $open     = false,
        public bool   $disabled = false,
    ) {}

    public function render(): View
    {
        return view('zayne::accordion-item');
    }
}
