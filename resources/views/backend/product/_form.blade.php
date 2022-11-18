<div class="accordion" id="accordion">
    <div class="card">
        <div class="card-header" id="headingOne">
            <h5 class="mb-0 p-0">
                Basic Information
            </h5>
        </div>
        <div>
            <div class="card-body">
                <div class="form-group">
                    {!! Form::label('vendor_id', 'Select Vendor:') !!}
                    {!! Form::select('vendor_id', $data['vendors'], null, ['class' => 'form-control product-vendor-id-selector', 'placeholder' => 'Please Select ...']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('parent_id', 'Select Category:') !!}
                    {!! Form::select('parent_id', $data['categories'],  @$data['selected_categories'], ['multiple' => 'multiple', 'name' => 'category[]', 'class' => 'form-control select2']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('name', 'Name:') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'required', 'placeholder' => 'Enter product name ...', 'onblur' => 'ajax_request();']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('slug', 'Slug:') !!}
                    {!! Form::text('slug', null, ['class' => 'form-control', 'required', 'placeholder' => 'Enter slug ...']) !!}
                    @if ($data['cmd'] == 'edit')
                        <label class="radio-inline">{!! Form::checkbox('save_slug', 'Y', false, ['onclick' => 'save_slugs(this);']) !!} Save Slug</label>
                        <div id="link_generate_slug" class="d-none">
                            <a href="javascript:;" onclick="ajax_request();">Re-generate Slug</a>
                            <br>
                            <label class="radio-inline">{!! Form::checkbox('create_redirect', 'Y', true) !!} Create Redirect</label>
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('sku', 'SKU:') !!}
                    {!! Form::text('sku', null, ['class' => 'form-control', 'required', 'placeholder' => 'Enter SKU ...']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('', 'Type:') !!}
                    <br>
                    <label class="radio-inline">{!! Form::radio('type', 'simple', $data['type'] == 'simple' ? true : false, ['required']) !!} Simple Product</label>
                    <label class="radio-inline">{!! Form::radio('type', 'variation', $data['type'] == 'variation' ? true : false, ['required']) !!} Product with Variations</label>
                    <label class="radio-inline">{!! Form::radio('type', 'child', $data['type'] == 'child' ? true : false, ['required']) !!} Child / Sub Product</label>
                </div>
                <div class="form-group">
                    {!! Form::label('level', 'Level:') !!}
                    {!! Form::select('level', $data['levels'] , null,['class'=>'form-control', 'placeholder'=>'Select product level ...']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('caption', 'Variation Select Menu Caption:') !!}
                    {!! Form::select('caption_type', App\Models\Product::$captions,  null, ['class' => 'form-control', 'placeholder' => 'Select the variation you want to order']) !!}
                </div>
                @if ($data['type'] == 'child')
                    <div class="form-group">
                        {!! Form::label('', 'Show Individually:') !!}
                        <br>
                        <label class="radio-inline">{!! Form::radio('show_individual', 'Y', $data['show_individual'] == 'Y' ? true : false, ['required']) !!} Yes</label>
                        <label class="radio-inline">{!! Form::radio('show_individual', 'N', $data['show_individual'] == 'N' ? true : false, ['required']) !!} No</label>
                    </div>
                    <div class="form-group">
                        {!! Form::label('', 'Link Type:') !!}
                        <br>
                        <label class="radio-inline">{!! Form::radio('link_type', 'simple', $data['show_individual'] == 'simple' ? true : false, ['required']) !!} Individual (Separate Product
                            Link)</label>
                        <label class="radio-inline">{!! Form::radio('link_type', 'variation', $data['show_individual'] == 'variation' ? true : false, ['required']) !!} Group (Configurable Product Link)</label>
                    </div>
                @endif
                <div class="form-group">
                    {!! Form::label('', 'Surgical Set Product:') !!}
                    <br>
                    <label class="radio-inline">{!! Form::radio('is_set', 'Y', $data['is_set'] == 'Y' ? true : false, ['required']) !!} Yes</label>
                    <label class="radio-inline">{!! Form::radio('is_set', 'N', $data['is_set'] == 'N' ? true : false, ['required']) !!} No</label>
                </div>
            </div>
        </div>
    </div>
</div>
{!! Form::hidden('cmd', 'slug') !!}
{!! Form::hidden('table', 'product') !!}
{!! Form::hidden('step', '1') !!}
@push('after-scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.select2').select2({
                    placeholder: "Select Value",
                    width: '100%',
                    allowClear: true ,// This is for clear get the clear button if wanted
                    tags: true , // This is for Editing new value
            });
        });
    </script>
@endpush
@if ($data['cmd'] == 'edit')
    @push('after-scripts')
        <script>
            function save_slugs(cbk) {
                $('#slug').prop('disabled', !cbk.checked);
                if (cbk.checked)
                    $('#link_generate_slug').removeClass('d-none');
                else
                    $('#link_generate_slug').addClass('d-none');
            }

            function ajax_request() {
                var frm_data = $('form').serializeArray();
                // console.log(frm_data);

                $.ajax({
                        method: "POST",
                        url: "/admin/slug-checker",
                        data: frm_data
                    })
                    .done(function(obj) {
                        if (obj.status == '1') {
                            if (obj.cmd == 'slug') {
                                $('#slug').val(obj.slug);
                                console.log(obj.slug);
                            }
                        }
                    });
            }

            $('#slug').prop('disabled', true);
            $('#name').removeAttr('onblur');
            $('#parent_id').prop('disabled', false);
        </script>
    @endpush
@endif
