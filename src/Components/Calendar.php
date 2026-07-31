<?php

namespace Zayne\UI\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Zayne\UI\Zayne;

class Calendar extends Component
{
    public string $style = '';

    public function __construct(
        public ?string $name       = null,
        public ?string $value      = null,    // YYYY-MM-DD, selected date
        public ?string $min        = null,    // YYYY-MM-DD
        public ?string $max        = null,    // YYYY-MM-DD
        public string  $mode       = 'single', // single | range | multiple
        public bool    $showtoday  = true,
        public bool    $weeknumbers = false,
        public string  $firstday   = '0',    // 0=Sun, 1=Mon
        public ?string $radius     = null,
        public ?string $shadow     = null,
        public ?string $border     = null,
        public ?string $width      = null,
        public ?string $margin     = null,
    ) {
        $this->buildStyle();
    }

    protected function buildStyle(): void
    {
        $this->style = Zayne::styleString([
            'display'         => 'flex',
            'flex-direction'  => 'column',
            'background'      => 'var(--zayne-color-base-100)',
            'border-radius'   => $this->radius ?? 'var(--zayne-radius-box)',
            'border'          => $this->border ?? '1px solid var(--zayne-color-base-border)',
            'box-shadow'      => $this->shadow,
            'width'           => $this->width ?? 'fit-content',
            'padding'         => '0.875rem',
            'margin'          => $this->margin,
            'box-sizing'      => 'border-box',
            'min-width'       => '18rem',
        ]);
    }

    public function render(): View
    {
        return view('zayne::calendar');
    }
}
