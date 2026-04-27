<?php

namespace App\View\Components\Zayne\Action;

use App\View\Components\Zayne\ZayneComponent;

class ButtonGroup extends ZayneComponent
{
    public string $orientation; // horizontal | vertical

    public string $classes;

    public function __construct(
        string $orientation = 'horizontal',
    ) {
        $this->orientation = $orientation;

        $this->classes = $this->mergeClasses(
            'inline-flex',
            $orientation === 'vertical' ? 'flex-col' : 'flex-row',
            // Remove radius from inner buttons, keep on first/last only
            '[&>*]:rounded-none',
            $orientation === 'horizontal'
                ? '[&>*:first-child]:rounded-l-[var(--zayne-radius-field)] [&>*:last-child]:rounded-r-[var(--zayne-radius-field)]'
                : '[&>*:first-child]:rounded-t-[var(--zayne-radius-field)] [&>*:last-child]:rounded-b-[var(--zayne-radius-field)]',
            // Collapse borders between buttons
            $orientation === 'horizontal'
                ? '[&>*:not(:first-child)]:-ml-px'
                : '[&>*:not(:first-child)]:-mt-px',
        );
    }

    public function render()
    {
        return view('components.zayne.action.button-group');
    }
}