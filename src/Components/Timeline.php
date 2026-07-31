<?php

namespace Zayne\UI\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Zayne\UI\Zayne;

class Timeline extends Component
{
    public string $style = '';

    public function __construct(
        public string  $variant = 'left',   // left | alternate | right
        public ?string $margin  = null,
    ) {
        $this->buildStyle();
    }

    protected function buildStyle(): void
    {
        $this->style = Zayne::styleString([
            'display'       => 'flex',
            'flex-direction'=> 'column',
            'width'         => '100%',
            'margin'        => $this->margin,
            'position'      => 'relative',
        ]);
    }

    public function render(): View
    {
        return view('zayne::timeline');
    }
}
