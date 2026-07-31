<?php

namespace Zayne\UI\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Zayne\UI\Zayne;

class Heading extends Component
{
    public string $style = '';

    public function __construct(
        public string  $level   = '1',       // 1–6
        public string  $size    = 'auto',    // auto | xs | sm | md | lg | xl | 2xl | 3xl
        public string  $weight  = '700',
        public string  $color   = 'var(--zayne-color-base-content)',
        public ?string $margin  = null,
        public ?string $align   = null,      // left | center | right
        public bool    $muted   = false,
        public bool    $truncate = false,
    ) {
        $this->buildStyle();
    }

    protected function buildStyle(): void
    {
        $autoSizes = [
            '1' => ['font-size' => '2rem',    'line-height' => '1.2', 'letter-spacing' => '-0.025em'],
            '2' => ['font-size' => '1.5rem',  'line-height' => '1.25', 'letter-spacing' => '-0.02em'],
            '3' => ['font-size' => '1.25rem', 'line-height' => '1.3',  'letter-spacing' => '-0.015em'],
            '4' => ['font-size' => '1.125rem','line-height' => '1.4',  'letter-spacing' => '-0.01em'],
            '5' => ['font-size' => '1rem',    'line-height' => '1.5',  'letter-spacing' => '0'],
            '6' => ['font-size' => '0.875rem','line-height' => '1.5',  'letter-spacing' => '0'],
        ];

        $explicitSizes = [
            'xs'  => ['font-size' => '0.75rem',  'line-height' => '1.5'],
            'sm'  => ['font-size' => '0.875rem', 'line-height' => '1.5'],
            'md'  => ['font-size' => '1rem',     'line-height' => '1.5'],
            'lg'  => ['font-size' => '1.125rem', 'line-height' => '1.4'],
            'xl'  => ['font-size' => '1.25rem',  'line-height' => '1.3'],
            '2xl' => ['font-size' => '1.5rem',   'line-height' => '1.25'],
            '3xl' => ['font-size' => '2rem',     'line-height' => '1.2'],
        ];

        $sizing = $this->size === 'auto'
            ? ($autoSizes[$this->level] ?? $autoSizes['1'])
            : ($explicitSizes[$this->size] ?? $autoSizes[$this->level]);

        $this->style = Zayne::styleString(array_merge([
            'font-weight'   => $this->weight,
            'color'         => $this->muted ? 'var(--zayne-color-base-content-muted)' : $this->color,
            'margin'        => $this->margin ?? '0',
            'text-align'    => $this->align,
            'overflow'      => $this->truncate ? 'hidden' : null,
            'text-overflow' => $this->truncate ? 'ellipsis' : null,
            'white-space'   => $this->truncate ? 'nowrap' : null,
        ], $sizing));
    }

    public function render(): View
    {
        return view('zayne::heading');
    }
}
