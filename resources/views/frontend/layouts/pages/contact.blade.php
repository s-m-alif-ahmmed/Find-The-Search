@extends('frontend.app')

@section('title', 'Contact - The Search')

@section('content')

    <!-- ===== :: Main Menu ==== :: -->
    @include('frontend.partials.main-menu')
    <!-- ===== :: Main Menu ==== :: -->

    <!-- ============== Get In Touch Start Hare ============ -->
    <section class="getIn--touch--wrapper">
        <div class="container">
            <div class="get--InTouch--inner--main">
                <div class="get--InTouch--inner--left">
                    <div class="get--in--touch--heeader">
                        <h4 class="nav--menu--textss">Get in touch</h4>
                        <p class="get--inTouch--subHeader">
                            Our friendly team would love to hear from you.
                        </p>
                    </div>

                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        @method('POST')

                        <div class="get--in--touch--form--wrapper">
                            <div class="first--and--last--name--wrapper">
                                <div class="first--name--wrapper">
                                    <h6 class="getInTouch--texts">First name</h6>
                                    <div class="firstName--inputbox">
                                        <input placeholder="First name" name="first_name" type="text" />
                                    </div>
                                    @error('first_name')
                                    <h6 class="passDirectionText text-danger">
                                        {{ $message }}
                                    </h6>
                                    @enderror
                                </div>

                                <div class="first--name--wrapper">
                                    <h6 class="getInTouch--texts">Last name</h6>
                                    <div class="firstName--inputbox">
                                        <input placeholder="Last name" name="last_name" type="text" />
                                    </div>
                                    @error('last_name')
                                    <h6 class="passDirectionText text-danger">
                                        {{ $message }}
                                    </h6>
                                    @enderror
                                </div>
                            </div>

                            <div class="email--wrapper">
                                <div class="first--name--wrapper">
                                    <h6 class="getInTouch--texts">Email</h6>
                                    <div class="email--inputbox">
                                        <input placeholder="Enter Email" name="email" type="email" />
                                    </div>
                                    @error('email')
                                    <h6 class="passDirectionText text-danger">
                                        {{ $message }}
                                    </h6>
                                    @enderror
                                </div>
                            </div>

                            <div class="email--wrapper">
                                <div class="first--name--wrapper">
                                    <h6 class="getInTouch--texts">Phone number</h6>
                                    <div class="email--inputbox">
                                        <input
                                            id="phone" name="number"
                                            placeholder="+1 (555) 000-0000"
                                            type="tel"
                                        />
                                    </div>
                                    @error('number')
                                    <h6 class="passDirectionText text-danger">
                                        {{ $message }}
                                    </h6>
                                    @enderror
                                </div>
                            </div>


                            <div class="email--wrapper">
                                <div class="first--name--wrapper">
                                    <h6 class="getInTouch--texts">Message</h6>
                                    <div class="sendMsg--inputbox">
                                        <textarea name="message" id=""></textarea>
                                    </div>
                                    @error('message')
                                    <h6 class="passDirectionText text-danger">
                                        {{ $message }}
                                    </h6>
                                    @enderror
                                </div>
                            </div>

                            <div class="agreee--checkbox">
                                <label for="TermsCondition">
                                    <input id="TermsCondition" name="terms_and_policy" value="1" type="checkbox">
                                    <p class="email--address--texts" href="#">You agree to our friendly privacy policy.
                                    </p>
                                </label>
                                @error('terms_and_policy')
                                <h6 class="passDirectionText text-danger">
                                    {{ $message }}
                                </h6>
                                @enderror
                            </div>
                        </div>

                        <div class="send--massage--btn">
                            <button type="submit">Send message</button>
                        </div>
                    </form>
                </div>
                <div class="get--InTouch--inner--right">
                    <div class="get--in--touch--image">
                        <img
                            src="{{ asset('/frontend/assets/images/getInTouchBanner.png') }}"
                            alt="not found"
                        />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ============== Get In Touch End Hare ============ -->

@endsection

@push('scripts')
    <script>
        // Trigger toaster based on session messages
        @if (session('t-success'))
        showSuccessToast("{{ session('t-success') }}");
        @endif

        @if (session('t-error'))
        showErrorToast("{{ session('t-error') }}");
        @endif
    </script>
@endpush
