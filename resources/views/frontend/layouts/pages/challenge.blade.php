@extends('frontend.app')

@section('title', 'Challenge - The Search')

@section('content')

    <!-- ===== :: Main Menu ==== :: -->
    @include('frontend.partials.main-menu')
    <!-- ===== :: Main Menu ==== :: -->

    <!-- ========================== Banner Start Hare =========== -->
    <section class="Challange--banner--wrapper">
        <div class="container">
            <div class="banner--heading">
                <h1 class="pageHeading">
                    the game that Will change <br />
                    <span class="yellowText">your life.</span>
                </h1>

                <div class="subHeader--mainBox">
                    <p class="timeSectionSub">
                        This is the decision that could change your life. It will help you build new habits, meet new
                        people, learn more about yourself, and open the door to a completely different life. If you
                        hesitate to join, it might mean you're not ready for this game. You're not the kind of person
                        who will go far in it.
                    </p>
                </div>
            </div>

            @if(Auth::check() && Auth::user()->challengeSubscribers)
                <div class="banner--btn">
                    <a class="register--Btn" href="{{ route('user.dashboard') }}">Go to Dashboard</a>
                </div>
            @else
                <div class="banner--btn">
                    <a class="register--Btn" href="{{ route('register') }}">Register Now</a>
                </div>
            @endif
        </div>
    </section>
    <!-- ========================== Banner End Hare ============= -->

    <!-- ========================== For Beyound Start Hare ============= -->
    <section class="for--beyond--wrapper">
        <div class="container">
            <div class="far--beyound--inner">
                <div class="far--beyound--left">
                    <h3 class="far--beyound--text">Far beyond your limits </h3>
                </div>
                <div class="far--beyound--right">
                    <p class="timeSectionSub">
                        The challenge may seem overwhelming to many, but that is exactly its purpose: to push
                        you beyond your limits. It is designed to ensure that discipline and consistency will reward you
                        in the end. To be part of the top 1%, you have to make that extra effort of the 99%.
                    </p>
                </div>
            </div>

            <div class="far--beyound--banner">
                <div class="far--beyound--banner--inner">
                    <div class="far--beyound--banner--item--wrapper">
                        <div class="far--beyound--banner--item">
                            <div class="far--beyound--banner--item--svg">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="42"
                                    height="43"
                                    viewBox="0 0 42 43"
                                    fill="none"
                                >
                                    <path
                                        d="M12.7938 24.49C18.874 24.49 23.8029 19.561 23.8029 13.4809C23.8029 7.40069 18.874 2.47174 12.7938 2.47174C6.71362 2.47174 1.78467 7.40069 1.78467 13.4809C1.78467 19.561 6.71362 24.49 12.7938 24.49Z"
                                        stroke="#CDC2B1"
                                        stroke-width="2.44647"
                                    />
                                    <path
                                        d="M28.6959 24.49C34.7761 24.49 39.705 19.561 39.705 13.4809C39.705 7.40069 34.7761 2.47174 28.6959 2.47174C22.6157 2.47174 17.6868 7.40069 17.6868 13.4809C17.6868 19.561 22.6157 24.49 28.6959 24.49Z"
                                        stroke="#CDC2B1"
                                        stroke-width="2.44647"
                                    />
                                    <path
                                        d="M12.7938 40.392C18.874 40.392 23.8029 35.4631 23.8029 29.3829C23.8029 23.3027 18.874 18.3738 12.7938 18.3738C6.71362 18.3738 1.78467 23.3027 1.78467 29.3829C1.78467 35.4631 6.71362 40.392 12.7938 40.392Z"
                                        stroke="#CDC2B1"
                                        stroke-width="2.44647"
                                    />
                                    <path
                                        d="M28.6959 40.392C34.7761 40.392 39.705 35.4631 39.705 29.3829C39.705 23.3027 34.7761 18.3738 28.6959 18.3738C22.6157 18.3738 17.6868 23.3027 17.6868 29.3829C17.6868 35.4631 22.6157 40.392 28.6959 40.392Z"
                                        stroke="#CDC2B1"
                                        stroke-width="2.44647"
                                    />
                                </svg>
                            </div>
                            <h6 class="beyond--16pxText">DESIGNED STRATEGIES</h6>
                        </div>

                        <div class="far--beyound--banner--item">
                            <div class="far--beyound--banner--item--svg">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="42"
                                    height="42"
                                    viewBox="0 0 42 42"
                                    fill="none"
                                >
                                    <g clip-path="url(#clip0_64_278)">
                                        <path
                                            d="M29.6882 36.2553C32.8223 36.2553 35.363 33.7146 35.363 30.5805C35.363 27.4464 32.8223 24.9058 29.6882 24.9058C26.5541 24.9058 24.0134 27.4464 24.0134 30.5805C24.0134 33.7146 26.5541 36.2553 29.6882 36.2553Z"
                                            stroke="#CDC2B1"
                                            stroke-width="2.02878"
                                        />
                                        <path
                                            d="M25.8131 38.5141C31.9782 38.5141 36.9761 33.5163 36.9761 27.3512C36.9761 21.1861 31.9782 16.1882 25.8131 16.1882C19.648 16.1882 14.6501 21.1861 14.6501 27.3512C14.6501 33.5163 19.648 38.5141 25.8131 38.5141Z"
                                            stroke="#CDC2B1"
                                            stroke-width="2.02878"
                                        />
                                        <path
                                            d="M25.8131 38.5141C31.9782 38.5141 36.9761 33.5163 36.9761 27.3512C36.9761 21.1861 31.9782 16.1882 25.8131 16.1882C19.648 16.1882 14.6501 21.1861 14.6501 27.3512C14.6501 33.5163 19.648 38.5141 25.8131 38.5141Z"
                                            stroke="#CDC2B1"
                                            stroke-width="2.02878"
                                        />
                                        <path
                                            d="M22.9991 39.6621C31.709 39.6621 38.7698 32.6013 38.7698 23.8915C38.7698 15.1816 31.709 8.12085 22.9991 8.12085C14.2893 8.12085 7.22852 15.1816 7.22852 23.8915C7.22852 32.6013 14.2893 39.6621 22.9991 39.6621Z"
                                            stroke="#CDC2B1"
                                            stroke-width="2.02878"
                                        />
                                        <path
                                            d="M20.7534 40.2907C31.3978 40.2907 40.0268 31.6617 40.0268 21.0173C40.0268 10.3729 31.3978 1.7439 20.7534 1.7439C10.109 1.7439 1.47998 10.3729 1.47998 21.0173C1.47998 31.6617 10.109 40.2907 20.7534 40.2907Z"
                                            stroke="#CDC2B1"
                                            stroke-width="2.02878"
                                        />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_64_278">
                                            <rect
                                                width="41.59"
                                                height="41.59"
                                                fill="white"
                                                transform="translate(0 0.200012)"
                                            />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </div>
                            <h6 class="beyond--16pxText">PROFESSIONAL SERVICE AND SUPPORT</h6>
                        </div>

                        <div class="far--beyound--banner--item">
                            <div class="far--beyound--banner--item--svg">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="42"
                                    height="43"
                                    viewBox="0 0 42 43"
                                    fill="none"
                                >
                                    <g clip-path="url(#clip0_64_288)">
                                        <mask
                                            id="mask0_64_288"
                                            style="mask-type: luminance"
                                            maskUnits="userSpaceOnUse"
                                            x="0"
                                            y="1"
                                            width="42"
                                            height="41"
                                        >
                                            <path
                                                d="M41.1023 1.32959H0.465576V41.9052H41.1023V1.32959Z"
                                                fill="white"
                                            />
                                        </mask>
                                        <g mask="url(#mask0_64_288)">
                                            <path
                                                d="M41.1023 21.6859L41.0494 20.1969L25.7282 20.7334L40.2256 15.7413L39.7403 14.3315L25.2428 19.3236L37.6488 10.3101L36.7721 9.10497L24.3679 18.1169L33.596 5.87101L32.4057 4.97461L23.1793 17.2188L28.4239 2.81038L27.0224 2.30192L21.5202 17.4218V1.32959H20.0295V16.6608L15.5458 1.99817L14.1212 2.43399L18.6048 17.095L10.0304 4.38361L8.79399 5.21728L17.3684 17.927L5.45272 8.27791L4.51505 9.43679L16.4291 19.0858L2.21215 13.341L1.65417 14.7227L15.8694 20.466L0.595991 19.1304L0.465576 20.6145L15.739 21.95L0.741264 25.1378L1.04997 26.5954L16.0477 23.4077L2.63641 30.8414L3.35948 32.1456L16.7691 24.7118L6.118 35.741L7.18939 36.7761L17.8405 25.7486L10.879 39.4091L12.2062 40.086L19.1661 26.4254L16.505 41.5255L17.9725 41.7847L20.6337 26.6862L22.5024 41.9052L23.9816 41.7236L22.1129 26.5047L28.3497 40.5136L29.7116 39.9061L23.4748 25.9005L33.5349 37.4727L34.6591 36.4955L24.6007 24.9232L37.6041 33.0485L38.3932 31.7857L25.3914 23.6603L40.2009 27.6289L40.5872 26.1894L25.7777 22.2224L41.1023 21.6859Z"
                                                fill="#CDC2B1"
                                            />
                                        </g>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_64_288">
                                            <rect
                                                width="41.59"
                                                height="41.59"
                                                fill="white"
                                                transform="translate(0 0.800049)"
                                            />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </div>
                            <h6 class="beyond--16pxText">
                                OPPORTUNITIES CREATIVE FREEDOM
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ========================== For Beyound End Hare ============= -->

    <!-- ========================== Bonuses Section Start Hare =========== -->
    <section class="bonuses--wrapper">
        <div class="container">
            <div class="bonuses--inner--wrapper">
                @foreach($challenges->take(1) as $challenge)

                    <div class="bonuses--item--card--wrapper">
                        <div class="bonuses--item--card rotete--7">
                            <div class="bonuses--item--card--heading">
                                <h4 class="card--texts">
                                    find your true potential
                                    <span class="yellowText">${{ number_format($challenge->price_money) ?? 'N/A' }}</span>
                                </h4>
                            </div>
                            <div class="bonuses--item--card--img">
                                <img src="{{ asset('/frontend/assets/images/cardImg.png') }}" alt="not found" />
                            </div>
                            <div class="bonuses--item--card--heading">
                                <span class="card--texts">01</span>
                            </div>
                        </div>

                        <div class="bonuses--item--card rotete5">
                            <div class="bonuses--item--card--heading">
                                <h4 class="card--texts">
                                    monetary prizes beyond 100
                                    <span class="yellowText">${{ number_format($challenge->price_money) ?? 'N/A' }}</span>
                                </h4>
                            </div>
                            <div class="bonuses--item--card--img">
                                <img src="{{ asset('/frontend/assets/images/cardImg2.png') }}" alt="not found" />
                            </div>
                            <div class="bonuses--item--card--heading">
                                <span class="card--texts">01</span>
                            </div>
                        </div>
                    </div>

                    <div class="bonuses--item--fream--wrapper">
                        <div class="bonuses--item--fream--heading--texts">
                            <h3 class="pageHeading">bonuses</h3>
                            <h4 class="pageHeading yellowText">for you</h4>
                        </div>

                        <div class="bonuses--item--fream">
                            <img src="{{ asset('/frontend/assets/images/StarIcon.png') }}" alt="not found" />
                        </div>
                    </div>

                    <div class="bonuses--item--card--wrapper">
                        <div class="bonuses--item--card rotate10">
                            <div class="bonuses--item--card--heading">
                                <h4 class="card--texts">
                                    make your life healthier and more productive
                                    <span class="yellowText">${{ number_format($challenge->price_money) ?? 'N/A' }}</span>
                                </h4>
                            </div>
                            <div class="bonuses--item--card--img">
                                <img src="{{ asset('/frontend/assets/images/cardImg3.png') }}" alt="not found" />
                            </div>
                            <div class="bonuses--item--card--heading">
                                <span class="card--texts">01</span>
                            </div>
                        </div>

                        <div class="bonuses--item--card rotete7--custom">
                            <div class="bonuses--item--card--heading">
                                <h4 class="card--texts">
                                    Recognition and exposure
                                    <span class="yellowText">${{ number_format($challenge->price_money) ?? 'N/A' }}</span>
                                </h4>
                            </div>
                            <div class="bonuses--item--card--img">
                                <img src="{{ asset('/frontend/assets/images/cardImg4.png') }}" alt="not found" />
                            </div>
                            <div class="bonuses--item--card--heading">
                                <span class="card--texts">01</span>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- ========================== Bonuses Section End Hare ============= -->

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
                            @php
                                $open_challenge = $challenge->start_date <= now();
                            @endphp
                            @if($open_challenge)
                                <div class="challangeName--item3">
                                    <button type="submit" class="register--Btn">Challenge Join Time Finished</button>
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

@endsection
