<?php

namespace Zayne\UI\Components\Layout;

use Illuminate\View\Component;
use Illuminate\View\View;

class Main extends Component
{
    public function __construct(
        public string $background = 'var(--zayne-color-base-100)',
        public string $padding = 'unset',
        public string $margin = 'unset'
    ) {
    }

    public function render(): View
    {
        return view('zayne::layout.main');
    }
}
