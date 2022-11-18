<form>
    <div class="text-lg text-gray-600 pb-2">Company Information</div>
    <hr>
    <div class="text-sm text-gray-600 pb-2 pt-2">Please enter details about your company</div>
    <div class="pb-2">
        <x-input.rich-text wire:model.defer="company_intro" id="company_intro" />
    </div>
    <hr>
    <div class="pt-2">
        <x-save-loading-buttons />
    </div>
</form>