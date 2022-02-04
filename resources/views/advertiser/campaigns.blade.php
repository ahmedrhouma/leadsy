@extends('layouts.layout')
@section('pageTitle')
    Campaigns list
@endsection
@section('pageDescription')
    List of all campaigns
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
                    <input type="text" data-kt-subscription-table-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search"/>
                </div>
            </div>
            <div class="card-toolbar">
                <div class="d-flex justify-content-end" data-kt-subscription-table-toolbar="base">
                    <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        <span class="svg-icon svg-icon-2">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
								<path d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z" fill="black"/>
							</svg>
						</span>
                        Filter
                    </button>
                    <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
                        <div class="px-7 py-5">
                            <div class="fs-5 text-dark fw-bolder">Filter Options</div>
                        </div>
                        <div class="separator border-gray-200"></div>
                        <div class="px-7 py-5" data-kt-subscription-table-filter="form">
                            <div class="mb-10">
                                <label class="form-label fs-6 fw-bold">Month:</label>
                                <select class="form-select form-select-solid fw-bolder" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-kt-subscription-table-filter="month" data-hide-search="true">
                                    <option></option>
                                    <option value="jan">January</option>
                                    <option value="feb">February</option>
                                    <option value="mar">March</option>
                                    <option value="apr">April</option>
                                    <option value="may">May</option>
                                    <option value="jun">June</option>
                                    <option value="jul">July</option>
                                    <option value="aug">August</option>
                                    <option value="sep">September</option>
                                    <option value="oct">October</option>
                                    <option value="nov">November</option>
                                    <option value="dec">December</option>
                                </select>
                            </div>
                            <div class="mb-10">
                                <label class="form-label fs-6 fw-bold">Status:</label>
                                <select class="form-select form-select-solid fw-bolder" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-kt-subscription-table-filter="status" data-hide-search="true">
                                    <option></option>
                                    <option value="Active">Active</option>
                                    <option value="Expiring">Expiring</option>
                                    <option value="Suspended">Suspended</option>
                                </select>
                            </div>
                            <div class="mb-10">
                                <label class="form-label fs-6 fw-bold">Billing Method:</label>
                                <select class="form-select form-select-solid fw-bolder" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-kt-subscription-table-filter="billing" data-hide-search="true">
                                    <option></option>
                                    <option value="Auto-debit">Auto-debit</option>
                                    <option value="Manual - Credit Card">Manual - Credit Card</option>
                                    <option value="Manual - Cash">Manual - Cash</option>
                                    <option value="Manual - Paypal">Manual - Paypal</option>
                                </select>
                            </div>
                            <div class="mb-10">
                                <label class="form-label fs-6 fw-bold">Product:</label>
                                <select class="form-select form-select-solid fw-bolder" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-kt-subscription-table-filter="product" data-hide-search="true">
                                    <option></option>
                                    <option value="Basic">Basic</option>
                                    <option value="Basic Bundle">Basic Bundle</option>
                                    <option value="Teams">Teams</option>
                                    <option value="Teams Bundle">Teams Bundle</option>
                                    <option value="Enterprise">Enterprise</option>
                                    <option value=" Enterprise Bundle">Enterprise Bundle</option>
                                </select>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="reset" class="btn btn-light btn-active-light-primary fw-bold me-2 px-6" data-kt-menu-dismiss="true" data-kt-subscription-table-filter="reset">
                                    Reset
                                </button>
                                <button type="submit" class="btn btn-primary fw-bold px-6" data-kt-menu-dismiss="true" data-kt-subscription-table-filter="filter">
                                    Apply
                                </button>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-light-primary me-3" data-bs-toggle="modal" data-bs-target="#kt_subscriptions_export_modal">
                        <span class="svg-icon svg-icon-2">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
								<rect opacity="0.3" x="12.75" y="4.25" width="12" height="2" rx="1" transform="rotate(90 12.75 4.25)" fill="black"/>
								<path d="M12.0573 6.11875L13.5203 7.87435C13.9121 8.34457 14.6232 8.37683 15.056 7.94401C15.4457 7.5543 15.4641 6.92836 15.0979 6.51643L12.4974 3.59084C12.0996 3.14332 11.4004 3.14332 11.0026 3.59084L8.40206 6.51643C8.0359 6.92836 8.0543 7.5543 8.44401 7.94401C8.87683 8.37683 9.58785 8.34458 9.9797 7.87435L11.4427 6.11875C11.6026 5.92684 11.8974 5.92684 12.0573 6.11875Z" fill="black"/>
								<path d="M18.75 8.25H17.75C17.1977 8.25 16.75 8.69772 16.75 9.25C16.75 9.80228 17.1977 10.25 17.75 10.25C18.3023 10.25 18.75 10.6977 18.75 11.25V18.25C18.75 18.8023 18.3023 19.25 17.75 19.25H5.75C5.19772 19.25 4.75 18.8023 4.75 18.25V11.25C4.75 10.6977 5.19771 10.25 5.75 10.25C6.30229 10.25 6.75 9.80228 6.75 9.25C6.75 8.69772 6.30229 8.25 5.75 8.25H4.75C3.64543 8.25 2.75 9.14543 2.75 10.25V19.25C2.75 20.3546 3.64543 21.25 4.75 21.25H18.75C19.8546 21.25 20.75 20.3546 20.75 19.25V10.25C20.75 9.14543 19.8546 8.25 18.75 8.25Z" fill="#C4C4C4"/>
							</svg>
						</span>
                        Export
                    </button>
                </div>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_campaign">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                    <span class="svg-icon svg-icon-2">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
								<rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black"/>
								<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black"/>
							</svg>
						</span>
                    <!--end::Svg Icon-->Add Campaign
                </button>
                <div class="d-flex justify-content-end align-items-center d-none" data-kt-subscription-table-toolbar="selected">
                    <div class="fw-bolder me-5">
                        <span class="me-2" data-kt-subscription-table-select="selected_count"></span>Selected
                    </div>
                    <button type="button" class="btn btn-danger" data-kt-subscription-table-select="delete_selected">
                        Delete Selected
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body pt-0">
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_campaigns_table">
                <thead>
                <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Creation date</th>
                    <th>Starting date</th>
                    <th>Ending date</th>
                    <th>Status</th>
                    <th>Thematic</th>
                    <th>Country scope</th>
                    <th>Leads type</th>
                    <th>Expected leads volume + Value</th>
                    <th>Cost type</th>
                    <th>Max fixed amount</th>
                    <th>Unit price</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody class="text-gray-600 fw-bold">
                @foreach($campaigns as $campaign)
                    <tr>
                        <td>{{$campaign->id}}</td>
                        <td>{{$campaign->name}}</td>
                        <td>{{$campaign->created_at}}</td>
                        <td>{{$campaign->start_date}}</td>
                        <td>{{$campaign->end_date}}</td>
                        <td>
                            @if($campaign->status == 1)
                                <div class="badge badge-light-success">Active</div>
                            @else
                                <div class="badge badge-light-info">Disabled</div>
                            @endif
                        </td>
                        <td>
                            <div class="badge badge-light">{{$campaign->thematics->name}}</div>
                        </td>
                        <td>@foreach(json_decode($campaign->countries) as $country)
                                <div class="badge badge-light fw-bolder">{{ \App\Helper\Countries::getCountry($country) }}</div>
                            @endforeach</td>
                        <td>
                            <div class="badge badge-light">{{$campaign->leadsTypes->name}}</div>
                        </td>
                        <td>{{$campaign->leads_vmax}}</td>
                        <td>{{$campaign->costsTypes->name}}</td>
                        <td>{{$campaign->cost_amount}}</td>
                        <td>{{$campaign->selling_price}}</td>
                        <td>
                            <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                <span class="svg-icon svg-icon-5 m-0">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
										<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black"/>
									</svg>
								</span>
                            </a>
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">View</a>
                                </div>
                                <div class="menu-item px-3">
                                    <a href="#" data-kt-subscriptions-table-filter="delete_row" class="menu-link px-3">Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" id="kt_modal_add_campaign" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Form-->
                <form class="form" action="#" id="kt_modal_add_campaign_form">
                    <!--begin::Modal header-->
                    <div class="modal-header" id="kt_modal_add_campaign_header">
                        <!--begin::Modal title-->
                        <h2 class="fw-bolder">Add new campaign</h2>
                        <!--end::Modal title-->
                        <!--begin::Close-->
                        <div id="kt_modal_add_campaign_close" class="btn btn-icon btn-sm btn-active-icon-primary">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                            <span class="svg-icon svg-icon-1">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black"/>
									<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black"/>
								</svg>
							</span>
                            <!--end::Svg Icon-->
                        </div>
                        <!--end::Close-->
                    </div>
                    <!--end::Modal header-->
                    <!--begin::Modal body-->
                    <div class="modal-body py-10 px-lg-17">
                        <!--begin::Scroll-->
                        <div class="scroll-y me-n7 pe-7" id="kt_modal_add_campaign_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_campaign_header" data-kt-scroll-wrappers="#kt_modal_add_campaign_scroll" data-kt-scroll-offset="300px">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fs-6 fw-bold mb-2">Name</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" class="form-control form-control-solid" placeholder="" name="name"/>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <div class="row g-9 mb-7">
                                <!--begin::Col-->
                                <div class="col-md-6 fv-row fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="required fs-6 fw-bold mb-2">Starting date</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input class="form-control form-control-solid" placeholder="" name="start_date" value="">
                                    <!--end::Input-->
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-md-6 fv-row fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="required fs-6 fw-bold mb-2">Ending date</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input class="form-control form-control-solid" placeholder="" name="end_date" value="">
                                    <!--end::Input-->
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--begin::Input group-->
                            <div class="d-flex flex-column mb-7 fv-row">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold mb-2">
                                    <span class="required">Thematic</span>
                                </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <select name="Thematic" aria-label="Select a Thematic" data-control="select2" data-placeholder="Select a Thematic..." data-dropdown-parent="#kt_modal_add_campaign" class="form-select form-select-solid fw-bolder">
                                    @foreach($thematics as $thematic)
                                        <option value="{{ $thematic->id }}">{{ $thematic->name }}</option>
                                    @endforeach
                                </select>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="d-flex flex-column mb-7 fv-row">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold mb-2">
                                    <span class="required">Country</span>
                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Country of origination"></i>
                                </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <select name="country" aria-label="Select a Country" data-control="select2" data-placeholder="Select a Country..." data-dropdown-parent="#kt_modal_add_campaign" class="form-select form-select-solid fw-bolder">
                                    @foreach(\App\Helper\Countries::getCountries() as $key => $country)
                                        <option value="{{ $key}}">{{ $country}}</option>
                                    @endforeach
                                </select>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="d-flex flex-column mb-7 fv-row">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold mb-2">
                                    <span class="required">Leads type</span>
                                </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <select name="leads_types" aria-label="Select a Thematic" data-control="select2" data-placeholder="Select a Lead Type..." data-dropdown-parent="#kt_modal_add_campaign" class="form-select form-select-solid fw-bolder">
                                    @foreach($leads_types as $lead_type)
                                        <option value="{{ $lead_type->id }}">{{ $lead_type->name }}</option>
                                    @endforeach
                                </select>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row g-9 mb-7">
                                <!--begin::Col-->
                                <div class="col-md-6 fv-row fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="required fs-6 fw-bold mb-2">Expected Leads Volume</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <select name="leads_volume" aria-label="Select a Thematic" data-control="select2" data-placeholder="Select a Cost type..." data-dropdown-parent="#kt_modal_add_campaign" class="form-select form-select-solid fw-bolder">
                                        <option value="1">Per Day</option>
                                        <option value="2">Per Campaign</option>
                                    </select>
                                    <!--end::Input-->
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-md-6 fv-row fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="required fs-6 fw-bold mb-2">Max leads</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input class="form-control form-control-solid" placeholder="" name="leads_vmax">
                                    <!--end::Input-->
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--begin::Input group-->
                            <div class="row g-9 mb-7">
                                <!--begin::Col-->
                                <div class="col-md-6 fv-row fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="required fs-6 fw-bold mb-2">Cost type</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <select name="Thematic" aria-label="Select a Thematic" data-control="select2" data-placeholder="Select a Thematic..." data-dropdown-parent="#kt_modal_add_campaign" class="form-select form-select-solid fw-bolder">
                                        <option value="">Select a Thematic...</option>
                                        @foreach($costs_types as $cost_type)
                                            <option value="{{ $cost_type->id }}">{{ $cost_type->name }}</option>
                                        @endforeach
                                    </select>
                                    <!--end::Input-->
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div style="display: none" class="col-md-6 fv-row fv-plugins-icon-container unit_price">
                                    <!--begin::Label-->
                                    <label class="required fs-6 fw-bold mb-2">Amount</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="number" class="form-control form-control-solid" name="unit_price">
                                    <!--end::Input-->
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <div style="display: none" class="col-md-6 fv-row fv-plugins-icon-container sale_percentage">
                                    <!--begin::Label-->
                                    <label class="required fs-6 fw-bold mb-2">Sale %</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="number" max="100" class="form-control form-control-solid" name="sale_percentage">
                                    <!--end::Input-->
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer flex-center">
                        <button type="reset" id="kt_modal_add_campaign_cancel" class="btn btn-light me-3">Discard
                        </button>
                        <button type="submit" id="kt_modal_add_campaign_submit" class="btn btn-primary">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">Please wait...
								<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                        <!--end::Button-->
                    </div>
                    <!--end::Modal footer-->
                </form>
                <!--end::Form-->
            </div>
        </div>
    </div>

