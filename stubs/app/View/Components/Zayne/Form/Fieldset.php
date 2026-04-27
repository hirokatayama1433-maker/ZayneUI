<?php

namespace View\Components\Zayne\Form;

use App\View\Components\Zayne\ZayneComponent;

class Fieldset extends ZayneComponent
{
    public ?string $label;
    public ?string $hint;
    public ?string $error;
    public bool $required;

    public string $classes;

    public function __construct(
        ?string $label = null,
        ?string $hint = null,
        ?string $error = null,
        bool $required = false,
    ) {
        $this->label    = $label;
        $this->hint     = $hint;
        $this->error    = $error;
        $this->required = $required;

        $this->classes = $this->mergeClasses(
            'flex flex-col gap-1.5 w-full',
        );
    }

    public function render()
    {
        return view('zayne.form.fieldset');
    }
}