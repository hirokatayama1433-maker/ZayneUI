<?php

namespace Zayne\UI\Components\Layout\Sidebar;

use Illuminate\View\Component;
use Illuminate\View\View;
use Zayne\UI\Zayne;

class Search extends Component
{
    public string $style = '';

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
    ) {
        $this->style = Zayne::styleString([
            'height'        => '38px',
            'padding'       => '0 0.625rem',
            'border-radius' => $this->radius,
            'border-width'  => $this->border,
            'border-color'  => $this->bordercolor,
            'background'    => $this->background,
            'color'         => 'var(--zayne-custom-sidebar-content)',
            'box-sizing'    => 'border-box',
        ]);
    }

    public function render(): View
    {
        return view('zayne::layout.sidebar.search');
    }
}