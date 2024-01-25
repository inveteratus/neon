## Installation
```bash
composer require inveteratus/neon
php artisan neon:install
```

After upgrading, you can update your neon.css with
```bash
php artisan vendor:publish --tag=neon-assets --existing
```
Be advised this WILL overwrite any changes.

## Usage

```html
<x-neon::html title="...">
    <x-neon::form action="..." method="get|post|put|patch|delete">
        <x-neon::input.text name="text" :value="old('text')" />
        <x-neon::input.email :value="old('email')" />
        <x-neon::input.password />
        <x-neon::input.textarea name="textarea" :value="old('textarea')" />
        <x-neon::input.toggle name="checkbox" :checked="old('checkbox')" />
        <x-neon::button.submit label="Submit" />
        <x-neon::button.cancel label="Cancel" />
    </x-neon::form>
</x-neon::html>
```
