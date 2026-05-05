<?php

namespace App\View\Components\Zayne;

use Illuminate\View\Component;
use TailwindMerge\Laravel\Facades\TailwindMerge;

abstract class ZayneComponent extends Component
{
    /**
     * Merge internal ZayneUI class strings only.
     * Consumer class= attributes are merged in the Blade template,
     * never here — so $attributes stays untouched for full forwarding.
     */
    protected function mergeClasses(string ...$classes): string
    {
        return TailwindMerge::merge(
            implode(' ', array_filter(array_map('trim', $classes)))
        );
    }
}
