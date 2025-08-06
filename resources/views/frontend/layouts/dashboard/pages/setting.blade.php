@extends('frontend.layouts.dashboard.app')

@section('title', 'Setting')

@section('content')

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
                        <img src="{{ asset( asset(Auth::user()->avatar ?? '/frontend/default-avatar-profile.jpg') ) }}" alt="not found" />
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

        <div class="dashboard--setting--wrapper">
            <ul class="skltbs-tab-group">
                <!-- tabGroup -->
                <li class="skltbs-tab-item">
                    <!-- tabItem -->
                    <button class="skltbs-tab">General</button
                    ><!-- tab -->
                </li>
                <li class="skltbs-tab-item">
                    <button class="skltbs-tab">Privacy & Security</button>
                </li>
            </ul>

            <div class="skltbs-panel-group">
                <!-- panelGroup -->
                <div class="skltbs-panel">
                    <div class="genarel--wrapper">
                        <h3 class="dashboard--notification--NameText">General</h3>
                        <p class="dashboard--notification--SubText">
                            This section allows you to customize various aspects of your
                            account to enhance your experience
                        </p>
                    </div>

                    <div class="genaral--setting--main--wrapper">
                        <div class="genaral--setting--instraction--wrapper">
                            <div class="genaral--setting--profile--picture--ins">
                                <h3 class="dashboard--notification--NameText">
                                    Profile Picture
                                </h3>
                                <p class="dashboard--notification--SubText">
                                    This section allows you to customize various aspects of
                                    your account to enhance your experience
                                </p>
                            </div>

                            <div class="genaral--setting--profile--picture--ins">
                                <h3 class="dashboard--notification--NameText">First Name</h3>
                                <p class="dashboard--notification--SubText">
                                    This Will let you upload 01 change your dissolved name
                                </p>
                            </div>

                            <div class="genaral--setting--profile--picture--ins">
                                <h3 class="dashboard--notification--NameText">Last Name</h3>
                                <p class="dashboard--notification--SubText">
                                    This Will let you upload 01 change your dissolved name
                                </p>
                            </div>

                            <div class="genaral--setting--profile--picture--ins">
                                <h3 class="dashboard--notification--NameText">
                                    Email Address
                                </h3>
                                <p class="dashboard--notification--SubText">
                                    This email can not be changed
                                </p>
                            </div>

                            <div class="genaral--setting--profile--picture--ins">
                                <h3 class="dashboard--notification--NameText">
                                    Date of Birth
                                </h3>
                                <p class="dashboard--notification--SubText">
                                    This information Will not be displayed to other profile
                                </p>
                            </div>

                            <div class="genaral--setting--profile--picture--ins">
                                <h3 class="dashboard--notification--NameText">
                                    Job Title
                                </h3>
                                <p class="dashboard--notification--SubText">
                                    This information Will not be displayed to other profile
                                </p>
                            </div>
                        </div>

                        <form action="{{ route('user.update.profile') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <div class="genaral--setting--update--wrapper">
                                <div class="image-uploader-container">
                                    <div class="preview-section">
                                        <div id="imagePreview" class="image-preview">
                                            <img id="previewImg" src="{{ Auth::user()->avatar ? asset(Auth::user()->avatar) : asset('frontend/default-avatar-profile.jpg') }}" alt="Preview" />
                                        </div>
                                    </div>

                                    <div class="uploader-section">
                                        <input type="file" name="avatar" id="profilePictureInput" accept="image/png, image/jpeg, image/jpg" hidden/>
                                        <label for="profilePictureInput" class="upload-btn">
                                            <i class="upload-icon"></i> Upload profile picture
                                        </label>
                                        <p class="upload-instruction">
                                            At least 256x256 PNG or JPG file
                                        </p>
                                    </div>
                                    @error('avatar')
                                    <div class="text-white">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="nameChangeInputBox">
                                    <input placeholder="Type Here" name="first_name" value="{{ Auth::user()->first_name }}" type="text" />
                                </div>
                                @error('first_name')
                                <div class="text-white">{{ $message }}</div>
                                @enderror

                                <div class="nameChangeInputBox">
                                    <input placeholder="Type Here" name="last_name" value="{{ Auth::user()->last_name }}" type="text" />
                                </div>
                                @error('last_name')
                                <div class="text-white">{{ $message }}</div>
                                @enderror

                                <div class="nameChangeInputBox">
                                    <input placeholder="yourgmail@gmail.com" name="email" value="{{ Auth::user()->email }}" type="email" readonly />
                                </div>
                                @error('email')
                                <div class="text-white">{{ $message }}</div>
                                @enderror

                                <div class="nameChangeInputBox">
                                    <input type="date" name="dob" value="{{ Auth::user()->dob ? \Carbon\Carbon::parse(Auth::user()->dob)->format('Y-m-d') : '' }}" />
                                </div>
                                @error('dob')
                                <div class="text-white">{{ $message }}</div>
                                @enderror

                                <div class="nameChangeInputBox">
                                    <input placeholder="Job Title" name="job_title" value="{{ Auth::user()->job_title }}" type="text" />
                                </div>
                                @error('job_title')
                                <div class="text-white">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="save--change--btn">
                                <button type="submit">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- panel -->
                <div class="skltbs-panel">
                    <div class="genarel--wrapper">
                        <h3 class="dashboard--notification--NameText">Change Password</h3>
                        <p class="dashboard--notification--SubText">
                            You can change your password anytime you think it is unsafe.
                        </p>
                    </div>

                    <div class="genaral--setting--main--wrapper">
                        <div class="genaral--setting--instraction--wrapper">

                            <div class="genaral--setting--profile--picture--ins">
                                <h3 class="dashboard--notification--NameText">Your current password</h3>
                                <p class="dashboard--notification--SubText">
                                    This will confirm that you are the one who wants to change your password.
                                </p>
                            </div>

                            <div class="genaral--setting--profile--picture--ins">
                                <h3 class="dashboard--notification--NameText">
                                    New password
                                </h3>
                                <p class="dashboard--notification--SubText">
                                    Enter your new password With minimal character 8.
                                </p>
                            </div>

                            <div class="genaral--setting--profile--picture--ins">
                                <h3 class="dashboard--notification--NameText">
                                    Confirm new passwor
                                </h3>
                                <p class="dashboard--notification--SubText">
                                    Enter the same password wth before.
                                </p>
                            </div>
                        </div>

                        <form action="{{ route('user.update.profile.password') }}" method="POST">
                            @csrf
                            @method('PATCH')

                            <div class="genaral--setting--update--wrapper">

                                <div class="nameChangeInputBox">
                                    <input placeholder="Your Current Password" type="password" name="old_password" required />
                                </div>
                                @error('old_password')
                                <div class="text-white">{{ $message }}</div>
                                @enderror

                                <div class="nameChangeInputBox">
                                    <input placeholder="New Password" type="password" name="password" required />
                                </div>
                                @error('password')
                                <div class="text-white">{{ $message }}</div>
                                @enderror

                                <div class="nameChangeInputBox">
                                    <input placeholder="Confirm New Password" type="password" name="password_confirmation" required />
                                </div>
                                @error('password_confirmation')
                                <div class="text-white">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="save--change--btn">
                                <button type="submit">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
