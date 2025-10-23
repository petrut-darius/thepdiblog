@props(['name', "label"])

@php
    $defaults = [
        'type' => 'text',
        'id' => $name,
        'name' => $name,
        'class' => 'w-96 p-3 rounded-lg border border-gray-300 mt-2',
        'value' => old($name),
        "required" => true,
        "autocomplete" => $name != "password" ? $name : null
    ];
@endphp
<div>
    {{ ucfirst($label) }}:<br><input {{ $attributes($defaults) }}><br>
</div>