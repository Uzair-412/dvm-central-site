<div>
    <input type="hidden" name="default_shipping" value="Y" />
    <input type="hidden" name="checkout_page" value="1" />
    <label for="email" class="py-2 md:py-4 relative block">
        Email Address:
        <input type="email" required placeholder="Enter email address ..."
            class="w-full mt-2 p-2 md:p-3 border border-solid border-gray-200 focus:outline-none" />
    </label>
    
    <div class="name-label-wrapper flex flex-col sm:flex-row">
        <label for="name" class="py-2 md:py-4 relative block sm:w-6/12 sm:mr-4">
            First Name:
            {!! Form::text('first_name', '',['class'=>'w-full mt-2 p-2 md:p-3 border border-solid
            border-gray-200 focus:outline-none', 'required' => 'required', 'placeholder'=>'Enter first name ...']) !!}
        </label>
    
        <label for="name" class="py-2 md:py-4 relative block sm:w-6/12">
            Last Name:
            {!! Form::text('last_name', '',['class'=>'w-full mt-2 p-2 md:p-3 border border-solid
            border-gray-200 focus:outline-none', 'required' => 'required', 'placeholder'=>'Enter last name ...']) !!}
        </label>
    </div>
    
    <label for="company" class="py-2 md:py-4 relative block">
        Company:
        {!! Form::text('company', '',['class'=>'w-full mt-2 p-2 md:p-3 border border-solid
        border-gray-200 focus:outline-none', 'placeholder'=>'Enter company name ...']) !!}
    </label>
    
    <label for="address" class="py-2 md:py-4 relative block">
        Address <span class="text-red-500">*</span>:
        {!! Form::text('address1', '',['class'=>'w-full mt-2 p-2 md:p-3 border border-solid
        border-gray-200 focus:outline-none', 'required' => 'required', 'placeholder'=>'Enter address line 1...', 'id' =>
        'address1']) !!}
        {!! Form::text('address2', '',['class'=>'w-full mt-2 md:mt-4 p-2 md:p-3 border border-solid
        border-gray-200 focus:outline-none', 'placeholder'=>'Enter address line 2 ...', 'id' =>
        'address2']) !!}
    </label>
    
    <label for="country" class="py-2 md:py-4 relative block">
        Country:
        {!! Form::select('country', $countries, '',['class'=>'w-full mt-2 p-2 md:p-3 border
        border-solid border-gray-200 focus:outline-none', 'required' => 'required', 'state-id' =>
        '', 'placeholder'=>'Select country ...', 'wire:model.lazy' => 'country']) !!}
    </label>
    
    <div class="state-city-label-wrapper flex flex-col sm:flex-row">
        <label for="state" class="py-2 md:py-4 relative block sm:w-6/12 sm:mr-4">
            State:
            <div id="div_state">
                {!! Form::select('state', $states, '',['class'=>'w-full mt-2 p-2 md:p-3 border
                border-solid border-gray-200 focus:outline-none', 'required' => 'required',
                'placeholder'=>'Select state ...']) !!}
                {{-- @php
                $show_text_field = true;
                if(isset($address))
                {
                if(is_numeric($address->state))
                {
                $show_text_field = false;
                }
                }
                @endphp
                @if($show_text_field)
                {!! Form::text('state', '', ['class'=>'w-full mt-2 p-2 md:p-3 border border-solid
                border-gray-200 focus:outline-none', 'required' => 'required', 'placeholder'=>'Enter
                state ...']) !!}
                @else
                {!! Form::select('state', $states, '',['class'=>'w-full mt-2 p-2 md:p-3 border
                border-solid border-gray-200 focus:outline-none', 'required' => 'required',
                'placeholder'=>'Select state ...']) !!}
                @endif --}}
            </div>
        </label>
    
        <label for="city" class="py-2 md:py-4 relative block sm:w-6/12">
            City:
            {!! Form::text('city', '',['class'=>'w-full mt-2 p-2 md:p-3 border border-solid
            border-gray-200 focus:outline-none', 'required' => 'required', 'placeholder'=>'Enter city ...']) !!}
        </label>
    </div>
    
    <div class="zip-phone-label-wrapper flex flex-col sm:flex-row">
        <label for="state" class="py-2 md:py-4 relative block sm:w-6/12 sm:mr-4">
            Zip / Postal code:
            {!! Form::text('zip', '',['maxlength' => '9', 'class'=>'w-full mt-2 p-2 md:p-3 border
            border-solid border-gray-200 focus:outline-none', 'required' => 'required',
            'placeholder'=>'Enter zip / post code ...']) !!}
        </label>
    
        <label for="city" class="py-2 md:py-4 relative block sm:w-6/12">
            Phone:
            {!! Form::text('phone', '',['class'=>'w-full mt-2 p-2 md:p-3 border border-solid
            border-gray-200 focus:outline-none', 'required' => 'required', 'placeholder'=>'Enter phone ...']) !!}
        </label>
    </div>
</div>
