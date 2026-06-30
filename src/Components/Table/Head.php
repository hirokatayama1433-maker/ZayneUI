<?php

namespace Zayne\UI\Components\Table;

use Illuminate\View\Component;
use Illuminate\View\View;
use Zayne\UI\Zayne;

class Head extends Component
{
    public string $style = '';

    public function __construct(
        public string $align = 'start',
        public ?string $sort = null,
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
            'font-size' => '0.8rem',
            'font-weight' => '600',
            'border-bottom' => '1px solid var(--zayne-color-base-border)',
            'white-space' => 'nowrap',
        ];

        if ($this->pin) {
            $base['position'] = 'sticky';
            $base['top'] = '0';
            $base['background'] = 'var(--zayne-color-base-100)';
            $base['z-index'] = '1';
        }

        $this->style = Zayne::styleString($base);
    }

    public function render(): View
    {
        return view('zayne::table.head');
    }
}
