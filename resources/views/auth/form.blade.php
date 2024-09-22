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
                            <p class="text-muted">
                                Your answers will be cleared if you are not eligible to donate.
                            </p>
                            <button type="button" class="btn btn-outline-primary"
                                id="changeEventButton">{{ __('Change Event') }}</button>
                        </div>
                    </div>

                    @csrf

                    @foreach ($questions as $question)
                        @if ($question->followup_question_text)
                            <p><strong>{{ $question->followup_question_text }}</strong></p>
                        @endif

                        <div class="card mb-3">
                            <div class="card-header">
                                <strong>Question {{ $question->order }}:</strong>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
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
                                        at naintindihan ko ng lubusan. Alam ko ang mga panganib at kahihinatnan habang at
                                        pagkatapos ng aking donasyon dahil ito ay naipaliwanag sa akin at naunawaan kong
                                        mabuti.”</p>
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
            // NEW YES OR NO CONDITION

            document.addEventListener('DOMContentLoaded', function() {
                const form = document.querySelector('form[action="{{ route('form.submit') }}"]');

                form.addEventListener('submit', function(event) {
                    const eligibilityQuestions = document.querySelectorAll('.eligibility-question');
                    let isEligible = true;

                    eligibilityQuestions.forEach(function(input) {
                        if (input.checked && input.value === 'no') {
                            isEligible = false;
                        }
                    });

                    if (!isEligible) {
                        event.preventDefault();
                        alert('You are not eligible to proceed. The form will be reset.');
                        form.reset();
                        document.getElementById('event').value = ""; // Reset event selection
                    } else {
                        event.preventDefault();
                        const selectedEventId = document.getElementById('selected_event_id')
                            .value; // Get the selected event ID
                        window.location.href =
                            `{{ route('register') }}?event_id=${selectedEventId}`; // Redirect to register with event ID
                    }
                });
            });





            // EVENT PROCEED CONDITIONS

            document.addEventListener('DOMContentLoaded', function() {
                const eventSelect = document.getElementById('event');
                const proceedButton = document.getElementById('proceedButton');
                const questionnaireHeader = document.getElementById('questionnaireHeader');
                const questionnaireForm = document.getElementById('questionnaireForm');

                // Function to update visibility of questionnaire header and form
                function updateQuestionnaireVisibility() {
                    if (eventSelect.value) {
                        questionnaireHeader.style.display = 'flex';
                    } else {
                        questionnaireHeader.style.display = 'none';
                        questionnaireForm.style.display = 'none'; // Also hide the form
                    }
                }

                // Proceed button click event
                document.getElementById('proceedButton').addEventListener('click', function() {
                    const eventSelect = document.getElementById('event');
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
                    // Clear the form and hide the questionnaire header and form
                    questionnaireForm.reset();
                    questionnaireForm.style.display = 'none';
                    questionnaireHeader.style.display = 'none';
                    eventSelect.value = ""; // Reset event selection
                    updateQuestionnaireVisibility(); // Update visibility
                });

                // Event listener to hide/show questionnaire based on event selection
                eventSelect.addEventListener('change', function() {
                    updateQuestionnaireVisibility(); // Update visibility on event change
                });
            });


            document.getElementById('changeEventButton').addEventListener('click', function() {
                if (confirm('Changing the event will reset the form. Do you want to proceed?')) {
                    // Clear the form and hide the questionnaire header and form
                    const questionnaireForm = document.getElementById('questionnaireForm');
                    questionnaireForm.reset();
                    questionnaireForm.style.display = 'none';
                    document.getElementById('questionnaireHeader').style.display = 'none';
                    document.getElementById('event').value = ""; // Reset event selection
                }
            });
        </script>
    @endsection
