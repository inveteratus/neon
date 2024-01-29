<x-layouts.app>

    <main class="neon-view-password-reset">

        <x-neon::form :action="route('password.reset.store')">
            <x-neon::input.email required autocomplete="email" :value="old('email', request()->email)" />
            <x-neon::input.password autofocus required autocomplete="new-password" />
            <input type="hidden" name="token" value="{{ request()->route('token') }}" />
            <div>
                <x-neon::button.submit label="Reset Password" />
            </div>
        </x-neon::form>
    </main>

</x-layouts.app>
