@extends('backend.layouts.app')
@section('title', $p_heading)
@section('content')
    {!! Form::open(['route' => ['admin.vendors.update_details', $vendor_id], 'method' => 'POST', 'files' => true]) !!}
    <div class="card shadow">
        <div class="card-body">
            <div class="card-header">
                Add Vendor's Required Documents
                <div class="card-header-actions">
                    <a href="/admin/vendors" class="card-header-action">Cancel</a>
                </div>
            </div>

            <div class="flex question form-group mt-4" id="all_question_wrapper">

                {!! Form::label('question', 'Requirement:') !!}
                {!! Form::text('questions[]', null, ['class' => 'form-control', 'required', 'placeholder' => 'Enter required document']) !!}

            </div>
            <div class="flex question form-group mt-4" id="new_question_wrapper">
            </div>
            <div class=" form-group mt-4">
                <button id="add_new_question" class="btn btn-sm btn-instagram float-right" type="button">Add more</button>
            </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-sm btn-instagram float-right" type="submit">Save Questions</button>
        </div>
    </div>
    {!! Form::close() !!}

    <div class="card shadow">
        <div class="card-header mt-3">
            <div class="border-bottom card-title pb-3"> Uploaded Documents Questions </div>
            @php
                $i = 1;
            @endphp
            @foreach ($uploaded_questions as $question)
                <div class="d-flex w-full px-2 justify-content-between align-items-center mt-1 py-2 border-bottom">
                    <div class="d-flex ">
                        <label for="">{{ $i++ }} )</label>
                        <p class="text-xl pl-2">
                            {{ $question->question }}
                        </p>
                    </div>
                    <div>
                        <form action="{{ url('admin/vendors/delete-details/' . $question->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" name="delete"
                                class="btn btn-sm btn-danger float-right p-2 mb-1">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

@stop
@push('after-scripts')
    <script>
        let add_new_question = document.querySelector('#add_new_question');
        add_new_question.addEventListener('click', (e) => {
            let all_questions = document.querySelectorAll('#new_question_wrapper input');

            let randomId = (Math.random(Math.floor(100)) * 100).toFixed(0);
            document.querySelector('#new_question_wrapper').innerHTML += `
            <div id="new_question_${randomId}" class="question flex form-group mt-4" id="card-body">
                <div class="d-flex justify-content-between align-items-center"  id="new_question_${randomId}">
                    {!! Form::label('question', 'Requirement:') !!}
                    <?xml version="1.0" ?>
                    <!DOCTYPE svg PUBLIC '-//W3C//DTD SVG 1.1//EN' 'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'><svg onclick="remove_question(${randomId})"
                        height="17px" id="Layer_1" style="enable-background:new 0 0 512 512;" version="1.1"
                        viewBox="0 0 512 512" width="17px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink">
                        <path
                            d="M443.6,387.1L312.4,255.4l131.5-130c5.4-5.4,5.4-14.2,0-19.6l-37.4-37.6c-2.6-2.6-6.1-4-9.8-4c-3.7,0-7.2,1.5-9.8,4  L256,197.8L124.9,68.3c-2.6-2.6-6.1-4-9.8-4c-3.7,0-7.2,1.5-9.8,4L68,105.9c-5.4,5.4-5.4,14.2,0,19.6l131.5,130L68.4,387.1  c-2.6,2.6-4.1,6.1-4.1,9.8c0,3.7,1.4,7.2,4.1,9.8l37.4,37.6c2.7,2.7,6.2,4.1,9.8,4.1c3.5,0,7.1-1.3,9.8-4.1L256,313.1l130.7,131.1  c2.7,2.7,6.2,4.1,9.8,4.1c3.5,0,7.1-1.3,9.8-4.1l37.4-37.6c2.6-2.6,4.1-6.1,4.1-9.8C447.7,393.2,446.2,389.7,443.6,387.1z" />
                    </svg>
                </div>
                    {!! Form::text('questions[]', null, ['class' => 'form-control', 'required', 'placeholder' => 'Enter required document']) !!}
                
            </div>
            `;

            all_questions.forEach((question, index) => {
                document.querySelectorAll('#new_question_wrapper input')[index].value = question.value;
            });
        });

        function remove_question(randomId) {
            document.querySelector(`#new_question_${randomId}`).remove();
        }
    </script>
@endpush
