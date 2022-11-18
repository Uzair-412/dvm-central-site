<form>
    <div class="text-lg text-gray-600 pb-2">Interests</div>
    <hr>
    <div class="text-sm text-gray-600 pb-2 pt-2">Please select your categories, maximum 3 categories can selected.</div>
    @if (session()->has('error'))
        <div class="text-red-600">
            {{ session('error') }}
        </div>
    @endif
    <div class="pb-2">
        
        @foreach($event_categories as $ec)

            <div><label><input wire:model="selectedCategories" value="{{ $ec->id }}" type="checkbox" /> {{ $ec->name }}<label></div>
        
        @endforeach

    </div>
    <hr>
    <div class="pt-2">
        <x-save-loading-buttons />
    </div>
</form>