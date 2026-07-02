<zayne:layout.header>
    <x-slot:left>
        <zayne:layout.header.brand
            name="{{ config('app.name') }}"
            href="/"
        />
    </x-slot:left>

    <zayne:layout.header.nav>
        <zayne:layout.header.nav.item href="/" :active="request()->is('/')">
            Home
        </zayne:layout.header.nav.item>
    </zayne:layout.header.nav>

    <x-slot:right>
        <zayne:layout.header.avatar
            name="{{ auth()->user()->name ?? 'Guest' }}"
            :src="auth()->user()->avatar_url ?? null"
        />
    </x-slot:right>
</zayne:layout.header>
