<?php

namespace Zayne\UI\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Zayne\UI\Zayne;

class Breadcrumbs extends Component
{
    public string $style = '';

    public function __construct(
        public string  $separator = '/',      // any string or icon name
        public string  $size      = 'sm',     // sm | md
        public ?string $margin    = null,
    ) {
        $this->buildStyle();
    }

    protected function buildStyle(): void
    {
        $this->style = Zayne::styleString([
            'display'     => 'flex',
            'align-items' => 'center',
            'flex-wrap'   => 'wrap',
            'gap'         => '0.25rem',
            'margin'      => $this->margin,
            'font-size'   => $this->size === 'md' ? '0.9375rem' : '0.8125rem',
            'list-style'  => 'none',
            'padding'     => '0',
        ]);
    }

    public function render(): View
    {
        return view('zayne::breadcrumbs');
    }
}
