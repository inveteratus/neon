
## Installation

```bash
composer require inveteratus/neon

php artisan vendor:publish --tag=neon-assets
```

If you don't intend making changes to the basic css, you can add:

```json
{
  "scripts": {
    "post-update-cmd": [
      "@php artisan vendor:publish --tag=neon-assets --ansi"
    ]
  }
}
```

to your composer.json.

### Dependencies

```bash
composer require livewire/livewire

npm install --save-dev @tailwindcss/forms autoprefixer postcss tailwindcss
npm install --save-dev @fontsource/nunito-sans
```

### resources/css/app.css

```css
/* tailwind */
@import "tailwindcss/base";
@import "tailwindcss/components";
@import "tailwindcss/utilities";

/* fonts */
@import "@fontsource/nunito-sans/400.css"; /* normal */
@import "@fontsource/nunito-sans/500.css"; /* medium */

/* modules/packages */
@import "./neon.css";

/* layout */
body {
  @apply antialiased flex flex-col flex-none font-sans min-h-screen bg-slate-200 dark:bg-slate-800;
}
```

### resources/js/app.js

```ecmascript 6
import "./bootstrap";
import { Livewire, Alpine } from "../../vendor/livewire/livewire/dist/livewire.esm.js";

Livewire.start();
```

### postcss.config.js

```ecmascript 6
export default {
  plugins: {
    "postcss-import": {},
    "tailwindcss/nesting": {},
    tailwindcss: {},
    autoprefixer: {}
  }
};
```

### tailwind.config.css

```ecmascript 6
const defaultTheme = require("tailwindcss/defaultTheme");
/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  darkMode: "class",
  theme: {
    extend: {
      fontFamily: {
        sans: ['"Nunito Sans"', ...defaultTheme.fontFamily.sans]
      }
    }
  },
  plugins: [
    require("@tailwindcss/forms")
  ]
};
```

### vite.config.js

```ecmascript 6
import { defineConfig } from "vite";
import laravel, {refreshPaths} from "laravel-vite-plugin";
export default defineConfig({
  plugins: [
    laravel({
      input: ["resources/css/app.css", "resources/js/app.js"],
      refresh: [
        ...refreshPaths,
          "app/Livewire/**"
      ]
    })
  ]
});
```
