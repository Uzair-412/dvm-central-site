@extends('backend.layouts.app')
@section('title', $p_heading)
@section('content')
<style>
.tab {
    border-left: 2px solid #3c4b64;
}
.taber {
    border: 1px solid #ddd;
    padding: 10px;
    border-radius: 5px;
}
</style>
    <x-backend.card>
        <x-slot name="header">
             <strong> {{ $help->helpc_first_name }} {{ $help->helpc_last_name }} </strong> Help Chat
            <div class="card-header-actions">
                <a href="/admin/help" class="card-header-action">Back</a>
            </div>
        </x-slot>
        <x-slot name="body">
            <div class="my-1" ><strong>Email:</strong> {{ $help->helpc_email }}</div>
            <div class="my-1" ><strong>Phone #:</strong> {{ $help->helpc_phone_no }}</div>
            <div class="my-1" ><strong>Type:</strong> {{ $help->helpc_type }}</div>
            <div class="my-2">
                <label for=""><strong>Messages:</strong></label>
                <div class="taber">
                    @if($helpchat)
                        @foreach($helpchat as $key => $chat)
                            <div class="tab mb-3">
                                <ul class="nav" id="myTab" role="tablist">
                                    <li class="nav-item w-100" role="presentation">
                                    <span class="nav-link active w-100 @if(empty($chat->vendor_name)) bg-info @elseif(!empty($chat->vendor_name)) bg-dark @endif text-white text-left" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">@if(empty($chat->vendor_name)) {{ $chat->admin_name }} @elseif(!empty($chat->vendor_name)) {{ $chat->vendor_name }}@endif</span>
                                    </li>
                                </ul>
                                <div class="border tab-content p-2" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        @if($chat->helpchat_file)
                                            <div class="">
                                                <a href="{{ $chat->helpchat_file }}" target="_blank">Download file</a>
                                            </div>
                                        @endif
                                        {{ $chat->helpchat_message }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    <div class="tab mb-3">
                        <ul class="nav" id="myTab" role="tablist">
                            <li class="nav-item w-100" role="presentation">
                            <span class="nav-link active w-100 bg-dark text-white text-left" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">{{ $help->helpc_first_name }} {{ $help->helpc_last_name }}</span>
                            </li>
                        </ul>
                        <div class="border tab-content p-2" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                @if($help->helpc_file)
                                    <div class="">
                                        <a href="{{ $help->helpc_file }}" target="_blank">Download file</a>
                                    </div>
                                @endif
                                {{ $help->helpc_message }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </x-slot>
    </x-backend.card>
    <div class="card shadow pb-2">
        <div class="card-header">Help Form</div>
        {!! Form::open(array('route' => 'admin.help.store', 'method' => 'POST', 'files' => true)) !!}
            <div class="card-body">
                {!! Form::hidden('help_id', $help->helpc_id) !!}
                <div class="form-group">
                    {!! Form::label('file', 'Attach a file:') !!} <small>(optional)</small>
                    {!! Form::file('file', null,['class'=>'form-control', 'id'=>'file']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('message', 'Message:') !!}
                    {!! Form::textarea('message', null,['class'=>'form-control', 'required', 'placeholder'=>'Enter message ...']) !!}
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary float-right" type="submit">Send</button>
            </div>
        {!! Form::close() !!}
    </div>
@endsection