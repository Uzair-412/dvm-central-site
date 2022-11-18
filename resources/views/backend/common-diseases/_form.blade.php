<div class="accordion" id="accordion">
    <div class="card">
        <div class="card-header" id="headingOne">
            <h5 class="mb-0 p-0">
                Content Details
            </h5>
        </div>

        <div>
            <div class="card-body"> 
                <div class="form-group">
                    {!! Form::label('name', 'Select Pet Name:') !!}
                    <select id="animal_pet_id" name="animal_pet_id" class="form-control col-md-12" placeholder = 'Select Animal Pet ...' onblur = 'ajax_request();' required>
                        <option  value="">Please Select Pet ...</option>
                        @foreach ($data['animals'] as $animal)
                            <option value="{{ $animal->id }}">{{ $animal->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    {!! Form::label('name', 'Disease Name:') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'required', 'placeholder' => 'Enter Disease Name ...', 'onblur' => 'ajax_request();']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('site_url', 'Live Site URL:') !!}
                    {!! Form::text('site_url', null, ['class' => 'form-control', 'placeholder' => 'Enter URL ...']) !!}
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingTwo">

            <button class="btn collapsed m-0 p-0" type="button" data-toggle="collapse" data-target="#collapseTwo"
                aria-expanded="false" aria-controls="collapseTwo">
                <h5 class="mb-0">
                    Overview
                </h5>
            </button>

        </div>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
            <div class="card-body">
                <div class="form-group">
                    {!! Form::label('overview_heading', 'Content Heading:') !!}
                    {!! Form::text('overview_heading', null, ['class' => 'form-control', 'placeholder' => 'Enter content heading ...']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('overview_content', 'Full Content:') !!}
                    {!! Form::textarea('overview_content', null, ['class' => 'form-control ckeditor', 'placeholder' => 'Content ...', 'rows' => '3']) !!}
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingThree">

            <button class="btn collapsed m-0 p-0" type="button" data-toggle="collapse" data-target="#collapseThree"
                aria-expanded="false" aria-controls="collapseThree">
                <h5 class="mb-0">
                    Prevention
                </h5>
            </button>

        </div>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
            <div class="card-body">
                <div class="form-group">
                    {!! Form::label('prevention_heading', 'Prevention Heading:') !!}
                    {!! Form::text('prevention_heading', null, ['class' => 'form-control', 'placeholder' => 'Enter content heading ...']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('prevention_content', 'Full Content:') !!}
                    {!! Form::textarea('prevention_content', null, ['class' => 'form-control ckeditor', 'placeholder' => 'Content ...', 'rows' => '3']) !!}
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingFour">

            <button class="btn collapsed m-0 p-0" type="button" data-toggle="collapse" data-target="#collapseFour"
                aria-expanded="false" aria-controls="collapseFour">
                <h5 class="mb-0">
                    Test & Treatments
                </h5>
            </button>

        </div>
        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
            <div class="card-body">
                <div class="form-group">
                    {!! Form::label('treatment_heading', 'Content Heading:') !!}
                    {!! Form::text('treatment_heading', null, ['class' => 'form-control', 'placeholder' => 'Enter content heading ...']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('treatment_content', 'Full Content:') !!}
                    {!! Form::textarea('treatment_content', null, ['class' => 'form-control ckeditor', 'placeholder' => 'Content ...', 'rows' => '3']) !!}
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingFive">

            <button class="btn collapsed m-0 p-0" type="button" data-toggle="collapse" data-target="#collapseFive"
                aria-expanded="false" aria-controls="collapseFive">
                <h5 class="mb-0">
                    More Information
                </h5>
            </button>

        </div>
        <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
            <div class="card-body">
                <div class="form-group">
                    {!! Form::label('more_info_heading', 'Content Heading:') !!}
                    {!! Form::text('more_info_heading', null, ['class' => 'form-control', 'placeholder' => 'Enter content heading ...']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('more_info_content', 'Full Content:') !!}
                    {!! Form::textarea('more_info_content', null, ['class' => 'form-control ckeditor', 'placeholder' => 'Content ...', 'rows' => '3']) !!}
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingSeven">

            <button class="btn collapsed m-0 p-0" type="button" data-toggle="collapse" data-target="#collapseSeven"
                aria-expanded="false" aria-controls="collapseSeven">
                <h5 class="mb-0">
                    Search Engine Optimization
                </h5>
            </button>

        </div>
        <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordion">
            <div class="card-body">


                <div class="form-group">
                    {!! Form::label('slug', 'Slug:') !!}
                    {!! Form::text('slug', null, ['class' => 'form-control', 'required', 'placeholder' => 'Enter slug ...']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('meta_title', 'Meta Title:') !!}
                    {!! Form::text('meta_title', null, ['class' => 'form-control', 'placeholder' => 'Meta Title ...']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('meta_keywords', 'Meta Keywords:') !!}
                    {!! Form::textarea('meta_keywords', null, ['class' => 'form-control', 'placeholder' => 'Meta Keywords ...', 'rows' => '3']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('meta_description', 'Meta Description:') !!}
                    {!! Form::textarea('meta_description', null, ['class' => 'form-control', 'placeholder' => 'Meta Description ...', 'rows' => '3']) !!}
                </div>


            </div>
        </div>
    </div>

</div>


{!! Form::hidden('cmd', 'slug') !!}
{!! Form::hidden('table', 'common_diseases') !!}
