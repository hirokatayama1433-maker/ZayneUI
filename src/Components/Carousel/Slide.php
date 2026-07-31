<?php

namespace Zayne\UI\Components\Carousel;

use Illuminate\View\Component;
use Illuminate\View\View;

class Slide extends Component
{
    public function __construct() {}

    public function render(): View
    {
        return view('zayne::carousel.slide');
    }
}
