@extends('layouts.app')

@section('content')
    <style>
        /* Add this to your CSS file */
        .disabled {
            pointer-events: none;
            opacity: 0.5;
        }
    </style>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Event Selection') }}</div>
                    <div class="card-body">
                        <form id="eventForm">
                            <div class="row mb-3">
                                <label for="event"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Select Event') }}</label>
                                <div class="col-md-6">
                                    <select id="event" class="form-control" required>
                                        <option value="" disabled selected>Select an event</option>
                                        @foreach ($events as $event)
                                            @php
                                                $startDate = \Carbon\Carbon::parse($event->start_date)->format(
                                                    'F j, Y',
                                                );
                                                $endDate = \Carbon\Carbon::parse($event->end_date)->format('F j, Y');
                                            @endphp
                                            <option value="{{ $event->id }}">
                                                {{ $event->name }} - Start Date: {{ $startDate }} - End Date:
                                                {{ $endDate }} - Detail: {{ $event->detail }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="button" class="btn btn-primary"
                                        id="proceedButton">{{ __('Proceed') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <form action="{{ route('form.submit') }}" method="POST" id="questionnaireForm" style="display: none;">
                    <div class="card" id="questionnaireHeader" style="display: none;">
                        <div class="card-header">
                            <h5 class="mb-0">Yes or No Questionnaire</h5>
                        </div>
                        <div class="card-body">
                            <p class="text-muted">Your answers will be cleared if you are not eligible to donate.</p>
                            <button type="button" class="btn btn-outline-primary"
                                id="changeEventButton">{{ __('Change Event') }}</button>
                        </div>
                    </div>

                    @csrf

                    @foreach ($questions as $question)

                    
                        @if ($question->followup_question_text)
                            <div class="card mb-3">
                                <div class="card-body">
                                    <p class="card-text"><strong>{{ $question->followup_question_text }}</strong></p>
                                </div>
                            </div>
                        @endif

                        <div class="card mb-3">
                            <div class="card-header">
                                <strong>Question {{ $question->order }}:</strong>
                            </div>
                            <div class="card-body">
                                <div class="form-group question" data-order="{{ $question->order }}">
                                    <label for="question_{{ $question->id }}">{{ $question->question_text }}</label>
                                    @if ($question->type == 'text')
                                        <input type="text" name="question_{{ $question->id }}"
                                            id="question_{{ $question->id }}" class="form-control"
                                            {{ $question->is_mandatory ? 'required' : '' }}>
                                    @elseif($question->type == 'textarea')
                                        <textarea name="question_{{ $question->id }}" id="question_{{ $question->id }}" class="form-control"
                                            {{ $question->is_mandatory ? 'required' : '' }}></textarea>
                                    @elseif($question->type == 'select')
                                        <select name="question_{{ $question->id }}" id="question_{{ $question->id }}"
                                            class="form-control" {{ $question->is_mandatory ? 'required' : '' }}>
                                            <option value="">-- Select --</option>
                                            {{-- Add options here --}}
                                        </select>
                                    @elseif($question->type == 'checkbox')
                                        <input type="checkbox" name="question_{{ $question->id }}"
                                            id="question_{{ $question->id }}"
                                            {{ $question->is_mandatory ? 'required' : '' }}>
                                    @elseif($question->type == 'radio')
                                        <div>
                                            <input type="radio" name="question_{{ $question->id }}" value="yes"
                                                {{ $question->is_mandatory ? 'required' : '' }}
                                                class="eligibility-question"> Yes
                                            <input type="radio" name="question_{{ $question->id }}" value="no"
                                                {{ $question->is_mandatory ? 'required' : '' }}
                                                class="eligibility-question"> No
                                        </div>
                                    @endif

                                    @if (session('success'))
                                        <div class="alert alert-success">{{ session('success') }}</div>
                                    @endif

                                    @if (session('error'))
                                        <div class="alert alert-danger">{{ session('error') }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <!-- Confirmation Statement -->
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="confirmation" name="confirmation"
                                    required>
                                <label class="form-check-label" for="confirmation">
                                    <p>“Nagpapatunay na akong ang taong tinutukoy at ang lahat ng nakasulat dito ay nabasa
                                        at naintindihan ko ng lubusan...</p>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Hidden Input for Event ID -->
                    <input type="hidden" id="selected_event_id" name="selected_event_id">

                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-3">
                            <button type="submit" class="btn btn-primary w-100"
                                id="submitButton">{{ __('Submit') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const eventSelect = document.getElementById('event');
                const proceedButton = document.getElementById('proceedButton');
                const questionnaireHeader = document.getElementById('questionnaireHeader');
                const questionnaireForm = document.getElementById('questionnaireForm');

                // Proceed button click event
                proceedButton.addEventListener('click', function() {
                    if (eventSelect.value) {
                        document.getElementById('selected_event_id').value = eventSelect
                            .value; // Set the hidden input
                        questionnaireHeader.style.display = 'block'; // Show the header
                        questionnaireForm.style.display = 'block'; // Show the form
                    } else {
                        alert('Please select an event before proceeding.');
                    }
                });

                // Change event button click event
                document.getElementById('changeEventButton').addEventListener('click', function() {
                    questionnaireForm.reset();
                    questionnaireForm.style.display = 'none';
                    questionnaireHeader.style.display = 'none';
                    eventSelect.value = ""; // Reset event selection
                });

                // Form submission logic
                questionnaireForm.addEventListener('submit', function(event) {
                    event.preventDefault(); // Prevent default form submission

                    let isEligible = true; // Start assuming the user is eligible

                    const questions = document.querySelectorAll('.question'); // Get all questions

                    questions.forEach(question => {
                        const order = question.getAttribute('data-order'); // Get the question's order
                        const selectedOption = question.querySelector(
                            'input[type="radio"]:checked'); // Get selected radio option

                        // Eligibility checks
                        if (order == 1 && selectedOption && selectedOption.value === 'no') {
                            isEligible = false; // Not eligible
                        }
                        if (order == 5 && selectedOption && selectedOption.value === 'yes') {
                            isEligible = false; // Not eligible
                        }
                    });

                    // If not eligible, alert the user and reset the form
                    if (!isEligible) {
                        alert(
                            'You are not eligible to donate. The form will reset your answers.'
                            ); // Alert message
                        questionnaireForm.reset(); // Reset the form
                    } else {
                        // If eligible, redirect to the register page
                        const selectedEventId = document.getElementById('selected_event_id')
                            .value; // Get the selected event ID
                        window.location.href =
                            `{{ route('register') }}?event_id=${selectedEventId}`; // Redirect to register with event ID
                    }
                });
            });
        </script>
    @endsection
