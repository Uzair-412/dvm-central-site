
    <div class="bg-white border break-words flex flex-col mb-6 min-w-0 p-5 relative rounded-lg shadow-xl w-full">
        <form action="{{route('frontend.events.attendees.update', [$event->slug, $data['attendee']->id])}}" method="POST" class="flex flex-col space-y-8" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div>
                <h3 class="text-2xl font-semibold">Social Media Accounts And Status</h3>
                <hr>
            </div>

            <div class="form-item flex">
                <div class="w-1/2 mr-3">
                    <label class="text-lg">Facebook:</label>
                    <input type="text" value="{{($data['attendee']->sm_facebook)}}" name="sm_facebook" class="border border-gray-300 text-gray-900 sm:text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-3">
                </div>

                <input type="hidden" name="social_info" value="3">
                <input type="hidden" name="id" value="{{$data['attendee']->id}}">

                <div class="w-1/2">
                    <label class="text-lg">Instagram:</label>
                    <input type="text" value="{{($data['attendee']->sm_instagram)}}" name="sm_instagram" class="border border-gray-300 text-gray-900 sm:text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-3">
                </div>
            </div>

            <div class="form-item flex">
                <div class="w-1/2 mr-3">
                    <label class="text-lg">LinkedIn:</label>
                    <input type="text" value="{{($data['attendee']->sm_linkedin)}}" name="sm_linkedin" class="border border-gray-300 text-gray-900 sm:text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-3">
                </div>

                <div class="w-1/2">
                    <label class="text-lg">Pinterest:</label>
                    <input type="text" value="{{($data['attendee']->sm_pinterest)}}" name="sm_pinterest" class="border border-gray-300 text-gray-900 sm:text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-3">
                </div>
            </div>

            <div class="form-item flex">
                <div class="w-1/2 mr-3">
                    <label class="text-lg">Vimeo:</label>
                    <input type="text" value="{{($data['attendee']->sm_vimeo)}}" name="sm_vimeo" class="border border-gray-300 text-gray-900 sm:text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-3">
                </div>

                <div class="w-1/2">
                    <label class="text-lg">Youtube:</label>
                    <input type="text" value="{{($data['attendee']->sm_youtube)}}" name="sm_youtube" class="border border-gray-300 text-gray-900 sm:text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-3">
                </div>
            </div>

            <div class="form-item flex">
                <div class="w-1/2 mr-3">
                    <label class="text-lg">Twitter:</label>
                    <input type="text" value="{{($data['attendee']->sm_twitter)}}" name="sm_twitter" class="border border-gray-300 text-gray-900 sm:text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-3">
                </div>

                <div class="w-1/2">
                    <label class="text-lg">Website:</label>
                    <input type="text" value="{{$data['attendee']->website}}" name="website" class="border border-gray-300 text-gray-900 sm:text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-3">
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