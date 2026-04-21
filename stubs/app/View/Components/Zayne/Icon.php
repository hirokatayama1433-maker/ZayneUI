<?php

namespace App\View\Components\Zayne;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Icon extends Component
{
    public function __construct(
        public string $name,
    ) {}

    public function render(): View|string
    {
        $style = config('zayne.icon_style', 'outline');

        $view = "components.zayne.icon.{$style}.{$this->name}";

        // fallback if the view doesn't exist
        if (!view()->exists($view)) {
            $view = "components.zayne.icon.{$style}.placeholder"; // make a placeholder view
        }

        return view($view);
    }
}
