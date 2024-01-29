# Neon

An opinionated starter kit for Laravel providing a set of components utilising
Tailwind, Alpine and LiveWire, as well as a set of authentication routes and
views complete with profile pages.

## Installation

```bash
composer require inveteratus/neon

php artisan neon:install

php artisan vendor:publish --tag=neon-assets
```

Make sure you add

```php
\Inveteratus\Neon\Providers\NeonServiceProvider::class,
```

to the `providers` section of your `config/app.php`.

## Updating

After update the package, you can update the neon styles and routes with

```bash
php artisan vendor:publish --tag neon-assets --force
```

Not that this will overwrite:
* resource/css/neon/components.css
* resource/css/neon/views.css
* routes/neon.php

## Customisation

If you need to customize the authentication views, then you can publish
these with:

```bash
php artisam vendor:publish --tag neon-views
```

which will place all the views under the resources/views/vendor/neon folder.

## Components

```html
<x-neon::html title="...">
    <x-neon::form action="..." method="...">
        <x-neon::input.text name="text" :value="old('text')" />
        <x-neon::input.email :value="old('email')" />
        <x-neon::input.password />
        <x-neon::input.textarea name="textarea" :value="old('textarea')" />
        <x-neon::input.toggle name="checkbox" :checked="old('checkbox')" />
        <div>
            <x-neon::button.submit label="Submit" />
            <x-neon::button.cancel label="Cancel" />
        </div>
    </x-neon::form>
</x-neon::html>
```

## Views

* home
* index
* login
* logout
* password.recovery
* password.reset
* register
* verify.email
* verify.password
