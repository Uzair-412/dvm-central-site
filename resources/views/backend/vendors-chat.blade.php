@extends('backend.layouts.app')

@section('title', __('Conversations'))

@section('content')
    <div class="flex flex-col mb-10 shadow-2xl filter brightness-100 contrast-100">
        <div class="overflow-hidden sm:-mx-6 lg:-mx-8">
            <div class="align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-gray-200 sm:rounded-lg p-5 bg-white">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">
                       Vendors Conversations
                    </h2>
                    @livewire('backend.chats')
                </div>
            </div>
        </div>
    </div>
@endsection