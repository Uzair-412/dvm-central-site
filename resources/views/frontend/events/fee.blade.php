@extends('frontend.layouts.virtual')
@section('content')
    @push('after-styles')
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />
        <!-- <link rel="stylesheet" href="./assets/styles/styles.css" /> -->
        <style>
            .form-select {
                background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%239ca3af' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
                background-repeat: no-repeat;
                background-position: right 0.5rem center;
                background-size: 1.5em 1.5em;
                -webkit-tap-highlight-color: transparent;
            }

            .submit-button:disabled {
                cursor: not-allowed;
                background-color: #D1D5DB;
                color: #111827;
            }

            .submit-button:disabled:hover {
                background-color: #9CA3AF !important;
            }

            .credit-card {
                max-width: 420px;
            }

            @media only screen and (max-width: 420px) {
                .credit-card .front {
                    font-size: 100%;
                    padding: 0 2rem;
                    bottom: 2rem !important;
                }

                .credit-card .front .number {
                    margin-bottom: 0.5rem !important;
                }
            }

        </style>
    @endpush
    <section class="bg-blue-50 pt-28">

    </section>
    <livewire:event-fee :event="$event"/>


    @push('after-scripts')
        <script src="{{asset('static/js/stripe.js')}}"></script>
    @endpush
@endsection
