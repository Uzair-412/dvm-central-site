<x-layouts.base>
    @livewire('nav-bar', ['event' => $event])
    @yield('content')

    <footer class="bg-gray-100 bottom-0 fixed p-10 py-6 text-center w-full">
        <p>&copy; Copyright {{ date('Y') }} All rights reserved</p>
    </footer>

    @livewire('login-form', ['event' => $event])
    
    <x-notification />

    <div class="modal-overlay fixed w-full inset-0 z-50 overflow-hidden flex justify-center items-center animated fadeIn faster" style="background: rgba(0,0,0,.7); display:none;"></div>
    
    @if(isset($data['chat_data']['enable_chat']) && $data['chat_data']['enable_chat'] == true)
      @livewire('chat-box', ['event' => $event, 'chat_data' => $data['chat_data']])
    @endif

</x-layouts.base>