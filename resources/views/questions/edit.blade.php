{{-- resources/views/questions/edit.blade.php --}}
@extends('layouts.adminlte')

@section('content')
<div class="container">
    <h1>Edit Question</h1>

    <form action="{{ route('questions.update', $question) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="question_text">Question Text</label>
            <input type="text" name="question_text" id="question_text" class="form-control" value="{{ old('question_text', $question->question_text) }}" required>
            @error('question_text')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="category">Category</label>
            <input type="text" name="category" id="category" class="form-control" value="{{ old('category', $question->category) }}">
        </div>

        <div class="form-group">
            <label for="type">Type</label>
            <select name="type" id="type" class="form-control" required>
                <option value="text" {{ $question->type == 'text' ? 'selected' : '' }}>Text</option>
                <option value="checkbox" {{ $question->type == 'checkbox' ? 'selected' : '' }}>Checkbox</option>
                <option value="radio" {{ $question->type == 'radio' ? 'selected' : '' }}>Radio</option>
                <option value="textarea" {{ $question->type == 'textarea' ? 'selected' : '' }}>Textarea</option>
            </select>
        </div>

        <div class="form-group">
            <label for="is_mandatory">Mandatory</label>
            <input type="checkbox" name="is_mandatory" id="is_mandatory" value="1" {{ old('is_mandatory', $question->is_mandatory) ? 'checked' : '' }}>
        </div>

        <div class="form-group">
            <label for="order">Order</label>
            <input type="number" name="order" id="order" class="form-control" value="{{ old('order', $question->order) }}">
        </div>

        {{-- Follow-up Question Text Field --}}
        <div class="form-group">
            <label for="followup_question_text">Instructional Text (Optional)</label>
            <textarea name="followup_question_text" id="followup_question_text" class="form-control">{{ old('followup_question_text', $question->followup_question_text) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('questions.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
