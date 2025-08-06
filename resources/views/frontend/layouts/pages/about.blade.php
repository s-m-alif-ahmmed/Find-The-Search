@extends('frontend.app')

@section('title', 'About - The Search')

@section('content')

    <!-- ===== :: Main Menu ==== :: -->
    @include('frontend.partials.main-menu')
    <!-- ===== :: Main Menu ==== :: -->

    <!-- ========================== Banner Start Hare =========== -->
    <section class="Challange--banner--wrapper banner">
        <div class="container">
            <div class="banner--heading">
                <h1 class="pageHeading">
                    let us fin you
                </h1>

                <div class="subHeader--mainBox">
                    <p class="timeSectionSub">
                        We believe that, out of the entire world, we can find you. Your talent and potential have the
                        power to shine and break through the barriers that have kept them hidden until now. Our
                        winners are more than just champions. they are flames with the potential to burn brighter than
                        any limit. That's why we're searching for you.
                    </p>
                </div>
            </div>

            <div class="banner--btn">
                @if(Auth::check() && Auth::user()->challengeSubscribers)
                    <a class="register--Btn" href="{{ route('user.dashboard') }}">Go To Dashboard</a>
                @else
                    <a class="register--Btn" href="{{ route('register') }}">Register Now</a>
                @endif
            </div>
        </div>

        <div class="about--us--banner">
            <div class="container">
                <div class="far--beyound--inner">
                    <div class="far--beyound--left">
                        <h3 class="far--beyound--text">far Beyond your excuses</h3>
                    </div>
                    <div class="far--beyound--right">
                        <p class="timeSectionSub">
                            We're not looking for who you are now, but for the potential within you. We know all you
                            need is one chance to prove what you're capable of, and here, you can find it. This is your
                            moment to show the world who you are and who you can become.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ========================== Banner End Hare ============= -->

    <!-- ========================== journey Start Hare =========== -->
    <section>
        <div class="container">
            <div class="far--beyound--banner">
                <div class="far--beyound--banner--inner banner">
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
                                        d="M12.7943 24.49C18.8744 24.49 23.8034 19.561 23.8034 13.4809C23.8034 7.40069 18.8744 2.47174 12.7943 2.47174C6.71411 2.47174 1.78516 7.40069 1.78516 13.4809C1.78516 19.561 6.71411 24.49 12.7943 24.49Z"
                                        stroke="#C39D42"
                                        stroke-width="2.44647"
                                    />
                                    <path
                                        d="M28.6956 24.49C34.7758 24.49 39.7048 19.561 39.7048 13.4809C39.7048 7.40069 34.7758 2.47174 28.6956 2.47174C22.6155 2.47174 17.6865 7.40069 17.6865 13.4809C17.6865 19.561 22.6155 24.49 28.6956 24.49Z"
                                        stroke="#C39D42"
                                        stroke-width="2.44647"
                                    />
                                    <path
                                        d="M12.7943 40.392C18.8744 40.392 23.8034 35.4631 23.8034 29.3829C23.8034 23.3027 18.8744 18.3738 12.7943 18.3738C6.71411 18.3738 1.78516 23.3027 1.78516 29.3829C1.78516 35.4631 6.71411 40.392 12.7943 40.392Z"
                                        stroke="#C39D42"
                                        stroke-width="2.44647"
                                    />
                                    <path
                                        d="M28.6956 40.392C34.7758 40.392 39.7048 35.4631 39.7048 29.3829C39.7048 23.3027 34.7758 18.3738 28.6956 18.3738C22.6155 18.3738 17.6865 23.3027 17.6865 29.3829C17.6865 35.4631 22.6155 40.392 28.6956 40.392Z"
                                        stroke="#C39D42"
                                        stroke-width="2.44647"
                                    />
                                </svg>
                            </div>
                            <h6 class="beyond--16pxText">HIGH-QUALITY EQUIPMENT</h6>
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
                                    <g clip-path="url(#clip0_300_1718)">
                                        <path
                                            d="M29.6885 36.2553C32.8226 36.2553 35.3632 33.7146 35.3632 30.5805C35.3632 27.4464 32.8226 24.9058 29.6885 24.9058C26.5544 24.9058 24.0137 27.4464 24.0137 30.5805C24.0137 33.7146 26.5544 36.2553 29.6885 36.2553Z"
                                            stroke="#C39D42"
                                            stroke-width="2.02878"
                                        />
                                        <path
                                            d="M25.8133 38.5141C31.9785 38.5141 36.9763 33.5163 36.9763 27.3512C36.9763 21.1861 31.9785 16.1882 25.8133 16.1882C19.6482 16.1882 14.6504 21.1861 14.6504 27.3512C14.6504 33.5163 19.6482 38.5141 25.8133 38.5141Z"
                                            stroke="#C39D42"
                                            stroke-width="2.02878"
                                        />
                                        <path
                                            d="M25.8133 38.5141C31.9785 38.5141 36.9763 33.5163 36.9763 27.3512C36.9763 21.1861 31.9785 16.1882 25.8133 16.1882C19.6482 16.1882 14.6504 21.1861 14.6504 27.3512C14.6504 33.5163 19.6482 38.5141 25.8133 38.5141Z"
                                            stroke="#C39D42"
                                            stroke-width="2.02878"
                                        />
                                        <path
                                            d="M22.9991 39.6621C31.709 39.6621 38.7698 32.6013 38.7698 23.8915C38.7698 15.1816 31.709 8.12085 22.9991 8.12085C14.2893 8.12085 7.22852 15.1816 7.22852 23.8915C7.22852 32.6013 14.2893 39.6621 22.9991 39.6621Z"
                                            stroke="#C39D42"
                                            stroke-width="2.02878"
                                        />
                                        <path
                                            d="M20.7539 40.2907C31.3983 40.2907 40.0273 31.6617 40.0273 21.0173C40.0273 10.3729 31.3983 1.7439 20.7539 1.7439C10.1095 1.7439 1.48047 10.3729 1.48047 21.0173C1.48047 31.6617 10.1095 40.2907 20.7539 40.2907Z"
                                            stroke="#C39D42"
                                            stroke-width="2.02878"
                                        />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_300_1718">
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
                            <h6 class="beyond--16pxText">ADVANCED SERVICE AND SUPPORT</h6>
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
                                    <g clip-path="url(#clip0_300_1728)">
                                        <mask
                                            id="mask0_300_1728"
                                            style="mask-type: luminance"
                                            maskUnits="userSpaceOnUse"
                                            x="0"
                                            y="1"
                                            width="42"
                                            height="41"
                                        >
                                            <path
                                                d="M41.1025 1.32959H0.46582V41.9052H41.1025V1.32959Z"
                                                fill="white"
                                            />
                                        </mask>
                                        <g mask="url(#mask0_300_1728)">
                                            <path
                                                d="M41.1025 21.6859L41.0497 20.1969L25.7284 20.7334L40.2259 15.7413L39.7406 14.3315L25.243 19.3236L37.649 10.3101L36.7724 9.10497L24.3681 18.1169L33.5962 5.87101L32.4059 4.97461L23.1796 17.2188L28.4242 2.81038L27.0227 2.30192L21.5204 17.4218V1.32959H20.0298V16.6608L15.5461 1.99817L14.1215 2.43399L18.6051 17.095L10.0307 4.38361L8.79423 5.21728L17.3686 17.927L5.45296 8.27791L4.51529 9.43679L16.4293 19.0858L2.21239 13.341L1.65442 14.7227L15.8697 20.466L0.596235 19.1304L0.46582 20.6145L15.7392 21.95L0.741508 25.1378L1.05022 26.5954L16.048 23.4077L2.63665 30.8414L3.35972 32.1456L16.7693 24.7118L6.11824 35.741L7.18963 36.7761L17.8407 25.7486L10.8793 39.4091L12.2065 40.086L19.1663 26.4254L16.5053 41.5255L17.9728 41.7847L20.6339 26.6862L22.5027 41.9052L23.9818 41.7236L22.1131 26.5047L28.3499 40.5136L29.7118 39.9061L23.475 25.9005L33.5352 37.4727L34.6593 36.4955L24.6009 24.9232L37.6044 33.0485L38.3935 31.7857L25.3916 23.6603L40.2011 27.6289L40.5874 26.1894L25.7779 22.2224L41.1025 21.6859Z"
                                                fill="#C39D42"
                                            />
                                        </g>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_300_1728">
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
                                MARKETING AND ARCHITECTURE SERVICES
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ========================== journey End Hare =========== -->

    <!-- ========================== Our PerPose Start Hare =========== -->
    <section class="our--perpuse--wrapper">
        <div class="container">
            <div class="our--perpose--content">
                <div class="our--perpose--heading">
                    <h3 class="far--beyound--text">
                        Our Purpose
                        <span class="yellowText">
                  Inspiring Real and Lasting Change</span
                        >
                    </h3>
                </div>

                <p class="timeSectionSub">
                    At "The Search," our mission is to create a transformative
                    platform for personal development, empowering individuals to
                    achieve meaningful growth. Every challenge, competition, and
                    experience is carefully designed to help you set clear goals,
                    reshape habits, and strengthen both mind and body. This movement
                    offers more than just progress—it’s a journey toward purpose,
                    belonging, and continuous self-improvement. Together, we move
                    forward, stronger and more inspired every step of the way.
                </p>
            </div>
        </div>
    </section>
    <!-- ========================== Our PerPose End Hare =========== -->

    <!-- ========================== Our Grouth Start Hare =========== -->
    <div class="our--growth--wrapper">
        <div class="container">
            <div class="out--growth--heading">
                <h3 class="far--beyound--text">
                    Our Commitment Your <br />
                    <span class="yellowText"> Growth, Privacy, and Support</span>
                </h3>

                <p class="timeSectionSub">
                    At "The Search," your privacy and data security are our top
                    priorities. Our dedicated team of professionals is here to guide
                    and support you at every stage of your journey. We are committed
                    to creating a safe, empowering environment where personal growth
                    becomes a shared mission. With us, you’ll always feel supported as
                    you work toward becoming the best version of yourself
                </p>
            </div>

            <div class="our--growth--inner--wrapper">
                <div class="studio--luxury--main--wrapper">
                    <div class="studio--luxury--left--item">
                        <div class="studio--luxury--left--item--img">
                            <img
                                src="{{ asset('/frontend/assets') }}/images/StudioLuxeryItem.png"
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
                                src="{{ asset('/frontend/assets') }}/images/studioLexuryItem2.png"
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
        </div>
    </div>
    <!-- ========================== Our Grouth End Hare =========== -->

    <!-- =============================================== Join Now Start Hare ================================ -->
    <section class="join--now--wrapper">
        <div class="container">
            <div class="join--now--main--wrapper">
                <div class="join--now--main--left">
                    <div class="studio--luxury--left--item--text">
                        <div class="studio--luxury--left--item--Innertext">
                            <h4 class="StudioAndLuxey--Texts">Support</h4>
                        </div>
                    </div>
                </div>

                <div class="join--now--main--right">
                    <img src="{{ asset('/frontend/assets/images/aboutUs--banner3.png') }}" alt="not found" />

                    <div class="join--now--wrapperss">
                        <span class="effortable--texts" >join now [+]</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- =============================================== Join Now End Hare ================================== -->

    <!-- =============================================== Join The Search Start Hare ================================== -->
    <section class="join--the--search--wrapper">
        <div class="container">
            <div class="join--the--search--heading">
                <h3 class="far--beyound--text">
                    Join<span class="yellowText"> The Search</span> and discover how
                    every challenge can lead you to a life of continuous progress and
                    positive change.
                </h3>

                <div class="banner--btn">
                    @if(Auth::check() && Auth::user()->challengeSubscribers)
                        <a class="register--Btn" href="{{ route('user.dashboard') }}">Go To Dashboard</a>
                    @else
                        <a class="register--Btn" href="{{ route('register') }}">Register Now</a>
                    @endif
                </div>

                <div class="card--wrapper--about">
                    @foreach($challenges->take(1) as $challenge)
                        <div class="bonuses--item--card about rotete--7">
                            <div class="bonuses--item--card--heading">
                                <h4 class="card--texts">
                                    You Can Earn More Than
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

                        <div class="bonuses--item--card about rotete5">
                            <div class="bonuses--item--card--heading">
                                <h4 class="card--texts">
                                    You Can Earn More Than
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

                        <div class="bonuses--item--card about rotete5">
                            <div class="bonuses--item--card--heading">
                                <h4 class="card--texts">
                                    You Can Earn More Than
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

                        <div class="bonuses--item--card about rotete5">
                            <div class="bonuses--item--card--heading">
                                <h4 class="card--texts">
                                    You Can Earn More Than
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

                        <div class="bonuses--item--card about rotete5">
                            <div class="bonuses--item--card--heading">
                                <h4 class="card--texts">
                                    You Can Earn More Than
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
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- =============================================== Join The Search End Hare ================================== -->

@endsection

@push('scripts')

@endpush