@endsection

@section('javascript')
    <script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
    <script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
    <script>
        var table = $("#kt_campaigns_table").DataTable();
        $('select[name="costs_types"]').change(function () {
            if ($(this).val() == 2) {
                $('.sale_percentage').show();
                $('.unit_price').hide();

            } else {
                $('.unit_price').show();
                $('.sale_percentage').hide();
            }
        });
        $('#kt_modal_add_campaign_form').on('submit', function (e) {
            e.preventDefault();

            $('.indicator-progress').show();
            $('.indicator-label').hide();
            $.ajax({
                method: 'POST',
                url: '{{ route('advertiser.campaigns.store') }}',
                dataType: 'JSON',
                data: {
                    name: $('#kt_modal_add_campaign_form input[name="name"]').val(),
                    leads_types: $('#kt_modal_add_campaign_form select[name="leads_types"]').val(),
                    costs_types: $('#kt_modal_add_campaign_form select[name="costs_types"]').val(),
                    sale_percentage: $('#kt_modal_add_campaign_form input[name="sale_percentage"]').val(),
                    unit_price: $('#kt_modal_add_campaign_form input[name="unit_price"]').val(),
                    start_date: $('#kt_modal_add_campaign_form input[name="start_date"]').val(),
                    end_date: $('#kt_modal_add_campaign_form input[name="end_date"]').val(),
                    leads_vmax: $('#kt_modal_add_campaign_form input[name="leads_vmax"]').val(),
                    leads_volume: $('#kt_modal_add_campaign_form input[name="leads_volume"]').val(),
                    status: 1,
                    countries: $('#kt_modal_add_campaign_form select[name="country"]').val(),
                    thematics: $('#kt_modal_add_campaign_form select[name="thematics"]').val(),
                    _token: '{{ csrf_token() }}'
                },
                success: function (data) {
                    $('.indicator-progress').hide();
                    $('.indicator-label').show();
                    if (data.success) {
                        Swal.fire({
                            text: "Campaign successfully created",
                            icon: "success",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        });

                        KTMenu.createInstances();
                    } else {
                        Swal.fire({
                            text: "Something went wrong ! please try later.",
                            icon: "error",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        });
                    }
                }
            })
        });

    </script>
@endsection
