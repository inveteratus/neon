# Neon

An opinionated starter kit for Laravel providing a set of components utilising
Tailwind, Alpine and LiveWire, as well as a set of authentication routes and
views.

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

After updating the package, you can update the neon styles and routes with:

```bash
php artisan vendor:publish --tag neon-assets --force
```

Note that this will overwrite:

* resource/css/neon/components.css
* resource/css/neon/views.css
* routes/neon.php

## Customisation

If you need to customize the authentication views, then you can publish
these with:

```bash
php artisan vendor:publish --tag neon-views
```

which will place all the views under the resources/views/vendor/neon folder.

## Components

The package provides a decent set of components that you can use in your own
application. For examples, you are advised to look at the provided views as
they cover most of the components.

```html
<x-neon::html title="...">
    <x-neon::form>
        <x-neon::input.text name="text" :value="old('text')" />
        <x-neon::input.email :value="old('email')" />
        <x-neon::input.password />
        <x-neon::input.textarea name="textarea" :value="old('textarea')" />
        <x-neon::input.toggle name="checkbox" :checked="old('checkbox')" />
        <div>
            <x-neon::button.submit label="Submit" />
            <x-neon::button.cancel :href="route('name')" label="Cancel" />
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
