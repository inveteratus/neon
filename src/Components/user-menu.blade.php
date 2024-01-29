<div class="user-menu" x-data="{open:false}">
    <button type="button" @click.prevent.stop="open=!open;$el.blur()">
        <img src="https://www.gravatar.com/avatar/{{ md5(strtolower(auth()->user()->email)) }}.png?r=pg&s=100">
    </button>
    <div x-cloak x-show="open" @click.away.prevent.stop="open=false">
        {{ $slot }}
    </div>
</div>
