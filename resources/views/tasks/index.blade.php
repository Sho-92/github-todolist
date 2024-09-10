@extends('layouts.app')

@section('title', 'Task List')

@section('content')
    <div class="task-list">
        <h2>Task List</h2>
        <table>
            <thead>
                <tr>
                    <th>Done</th>
                    <th>Title</th>
                    <th>Details</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task)
                    <tr>
                        <td class="checkbox">
                            <form action="{{ route('tasks.updateStatus', $task->id) }}" method="POST">
                                @csrf
                                <input type="checkbox" name="completed" value="1"
                                    {{ $task->completed ? 'checked' : '' }}
                                    onchange="this.form.submit()"> 
                            </form>
                        </td>
                        <td class="title">{{ $task->title }}</td>
                        <td class="details">{{ $task->details }}</td>
                        <td class="actins">
                            <div class="icon-container">
                                <a href="{{ route('tasks.edit', $task->id) }}" class="btn-icon"><i class="fas fa-pencil-alt"></i></a>
                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-icon"><i class="fas fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="pagination">
            @if ( $tasks->hasPages() )
                {{ $tasks->links() }}
            @else
                <ul class="pagination">
                    <li class="page-item disabled"><span class="page-link">Previous</span></li>
                    <li class="page-item disabled"><span class="page-link">Next</span></li>
                </ul>
            @endif
        </div>
    </div>
@endsection

