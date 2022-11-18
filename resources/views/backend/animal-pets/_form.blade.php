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
                    {!! Form::label('name', 'Name:') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'required', 'placeholder' => 'Enter pet name ...', 'onblur' => 'ajax_request();']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('position', 'Position:') !!}
                    {!! Form::text('position', null, ['class' => 'form-control', 'required', 'placeholder' => 'Enter pet position ...', 'onblur' => 'ajax_request();']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('site_url', 'Live Site URL:') !!}
                    {!! Form::text('site_url', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('pet_icon', 'Upload Pet Icon:') !!} <br>
                    {!! Form::file('pet_icon', ['placeholder'=>'Pet Icon ...']) !!}
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
    {{-- <div class="card">
        <div class="card-header" id="headingThree">

            <button class="btn collapsed m-0 p-0" type="button" data-toggle="collapse" data-target="#collapseThree"
                aria-expanded="false" aria-controls="collapseThree">
                <h5 class="mb-0">
                    Diseases
                </h5>
            </button>

        </div>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
            <div class="card-body">
                <div class="form-group">
                    {!! Form::label('diseases_heading', 'Content Heading:') !!}
                    {!! Form::text('diseases_heading', null, ['class' => 'form-control', 'placeholder' => 'Enter content heading ...']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('diseases_content', 'Full Content:') !!}
                    {!! Form::textarea('diseases_content', null, ['class' => 'form-control ckeditor', 'placeholder' => 'Content ...', 'rows' => '3']) !!}
                </div>
            </div>
        </div>
    </div> --}}
    <div class="card">
        <div class="card-header" id="headingFour">

            <button class="btn collapsed m-0 p-0" type="button" data-toggle="collapse" data-target="#collapseFour"
                aria-expanded="false" aria-controls="collapseFour">
                <h5 class="mb-0">
                    Healthy People
                </h5>
            </button>

        </div>
        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
            <div class="card-body">
                <div class="form-group">
                    {!! Form::label('healthy_people_heading', 'Content Heading:') !!}
                    {!! Form::text('healthy_people_heading', null, ['class' => 'form-control', 'placeholder' => 'Enter content heading ...']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('healthy_people_content', 'Full Content:') !!}
                    {!! Form::textarea('healthy_people_content', null, ['class' => 'form-control ckeditor', 'placeholder' => 'Content ...', 'rows' => '3']) !!}
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingFive">

            <button class="btn collapsed m-0 p-0" type="button" data-toggle="collapse" data-target="#collapseFive"
                aria-expanded="false" aria-controls="collapseFive">
                <h5 class="mb-0">
                    Healthy Pets
                </h5>
            </button>

        </div>
        <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
            <div class="card-body">
                <div class="form-group">
                    {!! Form::label('healthy_pet_heading', 'Content Heading:') !!}
                    {!! Form::text('healthy_pet_heading', null, ['class' => 'form-control', 'placeholder' => 'Enter content heading ...']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('healthy_pet_content', 'Full Content:') !!}
                    {!! Form::textarea('healthy_pet_content', null, ['class' => 'form-control ckeditor', 'placeholder' => 'Content ...', 'rows' => '3']) !!}
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingSix">

            <button class="btn collapsed m-0 p-0" type="button" data-toggle="collapse" data-target="#collapseSix"
                aria-expanded="false" aria-controls="collapseSix">
                <h5 class="mb-0">
                    Resources
                </h5>
            </button>

        </div>
        <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordion">
            <div class="card-body">
                <div class="form-group">
                    {!! Form::label('resources_heading', 'Content Heading:') !!}
                    {!! Form::text('resources_heading', null, ['class' => 'form-control', 'placeholder' => 'Enter content heading ...']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('resources_content', 'Full Content:') !!}
                    {!! Form::textarea('resources_content', null, ['class' => 'form-control ckeditor', 'placeholder' => 'Content ...', 'rows' => '3']) !!}
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
{!! Form::hidden('table', 'animal_pets') !!}
