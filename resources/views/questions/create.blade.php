{{-- resources/views/questions/create.blade.php --}}
@extends('layouts.adminlte')

@section('content')
<div class="container">
    <h1>Create Question</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('questions.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="question_text">Question Text</label>
            <textarea name="question_text" id="question_text" class="form-control" required>{{ old('question_text') }}</textarea>
            @error('question_text')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        

        <div class="form-group">
            <label for="category">Category</label>
            <input type="text" name="category" id="category" class="form-control" value="{{ old('category') }}">
            @error('category')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="type">Type</label>
            <select name="type" id="type" class="form-control" required>
                {{-- <option value="">Select a type</option> --}}
                {{-- <option value="text" {{ old('type') == 'text' ? 'selected' : '' }}>Text</option>
                <option value="checkbox" {{ old('type') == 'checkbox' ? 'selected' : '' }}>Checkbox</option> --}}
                <option value="radio" {{ old('type') == 'radio' ? 'selected' : '' }}>Radio</option>
                {{-- <option value="textarea" {{ old('type') == 'textarea' ? 'selected' : '' }}>Textarea</option> --}}
            </select>
            @error('type')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="is_mandatory">Mandatory</label>
            <input type="checkbox" name="is_mandatory" id="is_mandatory" value="1" {{ old('is_mandatory') ? 'checked' : '' }}>
            @error('is_mandatory')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="order">Order</label>
            <input type="number" name="order" id="order" class="form-control" value="{{ old('order') }}">
            @error('order')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- New followup_question_text field --}}
        <div class="form-group">
            <label for="followup_question_text">Instructional Text (Optional)</label>
            <textarea name="followup_question_text" id="followup_question_text" class="form-control">{{ old('followup_question_text') }}</textarea>
            @error('followup_question_text')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('questions.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
