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
