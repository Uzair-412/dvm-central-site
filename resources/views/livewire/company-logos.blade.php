<form>
    <div class="text-lg text-gray-600 pb-2">Update Company Name and Logo</div>
    <hr>
    <div class="text-sm text-gray-600 pb-2 pt-2">Please enter your company name, upload logo and cover image</div>
    <div class="pb-2">

        <x-input.group label="Company Name" for="display_name" :error="$errors->first('exhibitor_data.display_name')" inline="true">
            <x-input.text wire:model.defer="exhibitor_data.display_name" id="display_name" />
        </x-input.group>

        <div class="pt-3"></div>

        <x-input.group label="Company Logo" for="logo_upload" help-text="JPG, PNG images, width: 500, height: 500, max 1,000kb (1mb)" :error="$errors->first('logo_upload')">
            <x-input.file-upload wire:model="logo_upload" id="logo_upload">
                <span class="h-12 w-12 overflow-hidden bg-gray-100">
                    @if ($logo_upload)
                        <img src="{{ $logo_upload->temporaryUrl() }}" alt="Logo Image">
                    @else
                        @php
                            $default_image = 'static/img/events_placeholder_logo.jpg';
                            if ($exhibitor_data->image_logo != '') {
                                $default_image = '/up_data/' . $exhibitor_data->image_logo;
                            }
                        @endphp
                        <img src="{{ $default_image }}" alt="Logo Image">
                    @endif
                </span>
            </x-input.file-upload>
        </x-input.group>

        <div class="pt-3"></div>

        <x-input.group label="Cover Image" for="cover_upload" help-text="JPG, PNG images, width: 1200, height: 600, max 2,000kb (2mb)" :error="$errors->first('cover_upload')">
            <x-input.file-upload wire:model="cover_upload" id="cover_upload">
                <span class="h-12 w-20  overflow-hidden bg-gray-100">
                    @if ($cover_upload)
                        <img src="{{ $cover_upload->temporaryUrl() }}" alt="Cover Image">
                    @else
                        @php
                            $default_image = 'static/img/events_placeholder_cover.jpg';
                            if ($exhibitor_data->image_cover != '') {
                                $default_image = '/up_data/' . $exhibitor_data->image_cover;
                            }
                        @endphp
                        <img src="{{ $default_image }}" alt="Cover Image">
                    @endif
                </span>
            </x-input.file-upload>
        </x-input.group>

    </div>
    <hr>
    <div class="pt-2">
        <x-save-loading-buttons />
    </div>
</form>
