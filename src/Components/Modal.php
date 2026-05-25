<?php

namespace Zayne\UI\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Zayne\UI\Zayne;

class Modal extends Component
{
    public string $style = '';

    public function __construct(
        public string  $size    = 'md',
        public ?string $padding = null,
        public ?string $radius  = null,
        public ?string $shadow  = null,
    ) {
        $this->buildStyle();
    }

    protected function buildStyle(): void
    {
        $widths = [
            'sm'   => '400px',
            'md'   => '560px',
            'lg'   => '720px',
            'auto' => 'auto',
        ];

        $width = $widths[$this->size] ?? $widths['md'];

        $this->style = Zayne::styleString([
            'width'         => $width,
            'max-height'    => $this->size === 'auto' ? 'none' : '90dvh',
            'padding'       => $this->padding ?? '1.5rem',
            'border-radius' => $this->radius  ?? 'var(--zayne-radius-box)',
            'box-shadow'    => $this->shadow   ?? 'var(--zayne-shadow)',
        ]);
    }

    public function render(): View
    {
        return view('zayne::modal');
    }
}