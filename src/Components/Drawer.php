<?php

namespace Zayne\UI\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Zayne\UI\Zayne;

class Drawer extends Component
{
    public string $style         = '';
    public string $enterClass    = '';
    public string $leaveClass    = '';

    public function __construct(
        public string  $position = 'left',
        public ?string $width    = null,
        public ?string $height   = null,
        public ?string $padding  = null,
        public ?string $shadow   = null,
    ) {
        $this->buildStyle();
    }

    protected function buildStyle(): void
    {
        $isHorizontal = in_array($this->position, ['left', 'right']);

        $positionStyles = match($this->position) {
            'left'   => ['top' => '0', 'left'   => '0', 'height' => '100%', 'width'  => $this->width  ?? '320px'],
            'right'  => ['top' => '0', 'right'  => '0', 'height' => '100%', 'width'  => $this->width  ?? '320px'],
            'top'    => ['top' => '0', 'left'   => '0', 'width'  => '100%', 'height' => $this->height ?? '320px'],
            'bottom' => ['bottom' => '0', 'left' => '0', 'width' => '100%', 'height' => $this->height ?? '320px'],
            default  => ['top' => '0', 'left'   => '0', 'height' => '100%', 'width'  => $this->width  ?? '320px'],
        };

        $this->style = Zayne::styleString(array_merge([
            'position'   => 'fixed',
            'z-index'    => 'var(--zayne-z-drawer)',
            'background' => 'var(--zayne-color-base-100)',
            'overflow-y' => 'auto',
            'box-sizing' => 'border-box',
            'padding'    => $this->padding ?? '1.5rem',
            'box-shadow' => $this->shadow  ?? 'var(--zayne-shadow)',
        ], $positionStyles));

        $this->enterClass = 'zayne-drawer-enter-' . $this->position;
        $this->leaveClass = 'zayne-drawer-leave-' . $this->position;
    }

    public function render(): View
    {
        return view('zayne::drawer');
    }
}
