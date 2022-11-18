<div class="accordion" id="accordion">
    <div class="card shadow">
        <div class="card-header" id="headingOne">
            <h5 class="mb-0 p-0">
                General Information
            </h5>
        </div>
        <div>
            <div class="card-body">
                <input type="hidden" name="business_type" id="business_type" value="0" />
                {{-- <div class="form-group">
                    <label for="business_type">Business Type:</label>
                    <select name="business_type" id="business_type" class="form-control" required>
                        <option value="0">- Select Business Type -</option>
                        @foreach($data['business-type'] as $business)
                            <option @isset($data['category']) @if($data['category']->business_type == $business->id) selected @endif @endisset value="{{ $business->id }}">{{ $business->name }}</option>
                        @endforeach
                    </select>
                </div> --}}
                <div class="form-group">
                    {!! Form::label('parent_id', 'Parent Category:') !!}
                    {!! Form::select('parent_id', $data['categories'], null, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('name', 'Category Name:') !!}
                    {!! Form::text('name', null,['class'=>'form-control', 'required', 'placeholder'=>'Enter category name ...', 'onblur' => 'ajax_request();']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('show_in_menu', 'Show in Menu:') !!}
                    <br>
                    <label class="radio-inline">{!! Form::radio('show_in_menu', 'Y', (@$data['show_in_menu'] == 'Y') ? true : false, ['required']) !!} Yes</label>
                    <label class="radio-inline">{!! Form::radio('show_in_menu', 'N', (@$data['show_in_menu'] == 'N') ? true : false, ['required']) !!} No</label>
                </div>
                <div class="form-group">
                    {!! Form::label('is_main', 'Show in Top Categories Section:') !!}
                    <br>
                    <label class="radio-inline">{!! Form::radio('is_main', 'Y', (@$data['is_main'] == 'Y') ? true : false, ['required']) !!} Yes</label>
                    <label class="radio-inline">{!! Form::radio('is_main', 'N', (@$data['is_main'] == 'N') ? true : false, ['required']) !!} No</label>
                </div>
                <div class="form-group">
                    {!! Form::label('is_featured', 'Show in Featured Categories Section:') !!}
                    <br>
                    <label class="radio-inline">{!! Form::radio('is_featured', 'Y', (@$data['is_featured'] == 'Y') ? true : false, ['required']) !!} Yes</label>
                    <label class="radio-inline">{!! Form::radio('is_featured', 'N', (@$data['is_featured'] == 'N') ? true : false, ['required']) !!} No</label>
                </div>
            </div>
        </div>
    </div>
    <div class="card shadow">
        <div class="card-header" id="headingTwo">
            <button class="btn collapsed m-0 p-0" type="button" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="false" aria-controls="collapseTwo">
                <h5 class="mb-0">
                    Description, Image and Banner
                </h5>
            </button>
        </div>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
            <div class="card-body">
                <div class="form-group">
                    {!! Form::label('short_description', 'Short Description:') !!}
                    {!! Form::textarea('short_description', null,['class'=>'form-control ckeditor', 'placeholder'=>'Short Description ...', 'rows'=>'2']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('description', 'Description:') !!}
                    {!! Form::textarea('description', null,['class'=>'form-control ckeditor', 'placeholder'=>'Description ...', 'rows'=>'3']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('image', 'Picture:') !!}
                    {!! Form::file('image', ['class'=>'form-control',  'placeholder'=>'Category Image ...']) !!}
                    <p class="help-block">Only JPG or PNG Images, Size not more than 600 x 600 in width and height</p>
                    @if($data['p_heading'] == 'Update Category' && $data['category']->image != '')
                        <p class="help-block"><a href="/up_data/categories/{{ $data['category']->image }}" target="_blank">Click here to see
                                uploaded picture</a></p>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('banner_id', 'Banner:') !!}
                    {!! Form::select('banner_id', $data['banners'], null, ['class' => 'form-control', 'placeholder' => 'Please Select ...']) !!}
                </div>
            </div>
        </div>
    </div>
    <div class="card shadow">
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
                    {!! Form::text('slug', null, ['class'=>'form-control', 'required', 'placeholder'=>'Enter slug ...']) !!}
                    @if($data['cmd'] == 'edit')
                        <label class="radio-inline">{!! Form::checkbox('save_slug', 'Y', false, ['onclick' => 'save_slugs(this);']) !!} Save Slug</label>
                        <div id="link_generate_slug" class="d-none">
                            <a href="javascript:;" onclick="ajax_request();">Re-generate Slug</a>
                            <br>
                            <label class="radio-inline">{!! Form::checkbox('create_redirect', 'Y', true) !!} Create Redirect</label>
                        </div>
                    @endif
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
    <div class="card shadow">
        <div class="card-header" id="headingFour">
            <button class="btn collapsed m-0 p-0" type="button" data-toggle="collapse" data-target="#collapseFour"
                    aria-expanded="false" aria-controls="collapseFour">
                <h5 class="mb-0">
                    Display Settings
                </h5>
            </button>
        </div>
        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
            <div class="card-body">
                <div class="form-group">
                    {!! Form::label('display_mode', 'Display Mode:') !!}
                    {!! Form::select('display_mode', \App\Models\Category::$display_mode, @$data['display_mode'], ['class'=>'form-control', 'required']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('position', 'Display Position:') !!}
                    {!! Form::text('position', null,['class'=>'form-control', 'placeholder'=>'Display Position ...']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('', 'Status:') !!}
                    <br>
                    <label class="radio-inline">{!! Form::radio('status', 'Y', (@$data['status'] == 'Y') ? true : false, ['required']) !!} Active</label>
                    <label class="radio-inline">{!! Form::radio('status', 'N', (@$data['status'] == 'N') ? true : false, ['required']) !!} In-active</label>
                </div>
            </div>
        </div>
    </div>
</div>
{!! Form::hidden('cmd', 'slug') !!}
{!! Form::hidden('table', 'category') !!}
@if($data['cmd'] == 'edit')
    @push('after-scripts')
    <script>
        $('#slug').prop('disabled', true);
        $('#name').removeAttr('onblur');
    </script>
    @endpush
@endif