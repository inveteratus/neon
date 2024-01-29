<x-layouts.app>

    <main class="neon-view-password-recover">

        <x-neon::form>
            <p>Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</p>
            <x-neon::input.email autofocus required autocomplete="email" :value="old('email')" />
            <div>
                <x-neon::button.submit label="Send Email" />
                <x-neon::button.cancel label="Cancel" :href="route('login')" />
            </div>
        </x-neon::form>
    </main>

</x-layouts.app>
