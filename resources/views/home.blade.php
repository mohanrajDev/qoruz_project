@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Questions
                    <span id='test_timer'  class="float-right"
                    data-url="{{ route('test.timeout') }}"></span>
                </div>

                <div class="card-body">
                    
                    <form action="{{ route('test.store') }}" method="POST" id="quiz_form">

                        @csrf 

                        @foreach($user->test->questions as $question)
                            
                            <div class="row mb-5" data-question="{{ $loop->iteration }}">
                                <div class="col-md-12">
                                  <h6>{{ $loop->iteration }} . {{ $question->name }}</h6>
                                </div>
                                <div class="col-md-3">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" name="q_{{ $question->id }}" class="custom-control-input"
                                         value="option1" id="option1_q{{ $question->id }}" required>                                   
                                        <label class="custom-control-label" 
                                        for="option1_q{{ $question->id }}"> {{ $question->option1 }} </label>
                                    </div>                                    
                                </div>

                                <div class="col-md-3">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" name="q_{{ $question->id }}" class="custom-control-input"
                                        value="option2" id="option2_q{{ $question->id }}" required>                                   
                                        <label class="custom-control-label" 
                                        for="option2_q{{ $question->id }}"> {{ $question->option2 }} </label>
                                    </div>   
                                </div>

                                <div class="col-md-3">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" name="q_{{ $question->id }}" class="custom-control-input"
                                         value="option3" id="option3_q{{ $question->id }}" required>                                   
                                        <label class="custom-control-label" 
                                        for="option3_q{{ $question->id }}"> {{ $question->option3 }} </label>
                                    </div>   
                                </div>

                                <div class="col-md-3">
                                   <div class="custom-control custom-radio">
                                        <input type="radio" name="q_{{ $question->id }}" class="custom-control-input"
                                         value="option4" id="option4_q{{ $question->id }}" required>                                   
                                        <label class="custom-control-label" 
                                        for="option4_q{{ $question->id }}"> {{ $question->option4 }} </label>
                                    </div>   
                                </div>
                            </div>                            
                        @endforeach 
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-dark">Submit</button>
                            </div>
                        </div>
                    </form>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/timer.js') }}"></script>
@endpush
