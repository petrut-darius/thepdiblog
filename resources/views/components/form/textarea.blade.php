@props(["label", "name", "value" => ""])
<div class="w-full my-4">
    <label for="{{ $name }}" class="mb-1">
        {{ ucfirst($label) }}:
    </label>
    <textarea name="{{ $name }}" id="{{ $name }}" rows="8" class="w-full p-4 rounded-lg border border-coffee-cream bg-white text-coffee-espresso focus:outline-none focus:ring-2 focus:ring-coffee-caramel">{{ old($name, $value) }}</textarea>
</div>
