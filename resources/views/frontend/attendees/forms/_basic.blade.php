
    <div class="bg-white border break-words flex flex-col mb-6 min-w-0 p-5 relative rounded-lg shadow-xl w-full">
        <form action="{{route('frontend.events.attendees.update', [$event->slug, $data['attendee']->id])}}" method="POST" class="flex flex-col space-y-8" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div>
                <h3 class="text-2xl font-semibold">Basic Information</h3>
                <hr>
            </div>

            <div class="form-item flex">
                <div class="w-1/2 mr-3">
                <label class="text-lg">First Name:</label>
                <input type="text" value="{{$data['attendee']->users->first_name}}" class="border border-gray-300 text-gray-900 sm:text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-3 disabled:opacity-50" disabled>
                </div>
                <input type="hidden" name="basic_information" value="1">
                <input type="hidden" name="id" value="{{$data['attendee']->id}}">

                <div class="w-1/2">
                <label class="text-lg">Last Name:</label>
                <input type="text" value="{{$data['attendee']->users->last_name}}" class="border border-gray-300 text-gray-900 sm:text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-3 disabled:opacity-50" disabled>
                </div>
            </div>

            <div class="form-item">
                <label class="text-lg">Address :</label>
                <input type="text" value="{{old('address', $data['attendee']->address)}}" placeholder="Enter your address ..." name="address" class="border border-gray-300 text-gray-900 sm:text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-3">
            </div>
            <div class="form-item flex">
                <div class="w-1/3 mr-3">
                    <label class="text-lg">State:</label>
                    <select name="state" id="state" class="border border-gray-300 text-gray-900 sm:text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-3">
                        <option value="">Select State</option>
                        @foreach ($data['states'] as $state)
                            <option class="{{(($state->id) == $data['attendee']->state ? 'selected' : '')}}" value="{{$state->id}}">{{$state->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="w-1/3 mr-3">
                    <label class="text-lg">City:</label>
                    <input type="text" value="{{old('city', $data['attendee']->city)}}" name="city" class="border border-gray-300 text-gray-900 sm:text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-3">
                    </div>
                <div class="w-1/3">
                    <label class="text-lg">Zipcode:</label>
                    <input type="text"  value="{{old('zip', $data['attendee']->zip)}}" name="zip" class="border border-gray-300 text-gray-900 sm:text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-3">
                </div>
            </div>
            <div class="form-item flex">
                <div class="w-1/2 mr-3">
                    <label class="text-lg">Phone:</label>
                    <input type="text" value="{{old('phone', $data['attendee']->phone)}}" name="phone" class="border border-gray-300 text-gray-900 sm:text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-3">
                </div>
                <div class="w-1/2">
                    <label class="text-lg">Mobile:</label>
                    <input type="text" value="{{old('mobile', $data['attendee']->mobile)}}" name="mobile" class="border border-gray-300 text-gray-900 sm:text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-3">
                </div>
            </div>
            <div class="form-item flex">
                <div class="w-1/2 mr-3">
                    <label class="text-lg">Image:</label>
                    <input type="file" id="image" name="image" onchange="loadFile(event)" class="border border-gray-300 text-gray-900 sm:text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-3">
                </div>
                <div class="w-1/2">
                    <img src="{{$data['attendee']->image != NULL ? 'up_data/attendees/images/'.$data['attendee']->image : 'https://via.placeholder.com/100x100.png'}}" alt="" id="imgshow"  width="100"/>
                </div>
            </div>

            <button type="submit" class="bg-green-600 border border-transparent focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 font-medium hover:bg-green-700 inline-flex justify-center px-4 py-2 rounded-md shadow-sm sm:text-sm sm:w-auto text-base text-white w-full">Submit</button>

        </form>
    </div>

@push('after-scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
        $('document').ready(function () {
            $("#image").change(function () {
                if (this.files && this.files    ) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#imgshow').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(this.files[0]);
                }
            });
        });
    </script>

@endpush