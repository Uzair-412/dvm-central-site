<div class="listing-carasoul mt-5 pt-5 border-t">
    <div class="heading-wrapper flex justify-between items-center">
        <p class="text-xl font-bold">Documents & Links</p>
        @if($edit_mode)<p @click="sb_open('edit_files')" class="cursor-pointer text-sm primary-color">Add</p>@endif
    </div>

    @if(count($files) > 0)
        @foreach($files as $file)
        <div class="shadow download-documents flex items-center mt-2 p-2">
            
            @if($file->type == 'link')
                <i class="fa-link fas ml-2 mr-3 text-2xl"></i>
            @else
                <i class="fa-2x fa-file-alt fas ml-2 mr-4"></i>
            @endif

                <div x-data="{showFileEdit{{ $file->id }}: false}" @mouseover="showFileEdit{{ $file->id }} = true" @mouseover.away="showFileEdit{{ $file->id }} = false" class="dd-content-wrapper flex flex-col w-full">
                    <div
                        class="text-base text-gray-800 font-semibold pb-2 primary-color">
                        <a href="{{ $file->type == 'link' ? $file->file_name : '/up_data/'.$file->file_name }}" target="_blank">{{ $file->title }}</a>
                        @if($edit_mode)
                            <span x-on:click="$wire.destroy({{ $file->id }})" x-show="showFileEdit{{ $file->id }}" class="cursor-pointer text-sm primary-color font-light float-right"><i class="fas fa-trash-alt"></i></span>
                            {{-- <span x-show="showFileEdit{{ $file->id }}" wire:click="$emit('editFile', {{ $file->id }})" class="cursor-pointer text-sm primary-color font-light float-right mr-3">Edit</span> --}}
                            {{-- <span x-show="showFileEdit{{ $file->id }}" class="cursor-pointer text-sm primary-color font-light float-right cursor-move mr-3"><i class="fas fa-arrows-alt-v"></i></span> --}}
                        @endif
                    </div>
                    
                    <div class="dd-detail-wrapper flex">
                        <p class="text-sm mr-2 grey-700">
                            {{ $file->description }}
                        </p>
                    </div>
                </div>

        </div>
        @endforeach

    @else
        <div class="text-gray-400 pt-4">Sorry, no documents / links found.</div>
    @endif
</div>