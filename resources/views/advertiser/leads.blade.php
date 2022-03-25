@extends('layouts.layout')
@section('pageTitle')
    @lang('advert/leads.page_title')
@endsection
@section('pageDescription')
    @lang('admin/leads.page_description')
@endsection
@section('content')
    <div class="card">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                    <span class="svg-icon svg-icon-1 position-absolute ms-6">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black"/>
                        <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black"/>
                    </svg>
                </span>
                    <!--end::Svg Icon-->
                    <input type="text" data-kt-leads-table-filter="search" class="form-control form-control-solid w-250px ps-15" placeholder="Search"/>
                </div>
                <!--end::Search-->
            </div>
            <!--begin::Card title-->
            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                    <!--begin::Filter-->
                    <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                        <span class="svg-icon svg-icon-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z" fill="black"/>
                        </svg>
                    </span>
                        @choice('datatables.column',2)
                    </button>
                    <!--begin::Menu 1-->
                    <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true" id="kt-toolbar-filter">
                        <!--begin::Header-->
                        <div class="px-7 py-5">
                            <div class="fs-4 text-dark fw-bolder">@choice('datatables.column',2)</div>
                        </div>
                        <div class="separator border-gray-200"></div>
                        <div class="px-7 py-5">
                            <div class="mb-10">
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input columnToggleBtn" type="checkbox" checked="ckeched" data-column="0"/>
                                        <span class="form-check-label text-gray-600">@lang('advert/leads.id') @choice('advert/leads.lead',1)</span>
                                    </label>
                                </div>
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input columnToggleBtn" type="checkbox" checked="ckeched" data-column="1"/>
                                        <span class="form-check-label text-gray-600">@lang('advert/leads.id') @choice('advert/leads.publisher',1)</span>
                                    </label>
                                </div>
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input columnToggleBtn" type="checkbox" checked="ckeched" data-column="2"/>
                                        <span class="form-check-label text-gray-600">@lang('advert/leads.last_name')</span>
                                    </label>
                                </div>
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input columnToggleBtn" type="checkbox" checked="ckeched" data-column="3"/>
                                        <span class="form-check-label text-gray-600">@lang('advert/leads.first_name')</span>
                                    </label>
                                </div>
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input columnToggleBtn" type="checkbox" checked="ckeched" data-column="4"/>
                                        <span class="form-check-label text-gray-600">@choice('advert/leads.country',1)</span>
                                    </label>
                                </div>
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input columnToggleBtn" type="checkbox" checked="ckeched" data-column="5"/>
                                        <span class="form-check-label text-gray-600">@lang('advert/leads.phone')</span>
                                    </label>
                                </div>
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input columnToggleBtn" type="checkbox" checked="ckeched" data-column="6"/>
                                        <span class="form-check-label text-gray-600">@lang('advert/leads.email')</span>
                                    </label>
                                </div>
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input columnToggleBtn" type="checkbox" checked="ckeched" data-column="7"/>
                                        <span class="form-check-label text-gray-600">@lang('advert/leads.subscription_date')</span>
                                    </label>
                                </div>
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input columnToggleBtn" type="checkbox" checked="ckeched" data-column="8"/>
                                        <span class="form-check-label text-gray-600">@lang('advert/leads.web_page_name')</span>
                                    </label>
                                </div>
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input columnToggleBtn" type="checkbox" checked="ckeched" data-column="9"/>
                                        <span class="form-check-label text-gray-600">@lang('advert/leads.web_page_url')</span>
                                    </label>
                                </div>
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input columnToggleBtn" type="checkbox" checked="ckeched" data-column="10"/>
                                        <span class="form-check-label text-gray-600">@lang('advert/leads.sending_date')</span>
                                    </label>
                                </div>
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input columnToggleBtn" type="checkbox" checked="ckeched" data-column="11"/>
                                        <span class="form-check-label text-gray-600">@lang('advert/leads.sale_status')</span>
                                    </label>
                                </div>
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input columnToggleBtn" type="checkbox" checked="ckeched" data-column="12"/>
                                        <span class="form-check-label text-gray-600">@lang('advert/leads.sale_status_comment')</span>
                                    </label>
                                </div>
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input columnToggleBtn" type="checkbox" checked="ckeched" data-column="13"/>
                                        <span class="form-check-label text-gray-600">@lang('advert/leads.rejection')</span>
                                    </label>
                                </div>
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input columnToggleBtn" type="checkbox" checked="ckeched" data-column="14"/>
                                        <span class="form-check-label text-gray-600">@lang('advert/leads.campaign_id')</span>
                                    </label>
                                </div>
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input columnToggleBtn" type="checkbox" checked="ckeched" data-column="15"/>
                                        <span class="form-check-label text-gray-600">@lang('advert/leads.campaign_name')</span>
                                    </label>
                                </div>
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input columnToggleBtn" type="checkbox" checked="ckeched" data-column="16"/>
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
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-0">
            <!--begin::Table-->
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_leads_table">
                <!--begin::Table head-->
                <thead>
                <!--begin::Table row-->
                <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                    <th>@lang('advert/leads.id') @choice('advert/leads.lead',1)</th>
                    <th>@lang('advert/leads.id') @choice('advert/leads.publisher',1)</th>
                    <th>@lang('advert/leads.first_name')</th>
                    <th>@lang('advert/leads.last_name')</th>
                    <th>@choice('advert/leads.country',1)</th>
                    <th>@lang('advert/leads.phone')</th>
                    <th>@lang('advert/leads.email')</th>
                    <th>@lang('advert/leads.subscription_date')</th>
                    <th>@lang('advert/leads.web_page_name')</th>
                    <th>@lang('advert/leads.web_page_url')</th>
                    <th class="min-w-125px">@lang('advert/leads.sending_date')</th>
                    <th>@lang('advert/leads.sale_status')</th>
                    <th>@lang('advert/leads.sale_status_comment')</th>
                    <th>@lang('advert/leads.rejection')</th>
                    <th>@lang('advert/leads.campaign_id')</th>
                    <th class="min-w-100px">Actions</th>
                </tr>
                <!--end::Table row-->
                </thead>
                <!--end::Table head-->
            </table>
            <!--end::Table-->
        </div>
        <!--end::Card body-->
    </div>
    <div class="modal fade" id="qualifications" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-700px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header py-4 d-flex justify-content-between">
                    <!--begin::Modal title-->
                    <div>
                        <h3 class="leadName"></h3>
                        <div class="text-muted fw-bold fs-5">Qualify lead</div>
                    </div>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary close" data-bs-dismiss="modal">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black"></rect>
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black"></rect>
                        </svg>
                    </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Close-->
                </div>
                <!--begin::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y m-5">
                    <!--begin::Stepper-->
                    <div class="stepper stepper-links d-flex flex-column between" id="kt_modal_offer_a_deal_stepper" data-kt-stepper="true">
                        <!--begin::Form-->
                        <form class="mx-auto w-100 fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate" id="kt_modal_offer_a_deal_form">
                            <div class="w-100">
                                <div class="fv-row fv-plugins-icon-container">
                                    <!--begin::Label-->

                                    <!--end::Label-->
                                    <!--begin::Row-->
                                    <div class="row g-9">
                                        @foreach($salesStatus as $status)
                                            <div class="col-md-6 col-lg-12 col-xxl-6">
                                                <label class="btn btn-outline btn-outline-dashed btn-outline-default d-flex text-start p-6" data-id="{{ $status->id }}" data-kt-button="true">
                                            <span class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
                                                <input class="form-check-input" type="radio" name="qualifyConfirm" value="{{ $status->id }}">
                                            </span>
                                                    <span class="ms-5">
                                                <span class="fs-4 fw-bolder text-gray-800 mb-2 d-block">{{ $status->name }}</span>
                                            </span>
                                                </label>
                                            </div>
                                        @endforeach

                                    </div>
                                    <!--end::Row-->
                                </div>
                                <!--end::Input group-->
                            </div>
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Stepper-->
                </div>
                <!--begin::Modal body-->
            </div>
        </div>
        <!--end::Modal dialog-->
    </div>
    <div class="modal fade" id="rejections" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-700px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header py-4 d-flex justify-content-between">
                    <!--begin::Modal title-->
                    <div>
                        <h3 class="leadName"></h3>
                        <div class="text-muted fw-bold fs-5">Reject lead</div>
                    </div>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary close" data-bs-dismiss="modal">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black"></rect>
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black"></rect>
                        </svg>
                    </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Close-->
                </div>
                <!--begin::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y m-5">
                    <!--begin::Stepper-->
                    <div class="stepper stepper-links d-flex flex-column between" id="kt_modal_offer_a_deal_stepper" data-kt-stepper="true">
                        <!--begin::Form-->
                        <form class="mx-auto w-100 fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate" id="kt_modal_offer_a_deal_form">
                            <div class="w-100">
                                <div class="fv-row fv-plugins-icon-container">
                                    <!--begin::Label-->

                                    <!--end::Label-->
                                    <!--begin::Row-->
                                    <div class="row g-9">
                                        @foreach($rejections as $reject)
                                            <div class="col-md-6 col-lg-12 col-xxl-6">
                                                <label class="btn btn-outline btn-outline-dashed btn-outline-default d-flex text-start p-6" data-id="{{ $reject->id }}" data-kt-button="true">
                                            <span class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
                                                <input class="form-check-input" type="radio" name="rejectConfirm" value="{{ $reject->id }}">
                                            </span>
                                                    <span class="ms-5">
                                                <span class="fs-4 fw-bolder text-gray-800 mb-2 d-block">{{ $reject->name }}</span>
                                            </span>
                                                </label>
                                            </div>
                                        @endforeach

                                    </div>
                                    <!--end::Row-->
                                </div>
                                <!--end::Input group-->
                            </div>
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Stepper-->
                </div>
                <!--begin::Modal body-->
            </div>
        </div>
        <!--end::Modal dialog-->
    </div>
    <div id="kt_drawer_comments" class="bg-body drawer drawer-end" data-kt-drawer="true" data-kt-drawer-name="chat" data-kt-drawer-activate="true" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'300px', 'md': '500px'}" data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_drawer_chat_toggle" data-kt-drawer-close="#kt_drawer_chat_close" style="width: 500px !important;">
        <!--begin::Messenger-->
        <div class="card w-100 rounded-0 border-0" id="kt_drawer_chat_messenger">
            <!--begin::Card header-->
            <div class="card-header pe-5" id="kt_drawer_chat_messenger_header">
                <!--begin::Title-->
                <div class="card-title">
                    <!--begin::User-->
                    <div class="d-flex justify-content-center flex-column me-3">
                        <a href="#" class="fs-4 fw-bolder text-gray-900 text-hover-primary me-1 mb-2 lh-1 leadName"></a>
                        <!--begin::Info-->
                        <div class="mb-0 lh-1">
                            <span class="fs-7 fw-bold text-muted">Sale status comments</span>
                        </div>
                        <!--end::Info-->
                    </div>
                    <!--end::User-->
                </div>
                <!--end::Title-->
                <!--begin::Card toolbar-->
                <div class="card-toolbar">
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-light-primary" id="kt_drawer_chat_close">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black"></rect>
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black"></rect>
                        </svg>
                    </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Close-->
                </div>
                <!--end::Card toolbar-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body" id="kt_drawer_chat_messenger_body">
                <div class="scroll-y me-n5 pe-5 comments-body" data-kt-element="messages" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_drawer_chat_messenger_header, #kt_drawer_chat_messenger_footer" data-kt-scroll-wrappers="#kt_drawer_chat_messenger_body" data-kt-scroll-offset="0px" style="height: 243px;">
                </div>
            </div>
            <div class="card-footer pt-4" id="kt_drawer_chat_messenger_footer">
                <div class="d-flex align-items-center">
                    <textarea class="form-control form-control-flush mb-3" rows="1" data-kt-element="input" placeholder="Type a comment"></textarea>

                    <button class="btn btn-primary addComment" type="button">Save</button>
                </div>
            </div>
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
            ajax: "{{ route('advertiser.leads.list') }}",
            columns: [
                {data: 'id_lead', name: 'id_lead'},
                {data: 'publisher_id', name: 'publisher_id'},
                {data: 'first_name', name: 'first_name'},
                {data: 'last_name', name: 'last_name'},
                {data: 'country', name: 'country'},
                {data: 'phone_number', name: 'phone_number'},
                {data: 'email', name: 'email'},
                {data: 'subscription_date', name: 'subscription_date'},
                {data: 'web_page_name', name: 'web_page_name'},
                {data: 'sending_date', name: 'sending_date'},
                {data: 'sale_status', name: 'sale_status'},
                {data: 'sale_status_comment', name: 'sale_status_comment'},
                {data: 'rejection', name: 'rejection'},
                {data: 'campaign_id', name: 'campaign_id'},
                {data: 'campaign_name', name: 'campaign_name'},
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }
            ],
            columnDefs: [{
                "render": function (data, type, row) {
                    if (data == "") {
                        return '<div class="badge badge-light">No rejection</div>';
                    }
                    return '<div class="badge badge-light">' + data + '</div>';
                },
                "targets": 12
            }, {
                "render": function (data, type, row) {
                    if (data == 0) {
                        return '<button class="btn btn-active-color-primary btn-icon btn-sm btn-light comments" data-id="' + row.id_lead + '" >' +
                            '<span class="svg-icon svg-icon-2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">' +
                            '<rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black"/>' +
                            '<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black"/>' +
                            '</svg></span>' +
                            '</button>';
                    }
                    return '<button class="btn btn-active-color-primary btn-icon btn-sm btn-outline-light comments" data-id="' + row.id_lead + '">\n' +
                        '<span class="svg-icon svg-icon-2">\n' +
                        '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">\n' +
                        '<path opacity="0.3" d="M8 8C8 7.4 8.4 7 9 7H16V3C16 2.4 15.6 2 15 2H3C2.4 2 2 2.4 2 3V13C2 13.6 2.4 14 3 14H5V16.1C5 16.8 5.79999 17.1 6.29999 16.6L8 14.9V8Z" fill="black"></path>\n' +
                        '<path d="M22 8V18C22 18.6 21.6 19 21 19H19V21.1C19 21.8 18.2 22.1 17.7 21.6L15 18.9H9C8.4 18.9 8 18.5 8 17.9V7.90002C8 7.30002 8.4 6.90002 9 6.90002H21C21.6 7.00002 22 7.4 22 8ZM19 11C19 10.4 18.6 10 18 10H12C11.4 10 11 10.4 11 11C11 11.6 11.4 12 12 12H18C18.6 12 19 11.6 19 11ZM17 15C17 14.4 16.6 14 16 14H12C11.4 14 11 14.4 11 15C11 15.6 11.4 16 12 16H16C16.6 16 17 15.6 17 15Z" fill="black"></path>\n' +
                        '</svg>\n' +
                        '</span>\n' +
                        '</button>';
                },
                "targets": 11
            }, {
                "render": function (data, type, row) {
                    if (data == "") {
                        return '<button class="btn btn-active-color-primary btn-icon btn-sm btn-outline-light qualify" data-id="' + row.id_lead + '" >' +
                            '<span class="svg-icon svg-icon-muted svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">' +
                            '<rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black"/>' +
                            '<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black"/>' +
                            '</svg></span>' +
                            '</button>';
                    }
                    return '<div class="badge badge-light d-inline">' + data + '</div><button class="btn btn-active-color-primary btn-icon btn-sm btn-outline-light qualify" data-id="' + row.id_lead + '" >\n' +
                        '<span class="svg-icon svg-icon-2">\n' +
                        '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">\n' +
                        '<path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="black"></path>\n' +
                        '<path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="black"></path>\n' +
                        '</svg>\n' +
                        '</span>\n' +
                        '</button>';
                },
                "targets": 10
            }, {
                "render": function (data, type, row) {
                    return '<a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions' +
                        '<span class="svg-icon svg-icon-5 m-0">\<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">' +
                        '<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black"/>' +
                        '</svg>' +
                        '</span>' +
                        '</a>' +
                        '<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">' +
                        '<div class="menu-item px-3"' +
                        '><a href="#" class="menu-link px-3 reject">@lang('advert/leads.reject')</a>' +
                        '</div>' +
                        '<div class="menu-item px-3">' +
                        '<a href="#" class="menu-link px-3 qualify">@lang('advert/leads.qualify')</a>' +
                        '</div>' +
                        '</div>';
                },
                "targets": 15
            }],
            "language": {
                "zeroRecords": '@lang('datatables.zeroRecords')',
                "info": '@lang('datatables.info')',
                "infoEmpty": '@lang('datatables.infoEmpty')',
            }
        });
        table.on('draw', function () {
            KTMenu.createInstances()
        });
        var id = 0;
        var tr;

        $(document).on('click', '.qualify', function () {
            tr = $(this).parents('tr');
            let DTdata = table.row(tr).data();
            $('input[name="qualifyConfirm"][value="' + DTdata['sale_status_id'] + '"]').attr('checked', true);
            $('.leadName').text(DTdata['first_name'] + ' ' + DTdata['last_name']);
            $('#qualifications').modal('show');
        });

        $(document).on('click', '.reject', function () {
            tr = $(this).parents('tr');
            let DTdata = table.row(tr).data();
            $('input[name="rejectConfirm"][value="' + DTdata['rejection_id'] + '"]').attr('checked', true);
            $('.leadName').text(DTdata['first_name'] + ' ' + DTdata['last_name']);
            $('#rejections').modal('show');
        });

        $(document).on('click', '.comments', function () {
            tr = $(this).parents('tr');
            let DTdata = table.row(tr).data();
            $('.leadName').text(DTdata['first_name'] + ' ' + DTdata['last_name']);
            $.ajax({
                url: '{{ route('advertiser.leads.saleComments') }}',
                method: 'GET',
                dataType: 'JSON',
                data: {
                    id: DTdata['id_lead']
                },
                success: function (data) {
                    $('.comments-body').empty();
                    $.each(data, function (i, v) {
                        $('.comments-body').append('<div class="d-flex justify-content-start mb-10">\n' +
                            '                        <div class="d-flex flex-column align-items-start">\n' +
                            '                            <div class="p-5 rounded bg-light-info text-dark fw-bold mw-lg-400px text-start" data-kt-element="message-text">' + v.content + '</div><span class="text-muted fs-7 mb-1">' + v.created_at + '</span>\n' +
                            '                        </div>\n' +
                            '                    </div>');
                    });
                    var drawerElement = document.querySelector("#kt_drawer_comments");
                    var drawer = KTDrawer.getInstance(drawerElement);
                    drawer.show();
                }
            });

        });

        $(document).on('click', '.addComment', function () {
            let DTdata = table.row(tr).data();
            $.ajax({
                url: '{{ route('advertiser.leads.addComment') }}',
                method: 'POST',
                dataType: 'JSON',
                data: {
                    id: DTdata['id_lead'],
                    text: $('#kt_drawer_chat_messenger_footer textarea').val(),
                    _token: '{{ csrf_token() }}'
                },
                success: function (data) {
                    if (data.success) {
                        $('.comments-body').append('<div class="d-flex justify-content-start mb-10">\n' +
                            '                        <div class="d-flex flex-column align-items-start">\n' +
                            '                            <div class="p-5 rounded bg-light-info text-dark fw-bold mw-lg-400px text-start" data-kt-element="message-text">' + $('#kt_drawer_chat_messenger_footer textarea').val() + '</div><span class="text-muted fs-7 mb-1">NOW</span>\n' +
                            '                        </div>\n' +
                            '                    </div>');
                        $('#kt_drawer_chat_messenger_footer textarea').val('');
                        $('.comments-body').scrollTop($('.comments-body')[0].scrollHeight);
                    }
                }
            });
        });

        $('[data-kt-leads-table-filter="search"]').on('keyup', function (e) {
            table.search($(this).val()).draw();
        });

        $('.columnToggleBtn').on('click', function (e) {
            var column = table.column($(this).attr('data-column'));
            column.visible($(this).is(':checked'));
            table.columns.adjust().draw();
        });

        $('input[name="qualifyConfirm"]').change(function (e) {
            let txt = $(this).text();
            let DTdata = table.row(tr).data();
            let idLead = DTdata['id'];
            let idstatus = $(this).val();
            $.ajax({
                url: '{{ route('advertiser.leads.status') }}',
                method: 'POST',
                dataType: 'JSON',
                data: {
                    id_lead: idLead,
                    id_status: idstatus,
                    _token: '{{ csrf_token() }}'
                },
                success: function (data) {
                    toastr.options = {
                        "positionClass": "toastr-top-center",
                    };
                    if (data.success) {
                        toastr.clear();
                        toastr.success('Lead sale status successfully Updated')
                        DTdata['sale_status'] = txt;
                        table.row(tr).data(DTdata).draw();
                        $('.close').click();
                    } else {
                        toastr.error("@lang('alert.error_general_text')");
                    }
                }
            })
        })
        $('input[name="rejectConfirm"]').change(function (e) {
            let txt = $(this).text();
            let DTdata = table.row(tr).data();
            let idLead = DTdata['id'];
            let idreject = $(this).val();
            $.ajax({
                url: '{{ route('advertiser.leads.reject') }}',
                method: 'POST',
                dataType: 'JSON',
                data: {
                    id_lead: idLead,
                    id_reject: idreject,
                    _token: '{{ csrf_token() }}'
                },
                success: function (data) {
                    toastr.options = {
                        "positionClass": "toastr-top-center",
                    };
                    if (data.success) {
                        toastr.clear();
                        toastr.success('Lead rejection successfully Updated')
                        DTdata['rejection'] = txt;
                        table.row(tr).data(DTdata).draw();
                        $('.close').click();
                    } else {
                        toastr.error('Something went wrong ! please try later.');
                    }
                }
            })
        })
    </script>
@endsection
