@extends('layouts.layout')
@section('pageTitle')
    @lang('advert/reports.page_title')
@endsection
@section('pageDescription')
    @lang('advert/reports.page_description')
@endsection
@section('content')
    <div class="card mb-5 mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">@lang('advert/reports.campaigns_reports')</span>
            </h3>
            <!--begin::Toolbar-->
            <div class="card-toolbar">
                <div class="d-flex justify-content-end" data-kt-docs-table-toolbar="base">
                    <button type="button" class="btn btn-light-primary mx-3" aria-expanded="false" data-bs-toggle="collapse" data-bs-target="#kt_advanced_search_advertiser" role="button" >
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z" fill="black"></path>
                            </svg>
                        </span>
                        @lang('advert/reports.filter')
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body py-3">
            <div class="collapse" id="kt_advanced_search_advertiser">
                <div class="separator separator-dashed mt-9 mb-6"></div>
                <div class="row g-8 mb-8">
                    <div class="col-lg-3">
                        <label class="fs-6 form-label fw-bolder text-dark">@lang('advert/reports.campaign_id')</label>
                        <input type="text" class="form-control form-control-solid filter_advertiser" data-row="0">
                    </div>
                    <div class="col-lg-3">
                        <label class="fs-6 form-label fw-bolder text-dark">@lang('advert/reports.publisher_id')</label>
                        <input type="text" class="form-control form-control-solid filter_advertiser" data-row="2">
                    </div>
                    <div class="col-lg-3">
                        <label class="fs-6 form-label fw-bolder text-dark">@choice('advert/reports.unit_price',1)</label>
                        <input type="text" class="form-control form-control-solid filter_advertiser" data-row="3">
                    </div>
                    <div class="col-lg-3">
                        <label class="fs-6 form-label fw-bolder text-dark">@lang('advert/reports.period')</label>
                        <input class="form-control form-control-solid" id="kt_period_advertiser"/>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <!--begin::Table-->
                <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4" id="advertisers_reports_table">
                    <!--begin::Table head-->
                    <thead>
                        <tr class="fw-bolder text-muted">
                            <th class="min-w-150px">@lang('advert/reports.campaign_id')</th>
                            <th class="min-w-140px">@lang('advert/reports.campaign_name')</th>
                            <th class="min-w-120px">@lang('advert/reports.publisher_id')</th>
                            <th>@choice('advert/reports.unit_price',1)</th>
                            <th>@lang('advert/reports.quantity')</th>
                            <th>@lang('advert/reports.total_amount')</th>
                            <th>@lang('advert/reports.rejection')</th>
                            <th class="min-w-100px text-end">Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                    <tr class="fw-bolder fs-6 border-top-dashed">
                        <th colspan="4" class="text-nowrap align-end">@lang('advert/reports.total'):</th>
                        <th class="text-primary fs-3"></th>
                        <th class="text-primary fs-3"></th>
                        <th class="text-primary fs-3"></th>
                    </tr>
                    </tfoot>
                </table>
                <!--end::Table-->
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
    <script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
    <script>
        var advertiserPeriode = {
            start : '',
            end : ''
        };
        var advertisersTable = $('#advertisers_reports_table').DataTable({
            searchDelay: 500,
            processing: true,
            serverSide: true,
            ajax: {
                url:"{{ route('advertiser.publishers.reports') }}",
                cache: false,
                data: function ( data ) {
                    data.start_date = advertiserPeriode.start;
                    data.end_date = advertiserPeriode.end;
                },
            },
            columns: [
                {data: 'campaign_id', name: 'campaign_id'},
                {data: 'campaign.name', name: 'campaign.name'},
                {data: 'publisher_id', name: 'publisher_id'},
                {data: 'campaign.selling_price', name: 'campaign.selling_price'},
                {data: 'quantity', name: 'quantity'},
                {data: 'total_amount', name: 'total_amount'},
                {data: 'rejection', name: 'rejection'},
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ],
            columnDefs: [
                {
                    "targets": [3,5],
                    "render": function (data, type, row) {
                        return data!= null ?data+' €':'';
                    }
                },
                {
                    "render": function (data, type, row) {
                        return '';
                    },
                    "targets": 7
                },
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
            },
            "language": {
                "zeroRecords": '@lang('datatables.zeroRecords')',
                "info": '@lang('datatables.info')',
                "infoEmpty": '@lang('datatables.infoEmpty')',
            }
        });
        $('.filter_advertiser').on('keyup',function () {
            advertisersTable.columns($(this).data('row')).search($(this).val()).draw();
        });
        $("#kt_period_advertiser").daterangepicker({
            showDropdowns: true,
            minYear: 2019,
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
            advertiserPeriode.start = start.format("YYYY-MM-DD");
            advertiserPeriode.end = end.format("YYYY-MM-DD");
            advertisersTable.draw();
        }).on('apply.daterangepicker', function(ev, picker) {
            $(this).val('');
        });

    </script>
@endsection


