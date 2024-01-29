<x-layouts.app>

    <main class="neon-view-login">
        <x-neon::form :action="route('verification.send')">
            <p>Can you verify your email before continuing please? If you did not receive an email during the
               registration process, we can easily send another.</p>
            <div>
                <x-neon::button.submit label="Send Verification Email" />
            </div>
        </x-neon::form>
    </main>

</x-layouts.app>
