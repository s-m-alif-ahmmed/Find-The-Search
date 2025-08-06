@extends('backend.app')

@section('title', 'Challenge Leaderboard')

@section('content')
    {{-- PAGE-HEADER --}}
    <div class="page-header">
        <div>
            <h1 class="page-title">Challenge Leaderboard</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Challenge Leaderboard</li>
            </ol>
        </div>
    </div>
    {{-- PAGE-HEADER --}}

    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header border-bottom" style="margin-bottom: 0; display: flex; justify-content: space-between;">
                    <h3 class="card-title">Challenge Leaderboard Table</h3>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom w-100" id="datatable">
                            <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">#</th>
                                <th class="wd-15p border-bottom-0">Challenger Photo and Name</th>
                                <th class="wd-15p border-bottom-0">Challenger Email</th>
                                <th class="wd-15p border-bottom-0">Before Image</th>
                                <th class="wd-15p border-bottom-0">Now Image</th>
                                <th class="wd-15p border-bottom-0">Total Votes</th>
                            </tr>
                            </thead>
                            <tbody>
                            {{-- Dynamic data will be loaded here via AJAX --}}
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
        // Pass the challenge ID from Blade to JavaScript
        var leaderboardUrl = "{{ route('challenge.index.leaderboard', ['id' => $challenge->id]) }}";
    </script>


    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                }
            });

            if (!$.fn.DataTable.isDataTable('#datatable')) {
                let dTable = $('#datatable').DataTable({
                    order: [],
                    lengthMenu: [
                        [10, 25, 50, 100, -1],
                        [10, 25, 50, 100, "All"]
                    ],
                    processing: true,
                    responsive: true,
                    serverSide: true,
                    language: {
                        processing: `<div class="text-center">
                    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                    <span class="visually-hidden">Loading...</span>
                    </div>
                </div>`
                    },
                    pagingType: "full_numbers",
                    dom: "<'row justify-content-between table-topbar'<'col-md-2 col-sm-4 px-0'l><'col-md-2 col-sm-4 px-0'f>>tipr",
                    ajax: {
                        url: leaderboardUrl,
                        type: "GET",
                    },
                    columns: [
                        { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                        { data: 'challenger', name: 'challenger', orderable: true, searchable: true },
                        { data: 'email', name: 'email', orderable: true, searchable: true },
                        { data: 'before_image', name: 'before_image', orderable: false, searchable: false },
                        { data: 'now_image', name: 'now_image', orderable: false, searchable: false },
                        { data: 'total_votes', name: 'total_votes', orderable: true, searchable: true }
                    ]
                });
            }
        });
    </script>
@endpush
