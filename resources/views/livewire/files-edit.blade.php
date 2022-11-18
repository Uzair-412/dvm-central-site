<form x-data="{ type: null }">
    <div class="text-lg text-gray-600 pb-2">Manage Documents / Links</div>
    <hr>
    <div class="text-sm text-gray-600 pb-2 pt-2">You can upload documents and links using the form below.</div>
    <div class="pb-2">

        <div class="pt-2">

            <label class="block text-sm font-medium leading-5 text-gray-700">Please select upload type</label>

        </div>
        
        <label class="text-sm font-medium leading-5 text-gray-700 pt-2"><input wire:model.defer="type" type="radio" value="link" id="type_link" @click="type = 'link'" x-on:click="document.getElementById('type_file').checked=false;" /> Link</label>
        <label class="text-sm font-medium leading-5 text-gray-700"><input wire:model.defer="type" type="radio" value="file" id="type_file" @click="type = 'file'" x-on:click="document.getElementById('type_link').checked=false;" /> Document</label>

        @if ($errors->first('type'))
            <div class="mt-1 text-red-500 text-sm">{{ $errors->first('type') }}</div>
        @endif

        <div x-show="type == 'link'">
            <div class="pt-3"></div>

            <x-input.group label="Link" for="link" :error="$errors->first('link')" inline="true">
                <x-input.text wire:model.defer="link" id="link" />
            </x-input.group>
        </div>  

        <div x-show="type == 'file'">
            <div class="pt-3"></div>

            <x-input.group label="Upload Document" for="document" inline="true" help-text="PDF, PPT, MS Word Documents, max 10,000kb (10mb)" :error="$errors->first('document')">
                <x-input.file-upload wire:model.defer="document" id="document">
                    <span class="h-12 overflow-hidden pt-4 text-gray-500 text-sm">
                        @if ($document)
                            <i class="far fa-check-circle"></i> {{ $document->getClientOriginalName() }}
                        @endif
                    </span>
                </x-input.file-upload>
            </x-input.group>
            @if (session()->has('error'))
                <div class="text-red-600 text-sm">
                    {{ session('error') }}
                </div>
            @endif
        </div>

        <div class="pt-3"></div>

        <x-input.group label="Title" for="title" :error="$errors->first('title')" inline="true">
            <x-input.text wire:model.defer="title" id="title" />
        </x-input.group>

        <div class="pt-3"></div>

        <x-input.group label="Description" for="description" :error="$errors->first('description')" inline="true">
            <x-input.textarea wire:model.defer="description" id="description" />
        </x-input.group>

    </div>
    <hr>
    <div class="pt-2">
        <x-save-loading-buttons />
    </div>
</form>
