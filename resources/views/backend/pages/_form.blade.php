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
                    {!! Form::label('name', 'Page Name:') !!}
                    {!! Form::text('name', null,['class'=>'form-control', 'required', 'placeholder'=>'Enter page name ...', 'onblur' => 'ajax_request();']) !!}
                    {!! Form::hidden('user_id', Auth::user()->id) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('heading', 'Page Heading:') !!}
                    {!! Form::text('heading', null,['class'=>'form-control', 'required', 'placeholder'=>'Enter page heading ...']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('content', 'Content:') !!}
                    {!! Form::textarea('content', null,['class'=>'form-control ckeditor', 'placeholder'=>'Content ...', 'rows'=>'3']) !!}
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingThree">
            <button class="btn collapsed m-0 p-0" type="button" data-toggle="collapse" data-target="#collapseThree"
                    aria-expanded="false" aria-controls="collapseThree">
                <h5 class="mb-0">
                    Search Engine Optimization
                </h5>
            </button>
        </div>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
            <div class="card-body">
                <div class="form-group">
                    {!! Form::label('slug', 'Slug:') !!} <span class="text-primary ml-2 alert-light">(Please use 'pages/' before the slug to add new dynamic pages.)</span>
                    {!! Form::text('slug', null,['class'=>'form-control', 'required', 'placeholder'=>'Enter slug ...']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('meta_title', 'Meta Title:') !!}
                    {!! Form::text('meta_title', null,['class'=>'form-control', 'placeholder'=>'Meta Title ...']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('meta_keywords', 'Meta Keywords:') !!}
                    {!! Form::textarea('meta_keywords', null,['class'=>'form-control', 'placeholder'=>'Meta Keywords ...', 'rows'=>'3']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('meta_description', 'Meta Description:') !!}
                    {!! Form::textarea('meta_description', null,['class'=>'form-control', 'placeholder'=>'Meta Description ...', 'rows'=>'3']) !!}
                </div>
            </div>
        </div>
    </div>
</div>
{!! Form::hidden('cmd', 'slug') !!}
{!! Form::hidden('table', 'pages') !!}