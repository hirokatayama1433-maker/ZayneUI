<?php

namespace Zayne\UI\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Zayne\UI\Zayne;

class Range extends Component
{
    public string $style = '';

    public function __construct(
        public string $color = 'primary',
        public string|int|float $min = 0,
        public string|int|float $max = 100,
        public string|int|float $step = 1,
        public string|int|float $value = 50,
        public bool $disabled = false,
        public ?string $margin = null,
    ) {
        $this->buildStyle();
    }

    protected function buildStyle(): void
    {
        $colors = [
            'primary' => 'var(--zayne-color-primary)',
            'success' => 'var(--zayne-color-success)',
            'danger' => 'var(--zayne-color-danger)',
            'warning' => 'var(--zayne-color-warning)',
            'base' => 'var(--zayne-color-base-content)',
        ];

        $accent = $colors[$this->color] ?? $colors['primary'];

        $this->style = Zayne::styleString([
            'width' => '100%',
            'accent-color' => $accent,
            'margin' => $this->margin,
            'opacity' => $this->disabled ? '0.5' : null,
            'cursor' => $this->disabled ? 'not-allowed' : null,
        ]);
    }

    public function render(): View
    {
        return view('zayne::range');
    }
}
