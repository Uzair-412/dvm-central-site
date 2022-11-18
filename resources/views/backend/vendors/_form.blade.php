<div class="card shadow">
    <div class="card-header">
        Store's Basic Info
        {{-- <div class="card-header-actions">
            <a href="/admin/vendors" class="card-header-action">Cancel</a>
        </div> --}}
    </div>
    <div class="card-body">
        <div class="form-group" style="display: none;">
            <label for="business_type">Business Type:</label>
            <select name="business_type" id="business_type" class="form-control">
                <option value="0">- Select Business Type -</option>
                {{-- @foreach($data['business-type'] as $business)
                    <option @isset($data['vendors']) @if($data['vendors']->business_type == $business->id) selected @endif @endisset value="{{ $business->id }}">{{ $business->name }}</option>
                @endforeach --}}
            </select>
        </div>
        <div class="form-group">
            {!! Form::label('contact_name', 'Contact Person Name:') !!} <span class="text-danger">*</span>
            {!! Form::text('contact_name', null,['class'=>'form-control', 'required', 'placeholder'=>'Enter Contact Person Name', 'id'=>'contact_name']) !!}
        </div>
        {{-- <div class="form-group">
            {!! Form::label('email', 'Email Address:') !!} <span class="text-danger">*</span>
            {!! Form::text('email', null,['class'=>'form-control', 'required', 'placeholder'=>'Email Address', 'id'=>'email']) !!}
        </div> --}}
        <div class="form-group">
            {!! Form::label('address', 'Address:') !!} <span class="text-danger">*</span>
            {!! Form::text('address', null,['class'=>'form-control', 'required', 'placeholder'=>'Enter Address']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('country_id', 'Country:') !!} <span class="text-danger">*</span>
            {!! Form::select('country_id', $data['countries'], null,['class'=>'form-control', 'required', 'placeholder' => 'Please Select ...']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('state', 'State:') !!} <span class="text-danger">*</span>
            {!! Form::select('state', [], null,['class'=>'form-control', 'required', 'placeholder' => 'Please Select ...']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('city', 'City:') !!} <span class="text-danger">*</span>
            {!! Form::text('city', null,['class'=>'form-control', 'required', 'placeholder'=>'Enter City']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('zip_code', 'Zip Code:') !!} <span class="text-danger">*</span>
            {!! Form::text('zip_code', null,['class'=>'form-control', 'required', 'placeholder'=>'Enter Zip Code']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('phone', 'Phone:') !!} <span class="text-danger">*</span>
            {!! Form::text('phone', null,['class'=>'form-control', 'required', 'placeholder'=>'Enter Phone']) !!}
        </div>
    </div>
</div>
{!! Form::hidden('user', $data['customer']->id) !!}

{{-- <div class="card shadow">
    <div class="card-header">
        Store Owner's Info
    </div>
    <div class="card-body">
        <div class="form-group">
            <label for="user">Vendor: <span class="text-danger">*</span></label>
            <select name="user" id="user" class="form-control" required>
                <option value="">- Select Vendor -</option>
                @foreach($data['users'] as $user)
                    <option @if(isset($data['vendors'])) @if($data['vendors']->user == $user->id) selected @endif @endif value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div> --}}

<div class="card shadow">
    <div class="card-header">
        Store Settings
    </div>
    <div class="card-body">
        <div class="form-group">
            {!! Form::label('name', 'Vendor / Store Name:') !!} <span class="text-danger">*</span>
            {!! Form::text('name', null,['class'=>'form-control', 'required', 'placeholder'=>'Enter Vendor / Store Name', 'id'=>'name', 'onblur' => 'ajax_request();']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('slug', 'Slug / Name in URL:') !!} <span class="text-danger">*</span>
            {!! Form::text('slug', null,['class'=>'form-control', 'required', 'placeholder'=>'Enter Slug / Name in URL']) !!}
            @if($data['cmd'] == 'edit')
                <label class="radio-inline">{!! Form::checkbox('save_slug', 'Y', false, ['onclick' => 'save_slugs(this);']) !!} Save Slug</label>
                <div id="link_generate_slug" class="d-none">
                    <a href="javascript:;" onclick="ajax_request();">Re-generate Slug</a>
                    <br>
                    {{-- <label class="radio-inline">{!! Form::checkbox('create_redirect', 'Y', true) !!} Create Redirect</label> --}}
                </div>
            @endif
        </div>
        <div class="form-group">
            {!! Form::label('logo', 'Logo:') !!}
            {!! Form::file('logo', ['class'=>'form-control',  'placeholder'=>'Logo ...']) !!}
            @if(!empty($data['vendors']))
                @if($data['p_heading'] == 'Update Vendor' .' '.$data['vendors']->vendor_user->first_name.' '.$data['vendors']->vendor_user->last_name && $data['vendors']->logo != '')
                    @php
                        $path = 'vendors/logo/'.$data['vendors']->logo;
                    @endphp
                    <p class="help-block"><a href="{{ Storage::disk('ds3')->exists($path) ? Storage::disk('ds3')->url($path) : 'https://via.placeholder.com/600x600.png?text=Image+Not+Available+In+The+Bucket' }}" target="_blank">Click here to see uploaded Icon Image</a></p>
                @endif
            @endif    
        </div>
        <div class="form-group">
            {!! Form::label('header_image', 'Header Image:') !!}
            {!! Form::file('header_image', ['class'=>'form-control',  'placeholder'=>'Header Image ...']) !!}
            @if(!empty($data['vendors']))
                @if($data['p_heading'] == 'Update Vendor' .' '.$data['vendors']->vendor_user->first_name.' '.$data['vendors']->vendor_user->last_name && $data['vendors']->header_image != '')
                    @php
                        $path = 'vendors/header_image/'.$data['vendors']->header_image;
                    @endphp
                    <p class="help-block"><a href="{{ Storage::disk('ds3')->exists($path) ? Storage::disk('ds3')->url($path) : 'https://via.placeholder.com/1519x304.png?text=Image+Not+Available+In+The+Bucket' }}" target="_blank">Click here to see uploaded Header Image</a></p>
                @endif
            @endif   
        </div>
        <div class="form-group">
            {!! Form::label('tax_percentage', 'Tax Percentage:') !!} <span class="text-danger">*</span>
            {!! Form::text('tax_percentage', null,['class'=>'form-control', 'required', 'placeholder'=>'Enter Tax Percentage']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('percentage_from_sales', 'Percentage From Sales:') !!} <span class="text-danger">*</span>
            {!! Form::text('percentage_from_sales', null,['class'=>'form-control', 'required', 'placeholder'=>'Enter Percentage From Sales']) !!}
        </div>
    </div>
</div>

{{-- <div class="card shadow">
    <div class="card-header">
        Stripe Details
    </div>
    <div class="card-body">
        <div class="form-group">
            {!! Form::label('publishable_key', 'Publishable Key:') !!} <small>(optional)</small>
            {!! Form::text('publishable_key', null,['class'=>'form-control', 'placeholder'=>'Enter Publishable Key']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('secret_key', 'Secret Key:') !!} <small>(optional)</small>
            {!! Form::text('secret_key', null,['class'=>'form-control', 'placeholder'=>'Enter Secret Key']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('client_account_id', 'Client Account ID:') !!} <small>(optional)</small>
            {!! Form::text('client_account_id', null,['class'=>'form-control', 'placeholder'=>'Enter Client Account ID']) !!}
        </div>
    </div>
</div> --}}

<div class="card shadow">
    <div class="card-header">
        Virtual Booth
    </div>
    <div class="card-body">
        <div class="form-group">
            {!! Form::label('virtual_booth_url', 'Virtual Booth URL:') !!} <small>(optional)</small>
            {!! Form::text('virtual_booth_url', null,['class'=>'form-control', 'placeholder'=>'Enter URL of Virtual Booth']) !!}
        </div>
    </div>
</div>
<div class="card shadow">
    <div class="card-header">
        Status And Account Activation
    </div>
    <div class="card-body">
        <div class="form-group">
            <label for="activated_account">Activated Account:</label><br>
            <label for="radio-inline">
                <input type="checkbox" name="activated_account" id="activated_account" @isset($data['vendors']) @if($data['vendors']->activated_account == 'Y') checked @endif @endisset>
                Yes, mark account as Activated
            </label>
        </div>
        <div class="form-group">
            <label for="blocked_account">Blocked Account:</label><br>
            <label for="radio-inline">
                <input type="checkbox" name="blocked_account" id="blocked_account" @isset($data['vendors']) @if($data['vendors']->blocked_account == 'Y') checked @endif @endisset>
                Block this Account
            </label>
        </div>
        <div class="form-group">
            {!! Form::label('', 'Status:') !!}
            <br>
            <label class="radio-inline">{!! Form::radio('status', 'Y', (@$data['status'] == 'Y') ? true : false, ['required']) !!} Active</label>
            <label class="radio-inline">{!! Form::radio('status', 'N', (@$data['status'] == 'N') ? true : false, ['required']) !!} In-active</label>
        </div>
    </div>
    {{-- <div class="card-footer">
        <button class="btn btn-sm btn-primary float-right" type="submit">Submit</button>
    </div> --}}
</div>
{!! Form::hidden('cmd', 'slug') !!}
{!! Form::hidden('table', 'vendor') !!}
@push('after-scripts')
    <script>
        function get_states(country_id, stateIso2 = false) {
            $.ajax({
                url: '/admin/get-states',
                method: 'GET',
                data: {country_id: country_id},
                success: async function(response) {
                    let showStates = '<option>Please Select ...</option>';
                    if(response.status==1)
                    {
                        await response.data.map( state =>{
                            let selected = '';
                            if(stateIso2!==false && state.iso2==stateIso2)
                            {
                                selected = 'selected';
                            }
                            showStates+= `<option value="${state.iso2}" ${selected} >${state.name}</option>`;
                        });
                    }
                    $('#state').html(showStates);
                }
            })
        }
        $('#country_id').change(function() {
            let val = $(this).val();
            get_states(val);
        });
    </script>
@endpush
@if($data['cmd'] == 'edit')
    @push('after-scripts')
        <script>
            $('#slug').prop('disabled', true);
            $('#name').removeAttr('onblur');
            get_states({{ $data['vendors']->country_id }}, '{{ $data['vendors']->state }}');
        </script>
    @endpush
@endif