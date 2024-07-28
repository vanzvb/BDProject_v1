@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Event Selection') }}</div>
                
                <div class="card-body">
                    <form id="eventForm">
                        <div class="row mb-3">
                            <label for="event" class="col-md-4 col-form-label text-md-end">{{ __('Select Event') }}</label>
                            <div class="col-md-6">
                                <select id="event" class="form-control" required>
                                    <option value="" disabled selected>Select an event</option>
                                    @foreach ($events as $event)
                                        @php
                                            $startDate = \Carbon\Carbon::parse($event->start_date)->format('F j, Y');
                                            $endDate = \Carbon\Carbon::parse($event->end_date)->format('F j, Y');
                                        @endphp
                                        <option value="{{ $event->id }}">
                                            {{ $event->name }} - Start Date: {{ $startDate }} - End Date: {{ $endDate }} - Detail: {{ $event->detail }}
                                        </option>
                                    @endforeach
                                </select>
               
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="button" class="btn btn-primary" id="proceedButton">{{ __('Proceed') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card mt-4 d-none" id="questionnaireCard">
                <div class="card-header d-flex justify-content-between align-items-center">
                    {{ __('Yes/No Questionnaire') }}
                    <button type="button" class="btn btn-link" id="changeEventButton">{{ __('Change Event') }}</button>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" id="questionnaireForm">
                        @csrf

                        @php
                            $questions = [
                                'Do you like coding?' => 'question1',
                                'Have you ever attended a coding bootcamp?' => 'question2',
                                'Do you work as a software developer?' => 'question3',
                                'Have you contributed to open source projects?' => 'question4'
                            ];
                        @endphp

                        @foreach ($questions as $text => $name)
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">{{ __($text) }}</h5>
                                    <div class="d-flex">
                                        <div class="form-check me-3">
                                            <input class="form-check-input" type="radio" name="{{ $name }}" id="{{ $name }}_yes" value="yes" required>
                                            <label class="form-check-label" for="{{ $name }}_yes">{{ __('Yes') }}</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="{{ $name }}" id="{{ $name }}_no" value="no" required>
                                            <label class="form-check-label" for="{{ $name }}_no">{{ __('No') }}</label>
                                        </div>
                                    </div>
                                    @error($name)
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        @endforeach

                        <!-- Hidden Input for Event ID -->
                        <input type="hidden" id="selected_event_id" name="selected_event_id">

                        <!-- Confirmation Statement -->
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="confirmation" name="confirmation" required>
                                    <label class="form-check-label" for="confirmation">
                                        I confirm that I understand the questions and that my answers are accurate.
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-3">
                                <button type="submit" class="btn btn-primary w-100" id="submitButton">{{ __('Submit') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('proceedButton').addEventListener('click', function() {
    var eventSelect = document.getElementById('event');
    if (eventSelect.value) {
        // Update hidden input with selected event ID
        document.getElementById('selected_event_id').value = eventSelect.value;

        // Show questionnaire card and handle UI changes
        document.getElementById('questionnaireCard').classList.remove('d-none');
        eventSelect.setAttribute('disabled', 'disabled');
        document.getElementById('proceedButton').classList.add('d-none');
        document.getElementById('changeEventButton').classList.remove('d-none');
    } else {
        alert('Please select an event before proceeding.');
    }
});

document.getElementById('changeEventButton').addEventListener('click', function() {
    var eventSelect = document.getElementById('event');
    eventSelect.removeAttribute('disabled');
    document.getElementById('questionnaireCard').classList.add('d-none');
    document.getElementById('proceedButton').classList.remove('d-none');
    document.getElementById('changeEventButton').classList.add('d-none');
});

document.getElementById('questionnaireForm').addEventListener('submit', function(event) {
    event.preventDefault();
    
    // Check if all questions are answered with 'Yes'
    var allAnswersAreYes = true;
    var questions = ['question1', 'question2', 'question3', 'question4'];

    questions.forEach(function(question) {
        var answer = document.querySelector('input[name="' + question + '"]:checked');
        if (!answer || answer.value !== 'yes') {
            allAnswersAreYes = false;
        }
    });

    if (allAnswersAreYes) {
        // If confirmed, proceed to registration form with event ID
        if (confirm('You will be redirected to the registration form. Do you want to proceed?')) {
            // Add event ID to the form submission
            var eventID = document.getElementById('selected_event_id').value;
            window.location.href = "{{ route('register') }}?event_id=" + encodeURIComponent(eventID);
        }
    } else {
        // Reset form and show alert
        // document.getElementById('questionnaireForm').reset();
        alert('You are not eligible to proceed.');
        location.reload();
    }
});
</script>
@endsection
