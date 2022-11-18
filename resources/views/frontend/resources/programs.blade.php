@extends('frontend.layouts.app')
@section('title', 'Educational Programs | Veterinary Colleges | DVM Central')
@section('meta_description', 'Committed to positively impacting the veterinary community and helping professionals reach new heights of growth and success. Offering free online degree programs.')
@section('meta_keywords', 'Student Veterinary, Veterinary Colleges, Educational Programs, Online Vet Programs, Vet Tech')
@push('after-styles')
    <link rel="stylesheet" href="assets/styles/programs.css" />
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
    @livewire('frontend.resource.programs',['data' => $data])
@endsection
@push('after-scripts')
    <script>
        let filterPrograms = {
            types: [],
            states: [],
            cities: [],
            countries: [],
        }
        $('#education_types input').change(function() {
            filterPrograms.types = [];
            $('#education_types input:checked').each(function() {
                filterPrograms.types.push($(this).val());
            });
            filterProgramsFunc()
        })

        $('#education_states input').change(function() {
            filterPrograms.states = [];
            $('#education_states input:checked').each(function() {
                filterPrograms.states.push($(this).val());
            });
            filterProgramsFunc()
        })

        $('#education_city input').change(function() {
            filterPrograms.cities = [];
            $('#education_city input:checked').each(function() {
                filterPrograms.cities.push($(this).val());
            });
            filterProgramsFunc()
        })

        $('#education_countries input').change(function() {
            filterPrograms.countries = [];
            $('#education_countries input:checked').each(function() {
                filterPrograms.countries.push($(this).val());
            });
            filterProgramsFunc()
        })

        function filterProgramsFunc() {
            $.ajax({
                url: '/resources/filter-programs',
                method: 'GET',
                data: filterPrograms,
                success: function(response) {
                    response = JSON.parse(response);
                    $('#programs').html(response.show);
                    // $('#pagiate .ps-pagination').html(response.pagination);
                    $('.ps-pagination .page-item').each(function() {
                        if ($(this).children("a").length > 0) {
                            let href = $(this).children("a").attr('href');
                            let changedHref = href.replace(/filter-programs/g, "programs");
                            $(this).children("a").attr('href', changedHref);
                            console.log($(this).children("a")[0]);
                        }
                    })
                }
            })
        }
    </script>
@endpush
