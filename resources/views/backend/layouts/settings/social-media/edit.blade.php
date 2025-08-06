@extends('backend.app')

@section('title', 'Social Media Edit')

@section('content')
    {{-- PAGE-HEADER --}}
    <div class="page-header">
        <div>
            <h1 class="page-title">Social Media Form</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Table</a></li>
                <li class="breadcrumb-item active" aria-current="page">Social Media</li>
            </ol>
        </div>
    </div>
    {{-- PAGE-HEADER --}}


    <div class="row">
        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
            <div class="card box-shadow-0">
                <div class="card-body">
                    <form method="post" action="{{ route('social.update', ['id' => $data->id]) }}" >
                        @csrf
                        @method('PATCH')

                        <div class="form-group">
                            <label for="linkedin" class="form-label">Linkedin Link:</label>
                            <input type="text" class="form-control @error('linkedin') is-invalid @enderror"
                                   name="linkedin" placeholder="Linkedin Link" id="linkedin" value="{{ $data->linkedin ?? ' '  }}">
                            @error('linkedin')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="twitter" class="form-label">Twitter Link:</label>
                            <input type="text" class="form-control @error('twitter') is-invalid @enderror"
                                   name="twitter" placeholder="Twitter Link" id="twitter" value="{{ $data->twitter ?? ' '  }}">
                            @error('twitter')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="instagram" class="form-label">Instagram Link:</label>
                            <input type="text" class="form-control @error('instagram') is-invalid @enderror"
                                   name="instagram" placeholder="Instagram Link" id="instagram" value="{{ $data->instagram ?? ' '  }}">
                            @error('instagram')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="facebook" class="form-label">Facebook Link:</label>
                            <input type="text" class="form-control @error('facebook') is-invalid @enderror"
                                   name="facebook" placeholder="Facebook Link" id="facebook" value="{{ $data->facebook ?? ' '  }}">
                            @error('facebook')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Submit</button>
                            <a href="{{ route('social.index') }}" class="btn btn-danger me-2">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
