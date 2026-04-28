<?php

namespace App\View\Components\Zayne\Traits;

trait HasSemanticColors
{
    /**
     * Resolves semantic color classes for components that only
     * need danger/success/warning/info — not full variant support.
     * Used by: Alert, Toast
     */
    protected function resolveSemanticClasses(): string
    {
        return $this->semanticMap()[$this->color]
            ?? $this->semanticMap()['info'];
    }

    protected function semanticMap(): array
    {
        return [
            'danger'  => 'bg-[color-mix(in_oklch,var(--zayne-color-danger)_15%,transparent)] text-[var(--zayne-color-danger)] border-[var(--zayne-color-danger)]',
            'success' => 'bg-[color-mix(in_oklch,var(--zayne-color-success)_15%,transparent)] text-[var(--zayne-color-success)] border-[var(--zayne-color-success)]',
            'warning' => 'bg-[color-mix(in_oklch,var(--zayne-color-warning)_15%,transparent)] text-[var(--zayne-color-warning)] border-[var(--zayne-color-warning)]',
            'info'    => 'bg-[color-mix(in_oklch,var(--zayne-color-info)_15%,transparent)] text-[var(--zayne-color-info)] border-[var(--zayne-color-info)]',
        ];
    }
}
