@extends('frontend.app')

@section('title', 'Package - The Search')

@section('content')

    <!-- ===== :: Main Menu ==== :: -->
    @include('frontend.partials.main-menu')
    <!-- ===== :: Main Menu ==== :: -->

    <!-- =============================================== Priceing page Start Hare ================================== -->
    <section class="sign--in--wrapper">
        <div class="sign--in--wrapper--main">
            <div class="pricing--main--wrapper">
                <div class="effort--able--wrapper">
                    <div class="container">
                        @foreach($all_challenges->take(1) as $challenge)
                            <div class="affordable--heading">
                                <h2 class="pageHeading">
                                    Affordable Entry, Life- <br />
                                    Changing Results
                                </h2>
                                <p class="timeSectionSub">
                                    Get ready to unlock your potential. For just
                                    <span class="yellowText"> ${{ $challenge->entry_fee }}</span>, you’ll gain entry to a
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

                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- =============================================== Priceing page end Hare ================================== -->

@endsection
