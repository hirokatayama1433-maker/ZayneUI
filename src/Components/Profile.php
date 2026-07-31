<?php

namespace Zayne\UI\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Zayne\UI\Zayne;

class Profile extends Component
{
    public string $style       = '';
    public string $avatarStyle = '';

    public function __construct(
        public string  $name        = '',
        public ?string $role        = null,
        public ?string $email       = null,
        public ?string $src         = null,
        public string  $alt         = '',
        public ?string $href        = null,
        public string  $layout      = 'horizontal', // horizontal | vertical | compact
        public string  $avatarSize  = 'md',         // sm | md | lg | xl
        public ?string $margin      = null,
        public ?string $background  = null,
        public ?string $padding     = null,
        public ?string $radius      = null,
    ) {
        $this->buildStyle();
    }

    protected function buildStyle(): void
    {
        $avatarSizes = [
            'sm' => '2rem',
            'md' => '2.5rem',
            'lg' => '3rem',
            'xl' => '4rem',
        ];

        $sz = $avatarSizes[$this->avatarSize] ?? $avatarSizes['md'];

        $this->avatarStyle = Zayne::styleString([
            'width'        => $sz,
            'height'       => $sz,
            'border-radius'=> '999px',
            'object-fit'   => 'cover',
            'flex-shrink'  => '0',
            'display'      => 'flex',
            'align-items'  => 'center',
            'justify-content' => 'center',
            'font-size'    => 'calc(' . $sz . ' * 0.38)',
            'font-weight'  => '600',
            'background'   => 'var(--zayne-color-accent)',
            'color'        => '#fff',
            'overflow'     => 'hidden',
        ]);

        $this->style = Zayne::styleString([
            'display'        => 'flex',
            'align-items'    => $this->layout === 'vertical' ? 'center' : 'center',
            'flex-direction' => $this->layout === 'vertical' ? 'column' : 'row',
            'gap'            => $this->layout === 'compact' ? '0.5rem' : '0.75rem',
            'margin'         => $this->margin,
            'background'     => $this->background,
            'padding'        => $this->padding,
            'border-radius'  => $this->radius,
            'text-decoration'=> 'none',
            'color'          => 'inherit',
        ]);
    }

    public function render(): View
    {
        return view('zayne::profile');
    }
}
