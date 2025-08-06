<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="notification--header">
                    <h3 class="dashboard--notification--NameText">Notification</h3>
                </div>

                <div class="notification--wrapper">
                    @foreach($notifications as $notification)
                        <div class="notification--item">
                            <div class="notification--header--time--wrapper">
                                <h3>{{ json_decode($notification->data)->title ?? 'No title available' }}</h3> <!-- Decode data as JSON -->
                                <p>{{ $notification->created_at->format('h:i A') }}</p> <!-- Display time -->
                            </div>
                            <h4>{{ json_decode($notification->data)->data ?? 'No message available' }}</h4> <!-- Decode and display message -->
                        </div>
                    @endforeach

                </div>

            </div>
        </div>
    </div>
</div>
