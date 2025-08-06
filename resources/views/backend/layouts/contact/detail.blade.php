@extends('backend.app')

@section('title', 'Contact Message')

@section('content')
    {{-- PAGE-HEADER --}}
    <div class="page-header">
        <div>
            <h1 class="page-title">Contact</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Settings</a></li>
                <li class="breadcrumb-item active" aria-current="page">Contact Message</li>
            </ol>
        </div>
    </div>
    {{-- PAGE-HEADER --}}

    <div class="row">
        <div class="col-12">
            <div class="card box-shadow-0">
                <div class="card-header border-bottom">
                    <h4 class="card-title">Contact Message</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail2">First Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail2" value="{{ $contact->first_name }}" placeholder="First Name" disabled>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail2">Last Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail2" value="{{ $contact->last_name }}" placeholder="Last Name" disabled>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail2">Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail2" value="{{ $contact->email }}" placeholder="Email" disabled>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail2">Number</label>
                        <input type="number" class="form-control" id="exampleInputEmail2" value="{{ $contact->number }}" placeholder="Phone" disabled>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword2">Message</label>
                        <textarea type="text" class="form-control" id="exampleInputPassword2" placeholder="message" disabled>{{ $contact->message }}</textarea>
                    </div>
                    <a href="{{ route('contact.index') }}" class="btn btn-primary mt-3">Back</a>
                </div>
            </div>
        </div>
    </div>

@endsection


@push('scripts')

@endpush
