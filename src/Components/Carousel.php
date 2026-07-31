<?php

namespace Zayne\UI\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Zayne\UI\Zayne;

class Carousel extends Component
{
    public string $style = '';

    public function __construct(
        public bool    $autoplay   = false,
        public int     $interval   = 4000,    // ms between slides
        public bool    $loop       = true,
        public bool    $arrows     = true,
        public bool    $dots       = true,
        public string  $transition = 'slide', // slide | fade
        public ?string $height     = null,
        public ?string $radius     = null,
        public ?string $margin     = null,
    ) {
        $this->buildStyle();
    }

    protected function buildStyle(): void
    {
        $this->style = Zayne::styleString([
            'position'      => 'relative',
            'overflow'      => 'hidden',
            'width'         => '100%',
            'height'        => $this->height,
            'border-radius' => $this->radius ?? 'var(--zayne-radius-box)',
            'margin'        => $this->margin,
        ]);
    }

    public function render(): View
    {
        return view('zayne::carousel');
    }
}
