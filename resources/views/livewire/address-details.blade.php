<form>
    <div class="text-lg text-gray-600 pb-2">Update Contact Details</div>
    <hr>
    <div class="text-sm text-gray-600 pb-2 pt-2">Please enter your phone, email and address details</div>
    <div class="pb-2">

        <div class="grid grid-cols-2 gap-4">
            <div>
                <x-input.group label="Mobile Number" for="mobile" :error="$errors->first('exhibitor_data.mobile')"
                    inline="true">
                    <x-input.text wire:model.defer="exhibitor_data.mobile" id="mobile" />
                </x-input.group>
            </div>
            <div>
                <x-input.group label="Phone Number" for="phone" :error="$errors->first('exhibitor_data.phone')"
                    inline="true">
                    <x-input.text wire:model.defer="exhibitor_data.phone" id="phone" />
                </x-input.group>
            </div>
        </div>

        <div class="pt-3"></div>

        <x-input.group label="Email Address" for="email" :error="$errors->first('exhibitor_data.email')" inline="true">
            <x-input.text wire:model.defer="exhibitor_data.email" id="email" />
        </x-input.group>

        <div class="pt-3"></div>

        <x-input.group label="Website" for="website" :error="$errors->first('exhibitor_data.website')" inline="true">
            <x-input.text wire:model.defer="exhibitor_data.website" id="website" />
        </x-input.group>

        <div class="pt-3"></div>

        <x-input.group label="Address" for="address" :error="$errors->first('exhibitor_data.address')" inline="true">
            <x-input.text wire:model.defer="exhibitor_data.address" id="address" />
        </x-input.group>

        <div class="pt-3"></div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <x-input.group label="Street" for="street" :error="$errors->first('exhibitor_data.street')"
                    inline="true">
                    <x-input.text wire:model.defer="exhibitor_data.street" id="street" />
                </x-input.group>
            </div>
            <div>
                <x-input.group label="City" for="city" :error="$errors->first('exhibitor_data.city')" inline="true">
                    <x-input.text wire:model.defer="exhibitor_data.city" id="street" />
                </x-input.group>
            </div>
        </div>

        <div class="pt-3"></div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <x-input.group label="State" for="state" :error="$errors->first('exhibitor_data.state')" inline="true">
                    <x-input.text wire:model.defer="exhibitor_data.state" id="street" />
                </x-input.group>
            </div>
            <div>
                <x-input.group label="Zip / Postal Code" for="zip" :error="$errors->first('exhibitor_data.zip')"
                    inline="true">
                    <x-input.text wire:model.defer="exhibitor_data.zip" id="street" />
                </x-input.group>
            </div>
        </div>

        <div class="pt-3"></div>

        <x-input.group label="Country" for="country" :error="$errors->first('exhibitor_data.country')" inline="true">
            <x-input.text wire:model.defer="exhibitor_data.country" id="street" />
        </x-input.group>


    </div>
    <hr>
    <div class="pt-2">
        <x-save-loading-buttons />
    </div>
</form>
