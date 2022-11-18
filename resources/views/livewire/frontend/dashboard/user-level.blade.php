<div>   
   <div class="uploading-section">
        <div class="user-title text-xl md:text-2xl font-semibold pb-4 border-b border-dashed border-gray-200">User Level</div>
        <div class="mt-5 w-full overflow-x-scroll sm:overflow-x-hidden flex">
            <div class="w-10/12">
                <div class="table-heading-container flex">
                <p>Your current level is</p>
                <span class="font-mono h-4 lite-blue-bg-color ml-1 mt-0.5 pb-5 rounded-full text-center text-sm text-white w-5">
                    {{auth()->user()->level}}
                    </span>
                    @php
                        $level_name = \App\Models\Level::where('id', '=',auth()->user()->level)->first();
                        $all_levels= \App\Models\Level::all();
                    @endphp
                    @if(!empty($level_name))
                       <span class="ml-2">{{ $level_name->description }}</span>
                    @endif
                </div>
                @if(auth()->user()->level > 2)
                    <p class="bg-blue-50 font-semibold mt-4 px-4 py-1 rounded text-blue-500 w-max">You have reached the maximum User Level.</p>
                @else
                    <p>You can upgrade your level by providing us your documents.</p>

                        
                    <form action="{{ route('frontend.user.docs') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form flex flex-col mt-6">
                            <label for="document">Document:</label>
                            <input type="file" name="file" id="file" onchange="fileValidation()">
                            <span class="bg-red-50 mt-4 px-3 py-1 rounded supported-format text-red-400 w-max">Supported formats: pdf, doc, docx, zip files. Maximum 8mb</span>
                            <button type="submit" class="document-send-btn blue-btn lite-blue-bg-color text-white z-10 py-2 px-4 text-xs sm:text-sm overflow-hidden relative w-max mt-4">Upload</button>
                        </div>
                    </form>
                @endif
            </div>

            <div class="table-heading-container w-7/12">
                <div class="bg-gray-100 border border-gray-200 border-solid font-semibold grid grid-cols-6 items-center md:text-base px-4 py-2 table-heading-wrapper text-sm">
                    <div class="table-heading">Level</div>
                    <div class="table-heading col-span-3 pl-8">Description</div>
                </div>
                <div class="db-detail-wrapper text-gray-600 text-xs md:text-sm">
                    <div class="bg-white border border-gray-200 border-solid db-detail db-links grid grid-cols-4 items-center mt-5 overflow-hidden px-4 py-2 relative z-10">
                       @foreach ($all_levels as $level)
                            <div class="table-heading pb-1 font-semibold">{{$level->id}}</div>
                            <div class="table-heading col-span-3 pb-1">{{$level->description}}</div>
                       @endforeach
                    </div>
                </div>
            </div>
        </div>  
   </div>
   @include('includes.partials.messages')
   @php
    $data['documents']      =  \App\Models\UserDocument::where('user_id', auth()->user()->id)->get();
   @endphp
   <div class="user-title text-base font-semibold pb-4 border-b border-slate-100 dark:border-slate-700 pt-8">Uploaded Documents</div>
   @if(isset($data['documents']) && $data['documents']->count() > 0)
        <div class="table-heading-container">
            <div class="bg-gray-100 border border-gray-200 border-solid font-semibold grid grid-cols-6 items-center md:text-base px-4 py-2 table-heading-wrapper text-sm">
                <div class="table-heading col-span-2">Name</div>
                <div class="table-heading pl-3">Status</div>
                <div class="table-heading col-span-2">Uploaded Date</div>
                <div class="pl-2 table-heading">Actions</div>
            </div>
            @foreach ($data['documents'] as $document)
                <div class="db-detail-wrapper text-gray-600 text-xs md:text-sm">
                    <div class="bg-white border border-gray-200 border-solid db-detail db-links grid grid-cols-4 items-center mt-5 overflow-hidden px-4 py-2 relative z-10">
                        <div id="document-name"><a href="/up_data/users/{{$document->name }}" class="duration-500 ease-out hover:text-blue-500 relative transition underline-links" target="_blank">{{$document->name }}</a></div>
                        <div id="status" class="text-center"><span class=" p-1 px-2 rounded-full text-white text-xs @if($document->status=='pending' ) bg-yellow-500 @elseif($document->status=='approved') bg-green-500 @elseif($document->status=='declined') bg-red-500 @endif">{{$document->status }}</div>
                            <div id="document-uploaded time">{{$document->created_at }}</div>
                        <div class="actions-wrapper flex justify-center items-start">
                            <form method="POST" id="document_form_{{ $document->id }}" action="{{ route('frontend.user.document.destroy', [$document->id]) }}">
                                @method('DELETE')
                                @csrf
                            </form>
                            <div class="cursor-pointer ml-2 delete-doc-btn rounded-full transition-all duration-500 ease-in-out hover:bg-black w-8 h-8 inline-flex items-center justify-center" id="{{ $document->id }}">
                                <svg xmlns=http://www.w3.org/2000/svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="#DF3734">
                                    <path stroke-linecap=round stroke-linejoin=round stroke-width=2 d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>												
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>

    {{-- popup section  --}}
    <div class="remove-document-pop-container fixed top-0 left-0 w-screen h-screen z-50 flex justify-center items-center hidden opacity-0 bg-black bg-opacity-70">
        <div class="remove-document-pop-wrapper flex flex-col justify-center items-center bg-white py-6 px-6 sm:px-20 opacity-0 transform scale-125 transition-all duration-300 ease-in-out">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16" fill="none" viewBox="0 0 24 24" stroke="#EF4444">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <div class="remove-document-popup-msg text-gray-500 mt-2 text-sm md:text-base">Are you sure, you want to delete this document ?</div>
            <div class="remove-document-pop-btns-wrapper flex justify-center items-center flex-col sm:flex-row mt-4">
                <button type="button" class="remove-document-cancel-btn btn blue-btn lite-blue-bg-color text-white z-10 py-2 px-4 md:px-6 overflow-hidden relative block w-max text-center"> Cancel </button>
                <button type="button" class="remove-document-btn btn red-bg red-btn text-white z-10 py-2 px-4 md:px-6 overflow-hidden relative block w-max sm:ml-4 mt-2 sm:mt-0">Remove</button>
            </div>
        </div>
    </div>
</div>
@push('after-scripts')
    <script>
        function fileValidation(){
            var fileInput = document.getElementById('file');
            var filePath = fileInput.value;
            var allowedExtensions = /(\.doc|\.docx|\.pdf|\.zip)$/i;
            if(!allowedExtensions.exec(filePath)){
                document.querySelector('.supported-format').innerHTML = 'You\'ve uploaded Unsupported Document. Supported Format: pdf, doc, docx and zip file';
                document.querySelector('.document-send-btn ').disabled = true;
            }else{
                document.querySelector('.document-send-btn ').disabled = false;
                document.querySelector('.supported-format').innerHTML = '';
            }
        }
    </script>
    <script defer src="/assets/js/user-level.js"></script>
@endpush