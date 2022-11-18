@extends('backend.layouts.app')
@section('title', $data['p_heading'])
@section('breadcrumb-links')
<ol class="breadcrumb border-0 m-0">
    <li class="breadcrumb-item">
        <a href="/admin">Home</a>
    </li>
</ol>
@endsection
@section('content')
    <x-backend.card>
        <x-slot name="header">
            {{ $data['p_heading'] }}
        </x-slot>
        @if ($logged_in_user->hasAllAccess())
            <x-slot name="headerActions">
                <x-utils.link
                    icon="c-icon cil-plus"
                    class="card-header-action"
                    :href="route('admin.product.create')"
                    :text="__('Create Product')"
                />
            </x-slot>
        @endif
        <x-slot name="body">
            <livewire:backend.product-table />
        </x-slot>
    </x-backend.card>
    <!-- Modal -->
    <div class="modal fade" id="variation_ref_modal" tabindex="-1" role="dialog" aria-labelledby="variation_ref_modalTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><span id="v_sub_name"></span> Exists in Following Variations</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center" id="variation_ref">
                </div>
            </div>
        </div>
    </div>
@stop