@extends('auth.app')

@section('title', 'Forget Password - The Search')

@section('content')

    <!-- =============================================== Sign In Page end Hare ================================== -->
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
                <form class="form--wrapper"  action="{{ route('password.email') }}" method="POST">
                    @csrf

                    <div>
                        <h3 class="signIn--form--texts">Forget Password</h3>
                    </div>

                    <div class="signIn--inputBox--main">
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

                    <div class="signIn--Btn--wrapper two">
                        <button type="submit" class="passDirectionText">Send Email</button>
                    </div>

                </form>

            </div>
        </div>
    </section>
    <!-- =============================================== Sign In Page end Hare ================================== -->

@endsection
