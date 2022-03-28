@extends('layouts.layout')
@section('pageTitle')
    Reports
@endsection
@section('pageDescription')
    Account reports
@endsection
@section('content')
    <div class="card mb-5 mb-xl-8">
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">CAMPAIGNS REPORTS</span>
            </h3>
            <div class="card-toolbar">
                <div class="d-flex justify-content-end" data-kt-docs-table-toolbar="base">
                    <a class="btn btn-light-primary mx-3" aria-expanded="false" data-bs-toggle="collapse" href="#kt_advanced_search_publisher">
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z" fill="black"></path>
                            </svg>
                        </span>
                        Filter
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body py-3">
            <div class="collapse" id="kt_advanced_search_publisher">
                <!--begin::Separator-->
                <div class="separator separator-dashed mt-9 mb-6"></div>
                <!--end::Separator-->
                <div class="row g-8 mb-8">
                    <div class="col-lg-3">
                        <label class="fs-6 form-label fw-bolder text-dark">ID Campaign</label>
                        <input type="text" class="form-control form-control-solid publisher_filter" data-row="0">
                    </div>
                    <div class="col-lg-3">
                        <label class="fs-6 form-label fw-bolder text-dark">ID Advertiser</label>
                        <input type="text" class="form-control form-control-solid publisher_filter" data-row="2">
                    </div>
                    <div class="col-lg-3">
                        <label class="fs-6 form-label fw-bolder text-dark">Unit Price</label>
                        <input type="text" class="form-control form-control-solid publisher_filter" data-row="3">
                    </div>
                    <div class="col-lg-3">
                        <label class="fs-6 form-label fw-bolder text-dark">Period</label>
                        <input class="form-control form-control-solid " id="kt_period_publisher"/>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4" id="publishers_reports_table">
                    <thead>
                    <tr class="fw-bolder text-muted">
                        <th class="min-w-150px">ID Campaign</th>
                        <th class="min-w-140px">Campaign Name</th>
                        <th class="min-w-120px">ID Advertiser</th>
                        <th>Unit Price </th>
                        <th>Quantity</th>
                        <th>Total amount </th>
                        <th>Rejection</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr class="fw-bolder fs-6 border-top-dashed">
                        <th colspan="4" class="text-nowrap align-end">Total:</th>
                        <th class="text-primary fs-3"></th>
                        <th class="text-primary fs-3"></th>
                        <th class="text-primary fs-3"></th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
    <script>
        var publisherPeriode = {
            start : '',
            end : ''
        };
        var publishersTable = $('#publishers_reports_table').DataTable({
            "paging": false,
            processing: true,
            serverSide: true,
            ajax: {
                url:"{{ route('publisher.advertisers.reports') }}",
                cache: false,
                data: function ( data ) {
                    data.start_date = publisherPeriode.start;
                    data.end_date = publisherPeriode.end;
                },
            },
            columns: [
                {data: 'campaign_id', name: 'campaign_id'},
                {data: 'campaign.name', name: 'campaign.name'},
                {data: 'campaign.advertiser_id', name: 'campaign.advertiser_id'},
                {data: 'buying_price', name: 'buying_price'},
                {data: 'quantity', name: 'quantity'},
                {data: 'total_amount', name: 'total_amount'},
                {data: 'rejection', name: 'rejection'},
            ],
            footerCallback: function(row, data, start, end, display) {
                var api = this.api(),
                    data;

                // Remove the formatting to get integer data for summation
                var intVal = function(i) {
                    return typeof i === "string" ?
                        i.replace(/[\$,]/g, "") * 1 :
                        typeof i === "number" ?
                            i : 0;
                };
                var total = api
                    .column(4)
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);
                $(api.column(4).footer()).html(
                    total
                );
                var total = api
                    .column(5)
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);
                $(api.column(5).footer()).html(
                    total + " € "
                );
                var total = api
                    .column(6)
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);
                $(api.column(6).footer()).html(
                    total
                );
            }

        });

        $('.publisher_filter').on('keyup',function () {
            publishersTable.columns($(this).data('row')).search($(this).val()).draw();
        });
        $("#kt_period_publisher").daterangepicker({
            showDropdowns: true,
            minYear: 1901,
            maxYear: parseInt(moment().format("YYYY"),10),
            ranges: {
                "Today": [moment(), moment()],
                "Yesterday": [moment().subtract(1, "days"), moment().subtract(1, "days")],
                "Last 7 Days": [moment().subtract(6, "days"), moment()],
                "Last 30 Days": [moment().subtract(29, "days"), moment()],
                "This Month": [moment().startOf("month"), moment().endOf("month")],
                "Last Month": [moment().subtract(1, "month").startOf("month"), moment().subtract(1, "month").endOf("month")]
            }
        }, function(start, end, label) {
            publisherPeriode.start = start.format("YYYY-MM-DD");
            publisherPeriode.end = end.format("YYYY-MM-DD");
            publishersTable.draw();
        }).on('apply.daterangepicker', function(ev, picker) {
            $(this).val('');
        });

    </script>
@endsection


