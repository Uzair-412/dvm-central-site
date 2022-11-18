@extends('frontend.layouts.app')
@section('title', 'Resources')
@section('content')
<!-- page content -->
<main id="quiz-page" class="relative bg-gray-50 my-16 mx-32">
    <div class="container border-2">
        <div class="header m-4">
            <h2 class="font-bold">{{$data['course']->title}} {{$data['module']->title}} Quiz</h2>
        </div>
        <form action="{{ route('frontend.course.module.quiz.store') }}" method="POST">
            @csrf
            <div class="quiz-body m-4">
                <div class="quiz-number border-2">
                    <h2 class="font-bold m-2">Question {{ (int)$data['savedAnswersCount']+1 }} of {{ $data['module']->quizzes->count() }}</h2>
                </div>
                <div class="quiz-question mt-4 border-2 ">
                    <h3 class="font-semibold m-4">{{$data['quiz_question']->question}}</h3>
                    <div class="options flex flex-col mx-4 mb-8">
                        <input type="hidden" name="module_id" id="module_id" value="{{ $data['module']->id }}" />
                        <input type="hidden" name="quiz_id" id="quiz_id" value="{{ $data['quiz_question']->id }}" />
                        <input type="hidden" name="selected_option" id="selected_option" value="" />
                        @foreach ($data['quiz_question']->options as $option)
                            <div class="ans flex flex-row align-center my-2">
                                <label for="ans{{$option->id}}"><input type="radio" name="ans" id="ans{{$option->id}}" value="{{$option->id}}" />&nbsp; {{$option->quiz_option}}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="lower-section my-4">
                    <button class="save-btn btn blue-btn px-6 py-3 w-max lite-blue-bg-color text-white relative overflow-hidden h-full z-10 " disabled>
                        @if((int)$data['savedAnswersCount']+1 < $data['module']->quizzes->count())
                            Save & Next
                        @else
                            Submit Quiz
                        @endif
                    </button>
                </div>
            </div>
        </form>
    </div>
</main>

<script>
    document.querySelectorAll('input[name=ans]').forEach(input => {
        input.addEventListener('change',(e) => {
            document.querySelector('#selected_option').value = input.value;
                document.querySelector('.save-btn').disabled = false;
        })
    })
    // var radios = document.querySelector('input[type=radio]:checked').value;
    // console.log(radios)    
    // alert(radios);
</script>
@endsection