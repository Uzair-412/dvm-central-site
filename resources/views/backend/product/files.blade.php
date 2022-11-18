@extends('backend.layouts.app')
@section('title', $data['p_heading'])
@section('content')
@section('breadcrumb-links')
<ol class="breadcrumb border-0 m-0">
    <li class="breadcrumb-item">
        <a href="/admin">Home</a>
    </li>
    <li class="breadcrumb-item">
        <a href="/admin/product">Manage Products</a>
    </li>
    <li class="breadcrumb-item active">
        {{ $data['breadcrumbs'] }}
    </li>
</ol>
@endsection
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <strong>{{ $data['p_heading'] }}</strong>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pictures-tab" data-toggle="tab" href="#pictures" role="tab" aria-controls="pictures" aria-selected="true">Pictures</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="videos-tab" data-toggle="tab" href="#videos" role="tab" aria-controls="videos" aria-selected="false">Videos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="files-tab" data-toggle="tab" href="#files" role="tab" aria-controls="files" aria-selected="false">PDF / Files</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="pictures" role="tabpanel" aria-labelledby="home-tab">
                            @if(sizeof($data['images']) > 0)
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <tbody>
                                            <tr>
                                                <th width="50%">Image</th>
                                                <th width="25%">Default</th>
                                                <th width="25%">Delete</th>
                                            </tr>
                                            @foreach($data['images'] as $image)
                                                <tr id="tr_{{ $image->id }}">
                                                    <td><img src="{{ Storage::disk('ds3')->url('products/images/thumbnails/'.$image->name) }}" class="img-thumbnail" /></td>
                                                    <td>
                                                        <label class="switch switch-label switch-outline-success-alt">
                                                            <input type="radio" name="default" class="switch-input" @if($image->default == 'Y') checked @endif onclick="set_default_image(this, {{ $image->id }}, {{ $image->fileable_id }});" />
                                                            <span class="switch-slider" data-checked="&#x2713;" data-unchecked="&#x2715;"></span>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-danger btn-sm" onclick="delete_product_file('image', {{ $image->id }});"><i class="fa fa-trash "></i></button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <hr />
                            @endif
                            {!! Form::open(array('route' => ['admin.product.upload.files', $data['product']->id], 'method' => 'POST', 'files' => true)) !!}
                                @method('PATCH')
                                @csrf
                                <div class="form-group">
                                    <h3>Upload Images</h3>
                                    {!! Form::file('images', ['class'=>'form-control', 'placeholder'=>'Select pictures ...', 'name' => 'images[]', 'accept' => 'image/*', 'multiple' => 'multiple']) !!}
                                </div>
                                <small class="form-text text-muted">
                                    You can select and upload multiple files.
                                </small>
                                <br>
                                <button type="submit" class="btn btn-primary mb-2">Upload Images</button>
                                {!! Form::hidden('type', 'images') !!}
                            {!! Form::close() !!}
                        </div>
                        <div class="tab-pane fade" id="videos" role="tabpanel" aria-labelledby="profile-tab">
                            @if(sizeof($data['videos']) > 0)
                                {!! Form::open(array('route' => ['admin.product.update.files', $data['product']->id], 'method' => 'POST', 'files' => true)) !!}
                                    @method('PATCH')
                                    @csrf
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <tbody>
                                                <tr>
                                                    <th width="10%">Thumbnail</th>
                                                    <th width="10%">Image</th>
                                                    <th width="50%">Title</th>
                                                    <th width="20%">Video</th>
                                                    <th width="20%">Delete</th>
                                                </tr>
                                                @foreach($data['videos'] as $video)
                                                    <tr id="tr_{{ $video->id }}">
                                                        <td>
                                                            @php
                                                                if(trim($video->video_thumbnail) != null)
                                                                    $path = Storage::disk('ds3')->url('products/videos/thumbnails/'.$video->video_thumbnail);
                                                                else
                                                                    $path = '/up_data/na.jpg';
                                                            @endphp
                                                            <label for="video_thumbnail_{{ $video->id }}">
                                                                <img src="{{ $path }}"
                                                                    id="img_video_thumbnail_{{ $video->id }}" width="75"
                                                                    class="rounded-full align-middle border-none shadow-lg w-20 cursor-pointer" />
                                                                {!! Form::file('thumbnail', [
                                                                    'class' => 'mt-5 d-none v_thumb hidden',
                                                                    'id' => 'video_thumbnail_' . $video->id,
                                                                    'placeholder' => 'Select Thumbnail ...',
                                                                    'name' => 'thumbnail_' . $video->id,
                                                                    'accept' => 'image/*',
                                                                ]) !!}
                                                            </label> 
                                                        </td>
                                                        <td>
                                                            @php
                                                                if(trim($video->video_image) != null)
                                                                    $path = Storage::disk('ds3')->url('products/videos/images/'.$video->video_image);
                                                                else
                                                                    $path = '/up_data/na.jpg';
                                                            @endphp
                                                            <label for="video_image_{{ $video->id }}">
                                                                <img src="{{ $path }}"
                                                                    id="img_video_large_{{ $video->id }}" width="75"
                                                                    class="rounded-full align-middle border-none shadow-lg w-20 cursor-pointer" />
                                                                {!! Form::file('video_image', [
                                                                    'class' => 'mt-5 d-none v_thumb hidden',
                                                                    'id' => 'video_image_' . $video->id,
                                                                    'placeholder' => 'Select Image ...',
                                                                    'name' => 'video_image_' . $video->id,
                                                                    'accept' => 'image/*',
                                                                ]) !!}
                                                            </label> 
                                                        </td>
                                                        <td>
                                                            {!! Form::text('title', empty($video->title) ? $video->name : $video->title,['class'=>'form-control', 'name' => 'title[]']) !!}
                                                            {!! Form::hidden('id[]', $video->id) !!}
                                                        </td>
                                                        <td><a href="javascript:;" onclick="open_video_modal('{{ $video->name}}', '{{ $video->video_type }}');">Play Video</a></td>
                                                        <td>
                                                            <button type="button" class="btn btn-danger btn-sm" onclick="delete_product_file('video', {{ $video->id }});"><i class="fa fa-trash "></i></button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Upload Images and Update Titles</button>
                                    {!! Form::hidden('type', 'videos') !!}
                                {!! Form::close() !!}
                                <hr />
                            @endif
                            
                            {!! Form::open(array('route' => ['admin.product.upload.files', $data['product']->id], 'method' => 'POST', 'files' => true)) !!}
                                @method('PATCH')
                                @csrf
                                <div class="form-group mt-4">
                                    <label for="sel1">Video Type:</label> 
                                    <select name="video_type" id="video_type"
                                        class="form-control text-body" onchange="getSelectValue();" required>
                                        <option value="">Select Video Type</option>
                                        <option value="youtube">Youtube</option>
                                        <option value="vimeo">Vimeo</option>
                                        <option value="file">File</option>
                                    </select>
                                </div>
                                <div class="video_id d-none mt-2">
                                    <div class="form-group">
                                        <label for="sel1">Video Id:</label> 
                                        {!! Form::text('video_id', null, [
                                            'class' =>
                                                'form-control appearance-none bg-transparent border border-gray-300 h-full my-2 outline-none p-2 rounded text-gray-800 w-full',
                                            'name' => 'name',
                                            'id' => 'video_id',
                                        ]) !!}
                                    </div>
        
                                </div>
                                <div class="video_file d-none">
                                    <div class="form-group">
                                        <h3>Upload Videos</h3>
                                        {!! Form::file('videos', [
                                            'class' => 'form-control',
                                            'placeholder' => 'Select videos ...',
                                            'name' => 'videos[]',
                                            'accept' => 'video/*',
                                            'multiple' => 'multiple',
                                            'id' => 'video_file',
                                        ]) !!}
                                    </div>
                                    <small class="form-text text-muted">
                                        You can select and upload multiple files.
                                    </small> <br>
        
        
                                </div>
                                <br>
                                <button type="submit" class="upload-video-btn btn btn-primary mb-2">Upload Videos</button>
                                {!! Form::hidden('type', 'videos') !!}
                            {!! Form::close() !!}
                        </div>
                        <div class="tab-pane fade" id="files" role="tabpanel" aria-labelledby="contact-tab">
                            @if(sizeof($data['files']) > 0)
                                {!! Form::open(array('route' => ['admin.product.update.files', $data['product']->id], 'method' => 'POST')) !!}
                                    @method('PATCH')
                                    @csrf
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <tbody>
                                                <tr>
                                                    <th width="50%">File Title</th>
                                                    <th width="25%">Open File</th>
                                                    <th width="25%">Delete</th>
                                                </tr>
                                                @foreach($data['files'] as $file)
                                                    <tr id="tr_{{ $file->id }}">
                                                        <td>
                                                            {!! Form::text('title', empty($file->title) ? $file->name : $file->title,['class'=>'form-control', 'name' => 'title[]']) !!}
                                                            {!! Form::hidden('id', $file->id) !!}
                                                        </td>
                                                        <td><a href="{{ Storage::disk('ds3')->url('products/files/'.$file->name) }}" target="_blank">Open File</a></td>
                                                        <td>
                                                            <button type="button" class="btn btn-danger btn-sm" onclick="delete_product_file('file', {{ $file->id }});"><i class="fa fa-trash "></i></button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update Titles</button>
                                    {!! Form::hidden('id[]', $file->id) !!}
                                    {!! Form::hidden('type', 'files') !!}
                                {!! Form::close() !!}
                                <hr />
                            @endif
                            {!! Form::open(array('route' => ['admin.product.upload.files', $data['product']->id], 'method' => 'POST', 'files' => true)) !!}
                                @method('PATCH')
                                @csrf
                                <div class="form-group">
                                    <h3>Upload Files</h3>
                                    {!! Form::file('files', ['class'=>'form-control', 'placeholder'=>'Select files ...', 'name' => 'files[]', 'accept' => '.xlsx,.xls,.doc,.docx,.ppt,.pptx,.pdf', 'multiple' => 'multiple']) !!}
                                </div>
                                <small class="form-text text-muted">
                                    You can select and upload multiple files.
                                </small>
                                <br>
                                <button type="submit" class="btn btn-primary mb-2">Upload Files</button>
                                {!! Form::hidden('type', 'files') !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                    <br>
                    <a href="{{ route('admin.product.edit', $data['product']->id) }}" class="btn btn-danger mb-2">Basic Info</a>
                    <a href="{{ route('admin.product.edit.details', $data['product']->id) }}" class="btn btn-danger mb-2">Update Details</a>
                    @if($data['product']->type == 'variation')
                        <a href="{{ route('admin.product.edit.variations', $data['product']->id) }}" class="btn btn-danger mb-2">Manage Variations</a>
                    @endif
                    @if($data['product']->is_set == 'Y')
                        <a href="{{ route('admin.product.edit.set-items', $data['product']->id) }}" class="btn btn-danger mb-2">Set Items</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="product_video_modal" tabindex="-1" role="dialog" aria-labelledby="product_video_modalTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body text-center" id="video_modal">
                </div>
            </div>
        </div>
    </div>
    @if(null != session()->get('type'))
        <script>
            window.addEventListener('load', function () {
                document.getElementById('{{ session()->get('type') }}-tab').click();
            }, false);
        </script>
    @endif
    <script>
        function getSelectValue() {
            var selectedValue = document.getElementById("video_type").value;
            if (selectedValue == 'file') {
                document.querySelector('.video_file').classList.remove('d-none');
                document.querySelector('.video_id').classList.add('d-none');
                document.querySelector('.upload-video-btn').classList.remove('d-none');
                document.getElementById("video_id").required = false;
                document.getElementById("video_file").required = true;
            } else if (selectedValue == 'youtube') {
                document.querySelector('.video_id').classList.remove('d-none');
                document.querySelector('.video_file').classList.add('d-none');
                document.querySelector('.upload-video-btn').classList.remove('d-none');
                document.getElementById("video_id").required = true;
                document.getElementById("video_file").required = false;
            } else if (selectedValue == 'vimeo') {
                document.querySelector('.video_id').classList.remove('d-none');
                document.querySelector('.video_file').classList.add('d-none');
                document.querySelector('.upload-video-btn').classList.remove('d-none');
                document.getElementById("video_id").required = true;
                document.getElementById("video_file").required = false;
            } else if (selectedValue == '') {
                document.querySelector('.upload-video-btn').classList.add('d-none');
                document.querySelector('.video_id').classList.add('d-none');
                document.querySelector('.video_file').classList.add('d-none');
            }
        }
    </script>
@stop