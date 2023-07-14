@extends('layouts.app')

@section('content')
    @php
        $title = 'Dashboard';
    @endphp
    <div class="container">
        <div class="row justify-content-center">
            <a href="{{route('examinations.generateEmail')}}" class="btn btn-outline-primary p-5">Generate Questionnaire</a>
        </div>
    </div>
@endsection
