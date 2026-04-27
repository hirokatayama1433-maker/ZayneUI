<?php

namespace View\Components\Zayne\Navigation;

use App\View\Components\Zayne\ZayneComponent;

class Steps extends ZayneComponent
{
    public string $orientation;
    public string $classes;
    public array  $steps;
    public int    $current;

    public function __construct(
        array  $steps       = [],
        int    $current     = 1,
        string $orientation = 'horizontal',
    ) {
        $this->orientation = $orientation;
        $this->current     = $current;

        // Compute status from :current integer (1-based)
        // No need to pass status manually anymore
        $this->steps = array_map(function ($step, $index) use ($current) {
            $stepNumber     = $index + 1;
            $step['status'] = match(true) {
                $stepNumber < $current  => 'complete',
                $stepNumber === $current => 'current',
                default                 => 'upcoming',
            };
            return $step;
        }, $steps, array_keys($steps));

        $this->classes = $this->mergeClasses(
            'flex',
            $orientation === 'vertical' ? 'flex-col gap-0' : 'flex-row items-start w-full',
        );
    }

    public function render()
    {
        return view('zayne.navigation.steps');
    }
}