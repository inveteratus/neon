@props(['href', 'label' => 'Cancel'])
<a href="{{ $href }}" {{ $attributes->merge(['class' => 'neon-button-cancel']) }}>{{ strlen($slot) ? $slot : $label }}</a>
