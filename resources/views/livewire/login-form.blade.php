@if(!session()->has('ses_exhibitor'))
	<div @open-login.window="if ($event.detail == 'y') show_login_dialog = true" x-show="show_login_dialog" x-data="{ show_login_dialog: @entangle('show_login_dialog') }" class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
		<div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
			<div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
			<span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
			<div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
				<form>
					<div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
						<div class="sm:flex sm:items-start justify-center">
							<div class=" items-center flex flex-col">
								<svg xmlns="http://www.w3.org/2000/svg" class="w-20 h-20 text-gray-600 mb-2" viewbox="0 0 20 20" fill="currentColor">
									<path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd" />
								</svg>
								<p class="mb-5 uppercase text-gray-600">Please login to continue</p>
								@if (session()->has('message'))
									<div class="alert alert-success">
										{{ session('message') }}
									</div>
								@endif
								@if (session()->has('error'))
									<div class="text-red-600">
										{{ session('error') }}
									</div>
								@endif
								<input type="email" wire:model="email" class="p-3 w-80 focus:border-blue-300 rounded border-2 outline-none" autocomplete="off" placeholder="Email" required>
								@error('email') <span class="text-red-600 text-sm">{{ $message }}</span>@enderror
								<input type="password" wire:model="access_code" class="mt-5 p-3 w-80 focus:border-blue-300 rounded border-2 outline-none" autocomplete="off" placeholder="Access Code" required>
								@error('access_code') <span class="text-red-600 text-sm">{{ $message }}</span>@enderror
								<div class="mt-5 flex">
									<label><input type="radio" wire:model="login_type" value="exhibitor" class="mr-2 mt-1">Exhibitor</label>
									<label><input type="radio" wire:model="login_type" value="attendee" class="mr-2 ml-5 mt-1">Attendee</label>
								</div>
								<p class="mt-2 px-20 text-sm text-center" id="attendee_register">Please Click <a class="text-red-600" href="{{route('frontend.events.attendees.register', $event->slug)}}">here</a> to register as an attendee If you don't have account.</p>
								@error('login_type') <span class="text-red-600 text-sm">{{ $message }}</span>@enderror
							</div>		
						</div>
					</div>
					<div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
						<button wire:click.prevent="login" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
							Sign-in
						</button>
						<button @click="show_login_dialog = false" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
							Cancel
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	@push('after-scripts')
		<script>
			const attendee = document.getElementById('select_attendde');
			const exhibitor = document.getElementById('select_exhibitor');
			const attendeeRegister = document.querySelector('#attendee_register');
			
			attendee.addEventListener("click", ()=> {
				attendeeRegister.classList.add('block');
				attendeeRegister.classList.remove('hidden');
				
			});

			exhibitor.addEventListener("click", ()=> {
				attendeeRegister.classList.add('hidden');
			});
		</script>
	@endpush
@endif
