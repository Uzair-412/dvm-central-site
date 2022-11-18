<form x-data="{ type: null }">
    <div class="text-lg text-gray-600 pb-2">Manage Products</div>
    <hr>
    <div class="text-sm text-gray-600 pb-2 pt-2">You can upload products with 3 images.</div>
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

        <div class="grid grid-cols-2 gap-4">
            <div>
                <x-input.group label="Price ($)" for="price" :error="$errors->first('price')" inline="true">
                    <x-input.text wire:model.defer="price" id="price" />
                </x-input.group>
            </div>
            <div>
                <x-input.group label="Sale Price ($)" for="price_sale" :error="$errors->first('price_sale')" inline="true">
                    <x-input.text wire:model.defer="price_sale" id="price_sale" />
                </x-input.group>
            </div>
        </div>

        <div class="pt-3"></div>

        <x-input.group label="Link" for="link" :error="$errors->first('link')" inline="true">
            <x-input.text wire:model.defer="link" id="link" />
        </x-input.group>

        <div class="pt-3"></div>

        <div class="grid grid-cols-3 gap-4">
            <div>

                <x-input.group label="Product Image 1" for="image1" :error="$errors->first('image1')" inline="true">
                    <x-input.file-upload wire:model="image1" id="image1">
                        <span class="h-12 w-12 overflow-hidden bg-gray-100">
                            @php
                                $image1_path = $image2_path = $image3_path = 'static/img/product_placeholder.png';
                        
                                if($image1 && is_object($image1))
                                {
                                    $image1_path = $image1->temporaryUrl();
                                }
                                elseif($image1_e && is_string($image1_e))
                                {
                                    $image1_path = '/up_data/'.$image1_e;
                                }
                            @endphp
                            <img src="{{ $image1_path }}" alt="Product Image">
                        </span>
                    </x-input.file-upload>
                </x-input.group>

            </div>
            <div>

                <x-input.group label="Product Image 2" for="image2" :error="$errors->first('image2')" inline="true">
                    <x-input.file-upload wire:model="image2" id="image2">
                        <span class="h-12 w-12 overflow-hidden bg-gray-100">
                            @php
                                if($image2 && is_object($image2))
                                {
                                    $image2_path = $image2->temporaryUrl();
                                }
                                elseif($image2_e && is_string($image2_e))
                                {
                                    $image2_path = '/up_data/'.$image2_e;
                                }
                            @endphp
                            
                            <img src="{{ $image2_path }}" alt="Product Image">
                        </span>
                    </x-input.file-upload>
                </x-input.group>

            </div>
            <div>

                <x-input.group label="Product Image 3" for="image3" :error="$errors->first('image3')" inline="true">
                    <x-input.file-upload wire:model="image3" id="image3">
                        <span class="h-12 w-12 overflow-hidden bg-gray-100">
                            @php
                                if($image3 && is_object($image3))
                                {
                                    $image3_path = $image3->temporaryUrl();
                                }
                                elseif($image3_e && is_string($image3_e))
                                {
                                    $image3_path = '/up_data/'.$image3_e;
                                }
                            @endphp
                            
                            <img src="{{ $image3_path }}" alt="Product Image">
                        </span>
                    </x-input.file-upload>
                </x-input.group>

            </div>
        </div>
        <div>
            <span class="text-sm text-gray-500">Images must be 600x600 in width / height, maximum of 500kb in size.</span>
        </div>



    </div>
    <hr>
    <div class="pt-2">
        <x-save-loading-buttons />
    </div>
</form>
