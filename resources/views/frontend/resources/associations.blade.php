@extends('frontend.layouts.app')
@section('title', 'Veterinary Associations (Conferences and Meetings) DVM Central')
@section('meta_description', "Explore several affiliated associations and government organizations dedicated to bringing advancements in veterinary medicine. Join us for a unique educational experience.")
@section('meta_keywords', 'Veterinary Association, Veterinary Conferences, Events, Meetings, Exhibition, Vet Tech')
@push('after-styles')
<link rel="stylesheet" href="assets/styles/associations.css" />
<style>
    #programs p {
        margin-bottom: 2px;
    }

    #programs .heading {
        color: #000000;
    }

    .main-heading,
    .filter-heading {
        font-weight: 500;
        color: #000000;
        text-transform: capitalize;
    }

    .main-heading {
        font-size: 24px;
    }

    .filter-heading {
        font-size: 18px;
    }

    .sub-heading {
        font-weight: 500;
        color: #686868;
        font-size: 14px;
        text-transform: capitalize;
    }

    .education-body {
        background: #f7f7f7;
        padding: 50px 20px;
    }

    .education-body .filter-wrapper {
        background: #fff;
        padding: 10px;
        height: 100%;
        box-shadow: 0 0.25rem 1rem #00000026;
    }

    .filter-wrapper .filter-section {
        border: 1px solid #eee;
        padding: 8px;
        border-radius: 10px;
    }

    #programs .card {
        background: #ffffff;
        box-shadow: 0 0.25rem 1rem #00000026;
    }
</style>
@endpush

@section('content')
@livewire('frontend.resource.associations', ['data' => $data])
@endsection
@push('after-scripts')
<script defer src="assets/js/associates.js"></script>
@endpush