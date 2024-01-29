<x-layouts.app>

    <main class="neon-view-register">
        <x-neon::form>
            <x-neon::input.text name="name" maxlength="255" autofocus required autocomplete="name" :value="old('name')" />
            <x-neon::input.email maxlength="255" required autocomplete="email" :value="old('email')" />
            <x-neon::input.password required autocomplete="current-password" />
            <div>
                <x-neon::button.submit label="Register" />
            </div>
        </x-neon::form>
        <p><a href="{{ route('login') }}">Already have an account ?</a></p>
    </main>

</x-layouts.app>
