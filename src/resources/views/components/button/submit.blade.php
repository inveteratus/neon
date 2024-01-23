@props(['label' => 'Submit'])
<button {{ $attributes->merge(['type' => 'submit', 'class' => 'neon-button-submit']) }}>{{ strlen($slot) ? $slot : $label }}</button>
