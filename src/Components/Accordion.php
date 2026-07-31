<?php

namespace Zayne\UI\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Zayne\UI\Zayne;

class Accordion extends Component
{
    public string $style = '';

    public function __construct(
        public bool    $multiple = false,   // allow multiple open at once
        public string  $variant  = 'default', // default | bordered | separated
        public ?string $default  = null,    // default open item value
        public ?string $radius   = null,
        public ?string $margin   = null,
    ) {
        $this->buildStyle();
    }

    protected function buildStyle(): void
    {
        $this->style = Zayne::styleString([
            'display'       => 'flex',
            'flex-direction'=> 'column',
            'width'         => '100%',
            'border-radius' => $this->radius ?? 'var(--zayne-radius-box)',
            'margin'        => $this->margin,
            'overflow'      => $this->variant === 'default' ? 'hidden' : null,
            'border'        => $this->variant === 'default' ? '1px solid var(--zayne-color-base-border)' : null,
            'gap'           => $this->variant === 'separated' ? '0.5rem' : null,
        ]);
    }

    public function render(): View
    {
        return view('zayne::accordion');
    }
}
