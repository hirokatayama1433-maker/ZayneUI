<?php

namespace App\View\Components\Zayne\Display;

use App\View\Components\Zayne\ZayneComponent;

class Stat extends ZayneComponent
{
    public ?string $label;
    public ?string $value;
    public ?string $change;     // e.g. "+12%" or "-3%"
    public string $trend;       // up | down | neutral
    public string $classes;

    public string $trendClasses;

    public function __construct(
        ?string $label = null,
        ?string $value = null,
        ?string $change = null,
        string $trend = 'neutral',
    ) {
        $this->label  = $label;
        $this->value  = $value;
        $this->change = $change;
        $this->trend  = $trend;

        $this->classes = $this->mergeClasses(
            'flex flex-col gap-1',
        );

        $this->trendClasses = match ($trend) {
            'up'    => 'text-[var(--zayne-color-success)] text-xs font-medium',
            'down'  => 'text-[var(--zayne-color-danger)] text-xs font-medium',
            default => 'text-[var(--zayne-color-base-content-muted)] text-xs font-medium',
        };
    }

    public function render()
    {
        return view('components.zayne.display.stat');
    }
}