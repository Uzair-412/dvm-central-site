@props(['data' => null,'name' => null])

@if($data != '')
    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
        <p class="text-gray-600">
            {{$name}}
        </p>
        <p>
            {{ $data }}
        </p>
    </div>
@endif