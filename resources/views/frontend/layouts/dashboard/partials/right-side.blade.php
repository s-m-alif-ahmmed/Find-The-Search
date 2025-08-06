@if (request()->routeIs('user.dashboard') || request()->routeIs('user.dashboard.*'))
    @if($challenge_exist_date)
        <div class="dashboard--right--nav">
            <div class="dashboard--right--nav--main">

                <div class="dashboard--right--nav--profile">
                    <div class="dashboard--right--nav--profile--photo">
                        <img src="{{ asset(Auth::user()->avatar ?? '/frontend/default-avatar-profile.jpg') }}" alt="not found" />
                    </div>
                    <div class="dashboard--right--nav--profile--name">
                        <h4 class="dashboard--text--main">{{ Auth::user()->first_name. ' ' .Auth::user()->last_name }}</h4>
                        <span class="dashboard--text--email">{{ Auth::user()->email }}</span>
                    </div>
                    <div class="dashboard--right--nav--profile--drop"></div>
                </div>

                @if($challenge_finish_date)
                    @if ($existingUpload->isEmpty())
                        <div class="dashboard--daily--upload--wrapper">
                            <h3 class="daily--update--texts">Daily Update</h3>

                            <div class="dashboard--mobile--upoader">
                                <div class="dashboard--mobile--upoader--header">
                                    <div>
                                        <h4 class="dashboard--text--main">Media Upload</h4>
                                        <p class="dashboard--Subtext">
                                            Add your documents here, a...
                                        </p>
                                    </div>

                                </div>

                                <form action="{{ route('challenge.image.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')

                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                    <input type="hidden" name="challenge_id" value="{{ $user_challenge->challenge_id }}">

                                    <input
                                        type="file"
                                        name="image"
                                        id="fileInput"
                                        accept="image/*"
                                        hidden
                                    />

                                    <div class="uploader-wrapper">
                                        <div class="uploader" id="uploader">


                                            <div class="content">
                                                <div class="icon" id="icon">
                                                    <svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        width="42"
                                                        height="42"
                                                        viewBox="0 0 42 42"
                                                        fill="none"
                                                    >
                                                        <g clip-path="url(#clip0_196_9938)">
                                                            <path
                                                                d="M33.4417 3.12071H14.1743V11.1107H37.5567V7.23413C37.5567 4.96577 35.7107 3.12071 33.4417 3.12071Z"
                                                                fill="#CED9F9"
                                                            />
                                                            <path
                                                                d="M22.5352 12.3403H0V4.92636C0 2.20972 2.21068 0 4.92828 0H12.1336C12.8497 0 13.5396 0.150925 14.1664 0.434509C15.0418 0.828964 15.7939 1.47913 16.3213 2.3286L22.5352 12.3403Z"
                                                                fill="#1640C1"
                                                            />
                                                            <path
                                                                d="M42 14.0001V37.8815C42 40.1527 40.1511 42 37.8789 42H4.12111C1.84891 42 0 40.1527 0 37.8815V9.8806H37.8789C40.1511 9.8806 42 11.7285 42 14.0001Z"
                                                                fill="#2354E6"
                                                            />
                                                            <path
                                                                d="M42 14.0001V37.8815C42 40.1527 40.1511 42 37.8789 42H21V9.8806H37.8789C40.1511 9.8806 42 11.7285 42 14.0001Z"
                                                                fill="#1849D6"
                                                            />
                                                            <path
                                                                d="M32.048 25.9398C32.048 32.0322 27.0919 36.9887 21.0001 36.9887C14.9083 36.9887 9.95215 32.0322 9.95215 25.9398C9.95215 19.8484 14.9083 14.8919 21.0001 14.8919C27.0919 14.8919 32.048 19.8484 32.048 25.9398Z"
                                                                fill="#E7ECFC"
                                                            />
                                                            <path
                                                                d="M32.0479 25.9398C32.0479 32.0322 27.0918 36.9887 21 36.9887V14.8919C27.0918 14.8919 32.0479 19.8484 32.0479 25.9398Z"
                                                                fill="#CED9F9"
                                                            />
                                                            <path
                                                                d="M24.5612 26.0754C24.3308 26.2705 24.0485 26.3657 23.7688 26.3657C23.4185 26.3657 23.0705 26.2173 22.827 25.9283L22.2307 25.2214V29.8494C22.2307 30.5288 21.6795 31.0799 21.0002 31.0799C20.3209 31.0799 19.7698 30.5288 19.7698 29.8494V25.2214L19.1734 25.9283C18.7344 26.4477 17.9587 26.514 17.4392 26.0754C16.9201 25.6373 16.8535 24.8612 17.2915 24.3418L19.7271 21.4544C20.0447 21.0788 20.508 20.8629 21.0002 20.8629C21.4924 20.8629 21.9558 21.0788 22.2733 21.4544L24.7089 24.3418C25.147 24.8612 25.0803 25.6373 24.5612 26.0754Z"
                                                                fill="#6C8DEF"
                                                            />
                                                            <path
                                                                d="M24.561 26.0754C24.3306 26.2705 24.0483 26.3657 23.7686 26.3657C23.4183 26.3657 23.0703 26.2173 22.8268 25.9283L22.2305 25.2214V29.8494C22.2305 30.5288 21.6793 31.0799 21 31.0799V20.8629C21.4922 20.8629 21.9555 21.0788 22.2731 21.4544L24.7087 24.3418C25.1467 24.8612 25.0801 25.6373 24.561 26.0754Z"
                                                                fill="#3B67E9"
                                                            />
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_196_9938">
                                                                <rect width="42" height="42" fill="white" />
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                </div>
                                                <p id="message">Drag your file(s) to start uploading</p>
                                                <span id="separator">OR</span>
                                                <a class="browse">Browse</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="upload--btn">
                                        <button type="submit">Upload</button>
                                    </div>

                                </form>
                            </div>

                        </div>
                    @else
                    @endif
                @else
                @endif

                @if($announcements->isNotEmpty())
                    <div class="dashboard--daily--upload--wrapper">
                        <div class="Announcement--wrapper">
                            <h3 class="daily--update--texts">Announcement</h3>
                            <a style="cursor: pointer" data-bs-toggle="modal" data-bs-target="#exampleModalAnnouncement" class="seeAll--text">See All </a>
                        </div>

                        <div class="announcement--notification--card--wrapper">
                            @foreach($announcements->take(10) as $announcement)
                                <div class="announcement--notification--card--item">
                                    <div class="announcement--notification--headerss">
                                        <div
                                            class="announcement--notification--headerss--icon--texts"
                                        >
                                            <div class="announcement--notification--headerss--icon">
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    width="14"
                                                    height="12"
                                                    viewBox="0 0 14 12"
                                                    fill="none"
                                                >
                                                    <path
                                                        fill-rule="evenodd"
                                                        clip-rule="evenodd"
                                                        d="M10.8461 3.58787H13.6668C13.6668 1.32306 12.3098 0 10.0105 0H3.98979C1.69053 0 0.333496 1.32306 0.333496 3.55898V8.44102C0.333496 10.6769 1.69053 12 3.98979 12H10.0105C12.3098 12 13.6668 10.6769 13.6668 8.44102V8.23303H10.8461C9.53697 8.23303 8.47572 7.19835 8.47572 5.922C8.47572 4.64566 9.53697 3.61098 10.8461 3.61098V3.58787ZM10.8461 4.58161H13.1691C13.444 4.58161 13.6668 4.79889 13.6668 5.06692V6.75397C13.6636 7.0207 13.4426 7.23617 13.1691 7.23929H10.8994C10.2367 7.24798 9.65715 6.80558 9.50683 6.17622C9.43155 5.78553 9.53723 5.38238 9.79554 5.07481C10.0539 4.76725 10.4384 4.58672 10.8461 4.58161ZM10.9468 6.35532H11.1661C11.4475 6.35532 11.6757 6.13286 11.6757 5.85845C11.6757 5.58404 11.4475 5.36158 11.1661 5.36158H10.9468C10.8122 5.36003 10.6826 5.41109 10.5868 5.50336C10.4911 5.59562 10.4372 5.72142 10.4372 5.85267C10.4372 6.12804 10.6644 6.35215 10.9468 6.35532ZM3.49201 3.58787H7.25498C7.53644 3.58787 7.76461 3.36541 7.76461 3.091C7.76461 2.81658 7.53644 2.59413 7.25498 2.59413H3.49201C3.21285 2.59411 2.98563 2.81306 2.98239 3.08522C2.98237 3.36058 3.2096 3.5847 3.49201 3.58787Z"
                                                        fill="white"
                                                    />
                                                </svg>
                                            </div>
                                            <h5 class="theVoting--texts">{{ $announcement->title }}</h5>
                                        </div>

                                        <h4 class="theVoting--texts--time">
                                            @php
                                                $createdAt = \Illuminate\Support\Carbon::parse($announcement->created_at);
                                            @endphp

                                            @if ($createdAt->isToday())
                                                {{ $createdAt->format('g:i A') }} <!-- Show time (e.g., 3:45 PM) -->
                                            @elseif ($createdAt->isYesterday())
                                                Yesterday <!-- Show "Yesterday" -->
                                            @elseif ($createdAt->greaterThanOrEqualTo(\Illuminate\Support\Carbon::now()->subWeek()))
                                                {{ $createdAt->format('l') }} <!-- Show the day of the week (e.g., Saturday) -->
                                            @else
                                                {{ $createdAt->format('j M, Y') }} <!-- Show full date (e.g., 4 Dec, 2024) -->
                                            @endif
                                        </h4>
                                    </div>

                                    <div class="announcement--notification--content">
                                        <p class="theVoting--texts--time">
                                            {{ $announcement->detail }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                @else
                @endif
            </div>

            <div class="btn--right--opener">
                <i class="fa-solid fa-angle-left"></i>
            </div>
        </div>
    @else

    @endif

@endif


