<?php

namespace Zayne\UI\Components\Table;

use Illuminate\View\Component;
use Illuminate\View\View;
use Zayne\UI\Zayne;

class Cell extends Component
{
    public string $style = '';

    public function __construct(
        public string $align = 'start',
        public bool $emphasis = false,
        public bool $pin = false,
        public string $padding = '0.75rem 1.25rem'
    ) {
        $this->buildStyle();
    }

    protected function buildStyle(): void
    {
        $alignMap = [
            'start' => 'left',
            'center' => 'center',
            'end' => 'right',
        ];

        $base = [
            'text-align' => $alignMap[$this->align] ?? 'left',
            'padding' => $this->padding,
            'font-size' => '0.85rem',
            'font-weight' => $this->emphasis ? '600' : '400',
            'border-bottom' => '1px solid var(--zayne-color-base-border)',
        ];

        if ($this->pin) {
            $base['position'] = 'sticky';
            $base['left'] = '0';
            $base['background'] = 'var(--zayne-color-base-100)';
        }

        $this->style = Zayne::styleString($base);
    }

    public function render(): View
    {
        return view('zayne::table.cell');
    }
}
