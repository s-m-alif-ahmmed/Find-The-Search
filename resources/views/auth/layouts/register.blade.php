@extends('auth.app')

@section('title', 'Sign Up - The Search')

@section('content')

    <!-- =============================================== Sign up Page Start Hare ================================== -->
    <section class="sign--in--wrapper">
        <div class="sign--in--wrapper--main">
            <div class="sign--in--content--wrapper">
                <div class="sign--in--content">
                    <h2 class="sign--in--heading--text">
                        Join the Challenge. <br />
                        Transform Your Life.
                    </h2>
                    <p class="sign--in--pera--text">
                        Imagine the best version of yourself, then take the first step to
                        make it real. Join a community dedicated to progress and celebrate
                        every win along the way. This journey is yours—commit today, and
                        let’s make it unforgettable.
                    </p>
                </div>

                <div class="sign--in--content--freame">
                    <img src="{{ asset('/frontend/assets/images/SignInPageFream.png') }}" alt="not found" />
                </div>
            </div>

            <div class="sign--in--form">
                <form class="form--wrapper" action="{{ route('register') }}" method="POST">
                    @csrf

                    <div>
                        <h3 class="signIn--form--texts">Sign up now</h3>
                    </div>

                    <div class="signIn--inputBox--main">
                        <div class="signUp--names--wrapper">
                            <div class="firstName--input">
                                <label
                                    class="emai--input--box--text--wrapper"
                                    for="firstName"
                                >
                                    <h6 class="email--address--texts">First name</h6>
                                    <div class="firstName--inputBox--wrapper">
                                        <input type="text" name="first_name" id="firstName" />
                                    </div>
                                </label>
                                @error('first_name')
                                <h6 class="passDirectionText text-danger">
                                    {{ $message }}
                                </h6>
                                @enderror
                            </div>
                            <div class="firstName--input">
                                <label
                                    class="emai--input--box--text--wrapper"
                                    for="secondName">
                                    <h6 class="email--address--texts">Last name</h6>
                                    <div class="firstName--inputBox--wrapper">
                                        <input type="text" name="last_name" id="secondName" />
                                    </div>
                                </label>
                                @error('last_name')
                                <h6 class="passDirectionText text-danger">
                                    {{ $message }}
                                </h6>
                                @enderror
                            </div>
                        </div>

                        <div class="email--address--main">
                            <label class="emai--input--box--text--wrapper" for="email">
                                <h6 class="email--address--texts">Email address</h6>
                                <div class="email--inputBox--wrapper">
                                    <input id="email" name="email" type="text" />
                                </div>
                            </label>
                            @error('email')
                            <h6 class="passDirectionText text-danger">
                                {{ $message }}
                            </h6>
                            @enderror
                        </div>

                        <div class="email--address--main">
                            <label class="emai--input--box--text--wrapper" for="phone">
                                <h6 class="email--address--texts">Phone number</h6>
                                <div class="email--inputBox--wrapper">
                                    <input id="phone" type="tel" name="number" />
                                </div>
                            </label>
                            @error('number')
                            <h6 class="passDirectionText text-danger">
                                {{ $message }}
                            </h6>
                            @enderror
                        </div>

                        {{-- password--}}
                        <div>
                            <label class="emai--input--box--text--wrapper" for="Password">
                                <div class="passWord--hidden--Text--wrapper">
                                    <h6 class="email--address--texts">Password</h6>

                                    <div class="passHidden--wrapper">
                                        <div class="hideIcon--svg">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="19"
                                                height="16"
                                                viewBox="0 0 19 16"
                                                fill="none"
                                            >
                                                <path
                                                    d="M17.0194 0.881275L16.2835 0.145332C16.0755 -0.0626585 15.6915 -0.0306494 15.4515 0.257296L12.8913 2.80126C11.7392 2.30532 10.4754 2.06532 9.14731 2.06532C5.19519 2.08126 1.77141 4.38523 0.12329 7.69743C0.0272626 7.90542 0.0272626 8.16135 0.12329 8.33734C0.891223 9.90536 2.04329 11.2014 3.4833 12.1773L1.3873 14.3053C1.1473 14.5453 1.11529 14.9293 1.27534 15.1373L2.01128 15.8732C2.21928 16.0812 2.60326 16.0492 2.84326 15.7613L16.8912 1.71339C17.1952 1.47352 17.2272 1.08956 17.0192 0.88155L17.0194 0.881275ZM9.9953 5.71316C9.72329 5.64914 9.43534 5.56919 9.16332 5.56919C7.80327 5.56919 6.71538 6.65721 6.71538 8.01712C6.71538 8.28913 6.7794 8.57708 6.85935 8.8491L5.78724 9.90513C5.46728 9.34518 5.2913 8.72108 5.2913 8.01715C5.2913 5.88918 7.00332 4.17715 9.1313 4.17715C9.83536 4.17715 10.4593 4.35314 11.0193 4.6731L9.9953 5.71316Z"
                                                    fill="#C39D42"
                                                />
                                                <path
                                                    d="M18.1714 7.69737C17.6114 6.57732 16.8753 5.56939 15.9634 4.75336L12.9874 7.69737V8.01732C12.9874 10.1453 11.2754 11.8573 9.14739 11.8573H8.82744L6.93945 13.7453C7.64351 13.8893 8.37946 13.9853 9.09946 13.9853C13.0516 13.9853 16.4754 11.6813 18.1235 8.35319C18.2675 8.12912 18.2675 7.90521 18.1714 7.6972L18.1714 7.69737Z"
                                                    fill="#C39D42"
                                                />
                                            </svg>
                                        </div>
                                        <span class="toggle-text">Hide</span>
                                    </div>
                                </div>
                                <div class="email--inputBox--wrapper">
                                    <input id="password" name="password" autocomplete="new-password" min="8" type="password" />
                                </div>
                            </label>
                            @error('password')
                            <h6 class="passDirectionText text-danger">
                                {{ $message }}
                            </h6>
                            @enderror
                            <h6 class="passDirectionText">
                                Use 8 or more characters with a mix of letters, numbers & symbols
                            </h6>
                        </div>

                        {{-- confirm password--}}
                        <div>
                            <label class="emai--input--box--text--wrapper" for="Password">
                                <div class="passWord--hidden--Text--wrapper">
                                    <h6 class="email--address--texts">Confirm Password</h6>

                                    <div class="passHidden--wrapper confirm_pass-span">
                                        <div class="hideIcon--svg">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="19"
                                                height="16"
                                                viewBox="0 0 19 16"
                                                fill="none"
                                            >
                                                <path
                                                    d="M17.0194 0.881275L16.2835 0.145332C16.0755 -0.0626585 15.6915 -0.0306494 15.4515 0.257296L12.8913 2.80126C11.7392 2.30532 10.4754 2.06532 9.14731 2.06532C5.19519 2.08126 1.77141 4.38523 0.12329 7.69743C0.0272626 7.90542 0.0272626 8.16135 0.12329 8.33734C0.891223 9.90536 2.04329 11.2014 3.4833 12.1773L1.3873 14.3053C1.1473 14.5453 1.11529 14.9293 1.27534 15.1373L2.01128 15.8732C2.21928 16.0812 2.60326 16.0492 2.84326 15.7613L16.8912 1.71339C17.1952 1.47352 17.2272 1.08956 17.0192 0.88155L17.0194 0.881275ZM9.9953 5.71316C9.72329 5.64914 9.43534 5.56919 9.16332 5.56919C7.80327 5.56919 6.71538 6.65721 6.71538 8.01712C6.71538 8.28913 6.7794 8.57708 6.85935 8.8491L5.78724 9.90513C5.46728 9.34518 5.2913 8.72108 5.2913 8.01715C5.2913 5.88918 7.00332 4.17715 9.1313 4.17715C9.83536 4.17715 10.4593 4.35314 11.0193 4.6731L9.9953 5.71316Z"
                                                    fill="#C39D42"
                                                />
                                                <path
                                                    d="M18.1714 7.69737C17.6114 6.57732 16.8753 5.56939 15.9634 4.75336L12.9874 7.69737V8.01732C12.9874 10.1453 11.2754 11.8573 9.14739 11.8573H8.82744L6.93945 13.7453C7.64351 13.8893 8.37946 13.9853 9.09946 13.9853C13.0516 13.9853 16.4754 11.6813 18.1235 8.35319C18.2675 8.12912 18.2675 7.90521 18.1714 7.6972L18.1714 7.69737Z"
                                                    fill="#C39D42"
                                                />
                                            </svg>
                                        </div>
                                        <span class="toggle-text">Hide</span>
                                    </div>
                                </div>
                                <div class="email--inputBox--wrapper">
                                    <input id="confirm-password" name="password_confirmation" min="8" type="password" />
                                </div>
                            </label>
                            @error('password_confirmation')
                            <h6 class="passDirectionText text-danger">
                                {{ $message }}
                            </h6>
                            @enderror
                            <h6 class="passDirectionText">
                                Use 8 or more characters with a mix of letters, numbers & symbols
                            </h6>
                        </div>

                        <div class="checkBox--wrapper">
                            <label for="TermsCondition3">
                                <input id="TermsCondition3" name="terms_and_policy" value="1" type="checkbox" />
                                <span class="email--address--texts"
                                >By creating an account, I agree to our
                                    Terms of use and Privacy Policy
                                </span>
                            </label>

                            <label for="TermsCondition2">
                                <input id="TermsCondition2" name="promotion_permission" value="1" type="checkbox" />
                                <span class="email--address--texts"
                                >By creating an account, I am also consenting to receive SMS
                                    messages and emails, including product new feature updates,
                                    events, and marketing promotions.
                                </span>
                            </label>
                        </div>
                    </div>

                    <div class="signIn--Btn--wrapper">
                        <button type="submit" class="signIn--Btn">Sign up</button>>
                        <a class="passDirectionText" href="{{ route('login') }}">Already have an account? <span>Sign In</span></a>
                    </div>

                </form>


            </div>
        </div>
    </section>
    <!-- =============================================== Sign up Page end Hare ================================== -->



@endsection
