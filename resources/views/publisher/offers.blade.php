@extends('layouts.layout')
@section('pageTitle')
    Offers list
@endsection
@section('pageDescription')
    List of all offers
@endsection
@section('content')
    @foreach($campaigns as $campaign)
        <div class="row g-6 g-xl-9">

            <div class="col-lg-6 col-xxl-4">
                <!--begin::Budget-->
                <div class="card h-100">
                    <div class="card-body p-9">
                        <div class="fs-2 fw-bolder">{{$campaign->name}}</div>
                        <div class="fs-4 fw-bold text-gray-400 mb-7">{{$campaign->thematics->name}}</div>
                        <div class="badge badge-light">{{$campaign->thematics->name}}</div>
                        <div class="separator separator-dashed"></div>
                        <div class="fv-row">
                            <div class="dropzone" id="kt_dropzonejs_example_1">
                                <div class="dz-message needsclick">
                                    <i class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>
                                    <div class="ms-4">
                                        <h3 class="fs-5 fw-bolder text-gray-900 mb-1">Drop files here or click to upload.</h3>
                                        <span class="fs-7 fw-bold text-gray-400">Upload Your leads CSV files</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    @endforeach
@endsection

@section('javascript')
    <script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
    <script>
        var myDropzone = new Dropzone("#kt_dropzonejs_example_1", {
            autoProcessQueue: false,
            paramName: "file",
            maxFiles: 1,
            maxFilesize: 10,
            addRemoveLinks: true
        });
    </script>
{{--    <script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
    <script>
        $(document).ready(function () {
            var table = $("#kt_campaigns_table").DataTable({
                "pageLength": 5,
                lengthMenu: [[5, 10, 20], [5, 10, 20]],
            });
            $('.columnToggleBtn').on('click', function (e) {
                var column = table.column($(this).attr('data-column'));
                column.visible($(this).is(':checked'));
                table.columns.adjust().draw();
            });
            $('[data-kt-campaigns-table-filter="search"]').on('keyup', function (e) {
                table.search($(this).val()).draw();
            });
        });
    </script>--}}
@endsection
