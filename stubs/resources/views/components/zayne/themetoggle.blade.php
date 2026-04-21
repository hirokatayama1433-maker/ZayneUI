<div class="flex items-center gap-[9px] h-[34px] px-[10px] my-[2px] bg-neutral-400/10 rounded-md flex items-center justify-center">

                        {{-- Light --}}
                        <button
                            type="button"
                            title="Light"
                            onclick="Theme.set('light')"
                            class="theme-btn shrink-0 size-[22px] rounded-full flex items-center justify-center
                                text-[var(--zayne-custom-sidebar-item-content)] opacity-50
                                hover:opacity-100 transition-opacity duration-150"
                        >
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="size-[14px]">
                                <circle cx="12" cy="12" r="4"/>
                                <path d="M12 2v2M12 20v2M4.93 4.93l1.41 1.41M17.66 17.66l1.41 1.41M2 12h2M20 12h2M4.93 19.07l1.41-1.41M17.66 6.34l1.41-1.41"/>
                            </svg>
                        </button>

                        {{-- Dark --}}
                        <button
                            type="button"
                            title="Dark"
                            onclick="Theme.set('dark')"
                            class="theme-btn shrink-0 size-[22px] rounded-full flex items-center justify-center
                                text-[var(--zayne-custom-sidebar-item-content)] opacity-50
                                hover:opacity-100 transition-opacity duration-150"
                        >
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="size-[14px]">
                                <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/>
                            </svg>
                        </button>

                        {{-- Abyss --}}
                        <button
                            type="button"
                            title="Abyss"
                            onclick="Theme.set('abyss')"
                            class="theme-btn shrink-0 size-[22px] rounded-full flex items-center justify-center
                                text-[var(--zayne-custom-sidebar-item-content)] opacity-50
                                hover:opacity-100 transition-opacity duration-150"
                        >
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="size-[14px]">
                                <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>
                            </svg>
                        </button>
                    </div>