{{--
-- Important note:
--
-- This template is based on an example from Tailwind UI, and is used here with permission from Tailwind Labs
-- for educational purposes only. Please do not use this template in your own projects without purchasing a
-- Tailwind UI license, or they’ll have to tighten up the licensing and you’ll ruin the fun for everyone.
--
-- Purchase here: https://tailwindui.com/
--}}

@props([
    'placeholder' => null,
    'trailingAddOn' => null,
])

<div class="flex">
  <select {{ $attributes->merge(['class' => 'w-full py-1 px-4 text-gray-600 bg-gray-100 rounded-full focus:outline-none' . ($trailingAddOn ? ' rounded-r-none' : '')]) }}>
    @if ($placeholder)
        <option value="">{{ $placeholder }}</option>
    @endif

    {{ $slot }}
  </select>

  @if ($trailingAddOn)
    {{ $trailingAddOn }}
  @endif
</div>
