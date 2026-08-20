<?php

namespace Zayne\UI\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Drawer extends Component
{
    public string $enterClass = '';
    public string $leaveClass = '';

    public function __construct(
        public string  $position = 'left',
        public ?string $width    = null,
        public ?string $height   = null,
        public ?string $padding  = null,
        public ?string $shadow   = null,
    ) {
        $this->enterClass = 'zayne-drawer-enter-' . $this->position;
        $this->leaveClass = 'zayne-drawer-leave-' . $this->position;
    }

    public function render(): View
    {
        return view('zayne::drawer');
    }
}