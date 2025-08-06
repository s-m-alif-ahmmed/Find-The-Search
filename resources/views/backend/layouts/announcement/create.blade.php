@extends('backend.app')

@section('title', 'Announcement Create')

@section('content')
    {{-- PAGE-HEADER --}}
    <div class="page-header">
        <div>
            <h1 class="page-title">Announcement Form</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Announcement</li>
            </ol>
        </div>
    </div>
    {{-- PAGE-HEADER END --}}


    <div class="row">
        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
            <div class="card box-shadow-0">
                <div class="card-body">
                    <form method="POST" action="{{ route('announcement.store') }}" >
                        @csrf
                        @method('POST')

                        <div class="form-group">
                            <label for="title" class="form-label">Announcement Title:</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                name="title" placeholder="Announcement Title" id="title" value="{{ old('title') }}">
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="detail" class="form-label">Announcement Description:</label>
                            <textarea class="form-control @error('detail') is-invalid @enderror" name="detail" placeholder="Announcement Description" cols="30" rows="3">{{ old('detail') }}</textarea>
                            @error('detail')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Submit</button>
                            <a href="{{ route('announcement.index') }}" class="btn btn-danger me-2">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
