<div>
    <div class="name-label-wrapper">
        <div class="name-wrapper flex flex-col sm:flex-row">
            <div class="wrapper flex flex-col sm:w-6/12 p-1 md:p-4">
                <label for="first_name" class="relative inline-block"> First Name: </label>
                {!! Form::text('first_name', @$address->first_name, ['class' => 'w-full mt-4 p-3 border border-solid
                border-gray-200 focus:outline-none', 'placeholder' => 'Enter first name ...']) !!}
            </div>
    
            <div class="wrapper flex flex-col sm:w-6/12 p-1 md:p-4">
                <label for="last_name" class="relative block"> Last Name: </label>
                {!! Form::text('last_name', @$address->last_name, ['class' => 'w-full mt-4 p-3 border border-solid
                border-gray-200 focus:outline-none', 'placeholder' => 'Enter last name ...']) !!}
            </div>
        </div>
    </div>
    
    <div class="wrapper flex flex-col sm:flex-row">
        <div class="wrapper flex flex-col sm:w-6/12 p-1 md:p-4">
            <label for="company" class="relative block"> Company: </label>
            {!! Form::text('company', @$address->company, ['class' => 'w-full mt-4 p-3 border border-solid border-gray-200
            focus:outline-none', 'placeholder' => 'Enter company name ...']) !!}
        </div>
        <div class="wrapper flex flex-col sm:w-6/12 p-1 md:p-4">
            <label for="city" class="relative block"> Phone: </label>
            {!! Form::text('phone', @$address->phone, ['class' => 'w-full mt-4 p-3 border border-solid border-gray-200
            focus:outline-none', 'placeholder' => 'Enter phone ...']) !!}
        </div>
    </div>
    
    <div class="wrapper flex flex-col p-1 md:p-4">
        <label for="address1" class="relative block"> Address <span class="text-red-500">*</span>: </label>
        {!! Form::text('address1', @$address->address1, ['class' => 'w-full mt-4 p-3 border border-solid border-gray-200
        focus:outline-none', 'placeholder' => 'Enter address line 1...']) !!}
    </div>
    
    <div class="wrapper flex flex-col p-1 md:p-4">
        <label for="address2" class="relative block"> Address : </label>
        {!! Form::text('address2', @$address->address2, ['class' => 'w-full mt-4 p-3 border border-solid border-gray-200
        focus:outline-none', 'placeholder' => 'Enter address line 2 ...']) !!}
    </div>
    
    <div class="wrapper flex flex-col sm:flex-row">
        <div class="wrapper flex flex-col p-1 md:p-4 sm:w-6/12">
            <label for="country" class="relative block"> Country <span class="text-red-500">*</span>: </label>
            {!! Form::select('country', $countries, null, ['class' => 'w-full mt-4 p-3 border border-solid border-gray-200
            focus:outline-none', 'onchange="get_states(this.value);"', 'placeholder' => 'Select country ...', 'wire:model'
            => 'country']) !!}
        </div>
    
        <div class="wrapper flex flex-col p-1 md:p-4 sm:w-6/12">
            <label for="state" class="relative block"> State <span class="text-red-500">*</span>: </label>
            @php
            $show_text_field = true;
            if (isset($address)) {
            if (is_numeric(@$address->state)) {
            $show_text_field = false;
            }
            }
            @endphp
            {{-- @if ($show_text_field)
            {!! Form::text('state', @$address->state, ['class' => 'w-full mt-4 p-3 border border-solid border-gray-200
            focus:outline-none', 'placeholder' => 'Enter state ...']) !!}
            @else
            {!! Form::select('state', @$states, null, ['class' => 'w-full mt-4 p-3 border border-solid border-gray-200
            focus:outline-none', 'placeholder' => 'Enter state ...']) !!}
            @endif --}}
            {!! Form::select('state', @$states, @$address->state, ['class' => 'w-full mt-4 p-3 border border-solid
            border-gray-200 focus:outline-none', 'placeholder' => 'Select state ...', 'wire:model' => 'state']) !!}
        </div>
    </div>
    <div class="wrapper flex flex-col sm:flex-row">
        <div class="wrapper flex flex-col p-1 md:p-4 sm:w-6/12">
            <label for="city" class="relative block"> City <span class="text-red-500">*</span>: </label>
            {!! Form::text('city', @$address->city, ['class' => 'w-full mt-4 p-3 border border-solid border-gray-200
            focus:outline-none', 'placeholder' => 'Enter city ...']) !!}
        </div>
    
        <div class="wrapper flex flex-col p-1 md:p-4 sm:w-6/12">
            <label for="zip" class="relative block"> Zip / Postal code <span class="text-red-500">*</span>: </label>
            {!! Form::text('zip', @$address->zip, ['class' => 'w-full mt-4 p-3 border border-solid border-gray-200
            focus:outline-none', 'placeholder' => 'Enter zip / post code ...']) !!}
        </div>
    </div>
    
    <div class="grid sm:grid-cols-2">
        <div class="wrapper flex flex-col p-1 md:p-4">
            <label for="default-billing">Default Billing Address</label>
            <div class="check-box-container flex items-center mt-4 text-gray-500 font-normal">
                {!! Form::radio('default_billing', 'Y', @$address->default_billing=='Y' ? true : (@$default_billing == 'Y' ?
                true : false), ['class' => 'mr-2', 'id' => 'default-billing-yes']) !!}
                <label for="default-billing-yes"> Yes </label>
                {!! Form::radio('default_billing', 'N', @$address->default_billing=='N'? true : (@$default_billing == 'N' ?
                true : false), ['class' => 'ml-6 mr-2', 'id' => 'default-billing-no']) !!}
                <label for="default-billing-no"> No </label>
            </div>
        </div>
    
        <div class="wrapper flex flex-col p-1 md:p-4">
            <label for="default-shipping">Default Shipping Address <span class="text-red-500">*</span></label>
            <div class="check-box-container flex items-center mt-4 text-gray-500 font-normal">
                {!! Form::radio('default_shipping', 'Y', @$address->default_shipping=='Y' ? true : (@$default_shipping ==
                'Y' ? true : false), ['class' => 'mr-2', 'id' => 'default-shipping-yes_1']) !!}
                <label for="default-shipping-yes_1"> Yes </label>
                {!! Form::radio('default_shipping', 'N', @$address->default_shipping=='N' ? true : (@$default_shipping ==
                'N' ? true : false), ['class' => 'ml-6 mr-2', 'id' => 'default-shipping-no_1']) !!}
                <label for="default-shipping-no_1"> No </label>
            </div>
        </div>
    </div>
</div>
