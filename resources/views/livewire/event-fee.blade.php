<div class="bg-blue-50 pb-4">
    @if($errors->any())
        <div class="mb-4 text-center">
            <div class="font-medium text-red-600">Whoops! Something went wrong.</div>
            <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div>
        <div class="credit-card w-full sm:w-auto shadow-lg mx-auto rounded-xl bg-white" x-data="creditCard">
            <section class="flex flex-col justify-center items-center" class="">
                <div class="relative" x-show="card === 'front'"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 transform scale-90"
                    x-transition:enter-end="opacity-100 transform scale-100">
                    <img class="w-full h-auto"
                        src="https://www.computop-paygate.com/Templates/imagesaboutYou_desktop/images/svg-cards/card-visa-front.png"
                        alt="front credit card">
                    <div class="front bg-transparent text-lg w-full text-white px-12 absolute left-0 bottom-12">
                        <p class="number mb-5 sm:text-xl">
                            {{ $cardNumber == '' ? '0000 0000 0000 0000' : $cardNumber }}
                        </p>
                        <div class="flex flex-row justify-between">
                            <p>{{ $cardholder == '' ? 'Card holder' : $cardholder }}</p>
                            <div class="">
                                <span>{{ $month == '' ? 'MM' : $month }}</span>
                                <span>/</span>
                                <span>{{ $year == '' ? 'YY' : $year }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <ul class="flex">
                    <li class="mx-2">
                        <img class="w-16"
                            src="https://www.computop-paygate.com/Templates/imagesaboutYou_desktop/images/computop.png"
                            alt="" />
                    </li>
                    <li class="mx-2">
                        <img class="w-14"
                            src="https://www.computop-paygate.com/Templates/imagesaboutYou_desktop/images/verified-by-visa.png"
                            alt="" />
                    </li>
                    <li class="ml-5">
                        <img class="w-7"
                            src="https://www.computop-paygate.com/Templates/imagesaboutYou_desktop/images/mastercard-id-check.png"
                            alt="" />
                    </li>
                </ul>
            </section>
            <form action="{{ route('frontend.event.charge-fee', $event->slug) }}" method="POST">
                @csrf
                <main class="mt-4 p-4">
                    <h1 class="text-xl font-semibold text-gray-700 text-center">Card payment</h1>
                    <div class="">
                        <div class="my-3">
                            <input type="text" name="name"
                                class="block w-full px-5 py-2 border rounded-lg bg-white shadow-lg placeholder-gray-400 text-gray-700 focus:ring focus:outline-none"
                                placeholder="Name" required />
                            <input type="hidden" name="attendee_id"
                                class="block w-full px-5 py-2 border rounded-lg bg-white shadow-lg placeholder-gray-400 text-gray-700 focus:ring focus:outline-none"
                                placeholder="Name" value="{{session()->get('ses_attendee')['attendee_user']['id']}}" />
                        </div>
                        <div class="my-3">
                            <input type="email" name="email"
                                class="block w-full px-5 py-2 border rounded-lg bg-white shadow-lg placeholder-gray-400 text-gray-700 focus:ring focus:outline-none"
                                placeholder="email@email.com" required />
                        </div>
                        <div class="my-3">
                            <input type="text" name="phone"
                                class="block w-full px-5 py-2 border rounded-lg bg-white shadow-lg placeholder-gray-400 text-gray-700 focus:ring focus:outline-none"
                                placeholder="Phone" required />
                        </div>
                        <div class="my-3">
                            <input type="text" name="cardholder"
                                class="block w-full px-5 py-2 border rounded-lg bg-white shadow-lg placeholder-gray-400 text-gray-700 focus:ring focus:outline-none"
                                placeholder="Card holder Name" maxlength="22" wire:model="cardholder" required />
                        </div>
                        <div class="my-3">
                            <input type="text" id="card-element" name="cardNumber"
                                class="block w-full px-5 py-2 border rounded-lg bg-white shadow-lg placeholder-gray-400 text-gray-700 focus:ring focus:outline-none"
                                placeholder="Card number" wire:model="cardNumber" maxlength="19"
                                wire:change="formatBankAccount" wire:keyup="formatBankAccount" required />
                            @error('bank_account') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="my-3 flex flex-col">
                            <div class="mb-2">
                                <label for="" class="text-gray-700">Expired</label>
                            </div>
                            <div class="grid grid-cols-2 sm:grid-cols-4 gap-2">
                                <input type="text" name="month"
                                    class="bg-white block border focus:outline-none focus:ring placeholder-gray-400 px-5 py-2 rounded-lg shadow-lg text-gray-700 w-full"
                                    placeholder="MM" wire:model="month" maxlength="2" name="month" id="" required />
                                <input type="text" name="year"
                                    class="bg-white block border focus:outline-none focus:ring placeholder-gray-400 px-5 py-2 rounded-lg shadow-lg text-gray-700 w-full"
                                    placeholder="YY" wire:model="year" maxlength="2" name="month" id="" required />
                                <input type="text" name="cvv"
                                    class="block w-full col-span-2 px-5 py-2 border rounded-lg bg-white shadow-lg placeholder-gray-400 text-gray-700 focus:ring focus:outline-none"
                                    placeholder="Security code" maxlength="3" required />
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="mt-6 p-4">
                    <button
                        class="submit-button px-4 py-3 rounded-full bg-blue-300 text-blue-900 focus:ring focus:outline-none w-full text-xl font-semibold transition-colors"
                        x-bind:disabled="!isValid" x-on:click="onSubmit()">
                        Pay now
                    </button>
                </footer>
            </form>
        </div>
    </div>
</div>
