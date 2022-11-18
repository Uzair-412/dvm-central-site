<div>
    @error('code')
        <x-utils.alert type="danger">
            {{ $message }}
        </x-utils.alert>
    @enderror

    <form action="{{route('frontend.auth.account.2fa.validateCode')}}" method="POST" class="form-horizontal">
        @csrf
        <div class="form-group row">
            <label for="code" class="col-md-4 col-form-label text-md-right">@lang('Authorization Code')</label>

            <div class="col-md-6">
                <input
                    type="text"
                    id="code"
                    wire:model.lazy="code"
                    minlength="6"
                    class="w-full mt-4 p-3 border border-solid border-gray-200 focus:outline-none"
                    placeholder="{{ __('Authorization Code') }}"
                    name="code"
                    autofocus />
            </div>
        </div><!--form-group-->

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button class="btn blue-btn lite-blue-bg-color text-white z-10 py-2 px-4 text-xs sm:text-sm overflow-hidden relative w-max mt-4" type="submit">@lang('Enable Two Factor Authentication')</button>
            </div>
        </div><!--form-group-->
    </form>
</div>
