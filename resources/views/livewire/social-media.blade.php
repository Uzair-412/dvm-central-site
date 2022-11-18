<form>
    <div class="text-lg text-gray-600 pb-2">Social Media Links</div>
    <hr>
    <div class="text-sm text-gray-600 pb-2 pt-2">Please enter your social media links</div>
    <div class="pb-2">
        @foreach ($all_socials as $social)
            <div class="pb-2">
                <x-input.social socialNetworkId="{{ $social->id }}" colorCode="{{ $social->color_code }}" iconCode="{{ $social->icon_code }}" prefix="{{ $social->prefix }}" />
            </div>
        @endforeach
    </div>
    <hr>
    <div class="pt-2">
        <x-save-loading-buttons />
    </div>
</form>