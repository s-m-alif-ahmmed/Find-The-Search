@extends('frontend.layouts.dashboard.app')

@section('title', 'Profile - The Search')

@section('content')

    <a href="{{ route('dashboard.rank') }}">
        <div class="backBtn--main--svg">
            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="35" height="35" x="0" y="0" viewBox="0 0 33 33" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M16.5 1.5a15 15 0 1 0 15 15 15.017 15.017 0 0 0-15-15zm8 16H10.007a1.934 1.934 0 0 0 .291.384l5.909 5.909a1 1 0 1 1-1.414 1.414L8.884 19.3a3.963 3.963 0 0 1 0-5.6l5.909-5.909a1 1 0 1 1 1.414 1.414L10.3 15.116a1.934 1.934 0 0 0-.291.384H24.5a1 1 0 0 1 0 2z" fill="#FFF" opacity="1" data-original="#000000" class=""></path></g></svg>
        </div>
    </a>


    <div class="profile--view--wrapper">
        <div class="profile--cover-photo">
            <img src="{{ asset('/frontend/assets/images/coverPhoto.png') }}" alt="not found" />
        </div>

        <div class="profile--main--wrapper">
            <div class="profile--photo--wrapper">
                <div class="profile--picture--main">
                    <img src="{{ asset($user->avatar ?? '/frontend/default-avatar-profile.jpg') }}" alt="not found" />
                </div>

                <div class="profile--name--email--wrapper">
                    <h3 class="ProfilePic--name">{{ $user->first_name.' '.$user->last_name }}</h3>
                    <h6 class="ProfilePic--email">{{ $user->email }}</h6>
                </div>
            </div>

            <div class="dashboard--photo--upload--gellary">
                <div class="dashboard--photo--upload--heading">
                    <h3 class="daily--update--texts">Recently Uploaded Picture</h3>
                </div>

                <div class="dashboard--photo--upload--gellaryss">
                    @foreach($challenge_images->sortBy('day') as $image)
                        <div class="dashboard--photo--upload--card viewOther">
                            <div class="dashboard--photo--upload--image">
                                <img src="{{ asset($image->image) }}" alt="not found" />
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
    </div>

@endsection

@push('scripts')

@endpush
