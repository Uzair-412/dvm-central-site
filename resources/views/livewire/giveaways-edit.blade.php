<form wire:submit.prevent="save">
    <div class="text-lg text-gray-600 pb-2">Manage Giveaways</div>
    <hr>
    <div class="text-sm text-gray-600 pb-2 pt-2">Upload your offers and giveaways.</div>
    <div class="pb-2">

        <div class="pt-3"></div>

        <x-input.group label="Name" for="name" :error="$errors->first('name')" inline="true">
            <x-input.text wire:model.defer="name" id="name" />
        </x-input.group>

        <div class="pt-3"></div>

        <x-input.group label="Description" for="description" :error="$errors->first('description')" inline="true">
            <x-input.textarea wire:model.defer="description" id="description" />
        </x-input.group>

        <div class="pt-3"></div>

        <x-input.group label="Link" for="link" :error="$errors->first('link')" inline="true">
            <x-input.text wire:model.defer="link" id="link" />
        </x-input.group>

        <div class="pt-3"></div>

        <div class="grid grid-cols-3 gap-4">
            <div>

                <x-input.group label="Image" for="gw_image" :error="$errors->first('gw_image')" inline="true">
                    <x-input.file-upload wire:model="gw_image" id="gw_image">
                        <span class="h-12 w-12 overflow-hidden bg-gray-100">
                            @php
                                $image_path = 'static/img/product_placeholder.png';
                        
                                if($gw_image && is_object($gw_image))
                                {
                                    $image_path = $gw_image->temporaryUrl();
                                }
                                elseif($gw_image_e && is_string($gw_image_e))
                                {
                                    $image_path = '/up_data/'.$gw_image_e;
                                }
                            @endphp
                            <img src="{{ $image_path }}" alt="Giveaway Image">
                        </span>
                    </x-input.file-upload>
                </x-input.group>

            </div>
            
        </div>
        <div>
            <span class="text-sm text-gray-500">Image must be 600x600 in width / height, maximum of 500kb in size.</span>
        </div>



    </div>
    <hr>
    <div class="pt-2">
        <x-save-loading-buttons />
    </div>
</form>
