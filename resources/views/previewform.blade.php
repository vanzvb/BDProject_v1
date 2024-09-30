@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Preview Questionnaire') }}</div>
                    <div class="card-body">
                        <div class="card mb-3" id="questionnaireHeader">
                            <div class="card-header">
                                <h5 class="mb-0">Yes or No Questionnaire</h5>
                            </div>
                            <div class="card-body">
                                <p class="text-muted">
                                    Your answers will be cleared if you are not eligible to donate.
                                </p>
                            </div>
                        </div>

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
                                    <div class="form-group">
                                        <label for="question_{{ $question->id }}">{{ $question->question_text }}</label>
                                        @if ($question->type == 'text')
                                            <input type="text" name="question_{{ $question->id }}"
                                                id="question_{{ $question->id }}" class="form-control" disabled>
                                        @elseif($question->type == 'textarea')
                                            <textarea name="question_{{ $question->id }}" id="question_{{ $question->id }}" class="form-control" disabled></textarea>
                                        @elseif($question->type == 'select')
                                            <select name="question_{{ $question->id }}" id="question_{{ $question->id }}"
                                                class="form-control" disabled>
                                                <option value="">-- Select --</option>
                                            </select>
                                        @elseif($question->type == 'checkbox')
                                            <input type="checkbox" name="question_{{ $question->id }}"
                                                id="question_{{ $question->id }}" disabled>
                                        @elseif($question->type == 'radio')
                                            <div>
                                                <input type="radio" name="question_{{ $question->id }}" value="yes"
                                                    disabled> Yes
                                                <input type="radio" name="question_{{ $question->id }}" value="no"
                                                    disabled> No
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
                                        disabled>
                                    <label class="form-check-label" for="confirmation">
                                        <p> “Nagpapatunay na akong ang taong tinutukoy at ang lahat ng nakasulat dito ay
                                            nabasa
                                            at naintindihan ko ng lubusan. Alam ko ang mga panganib at kahihinatnan habang
                                            at
                                            pagkatapos ng aking donasyon dahil ito ay naipaliwanag sa akin at naunawaan kong
                                            mabuti.” <br>
                                            “Pagkatapos masagutan ng buong katapatan ang mga tanong ako ay kusa at buong
                                            loob na
                                            magbibigay ng dugo sa <em>PHO-Donor Management Area</em>. Naiintindihan ko na
                                            ang
                                            aking dugo ay susuriin ng mabuti upang malaman ang <em>Blood Type</em>,
                                            <em>Hemoglobin</em> at kung may sakit tulad ng <em>Malaria</em>,
                                            <em>Syphilis</em>,
                                            <em>Hepatitis B</em>, <em>Hepatitis C</em> at <em>HIV</em>, at walang posyal na
                                            resulta na ibibigay sakin. Kung malamang positibo ako sa mga sakit na tinukoy,
                                            pumapayag akong isumite ang aking dugo sa <em>Research Institute for Tropical
                                                Medicine</em> upang makumpirma. Kung makukumpirma na ako ay may sakit, ako
                                            ay
                                            pumapayag na i-refer sa tamang institusyon para sa <em>counseling</em> at
                                            <em>pangangalaga</em>. Aking pinapatunayan na ako ay nasa tamang pag-iisip at
                                            sinagutan ng tapat ang mga katanungan.”
                                        </p>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-3">
                                <button type="button" class="btn btn-primary w-100" id="backButton">
                                    {{ __('Back to Form') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('backButton').addEventListener('click', function() {
            window.history.back();
        });
    </script>
@endsection
