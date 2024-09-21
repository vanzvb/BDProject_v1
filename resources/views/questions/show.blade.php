{{-- resources/views/questions/show.blade.php --}}
@extends('layouts.adminlte')

@section('content')
<div class="container">
    <h1>Question Details</h1>

    <div class="card">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $question->id }}</p>
            <p><strong>Question Text:</strong> {{ $question->question_text }}</p>
            <p><strong>Category:</strong> {{ $question->category }}</p>
            <p><strong>Type:</strong> {{ $question->type }}</p>
            <p><strong>Mandatory:</strong> {{ $question->is_mandatory ? 'Yes' : 'No' }}</p>
            <p><strong>Order:</strong> {{ $question->order }}</p>
            <a href="{{ route('questions.index') }}" class="btn btn-primary">Back to List</a>
        </div>
    </div>
</div>
@endsection
