@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">{{ $title = 'Subject' }}</div>
                    <div class="card-body">
                        <form action="{{ $subject->id ? route('subjects.update', $subject) : route('subjects.store') }}"
                            method="post">
                            @if ($subject->id)
                                @method('put')
                            @endif
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label required">Subject</label>
                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name', $subject->name) }}" id="name" aria-describedby="name">
                                <div class="invalid-feedback">
                                    @error('name')
                                        {{ $message }}
                                    @enderror

                                </div>
                            </div>
                            @if ($subject->id)
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-select" name="status">
                                        <option value="1" {{ $subject->status == 'Active' ? 'selected' : '' }}>Active
                                        <option value="0" {{ $subject->status == 'Deactivate' ? 'selected' : '' }}>
                                            Deactivate
                                        </option>
                                        </option>
                                    </select>
                                </div>
                            @endif
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">
                                    {{ $subject->id ? 'Update' : 'Save' }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $title }}</div>

                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-md table-bordered">
                                <thead>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @forelse($subjects as $subject)
                                        <tr>
                                            <td>{{ $subject->name }}</td>
                                            <td>{{ $subject->status }}</td>
                                            <td class="d-flex gap-2">
                                                <div><a class="text-center btn btn-primary"
                                                        href="{{ route('subjects.edit', $subject) }}">Edit</a>
                                                </div>
                                                <div><a class="text-center btn btn-primary"
                                                        href="{{ route('questions.index', $subject) }}">Questions</a>
                                                </div>
                                                <div>
                                                    <form action="{{ route('subjects.destroy', $subject) }}"
                                                        method="post">
                                                        @method('delete')
                                                        @csrf
                                                        <button class="text-center btn btn-danger" type="submit"
                                                            onclick="return confirm('Are you sure to delete?')">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>

                                    @empty
                                        <tr>
                                            <td colspan="42" class="font-italic text-center">No Record Found</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
