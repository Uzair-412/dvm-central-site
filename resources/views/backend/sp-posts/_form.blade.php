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
                    {!! Form::label('name', 'Title:') !!}
                    {!! Form::text('name', null,['class'=>'form-control', 'required', 'placeholder'=>'Enter post title ...', 'onblur' => 'ajax_request();']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('category_id', 'Category:') !!}
                    {!! Form::select('category_id', $data['categories'], null,['class'=>'form-control', 'required', 'placeholder' => 'Please Select ...']) !!}
                </div>


                <div class="form-group">
                    {!! Form::label('heading_content', 'Content Heading:') !!}
                    {!! Form::text('heading_content', null,['class'=>'form-control', 'placeholder'=>'Enter content heading ...']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('short_content', 'Short Content:') !!}
                    {!! Form::textarea('short_content', null,['class'=>'form-control', 'required', 'placeholder'=>'Content ...', 'rows'=>'3']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('full_content', 'Full Content:') !!}
                    {!! Form::textarea('full_content', null,['class'=>'form-control ckeditor', 'placeholder'=>'Content ...', 'rows'=>'3']) !!}
                </div>


                <div class="form-group">
                    {!! Form::label('image_thumbnail', 'Thumbnail Image:') !!}
                    {!! Form::file('image_thumbnail', ['class'=>'form-control',  'placeholder'=>'Thumbnail Image ...']) !!}

                    @if($data['p_heading'] == 'Update Article' && $data['post']->image_thumbnail != '')
                        <p class="help-block"><a href="/up_data/surgical-procedures/{{ $data['post']->image_thumbnail }}" target="_blank">Click here to see uploaded picture</a></p>
                    @endif
                </div>

                <div class="form-group">
                    {!! Form::label('image', 'Image:') !!}
                    {!! Form::file('image', ['class'=>'form-control',  'placeholder'=>'Post Image ...']) !!}

                    @if($data['p_heading'] == 'Update Article' && $data['post']->image != '')
                        <p class="help-block"><a href="/up_data/surgical-procedures/{{ $data['post']->image }}" target="_blank">Click here to see uploaded picture</a></p>
                    @endif
                </div>

                <div class="form-group">
                    {!! Form::label('publish_date', 'Publish Date:') !!}
                    {!! Form::date('publish_date', null,['class'=>'form-control', 'required', 'placeholder'=>'Enter publish date ...']) !!}
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
                    {!! Form::label('slug', 'Slug:') !!}
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
{!! Form::hidden('table', 'sp-posts') !!}







