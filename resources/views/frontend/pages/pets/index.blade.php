@extends('frontend.layouts.app')
@section('title', 'Pets of The Month')

@section('meta_description', 'DVM Central - Market Place for Vetenerians and Distributors.')
@push('after-styles')
    <link rel="stylesheet" href="/assets/styles/pets-of-the-month.css" />
@endpush
@section('content')
    <livewire:pets-of-the-month :data="$data">
  

@endsection






{{-- <div class="ps-container">
    <div class="ps-page--shop" id="shop-sidebar">
        <div class="ps-layout--shop" data-select2-id="9">
            @include('frontend.includes.partials.left-bar-for-shop')
            <div class="ps-layout__right" data-select2-id="8">
                <div class="ps-page__header">
                    <div class="d-flex flex-wrap justify-content-between w-100">
                        <h1>Pet of the Month</h1>
                        <a href="{{ route('frontend.pet.apply') }}" class="ps-btn ps-btn--black">Share Your Pet Details</a>
                    </div>
                    <p></p>
                </div>
                <div class="ps-shopping">
                    <div class="ps-shopping-product">
                        <div class="row">
                            @foreach ($data['pets'] as $pet)
                            <div class="col-md-4 mb-5">
                                <div class="card bg-dark">
                                    <a href="{{ route('frontend.pet_of_the_month.detail', $pet->id) }}">
                                        <img style="object-fit: cover;" class="card-img-top" src="{{ asset('up_data/pets-of-the-month/images/'.$pet->images[0]['pet_image']) }}" alt="{{ $pet['pet_name'] }}">
                                    </a>
                                   <div>
                                        <table class="table mb-0 text-white text-center">
                                            <tr>
                                                <td>{{ $pet['pet_name'] }}</td><td>{{ $pet['pet_age'] .' Years Old' }}</td><td>{{ $pet['city'] }}</td>
                                            </tr>
                                            <tr><td colspan="3">Pet of The Month for {{ date('M, d',$pet['pet_created_time']) }}</td></tr>
                                        </table>
                                    </div>
                                </div>
                             </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
