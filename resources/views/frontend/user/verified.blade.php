@extends('frontend.layouts.app')
@section('title', appName() . ' | ' . __('Verification'))
@push('after-styles')
@endpush

@section('content')
   @php
      if (auth()->user()){
         auth()->logout();
      }
   @endphp
      <main id="login-page" class="relative" x-data="{ openLogin: true, openReset: false, remember: 0 }">
         <div class="sign-in-up-container p-2 width overflow-hidden flex flex-wrap justify-center mt-20">
               <div class="sign-in-up-wrapper flex flex-col justify-center items-center">
                  @include('includes.partials.messages')
                  <div class="sign-in-container w-full bg-white p-4">
                     <h2 class="text-2xl font-bold dark-blue-color text-center mb-4">Congratulations! <br> you are now registered with Vetandtech</h2>
                     <p>You have just joined the best site for veterinary, we're glad you choose us.</p>
                     <p>You can login to your account by clicking the link below:</p>

                     <a href="https://www.dvmcentral.com/login" target="_blank"
                     style=" display: inline-block; padding: 8px 10px; font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 16px; color: white; text-decoration: none; border-radius: 6px; background-color: #1a82e2;">Login</a>
                        <p>You can also browse our catalog by using the following link:</p>
                        
                        <a href="https://www.dvmcentral.com/" target="_blank"
                                 style=" display: inline-block; padding: 8px 10px; font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 16px; color: white; text-decoration: none; border-radius: 6px; background-color: #1a82e2;">Catalog</a>
                        <div class="border-t border-solid border-gray-500 p-4 mt-4">
                           <p>Thank you for choosing Vetandtech, if you have any questions please do not hesitate to email us at <a href="mailto:info@dvmcentral.com">info@dvmcentral.com</a></p>
                        </div>
                  </div>
               </div>
         </div>
      </main>
@endsection
@push('after-scripts')
@endpush