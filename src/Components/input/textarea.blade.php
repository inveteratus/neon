@props(['name', 'label' => null, 'value' => ''])

<x-neon::input :name="$name" :label="$label" component="textarea">
    <textarea :id="$id('input')" name="{{ $name }}" {{ $attributes }}>{{ $value }}</textarea>
</x-neon::input>
