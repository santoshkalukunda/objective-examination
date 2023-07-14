@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">{{ $title = 'Questions' }}</div>
                    <div class="card-body">
                        <form
                            action="{{ $question->id ? route('questions.update', [$subject, $question]) : route('questions.store', $subject) }}"
                            method="post">
                            @if ($question->id)
                                @method('put')
                            @endif
                            @csrf
                            <div class="mb-3">
                                <label for="title" class="form-label required">Question</label>
                                <input type="text" name="title"
                                    class="form-control @error('title') is-invalid @enderror"
                                    value="{{ old('title', $question->title) }}" id="title" aria-describedby="title">
                                <div class="invalid-feedback">
                                    @error('title')
                                        {{ $message }}
                                    @enderror

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="a" class="form-label required">Options A</label>
                                        <input type="text" name="a"
                                            class="form-control @error('a') is-invalid @enderror"
                                            value="{{ old('a', $question->a) }}" id="a" aria-describedby="a">
                                        <div class="invalid-feedback">
                                            @error('a')
                                                {{ $message }}
                                            @enderror

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="b" class="form-label required">Options B</label>
                                        <input type="text" name="b"
                                            class="form-control @error('b') is-invalid @enderror"
                                            value="{{ old('b', $question->b) }}" id="b" aria-describedby="b">
                                        <div class="invalid-feedback">
                                            @error('b')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="c" class="form-label required">Options C</label>
                                        <input type="text" name="c"
                                            class="form-control @error('c') is-invalid @enderror"
                                            value="{{ old('c', $question->c) }}" id="c" aria-describedby="c">
                                        <div class="invalid-feedback">
                                            @error('c')
                                                {{ $message }}
                                            @enderror

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="d" class="form-label required">Options D</label>
                                        <input type="text" name="d"
                                            class="form-control @error('d') is-invalid @enderror"
                                            value="{{ old('d', $question->d) }}" id="d" aria-describedby="d">
                                        <div class="invalid-feedback">
                                            @error('d')
                                                {{ $message }}
                                            @enderror

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="ans" class="form-label required">Currect Option</label>
                                        <select class="form-select @error('ans') is-invalid @enderror" name="ans">
                                            <option value="">Select Currect Option</option>
                                            <option value="A" {{ $question->ans == 'A' ? 'selected' : '' }}>
                                                A
                                            </option>
                                            <option value="B" {{ $question->ans == 'B' ? 'selected' : '' }}>
                                                B
                                            </option>
                                            <option value="C" {{ $question->ans == 'C' ? 'selected' : '' }}>
                                                C
                                            </option>
                                            <option value="D" {{ $question->ans == 'D' ? 'selected' : '' }}>
                                                D
                                            </option>
                                        </select>
                                        <div class="invalid-feedback">
                                            @error('ans')
                                                {{ $message }}
                                            @enderror

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="expire_date" class="form-label required">Expiry Date</label>
                                        <input type="date" name="expire_date"
                                            class="form-control @error('expire_date') is-invalid @enderror"
                                            value="{{ old('expire_date', $question->expire_date) }}" id="expire_date"
                                            aria-describedby="expire_date">
                                        <div class="invalid-feedback">
                                            @error('expire_date')
                                                {{ $message }}
                                            @enderror

                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- @if ($question->id)
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-select @error('status') is-invalid @enderror" name="status">
                                        <option value="1" {{ $question->status == 'Active' ? 'selected' : '' }}>
                                            Active
                                        <option value="0" {{ $question->status == 'Deactivate' ? 'selected' : '' }}>
                                            Deactivate
                                        </option>
                                        </option>
                                    </select>
                                    <div class="invalid-feedback">
                                        @error('status')
                                            {{ $message }}
                                        @enderror

                                    </div>
                                </div>
                            @endif --}}
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">
                                    {{ $question->id ? 'Update' : 'Save' }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="row">
                    @forelse($questions as $question)
                        <div class="col-md-12 my-1">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            Q {{ $loop->iteration }}. {{ $question->title }}
                                        </div>
                                        <ul class="navbar-nav ms-auto">
                                            <!-- Authentication Links -->
                                            <li class="nav-item dropdown">
                                                <div class="">
                                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                            class="bi bi-three-dots"></i></a>
                                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">

                                                        <li><a class="dropdown-item text-center btn"
                                                                href="{{ route('questions.edit', [$subject, $question]) }}">Edit</a>
                                                        </li>
                                                        <li>
                                                            <form action="{{ route('questions.destroy', $question) }}"
                                                                method="post">
                                                                @method('delete')
                                                                @csrf
                                                                <button class="dropdown-item text-center btn form-control"
                                                                    type="submit"
                                                                    onclick="return confirm('Are you sure to delete?')">
                                                                    Delete
                                                                </button>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div>
                                        {!! $question->ans == 'A' ? '<b><i class="bi bi-bookmark-check-fill"></i> A.' .$question->a .'</b>' : '<i class="bi bi-bookmark"></i> A.'.$question->a !!}
                                    </div>
                                    <div>
                                        {!! $question->ans == 'B' ? '<b><i class="bi bi-bookmark-check-fill"></i> B. ' .$question->b .'</b>' : '<i class="bi bi-bookmark"></i> B.'.$question->b !!}
                                    </div>
                                    <div>
                                        {!! $question->ans == 'C' ? '<b><i class="bi bi-bookmark-check-fill"></i> C. ' .$question->c .'</b>' : '<i class="bi bi-bookmark"></i> C. '.$question->c !!}
                                    </div>
                                    <div>
                                        {!! $question->ans == 'D' ? '<b><i class="bi bi-bookmark-check-fill"></i> D. ' .$question->d .'</b>' : '<i class="bi bi-bookmark"></i> D. '.$question->d !!}
                                    </div>

                                    <div class="text-secondary">
                                        <i class="bi bi-calendar-week"></i> Expiry Date: {{ $question->expire_date }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
