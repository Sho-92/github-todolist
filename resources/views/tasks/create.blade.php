@extends('layouts.app')

@section('title', 'Create Task')

@section('content')
    <div class="form-comtainer">
        <h2>Create a New Task</h2>
        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="title">Task Name : </label>
                <input type="text" name="title" id="title" required>
            </div>

            <div class="form-group">
                <label for="details">Details : </label>
                <textarea name="details" id="details"></textarea>
            </div>

            <div class="form-submit">
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>
@endsection
