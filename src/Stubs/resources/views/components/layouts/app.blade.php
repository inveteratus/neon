<x-neon::html>

    <header class="neon-component-header">
        <nav>
            <a href="{{ route(auth()->user() ? 'home' : 'index') }}">{{ config('app.name') }}</a>
            <div>
                <x-neon::theme-switcher />
                @auth
                    <x-neon::user-menu>
                        <x-neon::user-menu.link href="#" icon="heroicon-o-cog-6-tooth" label="Settings..." />
                        <hr />
                        <x-neon::user-menu.logout />
                    </x-neon::user-menu>
                @else
                    <a href="{{ route('login') }}">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endif
            </div>
        </nav>
    </header>

    {{ $slot }}

    <x-neon::notify :text="session('status')" />

</x-neon::html>
