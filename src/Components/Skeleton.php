<?php

namespace Zayne\UI\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Zayne\UI\Zayne;

class Skeleton extends Component
{
    public string $style = '';

    public function __construct(
        public string  $variant = 'line',     // line | circle | box | text
        public ?string $width   = null,
        public ?string $height  = null,
        public string  $radius  = 'var(--zayne-radius-selector)',
        public ?string $margin  = null,
        public int     $lines   = 1,          // for variant=text, number of lines to show
    ) {
        $this->buildStyle();
    }

    protected function buildStyle(): void
    {
        $defaults = [
            'line'   => ['width' => '100%',  'height' => '1rem',   'border-radius' => $this->radius],
            'circle' => ['width' => '2.5rem','height' => '2.5rem', 'border-radius' => '999px'],
            'box'    => ['width' => '100%',  'height' => '8rem',   'border-radius' => 'var(--zayne-radius-box)'],
            'text'   => ['width' => '100%',  'height' => '1rem',   'border-radius' => $this->radius],
        ];

        $base = $defaults[$this->variant] ?? $defaults['line'];

        if ($this->width)  $base['width']  = $this->width;
        if ($this->height) $base['height'] = $this->height;

        $this->style = Zayne::styleString(array_merge($base, [
            'margin'   => $this->margin,
            'display'  => 'block',
            'flex-shrink' => '0',
        ]));
    }

    public function render(): View
    {
        return view('zayne::skeleton');
    }
}
