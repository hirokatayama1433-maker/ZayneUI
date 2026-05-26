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
            'sm'   => 'clamp(20rem, 42vw, 26rem)',
            'md'   => 'clamp(22rem, 56vw, 35rem)',
            'lg'   => 'clamp(24rem, 72vw, 45rem)',
            'auto' => 'fit-content',
        ];

        $heights = [
            'sm'   => 'min(70dvh, calc(100dvh - 2rem))',
            'md'   => 'min(80dvh, calc(100dvh - 2rem))',
            'lg'   => 'min(88dvh, calc(100dvh - 2rem))',
            'auto' => 'calc(100dvh - 2rem)',
        ];

        $width = $widths[$this->size] ?? $widths['md'];
        $maxHeight = $heights[$this->size] ?? $heights['md'];

        $this->style = Zayne::styleString([
            '--zayne-modal-width'      => $width,
            '--zayne-modal-max-height' => $maxHeight,
            'width'                    => $width,
            'max-height'               => $maxHeight,
            'padding'                  => $this->padding ?? '1.5rem',
            'border-radius'            => $this->radius  ?? 'var(--zayne-radius-box)',
            'box-shadow'               => $this->shadow   ?? 'var(--zayne-shadow)',
        ]);
    }

    public function render(): View
    {
        return view('zayne::modal');
    }
}
