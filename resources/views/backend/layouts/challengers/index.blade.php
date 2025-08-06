@extends('backend.app')

@section('title', 'Challengers List')

@section('content')
    {{-- PAGE-HEADER --}}
    <div class="page-header">
        <div>
            <h1 class="page-title">Challenger's List</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Table</a></li>
                <li class="breadcrumb-item active" aria-current="page">Challengers</li>
            </ol>
        </div>
    </div>
    {{-- PAGE-HEADER --}}

    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom w-100" id="datatable">
                            <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">#</th>
                                <th class="wd-15p border-bottom-0">Subscribe Time</th>
                                <th class="wd-15p border-bottom-0">Challenge Name</th>
                                <th class="wd-15p border-bottom-0">Challenge Entry Fee</th>
                                <th class="wd-15p border-bottom-0">User Name</th>
                                <th class="wd-15p border-bottom-0">User Email</th>
                                <th class="wd-15p border-bottom-0">User Profile Picture</th>
                            </tr>
                            </thead>
                            <tbody>
                            {{-- Dynamic data is populated by DataTables --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                }
            });

            if (!$.fn.DataTable.isDataTable('#datatable')) {
                $('#datatable').DataTable({
                    order: [],
                    lengthMenu: [
                        [10, 25, 50, 100, -1],
                        [10, 25, 50, 100, "All"]
                    ],
                    processing: true,
                    serverSide: true,
                    language: {
                        processing: `<div class="text-center">
                            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                            <span class="visually-hidden">Loading...</span>
                          </div>
                            </div>`
                    },
                    ajax: {
                        url: "{{ route('challengers-data') }}",
                        type: "GET",
                    },
                    columns: [
                        { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                        { data: 'created_at', name: 'created_at', orderable: false, searchable: false },
                        { data: 'challenge_name', name: 'challenge_name', orderable: false, searchable: false },
                        { data: 'challenge_entry_fee', name: 'challenge_entry_fee', orderable: false, searchable: false },
                        { data: 'name', name: 'name', orderable: true, searchable: true },
                        { data: 'email', name: 'email', orderable: true, searchable: true },
                        { data: 'avatar', name: 'avatar', orderable: false, searchable: false }
                    ],
                    scroller: {
                        loadingIndicator: false
                    },
                    pagingType: "full_numbers",
                    dom: "<'row justify-content-between table-topbar'<'col-md-2 col-sm-4 px-0'l><'col-md-2 col-sm-4 px-0'f>>tipr"
                });
            }
        });
    </script>
@endpush
