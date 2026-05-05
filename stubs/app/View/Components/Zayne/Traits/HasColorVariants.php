<?php

namespace App\View\Components\Zayne\Traits;

trait HasColorVariants
{
    /**
     * Resolves the correct variant + color class combination.
     * Falls back to solid primary if the combination doesn't exist.
     */
    protected function resolveVariant(): string
    {
        return $this->variantMap()[$this->variant][$this->color]
            ?? $this->variantMap()[$this->variant]['base']
            ?? $this->variantMap()['solid']['primary'];
    }

    /**
     * Full variant × color map.
     * Used by components that support all visual styles: Button, Badge.
     */
    protected function variantMap(): array
    {
        return [

            // SOLID — full background
            'solid' => [
                'primary'   => 'bg-[var(--zayne-color-primary)] text-[var(--zayne-color-primary-content)]',
                'secondary' => 'bg-[var(--zayne-color-secondary)] text-[var(--zayne-color-secondary-content)]',
                'accent'    => 'bg-[var(--zayne-color-accent)] text-[var(--zayne-color-accent-content)]',
                'base'      => 'bg-[var(--zayne-color-base-200)] text-[var(--zayne-color-base-content)]',
                'danger'    => 'bg-[var(--zayne-color-danger)] text-[var(--zayne-color-danger-content)]',
                'success'   => 'bg-[var(--zayne-color-success)] text-[var(--zayne-color-success-content)]',
                'warning'   => 'bg-[var(--zayne-color-warning)] text-[var(--zayne-color-warning-content)]',
                'info'      => 'bg-[var(--zayne-color-info)] text-[var(--zayne-color-info-content)]',
            ],

            // SOFT — light tinted background, colored text
            'soft' => [
                'primary'   => 'bg-[color-mix(in_oklch,var(--zayne-color-primary)_20%,transparent)] text-[var(--zayne-color-primary)]',
                'secondary' => 'bg-[color-mix(in_oklch,var(--zayne-color-secondary)_20%,transparent)] text-[var(--zayne-color-secondary)]',
                'accent'    => 'bg-[color-mix(in_oklch,var(--zayne-color-accent)_20%,transparent)] text-[var(--zayne-color-accent)]',
                'base'      => 'bg-[var(--zayne-color-base-200)] text-[var(--zayne-color-base-content)]',
                'danger'    => 'bg-[color-mix(in_oklch,var(--zayne-color-danger)_20%,transparent)] text-[var(--zayne-color-danger)]',
                'success'   => 'bg-[color-mix(in_oklch,var(--zayne-color-success)_20%,transparent)] text-[var(--zayne-color-success)]',
                'warning'   => 'bg-[color-mix(in_oklch,var(--zayne-color-warning)_20%,transparent)] text-[var(--zayne-color-warning)]',
                'info'      => 'bg-[color-mix(in_oklch,var(--zayne-color-info)_20%,transparent)] text-[var(--zayne-color-info)]',
            ],

            // OUTLINE — transparent background, colored border + text
            'outline' => [
                'primary'   => 'border border-[var(--zayne-color-primary)] text-[var(--zayne-color-primary)]',
                'secondary' => 'border border-[var(--zayne-color-secondary)] text-[var(--zayne-color-secondary)]',
                'accent'    => 'border border-[var(--zayne-color-accent)] text-[var(--zayne-color-accent)]',
                'base'      => 'border border-[var(--zayne-color-base-border)] text-[var(--zayne-color-base-content)]',
                'danger'    => 'border border-[var(--zayne-color-danger)] text-[var(--zayne-color-danger)]',
                'success'   => 'border border-[var(--zayne-color-success)] text-[var(--zayne-color-success)]',
                'warning'   => 'border border-[var(--zayne-color-warning)] text-[var(--zayne-color-warning)]',
                'info'      => 'border border-[var(--zayne-color-info)] text-[var(--zayne-color-info)]',
            ],

            // DASHED — transparent background, dashed colored border + text
            'dashed' => [
                'primary'   => 'border border-dashed border-[var(--zayne-color-primary)] text-[var(--zayne-color-primary)]',
                'secondary' => 'border border-dashed border-[var(--zayne-color-secondary)] text-[var(--zayne-color-secondary)]',
                'accent'    => 'border border-dashed border-[var(--zayne-color-accent)] text-[var(--zayne-color-accent)]',
                'base'      => 'border border-dashed border-[var(--zayne-color-base-border)] text-[var(--zayne-color-base-content)]',
                'danger'    => 'border border-dashed border-[var(--zayne-color-danger)] text-[var(--zayne-color-danger)]',
                'success'   => 'border border-dashed border-[var(--zayne-color-success)] text-[var(--zayne-color-success)]',
                'warning'   => 'border border-dashed border-[var(--zayne-color-warning)] text-[var(--zayne-color-warning)]',
                'info'      => 'border border-dashed border-[var(--zayne-color-info)] text-[var(--zayne-color-info)]',
            ],

            // GHOST — transparent, subtle hover background
            'ghost' => [
                'primary'   => 'bg-transparent text-[var(--zayne-color-primary)] hover:bg-[color-mix(in_oklch,var(--zayne-color-primary)_10%,transparent)]',
                'secondary' => 'bg-transparent text-[var(--zayne-color-secondary)] hover:bg-[color-mix(in_oklch,var(--zayne-color-secondary)_10%,transparent)]',
                'accent'    => 'bg-transparent text-[var(--zayne-color-accent)] hover:bg-[color-mix(in_oklch,var(--zayne-color-accent)_10%,transparent)]',
                'base'      => 'bg-transparent text-[var(--zayne-color-base-content)] hover:bg-[var(--zayne-color-base-hover)]',
                'danger'    => 'bg-transparent text-[var(--zayne-color-danger)] hover:bg-[color-mix(in_oklch,var(--zayne-color-danger)_10%,transparent)]',
                'success'   => 'bg-transparent text-[var(--zayne-color-success)] hover:bg-[color-mix(in_oklch,var(--zayne-color-success)_10%,transparent)]',
                'warning'   => 'bg-transparent text-[var(--zayne-color-warning)] hover:bg-[color-mix(in_oklch,var(--zayne-color-warning)_10%,transparent)]',
                'info'      => 'bg-transparent text-[var(--zayne-color-info)] hover:bg-[color-mix(in_oklch,var(--zayne-color-info)_10%,transparent)]',
            ],

            // LINK — text only, underline style
            'link' => [
                'primary'   => 'bg-transparent text-[var(--zayne-color-primary)] underline hover:no-underline',
                'secondary' => 'bg-transparent text-[var(--zayne-color-secondary)] underline hover:no-underline',
                'accent'    => 'bg-transparent text-[var(--zayne-color-accent)] underline hover:no-underline',
                'base'      => 'bg-transparent text-[var(--zayne-color-base-content)] underline hover:no-underline',
                'danger'    => 'bg-transparent text-[var(--zayne-color-danger)] underline hover:no-underline',
                'success'   => 'bg-transparent text-[var(--zayne-color-success)] underline hover:no-underline',
                'warning'   => 'bg-transparent text-[var(--zayne-color-warning)] underline hover:no-underline',
                'info'      => 'bg-transparent text-[var(--zayne-color-info)] underline hover:no-underline',
            ],

        ];
    }
}
