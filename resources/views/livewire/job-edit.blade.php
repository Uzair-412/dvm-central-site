<form>
    <div class="text-lg text-gray-600 pb-2">Manage Jobs</div>
    <hr>
    <div class="text-sm text-gray-600 pb-2 pt-2">You can upload job by filling the following form.</div>
    <div class="pb-2">

        <div class="pt-3"></div>
     
        <x-input.group label="Category" for="category_id" :error="$errors->first('category_id')" inline="true">
            <x-input.select placeholder="-" wire:model.defer="category_id" id="category_id">
                @foreach (\App\Models\EvJob::$categories as $id => $name)
                    <option value="{{ $id }}">{{ $name }}</option>
                @endforeach
            </x-input.select>
        </x-input.group>


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

                <x-input.group label="Image" for="image" :error="$errors->first('image')" inline="true">
                    <x-input.file-upload wire:model="image" id="image">
                        <span class="h-12 w-12 overflow-hidden bg-gray-100">
                            @php
                                $image_path = 'static/img/product_placeholder.png';
                        
                                if($image && is_object($image))
                                {
                                    $image_path = $image->temporaryUrl();
                                }
                                elseif($image_e && is_string($image_e))
                                {
                                    $image_path = '/up_data/'.$image_e;
                                }
                            @endphp
                            <img src="{{ $image_path }}" alt="Job Image">
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
