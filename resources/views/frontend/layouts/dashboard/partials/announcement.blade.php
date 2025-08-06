<!-- Modal -->
<div class="modal fade" id="exampleModalAnnouncement" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="notification--header">
                    <h3 class="dashboard--notification--NameText">Announcement</h3>
                </div>

                <div class="notification--wrapper">
                    <div class="announcement--notification--card--wrapper">
                        @foreach($announcements as $announcement)
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

            </div>
        </div>
    </div>
</div>
