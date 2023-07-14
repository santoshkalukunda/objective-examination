@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row">
                    @php
                        $i = 1;
                    @endphp
                    <form action="{{ route('examinations.store',[$user,$token]) }}" method="post">
                        @csrf
                        @foreach ($physicsQuestions as $question)
                            <div class="col-md-12 my-1">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                Q {{ $i++ }}. {{ $question->title }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <input type="text" name="question[]" value="{{ $question->id }}" id=""
                                            hidden>
                                        <div>
                                            <input type="radio" name="answers[{{ $question->id }}]" value="A"
                                                id="a-{{ $question->id }}"> <label for="a-{{ $question->id }}">A.
                                                {{ $question->a }}</label>

                                        </div>
                                        <div>
                                            <input type="radio" name="answers[{{ $question->id }}]" value="B"
                                                id="b-{{ $question->id }}"> <label for="b-{{ $question->id }}">B.
                                                {{ $question->b }}</label>

                                        </div>
                                        <div>
                                            <input type="radio" name="answers[{{ $question->id }}]" value="C"
                                                id="c-{{ $question->id }}"> <label for="c-{{ $question->id }}">C.
                                                {{ $question->c }}</label>
                                        </div>
                                        <div>
                                            <input type="radio" name="answers[{{ $question->id }}]" value="D"
                                                id="d-{{ $question->id }}"><label for="d-{{ $question->id }}">D.
                                                {{ $question->d }}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @foreach ($chemistryQuestions as $question)
                            <div class="col-md-12 my-1">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                Q {{ $i++ }}. {{ $question->title }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <input type="text" name="question[]" value="{{ $question->id }}" id=""
                                            hidden>
                                        <div>
                                            <input type="radio" name="answers[{{ $question->id }}]" value="A"
                                                id="a-{{ $question->id }}"> <label for="a-{{ $question->id }}">A.
                                                {{ $question->a }}</label>

                                        </div>
                                        <div>
                                            <input type="radio" name="answers[{{ $question->id }}]" value="B"
                                                id="b-{{ $question->id }}"> <label for="b-{{ $question->id }}">B.
                                                {{ $question->b }}</label>

                                        </div>
                                        <div>
                                            <input type="radio" name="answers[{{ $question->id }}]" value="C"
                                                id="c-{{ $question->id }}"> <label for="c-{{ $question->id }}">C.
                                                {{ $question->c }}</label>
                                        </div>
                                        <div>
                                            <input type="radio" name="answers[{{ $question->id }}]" value="D"
                                                id="d-{{ $question->id }}"><label for="d-{{ $question->id }}">D.
                                                {{ $question->d }}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <input type="submit" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
