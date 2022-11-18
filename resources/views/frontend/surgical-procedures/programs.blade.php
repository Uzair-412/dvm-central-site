@extends('frontend.layouts.app')
@section('title', 'Resources - Educational programs')
{{-- @section('meta_keywords', $data['News']->meta_keywords)
@section('meta_description', $data['News']->meta_description) --}}
@push('after-styles')
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
<div class="d-flex justify-content-center align-items-center">
    <img src="/img/banner.jpg" alt="" style="width: 100%;">
</div>
<div class="ps-page--simple">
    <div class="ps-section--shopping ps-shopping-cart">
        <div class="ps-container">
            {{-- <div class="ps-section__header clearfix">
                <h1 class="float-left" style="font-size: 42px;">Educational Programs</h1>
            </div> --}}

            <div class="row mt-50 education-body">
                <div class="col-md-3 filter-wrapper">
                    <div class="mb-3">
                        <h5 class="w-100 filter-heading">Education Types</h5>
                        <div class="filter-section" id="education_types">
                            @foreach($data['types'] as $key => $type)
                                @php
                                    $checked = false;
                                    if(isset($_GET['types']))
                                    {
                                        $filteredArray = Arr::where($_GET['types'], function ($value, $key) use($type) {
                                            return $value == $type->id;
                                        });
                                        if(count($filteredArray) > 0)
                                        {
                                            $checked = true;
                                        }
                                    }
                                @endphp
                                <div class="label">
                                    <label class="sub-heading" class="text-capitalize">
                                        <input type="checkbox" name="types[]" id="type{{ $key }}" value="{{ $type->id }}" @if($checked==true) checked @endif />&nbsp; {{ $type->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="mb-3">
                        <h5 class="w-100 filter-heading">States</h5>
                        <div class="filter-section" id="education_states">
                            @foreach($data['states'] as $key => $state)
                                @php
                                    $checked = false;
                                    if(isset($_GET['states']))
                                    {
                                        $filteredArray = Arr::where($_GET['states'], function ($value, $key) use($state) {
                                            return $value == $state->id;
                                        });
                                        if(count($filteredArray) > 0)
                                        {
                                            $checked = true;
                                        }
                                    }
                                @endphp
                                <div class="label">
                                    <label class="sub-heading" class="text-capitalize">
                                        <input type="checkbox" name="states[]" id="state{{ $key }}" value="{{ $state->id }}" @if($checked==true) checked @endif />&nbsp; {{ $state->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="mb-3">
                        <h5 class="w-100 filter-heading">Cities</h5>
                        <div class="filter-section" id="education_city">
                            @foreach($data['cities'] as $key => $city)
                                @php
                                $checked = false;
                                if(isset($_GET['cities']))
                                {
                                    $filteredArray = Arr::where($_GET['cities'], function ($value, $key) use($city) {
                                        return $value == $city->city;
                                    });
                                    if(count($filteredArray) > 0)
                                    {
                                        $checked = true;
                                    }
                                }
                                @endphp
                                <div class="label">
                                    <label class="sub-heading" class="text-capitalize">
                                        <input type="checkbox" name="cities[]" id="city{{ $key }}" value="{{ $city->city }}" @if($checked==true) checked @endif />&nbsp; {{ $city->city }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @if(count($data['countries']) > 1)
                        <div class="bg-light p-4 mb-3">
                            <h5 class="w-100 filter-heading">Countries</h5>
                            <div class="" id="education_countries">
                                @foreach($data['countries'] as $key => $country)
                                    @php
                                    $checked = false;
                                    if(isset($_GET['countries']))
                                    {
                                        $filteredArray = Arr::where($_GET['countries'], function ($value, $key) use($country) {
                                            return $value == $country->id;
                                        });
                                        if(count($filteredArray) > 0)
                                        {
                                            $checked = true;
                                        }
                                    }
                                    @endphp
                                    <div class="label">
                                        <label class="sub-heading" class="text-capitalize">
                                            <input type="checkbox" name="countries[]" id="country{{ $key }}" value="{{ $country->id }}" @if($checked==true) checked @endif />&nbsp; {{ $country->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
                <div class="col-md-9">
                    <h5 class="float-left w-100 main-heading">Educations</h5>
                    <div class="row" id="programs">
                        @foreach($data['Programs'] as $key => $program)
                            <div class="col-md-12 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <p class="card-text text-capitalize font-weight-bold heading">
                                            {{ $program->type->name }} - {{ $program->institute->name }}
                                        </p>
                                        <p class="text-capitalize">{{ $program->institute->state->name }}</p>
                                        <p>{{ $program->institute->address_line_1 }} {{ $program->institute->address_line_2 }} {{
                                            $program->institute->city }}, {{ $program->institute->zip }}</p>
                                        @if($program->institute->url!='')
                                            <p><a href="{{ $program->institute->url }}" class="text-primary">{{ $program->institute->url }}</a></p>
                                        @endif
                                        <p><span class="font-weight-bold heading">Program Director:</span> {{ $program->director->name }}</p>
                                        <p><span class="font-weight-bold heading">Discipline Code:</span> {{ $program->discipline_code }}</p>
                                        <p><span class="font-weight-bold heading">Accreditation Status:</span> {{
                                            $program->accreditation_status->name }}</p>
                                        <p><span class="font-weight-bold heading">Last Accreditation Visit:</span> {{
                                            $program->last_accreditation_visit }}</p>
                                        <p><span class="font-weight-bold heading">Next Accreditation Visit:</span> {{
                                            $program->next_accreditation_visit }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @php
                            $pagination = $data['Programs']->appends( request()->except('page') )->links();
                        @endphp
                        @if(!empty(trim($pagination)))
                            <div class="col-md-12">
                                <div class="ps-pagination">
                                    {!! $pagination !!}
                                </div>
                            </div>
                        @endif
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('after-scripts')
<script>
    let filterPrograms = {
        types: [],
        states: [],
        cities: [],
        countries: [],
    }
    $('#education_types input').change(function () {
        filterPrograms.types = [];
        $('#education_types input:checked').each(function () {
            filterPrograms.types.push($(this).val());
        });
        filterProgramsFunc()
    })

    $('#education_states input').change(function () {
        filterPrograms.states = [];
        $('#education_states input:checked').each(function () {
            filterPrograms.states.push($(this).val());
        });
        filterProgramsFunc()
    })

    $('#education_city input').change(function () {
        filterPrograms.cities = [];
        $('#education_city input:checked').each(function () {
            filterPrograms.cities.push($(this).val());
        });
        filterProgramsFunc()
    })

    $('#education_countries input').change(function () {
        filterPrograms.countries = [];
        $('#education_countries input:checked').each(function () {
            filterPrograms.countries.push($(this).val());
        });
        filterProgramsFunc()
    })

    function filterProgramsFunc() {
        $.ajax({
            url: '/resources/filter-programs',
            method: 'GET',
            data: filterPrograms,
            success: function (response) {
                response = JSON.parse(response);
                $('#programs').html(response.show);
                // $('#pagiate .ps-pagination').html(response.pagination);
                $('.ps-pagination .page-item').each(function () {
                    if($(this).children( "a" ).length > 0)
                    {
                        let href = $(this).children( "a" ).attr('href');
                        let changedHref = href.replace(/filter-programs/g, "programs");
                        $(this).children( "a" ).attr('href', changedHref);
                        console.log($(this).children( "a" )[0]);
                    }
                })
            }
        })
    }
</script>
@endpush