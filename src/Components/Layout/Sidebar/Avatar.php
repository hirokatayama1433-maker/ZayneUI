<?php

namespace Zayne\UI\Components\Layout\Sidebar;

use Illuminate\View\Component;
use Illuminate\View\View;

class Avatar extends Component
{
    public string $baseStyle;

    public function __construct(
        public string  $name  = '',
        public string  $email = '',
        public string  $src   = '',
        public string  $alt   = '',
        public ?string $href  = null,
    ) {
        $this->baseStyle = '
            height: 38px;
            display: flex;
            align-items: center;
            width: 100%;
            border-radius: var(--zayne-radius-field);
            cursor: pointer;
            transition: color 150ms ease;
            border: none;
            box-sizing: border-box;
            font-family: inherit;
            background: transparent;
            color: var(--zayne-custom-sidebar-content);
            text-decoration: none;
            padding: 0;
        ';
    }

    public function render(): View
    {
        return view('zayne::layout.sidebar.avatar');
    }
}