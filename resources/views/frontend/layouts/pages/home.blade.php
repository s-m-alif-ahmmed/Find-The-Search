@extends('frontend.app')

@section('title', 'The Search')

@section('content')

    <!-- ===== :: Main Menu ==== :: -->
    @include('frontend.partials.main-menu')
    <!-- ===== :: Main Menu ==== :: -->

    <!-- =============================================== Banner Start Hare ================================== -->
    <section class="banner--wrapper">
        <div class="container">
            <div class="banner--heading">
                <h1 class="pageHeading">
                    Win against yourself <br />
                    Beat them
                </h1>

                @foreach($challenges->take(1) as $challenge)
                    <p class="subHeading">
                        Commit to consistency, reshape your body, and compete for a
                        <span> ${{ number_format($challenge->price_money) }}</span> prize.
                    </p>
                @endforeach

            </div>

            <div class="banner--btn">
                <a class="learn--moreBtn" href="{{ route('challenge') }}">Learn More</a>

                @if(Auth::check() && Auth::user()->challengeSubscribers)
                    <a class="register--Btn" href="{{ route('user.dashboard') }}">Go To Dashboard</a>
                @else
                    <a class="register--Btn" href="{{ route('register') }}">Register Now</a>
                @endif
            </div>
        </div>
    </section>
    <!-- =============================================== Banner End Hare ================================== -->

    <!-- =============================================== timeSection Start Hare ================================== -->
    <section
        data-aos="fade-up"
        data-aos-easing="linear"
        data-aos-duration="2500"
        class="timeSection--wrapper"
    >
        <div class="container">
            <div
                data-aos="fade-right"
                data-aos-offset="300"
                data-aos-easing="linear"
            >
                @foreach($challenges->take(1) as $challenge)
                    <div class="timeSection--heading">
                        <h1 class="pageHeading two">
                            This time you are not alone in this
                        </h1>

                        <p class="timeSectionSub two">
                            Take the first step toward a stronger, healthier you. Our
                            <span> @php
                                    $startDate = \Carbon\Carbon::parse($challenge->start_date);
                                    $endDate = \Carbon\Carbon::parse($challenge->end_date);

                                    // Calculate the difference in months
                                    $diffInMonths = round($startDate->diffInMonths($endDate));
                                    // Calculate the difference in days
                                    $diffInDays = round($startDate->diffInDays($endDate));
                                @endphp

                                @if ($diffInMonths >= 1)
                                    {{ $diffInMonths }} {{ $diffInMonths == 1 ? '-Month' : '-Months' }}
                                @else
                                    {{ $diffInDays }} -Days
                                @endif </span> Transformation Challenge isn’t just about
                            fitness; it’s about building confidence, resilience, and
                            creating a lifestyle that lasts
                        </p>
                    </div>

                    <div class="duration--Time--wrapper">
                        <div class="duration--Time--item">
                            <h6 class="duration--time--headerss--italic">Duration</h6>
                            <div class="duration--icon--wrapper">
                                <div class="duration--icon">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="24"
                                        height="24"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                    >
                                        <path
                                            d="M3.51446 11.5C3.76367 7.20375 7.20375 3.76367 11.5 3.51446V4.5164C7.75625 4.76282 4.76282 7.75625 4.5164 11.5H3.51446ZM11.5 20.4855C7.20375 20.2363 3.76367 16.7963 3.51446 12.5H4.5164C4.76282 16.2438 7.75625 19.2372 11.5 19.4836V20.4855ZM12.5 20.4855V19.4836C16.2438 19.2372 19.2372 16.2438 19.4836 12.5H20.4855C20.2363 16.7963 16.7963 20.2363 12.5 20.4855ZM20.4855 11.5H19.4836C19.3852 10.0045 18.8484 8.62876 18.0005 7.5C18.2218 7.49992 18.443 7.45121 18.6467 7.35387L18.7071 7.41422L18.9773 7.14404C19.8479 8.39263 20.3919 9.88589 20.4855 11.5ZM16.5 5.99947C15.3713 5.15162 13.9955 4.61484 12.5 4.5164V3.51446C14.1141 3.60809 15.6074 4.15211 16.856 5.02272L16.5858 5.29289L16.6462 5.35325C16.5488 5.55703 16.5001 5.77825 16.5 5.99947ZM11.5 11.5V8.5H12.5V11.5H11.5ZM14.5 1.5H9.5V0.5H14.5V1.5Z"
                                            fill="white"
                                            stroke="white"
                                        />
                                    </svg>
                                </div>
                                <span class="duration--text">
                                @php
                                    $startDate = \Carbon\Carbon::parse($challenge->start_date);
                                    $endDate = \Carbon\Carbon::parse($challenge->end_date);

                                    // Calculate the difference in months
                                    $diffInMonths = round($startDate->diffInMonths($endDate));
                                    // Calculate the difference in days
                                    $diffInDays = round($startDate->diffInDays($endDate));
                                @endphp

                                    @if ($diffInMonths >= 1)
                                        {{ $diffInMonths }} {{ $diffInMonths == 1 ? 'Month' : 'Months' }}
                                    @else
                                        {{ $diffInDays }} Days
                                    @endif
                            </span>

                            </div>
                        </div>

                        <div class="duration--Time--item">
                            <h6 class="duration--time--headerss--italic">Entry Fee</h6>
                            <div class="duration--icon--wrapper">
                                <div class="duration--icon">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="24"
                                        height="24"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                    >
                                        <path
                                            d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12Z"
                                            stroke="#E2DDDB"
                                            stroke-width="1.5"
                                        />
                                        <path
                                            d="M14.7141 10.0611C14.615 9.29844 13.7393 8.06622 12.1647 8.06619C10.3351 8.06616 9.56526 9.07946 9.40905 9.58611C9.16535 10.2638 9.21409 11.6571 11.3586 11.809C14.0393 11.999 15.1132 12.3154 14.9766 13.956C14.8399 15.5965 13.3456 15.951 12.1647 15.9129C10.9837 15.875 9.05154 15.3325 8.97656 13.8733M11.9773 6.99805V8.06982M11.9773 15.9031V16.998"
                                            stroke="#E2DDDB"
                                            stroke-width="1.5"
                                            stroke-linecap="round"
                                        />
                                    </svg>
                                </div>
                                <span class="duration--text">${{ $challenge->entry_fee ?? 'N/A' }}</span>
                            </div>
                        </div>

                        <div class="duration--Time--item">
                            <h6 class="duration--time--headerss--italic">Prize</h6>
                            <div class="duration--icon--wrapper">
                                <div class="duration--icon">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="24"
                                        height="24"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                    >
                                        <path
                                            d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12Z"
                                            stroke="#E2DDDB"
                                            stroke-width="1.5"
                                        />
                                        <path
                                            d="M14.7141 10.0611C14.615 9.29844 13.7393 8.06622 12.1647 8.06619C10.3351 8.06616 9.56526 9.07946 9.40905 9.58611C9.16535 10.2638 9.21409 11.6571 11.3586 11.809C14.0393 11.999 15.1132 12.3154 14.9766 13.956C14.8399 15.5965 13.3456 15.951 12.1647 15.9129C10.9837 15.875 9.05154 15.3325 8.97656 13.8733M11.9773 6.99805V8.06982M11.9773 15.9031V16.998"
                                            stroke="#E2DDDB"
                                            stroke-width="1.5"
                                            stroke-linecap="round"
                                        />
                                    </svg>
                                </div>
                                <span class="duration--text">{{ number_format($challenge->price_money) ?? 'N/A' }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="count--down--time--wrapper">
                        <div class="count--down--time--item--itemsss">
                            <div class="count--down--time--item">
                                <h3 id="days" class="duration--day--text--italic">0</h3>
                                <span class="duration--time--headerss--italic">Days</span>
                            </div>
                        </div>
                        <div class="count--down--time--item--itemsss">
                            <div class="count--down--time--item">
                                <h3 id="hours" class="duration--day--text--italic">0</h3>
                                <span class="duration--time--headerss--italic">Horus</span>
                            </div>
                        </div>
                        <div class="count--down--time--item--itemsss">
                            <div class="count--down--time--item">
                                <h3 id="min" class="duration--day--text--italic">0</h3>
                                <span class="duration--time--headerss--italic">Min</span>
                            </div>
                        </div>
                    </div>

                    <script>
                            <?php if (isset($challenge)) : ?>
                        // Pass the challenge's end date from the server to JavaScript
                        const challengeStartDate = "{{ $challenge->start_date }}";

                        function StartCountDown() {
                            const targetDate = new Date(challengeStartDate); // Set the target date from the challenge's end date

                            function UpdateCountDown() {
                                const currentDate = new Date();
                                const totalSeconds = (targetDate - currentDate) / 1000;

                                // If the countdown has finished, stop updating and set values to 0
                                if (totalSeconds <= 0) {
                                    clearInterval(countdownInterval); // Stop the countdown
                                    document.getElementById('days').textContent = 0;
                                    document.getElementById('hours').textContent = 0;
                                    document.getElementById('min').textContent = 0;
                                    return; // Stop further execution of the function
                                }

                                const days = Math.floor(totalSeconds / 86400);
                                const hours = Math.floor((totalSeconds % 86400) / 3600);
                                const minutes = Math.floor((totalSeconds % 3600) / 60);

                                // Update the countdown timer on the page
                                document.getElementById('days').textContent = days;
                                document.getElementById('hours').textContent = hours;
                                document.getElementById('min').textContent = minutes;

                            }

                            // Initial countdown update
                            UpdateCountDown();

                            // Update countdown every second
                            const countdownInterval = setInterval(UpdateCountDown, 1000);
                        }

                        // Start the countdown
                        StartCountDown();
                        <?php else : ?>
                        clearInterval(countdownInterval); // Stop the countdown
                        document.getElementById('days').textContent = 0;
                        document.getElementById('hours').textContent = 0;
                        document.getElementById('min').textContent = 0;
                        return; // Stop further execution of the function
                        <?php endif; ?>
                    </script>

                @endforeach

                <div class="learn--more--btn">
                    <a class="learn--moreBtn" href="{{ route('challenge') }}">Learn More </a>
                </div>
            </div>
        </div>

        <div class="timeSection--freme--upper">
            <img src="{{ asset('/frontend/assets/images/timeSectionFreame.png') }}" alt="not found" />
        </div>
    </section>
    <!-- =============================================== timeSection End Hare ================================== -->

    <!-- =============================================== Member With Benifits Start Hare ================================ -->
    <section class="memberWith--benifits--wrapper">
        <div class="container">
            <div class="member--with--benifits--main">
                <div class="member--with--benifits--item1">
                    <h3 class="pageHeading">MEMBERSHIP</h3>
                    <h4 class="pageHeading">with</h4>
                </div>
                <div class="member--with--benifits--img">
                    <img src="{{ asset('/frontend/assets/images/StarIcon.png') }}" alt="not found" />
                </div>
                <div class="member--with--benifits--item2">
                    <h3 class="pageHeading">best benefits</h3>
                </div>
            </div>
        </div>
    </section>
    <!-- =============================================== Member With Benifits End Hare ================================== -->

    <!-- =============================================== Studios and luxury Start Hare ================================== -->
    <section class="Studios--luxury--wrapper">
        <div class="container">
            <div class="studio--luxury--main--wrapper">
                <div class="studio--luxury--left--item">
                    <div class="studio--luxury--left--item--img">
                        <img
                            src="{{ asset('/frontend/assets/images/StudioLuxeryItem.png') }}"
                            alt="not found"
                        />
                    </div>
                    <div class="studio--luxury--left--item--text">
                        <div class="studio--luxury--left--item--Innertext">
                            <h4 class="StudioAndLuxey--Texts">
                                Studios and luxury amenities
                            </h4>
                        </div>
                    </div>
                </div>

                <div class="studio--luxury--right--item">
                    <div class="studio--luxury--left--item--img--two">
                        <img
                            src="{{ asset('/frontend/assets/images/studioLexuryItem2.png') }}"
                            alt="not found"
                        />
                    </div>
                    <div class="studio--luxury--left--item--text">
                        <div class="studio--luxury--left--item--Innertext">
                            <h4 class="StudioAndLuxey--Texts">
                                Studios and luxury amenities
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- =============================================== Studios and luxury End Hare ================================== -->

    <!-- =============================================== Join Now Start Hare ================================ -->
    <section class="join--now--wrapper">
        <div class="container">
            <div class="join--now--main--wrapper">
                <div class="join--now--main--left">
                    <div class="studio--luxury--left--item--text">
                        <div class="studio--luxury--left--item--Innertext">
                            <h4 class="StudioAndLuxey--Texts">
                                Studios and luxury amenities
                            </h4>
                        </div>
                    </div>
                </div>

                <div class="join--now--main--right">
                    <img src="{{ asset('/frontend/assets/images/joinNowBanner.png') }}" alt="not found" />

                    <div class="join--now--wrapperss">
                        <span class="effortable--texts">join now [+]</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- =============================================== Join Now End Hare ================================== -->

    <!-- =============================================== Effort Able Start Hare ================================ -->
    <section class="effort--able--wrapper">
        <div class="container">
            @foreach($challenges->take(1) as $challenge)
                <div class="affordable--heading">
                    <h2 class="pageHeading">
                        Affordable Entry, Life- <br />
                        Changing Results
                    </h2>
                    <p class="timeSectionSub">
                        Get ready to unlock your potential. For just <span> ${{ $challenge->entry_fee ?? 0 }}</span>,
                        you’ll gain entry to a @php
                            $startDate = \Carbon\Carbon::parse($challenge->start_date);
                            $endDate = \Carbon\Carbon::parse($challenge->end_date);

                            // Calculate the difference in months
                            $diffInMonths = round($startDate->diffInMonths($endDate));
                            // Calculate the difference in days
                            $diffInDays = round($startDate->diffInDays($endDate));
                        @endphp

                        @if ($diffInMonths >= 1)
                            {{ $diffInMonths }} {{ $diffInMonths == 1 ? 'Month' : 'Months' }}
                        @else
                            {{ $diffInDays }} Days
                        @endif journey designed to help you <br />
                        reach your fitness goals and build lasting habits
                    </p>
                </div>

                <div class="challangeName--wrapper">
                    <div class="challangeName--item1">
                        <h3 class="challangeTexts">{{ $challenge->name }}</h3>

                        <h4 class="duration--day--text--italic">
                            {{ $challenge->entry_fee ?? 'N/A' }} <span>/For the tournament time</span>
                        </h4>
                    </div>

                    <div class="challangeName--item2">
                        <div class="challangeName--itemInner">
                            @foreach($challenge->challengeRules as $rule)
                                <div class="challangeName--Inner--item">
                                    <div class="challangeName--Inner--svg">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="18"
                                            height="14"
                                            viewBox="0 0 18 14"
                                            fill="none"
                                        >
                                            <g clip-path="url(#clip0_41_273)">
                                                <path
                                                    d="M17.0584 0.645561C16.2146 -0.215187 14.847 -0.215187 14.0032 0.645561L6.36489 8.43622L4.45505 6.48829C3.61123 5.62754 2.24366 5.62754 1.39983 6.48829C0.556012 7.34904 0.556012 8.74413 1.39983 9.60435L4.83701 13.1103C5.68083 13.971 7.0484 13.971 7.89222 13.1103L17.0584 3.76214C17.9023 2.90139 17.9023 1.50631 17.0584 0.645561Z"
                                                    fill="#C39D42"
                                                />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_41_273">
                                                    <rect
                                                        width="16.9243"
                                                        height="13.7558"
                                                        fill="white"
                                                        transform="translate(0.766968)"
                                                    />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </div>
                                    <h4 class="challangeName--Inner--texts">
                                        {{ $rule->rule }}
                                    </h4>
                                </div>
                            @endforeach

                        </div>
                    </div>

                    @if(Auth::check())
                        @php
                            $user = \Illuminate\Support\Facades\Auth::user();
                            $subscriber = \App\Models\ChallengeSubscriber::where('challenge_id', $challenge->id)->where('user_id', $user->id)->first();
                        @endphp
                        @if($subscriber)
                            <div class="challangeName--item3">
                                <a class="register--Btn" href="{{ route('user.dashboard') }}">Go to Dashboard</a>
                            </div>
                        @else
                            <div class="challangeName--item3">
                                <form action="{{ route('stripe.checkout') }}" method="POST">
                                    @csrf

                                    <input type="hidden" name="challenge_id" value="{{ $challenge->id }}">

                                    <button type="submit" class="register--Btn">Purchase Join Ticket</button>
                                </form>
                            </div>
                        @endif
                    @else
                        <div class="challangeName--item3">
                            <a class="register--Btn" href="{{ route('register') }}">Purchase Join Ticket</a>
                        </div>
                    @endif

                </div>
            @endforeach
        </div>
    </section>
    <!-- =============================================== Effort Able End Hare ================================== -->

    <!-- ====================================== Frequently Asked Questions Start Hare ====================== -->
    <section class="frequently--asked--questions" id="faq">
        <div class="container">
            <div class="affordable--heading">
                <h2 class="pageHeading">
                    Frequently Asked <br />
                    Questions
                </h2>
            </div>

            <div class="faq--wrapper">
                <div class="accordion custom" id="accordionExample">
                    @foreach($faqs as $faq)
                        <div class="accordion-item custom">
                            <h2 class="accordion-header" id="heading-{{$faq->id}}">
                                <button
                                    class="accordion-button custom"
                                    type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapse-{{$faq->id}}"
                                    aria-expanded="false"
                                    aria-controls="collapse-{{$faq->id}}"
                                >
                                    {{ $faq->question }}
                                </button>
                            </h2>
                            <div
                                id="collapse-{{$faq->id}}"
                                class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}"
                                data-bs-parent="#accordionExample"
                            >
                                <div class="accordion-body">
                                    <h4 class="accordion--body--text">
                                        {{ $faq->answer }}
                                    </h4>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
    <!-- ====================================== Frequently Asked Questions End Hare ======================== -->

@endsection

@push('scripts')

@endpush
