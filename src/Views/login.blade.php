<x-layouts.app>

    <main class="neon-view-login">
        <x-neon::form>
            <x-neon::input.email autofocus required autocomplete="email" :value="old('email')" />
            <x-neon::input.password required autocomplete="current-password" />
            <div>
                <x-neon::button.submit label="Login" />
                @if (Route::has('password.recover'))
                    <a href="{{ route('password.recover') }}">Forgot your password ?</a>
                @endif
            </div>
        </x-neon::form>
        @if (Route::has('register'))
            <p><a href="{{ route('register') }}">Don't have an account yet ?</a></p>
        @endif
    </main>

</x-layouts.app>
