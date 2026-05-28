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
        public ?string $width   = null,
        public ?string $height  = null,
        public bool|string $closeOnOutside = true,
        public ?string $padding = null,
        public ?string $radius  = null,
        public ?string $shadow  = null,
    ) {
        $this->closeOnOutside = filter_var($this->closeOnOutside, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) ?? true;
        $this->buildStyle();
    }

    protected function buildStyle(): void
    {
        $widths = [
            'xs'   => 'clamp(15rem, 30vw, 30vw)',
            'sm'   => 'clamp(20rem, 50vw, 50vw)',
            'md'   => 'clamp(22rem, 70vw, 70vw)',
            'lg'   => 'clamp(24rem, 90vw, 90vw)',
            'auto' => 'fit-content',
        ];

        $heights = [
            'xs'   => 'min(60dvh, calc(100dvh - 2rem))',
            'sm'   => 'min(70dvh, calc(100dvh - 2rem))',
            'md'   => 'min(80dvh, calc(100dvh - 2rem))',
            'lg'   => 'min(88dvh, calc(100dvh - 2rem))',
            'auto' => 'calc(100dvh - 2rem)',
        ];

        $width = $widths[$this->size] ?? $widths['md'];
        $maxHeight = $heights[$this->size] ?? $heights['md'];
        $resolvedWidth = $this->width ?? $width;
        $resolvedHeight = $this->height;
        $resolvedMaxHeight = $this->height ?? $maxHeight;

        $this->style = Zayne::styleString([
            '--zayne-modal-width'      => $resolvedWidth,
            '--zayne-modal-max-height' => $resolvedMaxHeight,
            'width'                    => $resolvedWidth,
            'height'                   => $resolvedHeight,
            'max-height'               => $resolvedMaxHeight,
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
