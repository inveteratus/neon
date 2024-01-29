<button type="button" class="theme-switcher" x-data="{dark:document.documentElement.classList.contains('dark')}" @click.prevent.stop="$el.blur();if(dark){localStorage.theme='light';document.documentElement.classList.remove('dark')}else{localStorage.theme='dark';document.documentElement.classList.add('dark')}dark=!dark">
    <x-heroicon-o-sun x-cloak x-show="!dark" />
    <x-heroicon-o-moon x-cloak x-show="dark" />
</button>
