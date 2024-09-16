{{-- resources/views/questions/index.blade.php --}}
@extends('layouts.adminlte')

@section('content')
<div class="container">
    <h1>Questions</h1>
    <a href="{{ route('questions.create') }}" class="btn btn-primary mb-3">Add New Question</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Question Text</th>
                <th>Category</th>
                <th>Type</th>
                <th>Mandatory</th>
                <th>Order</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($questions as $question)
                <tr>
                    <td>{{ $question->id }}</td>
                    <td>{{ $question->question_text }}</td>
                    <td>{{ $question->category }}</td>
                    <td>{{ $question->type }}</td>
                    <td>{{ $question->is_mandatory ? 'Yes' : 'No' }}</td>
                    <td>{{ $question->order }}</td>
                    <td>
                        {{-- @php
                        dd($questions)
                        @endphp --}}
                        <a href="{{ route('questions.show', $question) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('questions.edit', $question) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('questions.destroy', $question) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection