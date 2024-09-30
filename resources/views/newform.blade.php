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
        <h3>Selected Event: {{ $event->name }}{{ $event->id }}</h3>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Questionnaire') }}</div>
                    <div class="card-body">
                        <form action="{{ route('newform.create') }}" method="POST" id="questionnaireForm">
                            @csrf
                            <input type="hidden" name="event_id" value="{{ $event->id }}">
                            @foreach ($questions as $question)
                                @if ($question->followup_question_text)
                                    <div style="border: 1px solid #000; padding: 15px; margin-bottom: 15px;">
                                        <p style="font-size: 1.2em; font-weight: bold; margin: 0;">
                                            {{ $question->followup_question_text }}</p>
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
                                                <textarea name="question_{{ $question->id }}" id="question_{{ $question->id }}"
                                                          class="form-control"
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

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-3">
                                    <button type="submit" class="btn btn-primary w-100"
                                            id="submitButton">{{ __('Submit') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const questionnaireForm = document.getElementById('questionnaireForm');

                // Form submission logic
                questionnaireForm.addEventListener('submit', function(event) {
                    event.preventDefault(); // Prevent default form submission

                    let isEligible = true; // Start assuming the user is eligible

                    const questions = document.querySelectorAll('.question'); // Get all questions

                    questions.forEach(question => {
                        const order = question.getAttribute('data-order'); // Get the question's order
                        const selectedOption = question.querySelector('input[type="radio"]:checked'); // Get selected radio option

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
                        alert('You are not eligible to donate. The form will reset your answers.'); // Alert message
                        questionnaireForm.reset(); // Reset the form
                    } 
                    else {
                        // If eligible, redirect to the register page
                        // window.location.href = `{{ route('newform.create') }}`; // Redirect to register page
                        questionnaireForm.submit();
                    }
                });
            });
        </script>
    </div>
@endsection
