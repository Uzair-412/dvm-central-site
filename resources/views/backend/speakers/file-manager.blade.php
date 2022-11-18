@extends('backend.layouts.app')
@section('title', $data['p_heading'])
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <strong>{{ $data['p_heading'] }}</strong>
                </div>
                <div class="card-body">
                    @if(sizeof($data['speaker-files']) > 0)
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <tbody>
                                        <tr>
                                            <th width="10%">File Image</th>
                                            <th width="10%">File Title</th>
                                            <th width="40%">Description</th>
                                            <th width="15%">Open File</th>
                                            <th width="15%">Position</th>
                                            <th width="10%">Delete</th>
                                        </tr>
                                        @foreach($data['speaker-files'] as $file)
                                            <tr id="tr_{{ $file->id }}">
                                                <td>
                                                    <img src="/up_data/speakers/images/{{$file->image}}" width="100px" alt="">
                                                </td>
                                                <td>
                                                    {{$file->title}}
                                                </td>
                                                <td>
                                                    {{$file->description}}
                                                </td>
                                                <td>
                                                    <a href="{{ Storage::disk('ds3')->url('speakers/files/'.$file->file) }}" target="_blank">Open File</a>
                                                </td>
                                                <td>
                                                    {{$file->position}}
                                                </td>
                                                <td>
                                                    <a href="{{url('admin/speakers/'.$file->speaker_id.'/file-manager/'.$file->id.'/edit')}}" type="button" class="btn btn-primary btn-sm" ><i class="fas fa-pencil-alt"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm" onclick="delete_speaker_file('file', {{ $file->id }});"><i class="fa fa-trash "></i></button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        <hr />
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <strong>Upload Details Files</strong>
                </div>
                <div class="card-body">
                    {!! Form::open(array('route' => ['admin.speaker.file.upload', $data['speaker']->id], 'method' => 'POST', 'files' => true)) !!}
                        <div class="form-group">
                            <div class="mb-3">
                                {!! Form::label('title', 'Title', ['class' => 'form-label']) !!}
                                {!! Form::text('title', null, ['class' => 'form-control', 'placeholder'=>'Title' ]) !!}
                            </div>
                            <div class="mb-3">
                                {!! Form::label('description', 'Description', ['class' => 'form-label']) !!}
                                {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder'=>'Description ...' , 'rows'=>'3']) !!}
                            </div>
                            <div class="mb-3">
                                {!! Form::label('position', 'Position', ['class' => 'form-label']) !!}
                                {!! Form::number('position', null, ['class' => 'form-control', 'placeholder'=>'Number ...' ]) !!}
                            </div>
                            <div class="mb-3">
                                {!! Form::label('file', 'File', ['class' => 'form-label']) !!}
                                {!! Form::file('file', ['class'=>'form-control', 'name' => 'file', 'accept' => '.xlsx,.xls,.doc,.docx,.ppt,.pptx,.pdf']) !!}
                            </div>
                            <div class="row">
                                <div class="col pt-2">
                                    {!! Form::label('image', 'Speaker Image:') !!}
                                    {!! Form::file('image', ['class'=>'form-control', 'onchange' => 'loadFile(event)']) !!}
                                </div>
                                <div class="col">
                                    <img src="https://via.placeholder.com/100x100.png" id="imgshow" width="100" />
                                </div>
                            </div>
                            <input type="hidden" name="speaker_id" value="{{ $data['speaker']->id }}">
                        </div>
                        <button type="submit" class="btn btn-primary mb-2">Upload Files</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@push('after-scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
        $('document').ready(function () {
            $("#image").change(function () {
                if (this.files && this.files    ) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#imgshow').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(this.files[0]);
                }
            });
        });
    </script>
@endpush
@stop