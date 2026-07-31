<?php

namespace Zayne\UI\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Zayne\UI\Zayne;

class Text extends Component
{
    public string $style = '';

    public function __construct(
        public string  $variant  = 'body',    // body | lead | small | muted | caption | strong | code
        public string  $size     = 'auto',    // auto | xs | sm | md | lg
        public ?string $color    = null,
        public ?string $margin   = null,
        public ?string $align    = null,
        public bool    $truncate = false,
        public string  $as       = 'auto',    // auto | p | span | div | label | li
    ) {
        $this->buildStyle();
    }

    protected function buildStyle(): void
    {
        $variantStyles = [
            'body'    => ['font-size' => '0.9375rem', 'line-height' => '1.6',  'color' => 'var(--zayne-color-base-content)',       'font-weight' => '400'],
            'lead'    => ['font-size' => '1.125rem',  'line-height' => '1.6',  'color' => 'var(--zayne-color-base-content)',       'font-weight' => '400'],
            'small'   => ['font-size' => '0.8125rem', 'line-height' => '1.5',  'color' => 'var(--zayne-color-base-content)',       'font-weight' => '400'],
            'muted'   => ['font-size' => '0.875rem',  'line-height' => '1.5',  'color' => 'var(--zayne-color-base-content-muted)', 'font-weight' => '400'],
            'caption' => ['font-size' => '0.75rem',   'line-height' => '1.4',  'color' => 'var(--zayne-color-base-content-muted)', 'font-weight' => '400'],
            'strong'  => ['font-size' => '0.9375rem', 'line-height' => '1.6',  'color' => 'var(--zayne-color-base-content)',       'font-weight' => '600'],
            'code'    => ['font-size' => '0.875rem',  'line-height' => '1.6',  'color' => 'var(--zayne-color-base-content)',       'font-weight' => '400',
                          'font-family' => "'JetBrains Mono', 'Fira Code', monospace",
                          'background' => 'var(--zayne-color-base-200)',
                          'padding' => '0.125rem 0.375rem',
                          'border-radius' => 'var(--zayne-radius-selector)'],
        ];

        $explicitSizes = [
            'xs' => '0.75rem',
            'sm' => '0.8125rem',
            'md' => '0.9375rem',
            'lg' => '1.125rem',
        ];

        $resolved = $variantStyles[$this->variant] ?? $variantStyles['body'];

        if ($this->size !== 'auto' && isset($explicitSizes[$this->size])) {
            $resolved['font-size'] = $explicitSizes[$this->size];
        }

        if ($this->color) {
            $resolved['color'] = $this->color;
        }

        $this->style = Zayne::styleString(array_merge($resolved, [
            'margin'        => $this->margin ?? '0',
            'text-align'    => $this->align,
            'overflow'      => $this->truncate ? 'hidden' : null,
            'text-overflow' => $this->truncate ? 'ellipsis' : null,
            'white-space'   => $this->truncate ? 'nowrap' : null,
        ]));
    }

    public function render(): View
    {
        return view('zayne::text');
    }
}
