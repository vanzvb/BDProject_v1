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

             

                <div class="card mt-4 d-none" id="questionnaireCard">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div>
                            <strong>Yes or No Questionnaire</strong><br>
                            
                            Your answers will be cleared if you are not eligible to donate.
                        </div>
                        <button type="button" class="btn btn-link" id="changeEventButton">{{ __('Change Event') }}</button>
                    </div>

                    <div class="card-body">
                        <!-- Initial Instruction for the First Few Questions -->
                        <div class="card-header d-flex">
                            {{ __('Ikaw ba ay: ') }}
                        </div>
                        <form method="POST" action="{{ route('register') }}" id="questionnaireForm">
                            @csrf

                            @php
                                $questions = [
                                    '1. Nasa mabuting pangangatawan at kalusugan ngayon?' => 'question1',
                                    '2. Nasa pangangalaga ng anumang gamot / Umiinom ng gamot araw-araw?' =>
                                        'question2',
                                    '3. Nakatanggap ng kahit anong bakuna?' => 'question3',
                                    '4. Sa nakalipas na tatlong araw, uminom kaba ng aspirin o kahit anong gamut na kauri nito?' =>
                                        'question4',
                                    '5. Nakapagbigay o nakapag-donate ng dugo?' => 'question5', // Fifth question with a new instruction
                                    '6. Nasalinan ng dugo?' => 'question6', // Sixth question with a new instruction
                                    '7. Na-operahan o nag pa-bunot ng ngipin?' => 'question7',
                                    '8. Nagpalagay ng tattoo, nagpa-butas ng tainga, nagpa-acupuncture, naturukan ng karayom ng hindi sinasadya, o nadikit sa dugo ng ibang tao?' =>
                                        'question8',
                                    '9. Nagkaroon ng karanasan ng makipagtalik sa kapwa mo kauri (lalaki sa lalaki, o babae sa babae), at sa taong naturukan ng gamot na walang pahintulot ng doktor?' =>
                                        'question9',
                                    '10. Nakipagtalik sa kahit kanina, kapalit ng pera o kahit anong bagay?' =>
                                        'question10',
                                    '11. Nakipagtalik sa taong nanggaling sa ibang bansa?' => 'question11',
                                    '12. Nakaranas ng kaswal na pakikipagtalik o one-night stand?' => 'question12',
                                    '13. May kasama sa bahay o may taong nakahalubilo na may sakit sa atay o Hepatitis?' =>
                                        'question13',
                                    '14. Nakulong na?' => 'question14',
                                    '15. May kamag-anak na may Creutzfeldt-Jakob (Mad Cow) disease?' => 'question15',
                                    '16. Nanirahan sa ibang lugar bukod sa tinitirahan mo ngayon?' => 'question16', // 16th question with a new instruction
                                    '17. Nanirahan sa ibang bansa?' => 'question17',
                                    '18. Naturukan na ang gamit ay karayom para sa gamot tulad steroid o kahit anong gamot na walang pahintulot ng doktor?' =>
                                        'question18',
                                    '19. Nasalinan ng kahit na anong clotting factor concentrates?' => 'question19',
                                    '20. Nagpositibo sa eksaminasyon para sa mga sakit na HIV/AIDS, Syphilis o Malaria?' =>
                                        'question20',
                                    '21. Nagkaroon ng Hepatitis?' => 'question21',
                                    '22. Nagkaroon ng Malaria?' => 'question22',
                                    '23. Nasabihan na may sakit o pinainom ng gamot para sa genital wart, Syphilis, Gonorrhea, o kahit anong Sexually Transmissible Infections?' =>
                                        'question23',
                                    '24. Mayroong sakit anong uri ng kanser tulad ng Leukemia?' => 'question24',
                                    '25. Mayroong problema o sakit sa puso at baga?' => 'question25',
                                    '26. Nakaranas ng malubhang pagdurugo o kahit anong sakit sa dugo?' => 'question26',
                                    '27. Ikaw ba ay magbibigay ng dugo dahil gusto mong masuri sa HIV o AIDS virus?' =>
                                        'question27',
                                    '28. Sa nakalipas na dalawampu’t walong araw (28 days), ikaw ba ay lumabas ng ating bansa?' =>
                                        'question28',
                                    '29. Sa nakalipas na dalawampu’t walong araw (28 days), ikaw ba ay nagkaroon ng close contact (nanirahan kasama sa bahay, ka-trabaho, kasamang mamasyal, o nag-alaga) sa pasyenteng nag-positibo sa COVID-19 o sa taong naggaling sa bansang may COVID-19 Local Transmission?' =>
                                        'question29',
                                    '30. Ikaw ba ay nagkaroon ng close contact sa taong may simtomas na nanikip ang dibdib, at nahirapang huminga?' =>
                                        'question30',
                                    '31. Alam mo ba na kung meron kang AIDS/Hepatitis virus maibibigay mo ito sa iba kahit wala ka nang nararamdaman o negatibo parin sa AIDS/Hepatitis virus?' =>
                                        'question31',
                                    '32. Sa kasalukuyan, ikaw ba ay may karamdaman, pangangati (allergy), nakakawalang sakit, sipon, ubo o trangkaso, pananakit ng lalamunan?' =>
                                        'question32',
                                    '33. Buntis ka ba ngayon?' => 'question33',
                                ];
                            @endphp

                            @foreach ($questions as $text => $name)
                                <!-- Add a special instruction before the 5th question -->
                                @if ($loop->index == 4)
                                    <!-- 6th question is at index 5 -->
                                    <div class="card-header d-flex">
                                        {{ __('Sa nakaraang tatlong buwan, ikaw ba ay:') }}
                                    </div>
                                @endif

                                <!-- Add a special instruction before the 6th question -->
                                @if ($loop->index == 5)
                                    <!-- 16th question is at index 15 -->
                                    <div class="card-header d-flex">
                                        {{ __('Sa nakaraang labindalawang buwan, ikaw ba ay:') }}
                                    </div>
                                @endif

                                <!-- Add a special instruction before the 16th question -->
                                @if ($loop->index == 15)
                                    <!-- 33rd question is at index 32 -->
                                    <div class="card-header d-flex">
                                        {{ __('Ikaw ba ay:') }}
                                    </div>
                                @endif

                                <!-- Add a special instruction before the 33rd question -->
                                @if ($loop->index == 32)
                                    <!-- 33rd question is at index 32 -->
                                    <div class="card-header d-flex">
                                        {{ __('FOR FEMALE DONORS ONLY') }}
                                    </div>
                                @endif

                                <div class="card mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ __($text) }}</h5>
                                        <div class="d-flex">
                                            <div class="form-check me-3">
                                                <input class="form-check-input" type="radio" name="{{ $name }}"
                                                    id="{{ $name }}_yes" value="yes" required>
                                                <label class="form-check-label"
                                                    for="{{ $name }}_yes">{{ __('Yes') }}</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="{{ $name }}"
                                                    id="{{ $name }}_no" value="no" required>
                                                <label class="form-check-label"
                                                    for="{{ $name }}_no">{{ __('No') }}</label>
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
                                        <input class="form-check-input" type="checkbox" id="confirmation"
                                            name="confirmation" required>
                                        <label class="form-check-label" for="confirmation">
                                            <p>
                                                “Nagpapatunay na akong ang taong tinutukoy at ang lahat ng nakasulat dito ay nabasa at naintindihan ko ng lubusan. Alam ko ang mga panganib at kahihinatnan habang at pagkatapos ng aking donasyon dahil ito ay naipaliwanag sa akin at naunawaan kong mabuti.” <br>
                                                “Pagkatapos masagutan ng buong katapatan ang mga tanong ako ay kusa at buong loob na magbibigay ng dugo sa <em>PHO-Donor Management Area</em>. Naiintindihan ko na ang aking dugo ay susuriin ng mabuti upang malaman ang <em>Blood Type</em>, <em>Hemoglobin</em> at kung may sakit tulad ng <em>Malaria</em>, <em>Syphilis</em>, <em>Hepatitis B</em>, <em>Hepatitis C</em> at <em>HIV</em>, at walang posyal na resulta na ibibigay sakin. Kung malamang positibo ako sa mga sakit na tinukoy, pumapayag akong isumite ang aking dugo sa <em>Research Institute for Tropical Medicine</em> upang makumpirma. Kung makukumpirma na ako ay may sakit, ako ay pumapayag na i-refer sa tamang institusyon para sa <em>counseling</em> at <em>pangangalaga</em>. Aking pinapatunayan na ako ay nasa tamang pag-iisip at sinagutan ng tapat ang mga katanungan.”
                                            </p>
                                            
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
            if (confirm('Your answers will be cleared when you change the event. Proceed?')) {
                // Reset the form
                document.getElementById('questionnaireForm').reset();
                document.getElementById('selected_event_id').value = '';

                // Show event selection and hide questionnaire card
                document.getElementById('event').removeAttribute('disabled');
                document.getElementById('questionnaireCard').classList.add('d-none');
                document.getElementById('proceedButton').classList.remove('d-none');
                document.getElementById('changeEventButton').classList.add('d-none');
            }
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

            var cooldownTimestamp = localStorage.getItem('cooldownTimestamp');
            var now = new Date().getTime();

            if (!allAnswersAreYes) {
                // Set cooldown if not eligible
                if (!cooldownTimestamp || now - cooldownTimestamp >= 10 * 1000) { // 10 seconds for testing
                    // User is not eligible, apply cooldown
                    alert('You are not eligible to proceed.');
                    localStorage.setItem('cooldownTimestamp', now); // Set cooldown timestamp
                    document.getElementById('questionnaireForm').reset();
                    location.reload(); // Reload the page to show the cooldown message
                } 
            } else {
                // If confirmed, proceed to registration form with event ID
                var eventID = document.getElementById('selected_event_id').value;
                var registrationUrl = "{{ route('register') }}";
                window.location.href = registrationUrl + "?event_id=" + encodeURIComponent(eventID);
            }
        });
    </script>
@endsection
