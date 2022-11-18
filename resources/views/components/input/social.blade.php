@props([
    'placeholder' => null,
    'colorCode' => null,
    'prefix' => null,
    'iconCode' => null,
    'value' => null,
    'socialNetworkId' => null
])

<div class="flex items-center mx-auto bg-white rounded-full bg-gray-100">
    <div>
        <span
            class="flex items-center justify-center w-8 h-8 text-gray-100 rounded-full" style="background-color: {{ $colorCode }}">
            <i class="{{ $iconCode }}"></i>
        </span>
    </div>
    <div class="w-full">
        
        <label class="input-field inline-flex items-baseline border-none pl-2 w-full">
            <span class="flex-none text-gray-400 select-none leading-none">{{ $prefix }}</span>
            <div class="w-full leading-none">
                <input wire:model.defer="input_social_network.{{ $socialNetworkId }}" id="sn_{{ $socialNetworkId }}" type="text"
                    class="w-full py-1 text-gray-600 bg-gray-100 rounded-r-full focus:outline-none"
                    placeholder="{{ $placeholder }}">
            </div>
        </label>

    </div>
</div>