@extends('backend.app')

@section('title', 'Challenge Edit')

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
    {{-- PAGE-HEADER --}}


    <div class="row">
        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
            <div class="card box-shadow-0">
                <div class="card-body">
                    <form method="post" action="{{ route('challenge.update', ['id' => $data->id]) }}" >
                        @csrf
                        @method('PATCH')

                        <div class="form-group">
                            <label for="name" class="form-label">Challenge Name:</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                   name="name" placeholder="Challenge Name" id="name" value="{{ $data->name ?? ' ' }}">
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="start_date" class="form-label">Start Date & Time:</label>
                            <input type="datetime-local" class="form-control @error('start_date') is-invalid @enderror"
                                   name="start_date" placeholder="Start Date & Time" id="start_date" value="{{ $data->start_date ?? ' ' }}">
                            @error('start_date')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="end_date" class="form-label">End Date & Time:</label>
                            <input type="datetime-local" class="form-control @error('end_date') is-invalid @enderror"
                                   name="end_date" placeholder="End Date & Time" id="end_date" value="{{ $data->end_date ?? ' ' }}">
                            @error('end_date')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="entry_fee" class="form-label">Entry Fee:</label>
                            <input type="text" class="form-control @error('entry_fee') is-invalid @enderror"
                                   name="entry_fee" placeholder="Entry Fee" id="entry_fee" value="{{ $data->entry_fee ?? ' ' }}">
                            @error('entry_fee')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="price_money" class="form-label">Price Money:</label>
                            <input type="text" class="form-control @error('price_money') is-invalid @enderror"
                                   name="price_money" placeholder="Price Money" id="price_money" value="{{ $data->price_money ?? ' ' }}">
                            @error('price_money')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="vote_start_date" class="form-label">Vote Start Date & Time:</label>
                            <input type="datetime-local" class="form-control @error('vote_start_date') is-invalid @enderror"
                                   name="vote_start_date" placeholder="Vote Start Date & Time" id="vote_start_date" value="{{ $data->vote_start_date ?? ' ' }}">
                            @error('vote_start_date')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="vote_end_date" class="form-label">Vote End Date & Time:</label>
                            <input type="datetime-local" class="form-control @error('vote_end_date') is-invalid @enderror"
                                   name="vote_end_date" placeholder="Vote End Start Date & Time" id="vote_end_date" value="{{ $data->vote_end_date ?? ' ' }}">
                            @error('vote_end_date')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="d-flex justify-content-between mb-2">
                                <label for="rule" class="form-label">Challenge Rules:</label>
                                <button type="button" id="add-rule" class="btn btn-primary mt-2">Add Rule</button>
                            </div>
                            <div id="rules-container">
                                @foreach ($data->challengeRules as $rule)
                                    <div class="rule-item d-flex mb-2">
                                        <input type="text" class="form-control @error('rules.*') is-invalid @enderror"
                                               name="rules[]" placeholder="Enter challenge rule" value="{{ $rule->rule }}">
                                        @error('rules.*')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <!-- Remove button for each rule -->
                                        <button type="button" class="btn btn-danger btn-sm ms-2 remove-rule">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                        <input type="hidden" name="rule_ids[]" value="{{ $rule->id }}">
                                    </div>
                                @endforeach
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
        // jQuery to handle adding new rule input fields
        $(document).ready(function() {
            // Handle adding a new rule
            $('#add-rule').click(function() {
                $('#rules-container').append(`
                    <div class="rule-item d-flex mb-2">
                        <input type="text" class="form-control" name="rules[]" placeholder="Enter challenge rule">
                        <button type="button" class="btn btn-danger btn-sm ms-2 remove-rule"><i class="fa fa-minus"></i></button>
                    </div>
                `);
            });

            // Handle removing a rule
            $(document).on('click', '.remove-rule', function() {
                // Remove the rule input field and the remove button
                $(this).closest('.rule-item').remove();
            });
        });
    </script>
@endpush
