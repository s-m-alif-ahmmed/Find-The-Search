@extends('frontend.layouts.dashboard.app')

@section('title', 'Dashboard')

@section('content')

    @if($challenge_exist_date)
        <div class="dashboard--main">

            <div class="dashboard--notification--name--header">
                <div>
                    <h5 class="dashboard--notification--text">Welcome back</h5>
                    <h4 class="dashboard--notification--NameText">{{ Auth::user()->first_name. ' ' .Auth::user()->last_name }}</h4>
                </div>

                <div data-bs-toggle="modal" data-bs-target="#exampleModal" class="dashboard--notification--custom--svg btn btn-primary">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="32"
                        height="32"
                        viewBox="0 0 32 32"
                        fill="none"
                    >
                        <path
                            d="M19.8095 22.776C22.2938 22.4819 24.7347 21.8956 27.0815 21.0293C25.094 18.8277 23.9958 15.966 24.0002 13V12C24.0002 9.87827 23.1573 7.84344 21.657 6.34315C20.1568 4.84286 18.1219 4 16.0002 4C13.8785 4 11.8436 4.84286 10.3433 6.34315C8.84305 7.84344 8.00019 9.87827 8.00019 12V13C8.00422 15.9662 6.90551 18.8279 4.91753 21.0293C7.22819 21.8827 9.66419 22.476 12.1909 22.776M19.8095 22.776C17.2788 23.0762 14.7215 23.0762 12.1909 22.776M19.8095 22.776C20.0017 23.3758 20.0494 24.0125 19.949 24.6343C19.8485 25.2561 19.6026 25.8453 19.2314 26.3541C18.8601 26.8629 18.3739 27.2768 17.8124 27.5621C17.251 27.8475 16.63 27.9962 16.0002 27.9962C15.3704 27.9962 14.7494 27.8475 14.1879 27.5621C13.6265 27.2768 13.1403 26.8629 12.769 26.3541C12.3978 25.8453 12.1519 25.2561 12.0514 24.6343C11.9509 24.0125 11.9987 23.3758 12.1909 22.776M4.16553 10C4.54149 7.76663 5.54392 5.68592 7.05619 4M24.9442 4C26.4565 5.68592 27.4589 7.76663 27.8349 10"
                            stroke="#C39D42"
                            stroke-width="1.5"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />
                    </svg>
                </div>
            </div>

            <div class="dashboard--banner--wrapper owl-carousel">
                @foreach($dashboard_sliders as $slider)
                    <div class="dashboard--banner--item">
                        <h3 class="bannerMotivated--text">
                            {{ $slider->message }}
                        </h3>
                    </div>
                @endforeach

            </div>

            <div class="dashboard--photo--upload--gellary">
                <div class="dashboard--photo--upload--heading">
                    <h3 class="daily--update--texts">Recently Uploaded Picture</h3>
                    <p class="theVoting--texts--time">This section allows you to customize various aspects of your account to enhance your experience</p>
                </div>

                <div class="dashboard--photo--upload--gellaryss">
                    @foreach($challenge_images->sortBy('day') as $image)
                        <div class="dashboard--photo--upload--card">
                            <div class="dashboard--photo--upload--image">
                                <img src="{{ asset($image->image) }}" alt="not found">
                            </div>
                            <div class="dashboard--photo--upload--text">
                                <h4 class="duration--text">Day - {{ $image->day }}</h4>
                                <h5 class="dateUpload">{{ \Carbon\Carbon::parse($image->created_at)->format('j M, Y') }}</h5>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>

        </div>
    @else
        <!-- DASHBOARD MAIN -->
        <div class="dashboard--main rank">
            <div class="dashboard--notification--name--header">
                <div>
                    <h5 class="dashboard--notification--text">Welcome back</h5>
                    <h4 class="dashboard--notification--NameText">{{ Auth::user()->first_name. ' ' .Auth::user()->last_name }}</h4>
                </div>

                <div class="dashboard--rank--navProfile">
                    <div data-bs-toggle="modal" data-bs-target="#exampleModal" class="dashboard--notification--custom--svg btn btn-primary">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="32"
                            height="32"
                            viewBox="0 0 32 32"
                            fill="none"
                        >
                            <path
                                d="M19.8095 22.776C22.2938 22.4819 24.7347 21.8956 27.0815 21.0293C25.094 18.8277 23.9958 15.966 24.0002 13V12C24.0002 9.87827 23.1573 7.84344 21.657 6.34315C20.1568 4.84286 18.1219 4 16.0002 4C13.8785 4 11.8436 4.84286 10.3433 6.34315C8.84305 7.84344 8.00019 9.87827 8.00019 12V13C8.00422 15.9662 6.90551 18.8279 4.91753 21.0293C7.22819 21.8827 9.66419 22.476 12.1909 22.776M19.8095 22.776C17.2788 23.0762 14.7215 23.0762 12.1909 22.776M19.8095 22.776C20.0017 23.3758 20.0494 24.0125 19.949 24.6343C19.8485 25.2561 19.6026 25.8453 19.2314 26.3541C18.8601 26.8629 18.3739 27.2768 17.8124 27.5621C17.251 27.8475 16.63 27.9962 16.0002 27.9962C15.3704 27.9962 14.7494 27.8475 14.1879 27.5621C13.6265 27.2768 13.1403 26.8629 12.769 26.3541C12.3978 25.8453 12.1519 25.2561 12.0514 24.6343C11.9509 24.0125 11.9987 23.3758 12.1909 22.776M4.16553 10C4.54149 7.76663 5.54392 5.68592 7.05619 4M24.9442 4C26.4565 5.68592 27.4589 7.76663 27.8349 10"
                                stroke="#C39D42"
                                stroke-width="1.5"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />
                        </svg>
                    </div>

                    <div class="dashboard--right--nav--profile">
                        <div class="dashboard--right--nav--profile--photo">
                            <img src="{{ asset(Auth::user()->avatar ?? '/frontend/default-avatar-profile.jpg') }}" alt="not found" />
                        </div>
                        <div class="dashboard--right--nav--profile--name">
                            <h4 class="dashboard--text--main">{{ Auth::user()->first_name. ' ' .Auth::user()->last_name }}</h4>
                            <span class="dashboard--text--email"
                            >{{ Auth::user()->email}}</span
                            >
                        </div>
                        <div class="dashboard--right--nav--profile--drop"></div>
                    </div>
                </div>
            </div>

            <div class="dashBoard--rank--timer--wrapper">
                <div class="dashboard--rank--time--header">
                    <h3 class="rank--currently--unavailable--text">
                        Challenge is currently unavailable
                    </h3>
                    <p>
                        wait until challenge start it
                    </p>
                </div>

                <div class="dashboard--time--start--in--wrapper">
                    <h5>Start in</h5>

                    @foreach($all_challenges->take(1) as $challenge)
                        <div class="count--down--time--wrapper rank">
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
                    @endforeach
                </div>
            </div>
        </div>
    @endif

@endsection

@push('scripts')
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
@endpush
