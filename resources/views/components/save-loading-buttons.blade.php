{{-- <button wire:click="save" wire:loading.class="hidden" type="button"
    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Save</button>
<div wire:loading class="text-gray-500">
    <button type="button" class="bg-blue-300 hover:bg-blue-300 text-white font-bold py-2 px-4 rounded" disabled>
        <i class="fas fa-spinner fa-pulse"></i> Saving...
    </button>
</div> --}}

<button wire:click="save" wire:loading.class="opacity-25" type="button"
    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Save</button>
<div wire:loading class="text-gray-500 h-12">
        <i class="fas fa-spinner fa-pulse"></i> Please wait ...
</div>