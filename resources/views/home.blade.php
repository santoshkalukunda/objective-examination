@extends('layouts.app')

@section('content')
    @php
        $title = 'Dashboard';
    @endphp
    <div class="container">
        <div class="row justify-content-center">
            @foreach ($subjects as $subject)
                <div class="col-md-2">
                    <button type="button" class="btn btn-outline-secondary p-4">

                        {{ $subject->name }}

                    </button>
                </div>
            @endforeach
        </div>
    </div>
@endsection
