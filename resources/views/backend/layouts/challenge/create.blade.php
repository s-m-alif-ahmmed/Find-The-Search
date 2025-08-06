@extends('backend.app')

@section('title', 'Challenge Create')

@section('content')
    {{-- PAGE-HEADER --}}
    <div class="page-header">
        <div>
            <h1 class="page-title">Challenge Form</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Settings</a></li>
                <li class="breadcrumb-item active" aria-current="page">Challenge</li>
            </ol>
        </div>
    </div>
    {{-- PAGE-HEADER END --}}


    <div class="row">
        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
            <div class="card box-shadow-0">
                <div class="card-body">
                    <form method="POST" action="{{ route('challenge.store') }}" enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        <div class="form-group">
                            <label for="name" class="form-label">Challenge Name:</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" placeholder="Challenge Name" id="name" value="{{ old('name') }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="start_date" class="form-label">Start Date & Time:</label>
                            <input type="datetime-local" class="form-control @error('start_date') is-invalid @enderror"
                                name="start_date" placeholder="Start Date & Time" id="start_date" value="{{ old('start_date') }}">
                            @error('start_date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="end_date" class="form-label">End Date & Time:</label>
                            <input type="datetime-local" class="form-control @error('end_date') is-invalid @enderror"
                                name="end_date" placeholder="End Date & Time" id="end_date" value="{{ old('end_date') }}">
                            @error('end_date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="entry_fee" class="form-label">Entry Fee:</label>
                            <input type="text" class="form-control @error('entry_fee') is-invalid @enderror"
                                name="entry_fee" placeholder="Entry Fee" id="entry_fee" value="{{ old('entry_fee') }}">
                            @error('entry_fee')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="price_money" class="form-label">Price Money:</label>
                            <input type="text" class="form-control @error('price_money') is-invalid @enderror"
                                name="price_money" placeholder="Price Money" id="price_money" value="{{ old('price_money') }}">
                            @error('price_money')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="vote_start_date" class="form-label">Vote Start Date & Time:</label>
                            <input type="datetime-local" class="form-control @error('vote_start_date') is-invalid @enderror"
                                name="vote_start_date" placeholder="Vote Start Date & Time" id="vote_start_date" value="{{ old('vote_start_date') }}">
                            @error('vote_start_date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="vote_end_date" class="form-label">Vote End Date & Time:</label>
                            <input type="datetime-local" class="form-control @error('vote_end_date') is-invalid @enderror"
                                name="vote_end_date" placeholder="Vote End Start Date & Time" id="vote_end_date" value="{{ old('vote_end_date') }}">
                            @error('vote_end_date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group" id="rules">
                            <div class="d-flex justify-content-between mb-2">
                                <label for="rule" class="form-label">Challenge Rules:</label>
                                <button type="button" class="btn btn-primary mt-2" id="addRule">Add Rule</button>
                            </div>
                            <div id="rules-container">
                                <div class="rule-item d-flex mb-2">
                                    <input type="text" class="form-control @error('rule') is-invalid @enderror"
                                           name="rules[]" placeholder="Enter rule" id="rule-1" value="{{ old('rules.0') }}">
                                    @error('rules.0')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <!-- Remove button for each rule -->
                                    <button type="button" class="btn btn-danger btn-sm ms-2 remove-rule">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Submit</button>
                            <a href="{{ route('challenge.index') }}" class="btn btn-danger me-2">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            let ruleCount = 1; // To keep track of the rule input fields

            // Handle adding a new rule
            $('#addRule').on('click', function() {
                ruleCount++; // Increment the counter for new input fields

                // Create a new input field for the rule
                const newRuleField = $('<div class="rule-item d-flex mb-2">')
                    .append(
                        $('<input>')
                            .attr('type', 'text')
                            .attr('name', 'rules[]') // Ensures that all rules are submitted as an array
                            .addClass('form-control') // Add the form-control class
                            .attr('placeholder', 'Enter rule') // Set placeholder text
                            .attr('id', 'rule-' + ruleCount) // Give each input a unique ID
                    )
                    .append(
                        $('<button type="button" class="btn btn-danger btn-sm ms-2 remove-rule">')
                            .append('<i class="fa fa-minus"></i>') // Add the minus icon
                    );

                // Append the new input field to the rules container
                $('#rules-container').append(newRuleField);
            });

            // Handle removing a rule
            $(document).on('click', '.remove-rule', function() {
                // Remove the rule input field and the remove button
                $(this).closest('.rule-item').remove();
            });
        });
    </script>
@endpush
