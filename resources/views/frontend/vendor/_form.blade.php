<div class="text-left">
    @include('includes.partials.messages')
</div>

<div class="get-started-container mt-12 hidden opacity-0 duration-1000 ease-linear transition-all">
    @if($errors->any())
        <div class="alert alert-danger" role="alert">
            <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> {{$errors->first()}}
        </div>
    @endif
    <h2 class="text-2xl">You Can Contact With Us By Filling The Form Mentioned Below</h2>
    <div class="get-started-wrapper border border-solid border-gray-200 mt-6 bg-white">
        <form method="POST" action="/seller" enctype="multipart/form-data" class="p-4" id="frm_contact">
            @csrf
            <div class="seller-name flex gap-4">
                <label class="py-2 md:py-4 relative block w-full" for="f_name">First Name: <span class="star text-red-500">*</span>
                    {!! Form::text('first_name', null,['class'=>'w-full mt-2 p-2 md:p-3 border border-solid border-gray-200 focus:outline-none required','required', 'autofocus', 'maxlength'=>191,
                        'placeholder'=>'Enter First Name ...']) !!}
                </label>
    
                <label class="py-2 md:py-4 relative block w-full" for="l_name">Last Name: <span class="star text-red-500">*</span>
                    {!! Form::text('last_name', null,['class'=>'w-full mt-2 p-2 md:p-3 border border-solid border-gray-200 focus:outline-none required','required', 'autofocus', 'maxlength'=>191,
                        'placeholder'=>'Enter Last Name ...']) !!}
                </label>
            </div>

            <div class="seller-contacts flex gap-4">
                <label class="py-2 md:py-4 relative block w-full" for="email">Email: <span class="star text-red-500">*</span>
                    {!! Form::email('email', null,['class'=>'w-full mt-2 p-2 md:p-3 border border-solid border-gray-200 focus:outline-none required' ,'required', 'maxlength'=>191, 'placeholder'=>'Enter Email ...']) !!}
                    <span id="error_email" class="text-red-500"></span>
                </label>   

                <label class="py-2 md:py-4 relative block w-full" for="phone">Phone: <span class="star text-red-500">*</span>
                    {!! Form::text('phone', null,['class'=>'w-full mt-2 p-2 md:p-3 border border-solid border-gray-200 focus:outline-none required','required',  'maxlength'=>191, 'placeholder'=>'Enter Phone ...']) !!}
                </label>
             </div> 

            <label class="py-2 md:py-4 relative block" for="phone">Address: <span class="star text-red-500">*</span>
                {!! Form::text('address', null,['class'=>'w-full mt-2 p-2 md:p-3 border border-solid border-gray-200 focus:outline-none required','required',  'maxlength'=>191, 'placeholder'=>'Enter Address ...']) !!}
            </label>

            <div class="form-group pt-5">
                {!! Form::label('country_id', 'Country:') !!} <span class="star text-red-500">*</span>
                {!! Form::select('country_id', $data['countries'], null,['class'=>'bg-white border border-solid justify-between overflow-hidden p-3 sm:text-base w-full required','onchange="get_states(this.value);"', 'required', 'placeholder' => 'Please Select ...']) !!}
            </div>

            <div class="form-group pt-8 ">
                {!! Form::label('state', 'State:') !!} <span class="star text-red-500">*</span>
                <div id="div_state">
                    {!! Form::select('state',[],null,['class'=>'bg-white border border-solid justify-between overflow-hidden p-3 sm:text-base w-full required','required',  'placeholder'=>'Enter State ...']) !!}
                </div>
            </div>

            <label class="pb-2 pt-8 md:py-6 relative block" for="phone">City: <span class="star text-red-500">*</span>
                {!! Form::text('city', null,['class'=>'w-full mt-2 p-2 md:p-3 border border-solid border-gray-200 focus:outline-none required', 'maxlength'=>191, 'required',  'placeholder'=>'Enter City ...']) !!}
            </label>

            <label class="pb-2 md:py-4 relative block" for="phone">Zip Code: <span class="star text-red-500">*</span>
                {!! Form::text('zip_code', null,['class'=>'w-full mt-2 p-2 md:p-3 border border-solid border-gray-200 focus:outline-none required','required', 'maxlength'=>191, 'placeholder'=>'Enter Zip Code ...']) !!}
            </label>

            <div class="store_info flex gap-4">
                <label class="py-2 md:py-4 relative block w-full" for="message">Store Name: <span class="star text-red-500">*</span>
                    {!! Form::text('name', null,['class'=>'w-full mt-2 p-2 md:p-3 border border-solid border-gray-200 focus:outline-none required','required', 'row'=>10, 'cols'=>50, 'placeholder'=>'Enter Store Name ...']) !!}
                </label>
    
                <label class="py-2 md:py-4 relative block w-full" for="message">Contact Person Name: <span class="star text-red-500">*</span>
                    {!! Form::text('contact_name', null,['class'=>'w-full mt-2 p-2 md:p-3 border border-solid border-gray-200 focus:outline-none required' ,'required', 'row'=>10, 'cols'=>50, 'placeholder'=>'Enter Contact Person Name ...']) !!}
                </label>
            </div>

            <div class="images flex gap-28">
                <div class="logo flex-1 ">
                    <label class="py-2 md:py-4 relative block" for="message">Logo  (Optional):
                        <input name="logo" type="file" class="w-full">
                        <span class="text-blue-600 text-xs">png, jpg, bmp files only with the dimensions of 125 × 125  </span>
                    </label>
                </div>
    
                <div class="header flex-1 mt-4">
                    <label class="py-2 md:py-4 relative" for="message">Header Image  (Optional):
                        <input name="header_image" type="file" class="w-full">
                    </label>
                    <span class="text-blue-600 text-xs">png, jpg, bmp files only with the dimensions of 1415 × 280  </span>
                </div>
            </div>

            <label class="py-2 md:py-4 relative block" for="message">Virtual Booth URL (Optional):
                {!! Form::text('virtual_booth_url', null,['class'=>'w-full mt-2 p-2 md:p-3 border border-solid border-gray-200 focus:outline-none', 'row'=>10, 'cols'=>50, 'placeholder'=>'Enter Virtual Booth ...']) !!}
            </label>

            <label class="py-2 md:py-4 relative block" for="message">Message: <span class="star text-red-500">*</span>
                {!! Form::textarea('message', null,['class'=>'w-full mt-2 p-2 md:p-3 border border-solid border-gray-200 focus:outline-none required', 'row'=>10, 'cols'=>50, 'placeholder'=>'Enter Message ...']) !!}
            </label>

            <button type="submit" class="seller-form-btn btn blue-btn relative overflow-hidden lite-blue-bg-color text-white cursor-pointer z-10 px-4 md:px-6 py-2 md:py-3 inline my-2 sm:my-4">Submit Information</button>
        </form>
    </div>
</div>
<script>
    // document.querySelector('.seller-form-btn').addEventListener('click', () => {
    //     document.querySelector('.seller-form-btn').disabled = true;
    //     setTimeout(function(){document.querySelector('.seller-form-btn').disabled = false;
    //     },20000);
    // });
</script>