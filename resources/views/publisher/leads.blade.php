@extends('layouts.layout')
@section('pageTitle')
    @lang('publisher/leads.page_title')
@endsection
@section('pageDescription')
    @lang('admin/leads.page_description')
@endsection
@section('content')
    <div class="card">
        <div class="card-header border-0 pt-6">
            <div class="card-title">
                <div class="d-flex align-items-center position-relative my-1">
                    <span class="svg-icon svg-icon-1 position-absolute ms-6">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black"/>
                            <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black"/>
                        </svg>
                    </span>
                    <input type="text" data-kt-leads-table-filter="search" class="form-control form-control-solid w-250px ps-15" placeholder="Search"/>
                </div>
            </div>
            <div class="card-toolbar">
                <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                    <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z" fill="black"/>
                            </svg>
                        </span>
                        @choice('datatables.column',2)
                    </button>
                    <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true" id="kt-toolbar-filter">
                        <div class="px-7 py-5">
                            <div class="fs-4 text-dark fw-bolder">@choice('datatables.column',2)</div>
                        </div>
                        <div class="separator border-gray-200"></div>
                        <div class="px-7 py-5">
                            <div class="mb-10">
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input columnToggleBtn" type="checkbox" checked="ckeched" data-column="0"/>
                                        <span class="form-check-label text-gray-600">@lang('publisher/leads.id') @choice('publisher/leads.lead',1)</span>
                                    </label>
                                </div>
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input columnToggleBtn" type="checkbox" checked="ckeched" data-column="1"/>
                                        <span class="form-check-label text-gray-600">@lang('publisher/leads.id') @choice('publisher/leads.campaigns',1)</span>
                                    </label>
                                </div>
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input columnToggleBtn" type="checkbox" checked="ckeched" data-column="2"/>
                                        <span class="form-check-label text-gray-600">@lang('publisher/leads.last_name')</span>
                                    </label>
                                </div>
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input columnToggleBtn" type="checkbox" checked="ckeched" data-column="3"/>
                                        <span class="form-check-label text-gray-600">@lang('publisher/leads.first_name')</span>
                                    </label>
                                </div>
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input columnToggleBtn" type="checkbox" checked="ckeched" data-column="4"/>
                                        <span class="form-check-label text-gray-600">@choice('publisher/leads.country',1)</span>
                                    </label>
                                </div>
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input columnToggleBtn" type="checkbox" checked="ckeched" data-column="5"/>
                                        <span class="form-check-label text-gray-600">@lang('publisher/leads.phone')</span>
                                    </label>
                                </div>
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input columnToggleBtn" type="checkbox" checked="ckeched" data-column="6"/>
                                        <span class="form-check-label text-gray-600">@lang('publisher/leads.email')</span>
                                    </label>
                                </div>
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input columnToggleBtn" type="checkbox" checked="ckeched" data-column="7"/>
                                        <span class="form-check-label text-gray-600">@lang('publisher/leads.subscription_date')</span>
                                    </label>
                                </div>
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input columnToggleBtn" type="checkbox" checked="ckeched" data-column="8"/>
                                        <span class="form-check-label text-gray-600">@lang('publisher/leads.web_page_name')</span>
                                    </label>
                                </div>
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input columnToggleBtn" type="checkbox" checked="ckeched" data-column="9"/>
                                        <span class="form-check-label text-gray-600">@lang('publisher/leads.web_page_url')</span>
                                    </label>
                                </div>
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input columnToggleBtn" type="checkbox" checked="ckeched" data-column="10"/>
                                        <span class="form-check-label text-gray-600">@lang('publisher/leads.sending_date')</span>
                                    </label>
                                </div>
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input columnToggleBtn" type="checkbox" checked="ckeched" data-column="11"/>
                                        <span class="form-check-label text-gray-600">@lang('publisher/leads.sale_status')</span>
                                    </label>
                                </div>
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input columnToggleBtn" type="checkbox" checked="ckeched" data-column="12"/>
                                        <span class="form-check-label text-gray-600">@lang('publisher/leads.sale_income')</span>
                                    </label>
                                </div>
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input columnToggleBtn" type="checkbox" checked="ckeched" data-column="13"/>
                                        <span class="form-check-label text-gray-600">@lang('publisher/leads.sale_income')</span>
                                    </label>
                                </div>
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input columnToggleBtn" type="checkbox" checked="ckeched" data-column="14"/>
                                        <span class="form-check-label text-gray-600">@lang('publisher/leads.sale_income')ID Advertiser</span>
                                    </label>
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input columnToggleBtn" type="checkbox" checked="ckeched" data-column="15"/>
                                        <span class="form-check-label text-gray-600">Actions</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Card toolbar-->
        </div>
        </div>
        <div class="card-body">
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_leads_table">
                <thead>
                <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                    <th>@lang('publisher/leads.id') @choice('publisher/leads.lead',1)</th>
                    <th>@lang('publisher/leads.campaign_id')</th>
                    <th>@lang('publisher/leads.last_name')</th>
                    <th>@lang('publisher/leads.first_name')</th>
                    <th>@choice('publisher/leads.country',1)</th>
                    <th>@lang('publisher/leads.phone')</th>
                    <th>@lang('publisher/leads.email')</th>
                    <th>@lang('publisher/leads.subscription_date')</th>
                    <th>@lang('publisher/leads.web_page_name')</th>
                    <th>@lang('publisher/leads.web_page_url')</th>
                    <th>@lang('publisher/leads.sending_date')</th>
                    <th>@lang('publisher/leads.sale_status')</th>
                    <th>@lang('publisher/leads.sale_income')</th>
                    <th>@lang('publisher/leads.rejection')</th>
                    <th>@lang('publisher/leads.advertiser_id')</th>
                    <th class="min-w-100px">Actions</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection
