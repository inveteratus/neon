@props(['href', 'icon', 'label'])

<a href="{{ $href }}">
    <x-dynamic-component :component="$icon" />
    <span>{{ $label }}</span>
</a>
