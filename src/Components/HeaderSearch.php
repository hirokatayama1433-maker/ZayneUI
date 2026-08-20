<?php

namespace Zayne\UI\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class HeaderSearch extends Component
{
    public function __construct(
        public string  $placeholder = 'Search...',
        public ?string $name        = 'search',
        public ?string $value       = null,
        public ?string $kbd         = null,
        public string  $icon        = 'search',
        public string  $radius      = 'var(--zayne-radius-field)',
        public string  $border      = 'var(--zayne-border-field)',
        public ?string $bordercolor = 'var(--zayne-color-base-border)',
        public ?string $background  = 'var(--zayne-color-base-100)',
        public ?string $action      = null,
    ) {}

    public function render(): View
    {
        return view('zayne::header-search');
    }
}
