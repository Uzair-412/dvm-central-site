    <div class="bg-white border break-words flex flex-col mb-6 min-w-0 p-5 relative rounded-lg shadow-xl w-full">
        <form action="{{route('frontend.events.attendees.update', [$event->slug, $data['attendee']->id])}}" method="POST" class="flex flex-col space-y-8" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div>
                <h3 class="text-2xl font-semibold">Additional Info</h3>
                <hr>
            </div>

            <div class="form-item flex">
                <div class="w-1/2 mr-3">
                    <label class="text-lg">Job Title:</label>
                    <input type="text" value="{{$data['attendee']->job_title}}" name="job_title" class="border border-gray-300 text-gray-900 sm:text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-3">
                </div>

                <input type="hidden" name="additional_info" value="2">
                <input type="hidden" name="id" value="{{$data['attendee']->id}}">

                <div class="w-1/2">
                    <label class="text-lg">Institute:</label>
                    <input type="text" value="{{$data['attendee']->institute}}" name="institute" class="border border-gray-300 text-gray-900 sm:text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-3">
                </div>
            </div>

            <div class="form-item flex">
                <div class="w-1/2 mr-3">
                    <label class="text-lg">Profile:</label>
                    <input type="text" value="{{$data['attendee']->profile}}" name="profile" class="border border-gray-300 text-gray-900 sm:text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-3">
                </div>

                <div class="w-1/2">
                    <label class="text-lg">Profession:</label>
                    <input type="text" value="{{$data['attendee']->profession}}" name="profession" class="border border-gray-300 text-gray-900 sm:text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-3">
                </div>
            </div>

            <div class="form-item flex">
                <div class="w-1/2 mr-3">
                    <label class="text-lg">Classification:</label>
                    <input type="text" value="{{$data['attendee']->classification}}" name="classification" class="border border-gray-300 text-gray-900 sm:text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-3">
                </div>

                <div class="w-1/2">
                    <label class="text-lg">Specialty:</label>
                    <input type="text" value="{{$data['attendee']->specialty}}" name="specialty" class="border border-gray-300 text-gray-900 sm:text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-3">
                </div>
            </div>

            <div class="form-item flex">
                <div class="w-1/2 mr-3">
                    <label class="text-lg">Employer Type:</label>
                    <input type="text" value="{{$data['attendee']->employer_type}}" name="employer_type" class="border border-gray-300 text-gray-900 sm:text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-3">
                </div>

                <div class="w-1/2">
                    <label class="text-lg">Practice Role:</label>
                    <input type="text" value="{{$data['attendee']->practice_role}}" name="practice_role" class="border border-gray-300 text-gray-900 sm:text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-3">
                </div>
            </div>

            <div class="form-item flex">
                <div class="w-1/2 mr-3">
                    <label class="text-lg">Vets In Practice:</label>
                    <input type="number" value="{{$data['attendee']->vets_in_practice}}" name="vets_in_practice" class="border border-gray-300 text-gray-900 sm:text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-3">
                </div>

                <div class="w-1/2">
                    <label class="text-lg">Techs In Practice:</label>
                    <input type="number" value="{{$data['attendee']->techs_in_practice}}" name="techs_in_practice" class="border border-gray-300 text-gray-900 sm:text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-3">
                </div>
            </div>

            <div class="form-item flex">
                <div class="w-1/2 mr-3">
                    <label class="text-lg">Practice Revenue:</label>
                    <input type="text" value="{{$data['attendee']->practice_revenue}}" name="practice_revenue" class="border border-gray-300 text-gray-900 sm:text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-3">
                </div>

                <div class="w-1/2">
                    <label class="text-lg">Practices In Group:</label>
                    <input type="text" value="{{$data['attendee']->practices_in_group}}" name="practices_in_group" class="border border-gray-300 text-gray-900 sm:text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-3">
                </div>
            </div>

            <div class="form-item flex">
                <div class="w-full">
                    
                <label for="credentials" class="text-lg">Credentials:</label>
                <select name="credentials[]" multiple="multiple" id="credentials" class="border border-gray-300 text-gray-900 sm:text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-3 form-control select_credentials">
                    @foreach($data['credentials'] as $credential)
                        <option selected value="{{$credential}}" >{{$credential}}</option>
                    @endforeach
                </select>
                </div>
            </div>

            <button type="submit" class="bg-green-600 border border-transparent focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 font-medium hover:bg-green-700 inline-flex justify-center px-4 py-2 rounded-md shadow-sm sm:text-sm sm:w-auto text-base text-white w-full">Submit</button>
            
        </form>
    </div>
    

@push('after-styles')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>

    <link href="{{ asset('static/plugins/select2/dist/css/select2.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('static/plugins/select2/dist/js/select2.min.js') }}"></script>
@endpush
