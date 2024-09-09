@extends('layouts.app')

@section('content')
    <div class="form-comtainer">
        <h2>Edit Task</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('tasks.update', $task->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Task Title:</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $task->title) }}" required>
            </div>

            <div class="form-group">
                <label for="details">Task Details:</label>
                <textarea id="details" name="details" class="form-control">{{ old('details', $task->details) }}</textarea>
            </div>

            <div class="form-edit-submit">
                <button type="submit" class="btn btn-primary">Update Task</button>
                <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
@endsection
