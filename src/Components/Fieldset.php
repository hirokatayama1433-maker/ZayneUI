<?php

namespace Zayne\UI\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Fieldset extends Component
{
    public function __construct(
        public string $label = '',
        public ?string $error = null,
        public ?string $hint = null,
    ) {}

    public function render(): View
    {
        return view('zayne::fieldset');
    }
}