@section('javascript')
    <script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
    <script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
    <script>
        var table = $('#kt_leads_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('publisher.leads.list') }}",
            columns: [
                {data: 'id_lead', name: 'id_lead'},
                {data: 'campaign_id', name: 'campaign_id'},
                {data: 'last_name', name: 'last_name'},
                {data: 'first_name', name: 'first_name'},
                {data: 'country', name: 'country'},
                {data: 'phone_number', name: 'phone_number'},
                {data: 'email', name: 'email'},
                {data: 'subscription_date', name: 'subscription_date'},
                {data: 'web_page_name', name: 'web_page_name'},
                {data: 'web_page_url', name: 'web_page_url'},
                {data: 'sending_date', name: 'sending_date'},
                {data: 'sale_status', name: 'sale_status'},
                {data: 'sale_income', name: 'sale_income'},
                {data: 'rejection', name: 'rejection'},
                {data: 'advertiser_id', name: 'advertiser_id'},
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ],
            columnDefs: [
                {
                    "render": function (data, type, row) {
                        if (data == "") {
                            return '';
                        }
                        return '<div class="badge badge-light">' + data + '</div>';
                    },
                    "targets": 13
                },{
                    "render": function (data, type, row) {
                        return '<div class="badge badge-light">' + data + '</div>';
                    },
                    "targets": 11
                }, {
                    "render": function (data, type, row) {
                        return '';
                    },
                    "targets": 15
                },
            ],
            "language": {
                "zeroRecords": '@lang('datatables.zeroRecords')',
                "info": '@lang('datatables.info')',
                "infoEmpty": '@lang('datatables.infoEmpty')',
            }
        });
        table.on('draw',function () {
            KTMenu.createInstances()
        });
        $('[data-kt-leads-table-filter="search"]').on('keyup', function (e) {
            table.search($(this).val()).draw();
        });
        $('.columnToggleBtn').on( 'click', function (e) {
            var column = table.column( $(this).attr('data-column') );
            column.visible( $(this).is(':checked') );
            table.columns.adjust().draw();
        } );
    </script>
@endsection


