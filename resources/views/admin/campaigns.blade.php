@extends('layouts.layout')
@section('pageTitle')
     @lang('admin/advertisers.page_title')
@endsection
@section('pageDescription')
    @lang('admin/advertisers.page_description')
@endsection
@section('css')
    <style>
        .dtfc-fixed-right {
            position: absolute !important;
            display: flex;
            align-items: center;
        }

        .dtfc-fixed-right, .dtfc-fixed-left, .DTFC_Cloned tr {
            background-color: #fafbfc !important
        }

        .DTFC_ScrollWrapper {
            height: auto !important
        }
    </style>
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
                    <input type="text" data-kt-campaigns-table-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search"/>
                </div>
                <!--end::Search-->
            </div>
            <!--begin::Card title-->
            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt-subscription-table-toolbar="base">
                    <!--begin::Filter-->
                    <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                        <span class="svg-icon svg-icon-2">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
								<path d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z" fill="black"/>
							</svg>
						</span>
                        <!--end::Svg Icon-->Columns
                    </button>
                    <!--begin::Menu 1-->
                    <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true" id="kt-toolbar-filter">
                        <!--begin::Header-->
                        <div class="px-7 py-5">
                            <div class="fs-4 text-dark fw-bolder">Columns</div>
                        </div>
                        <div class="separator border-gray-200"></div>
                        <div class="px-7 py-5">
                            <div class="mb-10">
                                <label class="form-label fs-5 fw-bold mb-3">Columns :</label>
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input columnToggleBtn" type="checkbox" checked="ckeched" data-column="0"/>
                                        <span class="form-check-label text-gray-600">Publishers</span>
                                    </label>
                                </div>
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input columnToggleBtn" type="checkbox" checked="ckeched" data-column="1"/>
                                        <span class="form-check-label text-gray-600">Buying Price</span>
                                    </label>
                                </div>
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input columnToggleBtn" type="checkbox" checked="ckeched" data-column="2"/>
                                        <span class="form-check-label text-gray-600">Selling Price</span>
                                    </label>
                                </div>
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input columnToggleBtn" type="checkbox" checked="ckeched" data-column="3"/>
                                        <span class="form-check-label text-gray-600">Fee</span>
                                    </label>
                                </div>
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input columnToggleBtn" type="checkbox" checked="ckeched" data-column="4"/>
                                        <span class="form-check-label text-gray-600">Advertiser ID</span>
                                    </label>
                                </div>
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input columnToggleBtn" type="checkbox" checked="ckeched" data-column="5"/>
                                        <span class="form-check-label text-gray-600">Advertiser Name</span>
                                    </label>
                                </div>
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input columnToggleBtn" type="checkbox" checked="ckeched" data-column="6"/>
                                        <span class="form-check-label text-gray-600">Campaign ID</span>
                                    </label>
                                </div>
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input columnToggleBtn" type="checkbox" checked="ckeched" data-column="7"/>
                                        <span class="form-check-label text-gray-600">Campaign Name</span>
                                    </label>
                                </div>
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input columnToggleBtn" type="checkbox" checked="ckeched" data-column="8"/>
                                        <span class="form-check-label text-gray-600">Campaign Creation Date</span>
                                    </label>
                                </div>
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input columnToggleBtn" type="checkbox" checked="ckeched" data-column="9"/>
                                        <span class="form-check-label text-gray-600">Campaign Starting Date</span>
                                    </label>
                                </div>
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input columnToggleBtn" type="checkbox" checked="ckeched" data-column="10"/>
                                        <span class="form-check-label text-gray-600">Campaign Ending Date</span>
                                    </label>
                                </div>
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input columnToggleBtn" type="checkbox" checked="ckeched" data-column="11"/>
                                        <span class="form-check-label text-gray-600">Campaign Status</span>
                                    </label>
                                </div>
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input columnToggleBtn" type="checkbox" checked="ckeched" data-column="12"/>
                                        <span class="form-check-label text-gray-600">Thematic</span>
                                    </label>
                                </div>
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input columnToggleBtn" type="checkbox" checked="ckeched" data-column="13"/>
                                        <span class="form-check-label text-gray-600">Country Scope</span>
                                    </label>
                                </div>
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input columnToggleBtn" type="checkbox" checked="ckeched" data-column="14"/>
                                        <span class="form-check-label text-gray-600">Leads Type</span>
                                    </label>
                                </div>
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input columnToggleBtn" type="checkbox" checked="ckeched" data-column="15"/>
                                        <span class="form-check-label text-gray-600">Expected Leads Volume</span>
                                    </label>
                                </div>
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input columnToggleBtn" type="checkbox" checked="ckeched" data-column="16"/>
                                        <span class="form-check-label text-gray-600">Cost type</span>
                                    </label>
                                </div>
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input columnToggleBtn" type="checkbox" checked="ckeched" data-column="17"/>
                                        <span class="form-check-label text-gray-600">Max Fixed Amount/%</span>
                                    </label>
                                </div>
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input columnToggleBtn" type="checkbox" checked="ckeched" data-column="18"/>
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
            <table class="table align-middle table-row-dashed fs-6 gy-5 h-100" id="kt_campaigns_table">
                <!--begin::Table head-->
                <thead>
                <!--begin::Table row-->
                <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                    <th>Publishers</th>
                    <th>Buying Price</th>
                    <th>Selling Price</th>
                    <th>Fee</th>
                    <th>Advertiser ID</th>
                    <th>Advertiser Name</th>
                    <th>Campaign ID</th>
                    <th>Campaign Name</th>
                    <th>Campaign Creation Date</th>
                    <th>Campaign Starting Date</th>
                    <th>Campaign Ending Date</th>
                    <th>Campaign Status</th>
                    <th>Thematic</th>
                    <th class="min-w-100px">Country Scope</th>
                    <th class="min-w-100px">Leads Type</th>
                    <th>Expected Leads Volume</th>
                    <th class="min-w-100px">Cost type</th>
                    <th>Max Fixed Amount/%</th>

                    <th class="text-end min-w-70px">Actions</th>
                </tr>
                <!--end::Table row-->
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody class="text-gray-600 fw-bold">
                @foreach($campaigns as $campaign)
                    <tr>

                        <td>
                            @foreach($campaign->publishers as $publisher)
                                <div class="badge badge-light">{{$campaign->publishers[0]->name}}</div>
                            @endforeach
                        </td>
                        <td>{{$campaign->publishers[0]->pivot->buying_price??''}}</td>
                        <td>{{$campaign->selling_price}}</td>
                        <td>{{$campaign->fee}}</td>
                        <td>{{$campaign->advertiser->id}}</td>
                        <td>{{$campaign->advertiser->name}}</td>
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
                        <td>@foreach($campaign->countriesName as $country)
                                <div class="badge badge-light fw-bolder m-1">
                                    <img src="{{asset('assets/media/flags/'.str_replace(' ','-',strtolower($country)).'.svg')}}" class="me-4 w-15px" style="border-radius: 4px" alt="">{{ $country }}
                                </div>
                            @endforeach</td>
                        <td>
                            <div class="badge badge-light">{{$campaign->leadsTypes->name}}</div>
                        </td>
                        <td>{{$campaign->leads_vmax}}</td>
                        <td>{{$campaign->costsTypes->name}}</td>
                        <td>{{$campaign->cost_amount}}</td>
                        <!--begin::Action=-->
                        <td class="text-end">
                            <a href="#" class="btn btn-secondary btn-active-secondary-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                <span class="svg-icon svg-icon-5 m-0">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
										<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black"/>
									</svg>
								</span>
                                <!--end::Svg Icon--></a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3 row_edit" data-id="{{ $campaign->id }}">Edit</a>
                                </div>
                                <div class="menu-item px-3">
                                    <a href="#" data-kt-subscriptions-table-filter="delete_row" class="menu-link px-3">Delete</a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                        </td>
                        <!--end::Action=-->
                    </tr>
                @endforeach
                </tbody>
                <!--end::Table body-->
            </table>
            <!--end::Table-->
        </div>
        <!--end::Card body-->
    </div>
    <div class="modal fade" id="kt_modal_edit_campaign" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Form-->
                <form class="form" action="#" id="kt_modal_edit_campaign_form">
                    <!--begin::Modal header-->
                    <div class="modal-header" id="kt_modal_edit_campaign_header">
                        <!--begin::Modal title-->
                        <h2 class="fw-bolder">Edit campaign</h2>
                        <!--end::Modal title-->
                        <!--begin::Close-->
                        <div id="kt_modal_edit_campaign_close" class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
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
                        <div class="scroll-y me-n7 pe-7" id="kt_modal_edit_campaign_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_campaign_header" data-kt-scroll-wrappers="#kt_modal_add_campaign_scroll" data-kt-scroll-offset="300px">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fs-6 fw-bold mb-2">Name</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" class="form-control form-control-solid" required placeholder="" name="name"/>
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
                                    <input class="form-control form-control-solid dateStart" required placeholder="" name="start_date" value="">
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
                                    <input class="form-control form-control-solid dateEnd" placeholder="" name="end_date" value="">
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
                                <select name="Thematic" aria-label="Select a Thematic" required data-control="select2" data-placeholder="Select a Thematic..." data-dropdown-parent="#kt_modal_edit_campaign_form" class="form-select form-select-solid fw-bolder">
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
                                <select name="country" aria-label="Select a Country" required data-control="select2" data-placeholder="Select a Country..." data-dropdown-parent="#kt_modal_edit_campaign_form" class="form-select form-select-solid fw-bolder" multiple>
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
                                <select name="leads_types" aria-label="Select a Thematic" required data-control="select2" data-placeholder="Select a Lead Type..." data-dropdown-parent="#kt_modal_edit_campaign_form" class="form-select form-select-solid fw-bolder">
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
                                    <select name="leads_volume" aria-label="Select a lead volume" data-control="select2" data-placeholder="Select a Lead volume..." data-dropdown-parent="#kt_modal_edit_campaign_form" class="form-select form-select-solid fw-bolder">
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
                                    <select name="costs_types" aria-label="Select a Cost type" data-control="select2" data-placeholder="Select a Cost type..." data-dropdown-parent="#kt_modal_edit_campaign_form" class="form-select form-select-solid fw-bolder" required>
                                        @foreach($costs_types as $cost_type)
                                            <option value="{{ $cost_type->id }}">{{ $cost_type->name }}</option>
                                        @endforeach
                                    </select>
                                    <!--end::Input-->
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div style="display: none" class="col-md-6 fv-row fv-plugins-icon-container cost_amount">
                                    <!--begin::Label-->
                                    <label class="required fs-6 fw-bold mb-2">Amount</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="number" step="0.1" class="form-control form-control-solid" name="cost_amount">
                                    <!--end::Input-->
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <div style="display: none" class="col-md-6 fv-row fv-plugins-icon-container sale_percentage">
                                    <!--begin::Label-->
                                    <label class="required fs-6 fw-bold mb-2">Sale %</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="number" max="100" step="0.1" class="form-control form-control-solid" name="sale_percentage">
                                    <!--end::Input-->
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="row g-9 mb-7">
                                <div class="col-md-12 d-flex flex-column fv-row">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold mb-2">
                                        <span class="required">Publisher</span>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <select name="publisher" aria-label="publisher" data-control="select2" class="form-select form-select-solid fw-bolder" required>
                                        @foreach($publishers as $publisher)
                                            <option value="{{ $publisher->id }}">{{ $publisher->name }}</option>
                                        @endforeach
                                    </select>
                                    <!--end::Input-->
                                </div>
                                <!--begin::Input group-->
                                <div class="col-md-6 d-flex flex-column fv-row">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold mb-2">
                                        <span class="required">Fee type</span>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <select name="fee_type" aria-label="Fee type" data-control="select2" class="form-select form-select-solid fw-bolder" required>
                                        <option value="1">Fixed price</option>
                                        <option value="2">Percentage %</option>
                                    </select>
                                    <!--end::Input-->
                                </div>
                                <div class="col-md-6 fv-row ">
                                    <label class="required fs-6 fw-bold mb-2">Fee</label>
                                    <input type="number" step="0.1" class="form-control form-control-solid" placeholder="" name="fee" required/>
                                </div>
                                <div class="col-md-6 fv-row">
                                    <label class="required fs-6 fw-bold mb-2">Selling price</label>
                                    <input type="number" step="0.1" class="form-control form-control-solid" placeholder="" name="selling_price"/>
                                </div>
                                <div class="col-md-6 fv-row">
                                    <label class="required fs-6 fw-bold mb-2">Buying price</label>
                                    <input type="number" step="0.1" class="form-control form-control-solid" placeholder="" name="buying_price"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer flex-center">
                        <button type="reset" id="kt_modal_edit_campaign_cancel" data-bs-dismiss="modal" class="btn btn-light me-3">
                            Cancel
                        </button>
                        <button type="submit" id="kt_modal_edit_campaign_submit" class="btn btn-primary">
                            <span class="indicator-label">Save changes</span>
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
    <script src="https://cdn.datatables.net/fixedcolumns/4.0.1/js/dataTables.fixedColumns.min.js"></script>
    <script>
        var id;
        var tr;

        $(document).ready(function () {
            var table = $("#kt_campaigns_table").DataTable({
                "pageLength": 5,
                lengthMenu: [[5, 10, 20], [5, 10, 20]],
                /*scrollX:        true,
                fixedColumns:   {
                    right: 1,
                }*/
            });
            $('[data-kt-campaigns-table-filter="search"]').on('keyup', function (e) {
                table.search($(this).val()).draw();
            });
            $('select[name="costs_types"]').change(function () {
                if ($(this).val() == 2) {
                    $('.sale_percentage').show();
                    $('.cost_amount').hide();

                } else {
                    $('.cost_amount').show();
                    $('.sale_percentage').hide();
                }
            });
            $('.columnToggleBtn').on('click', function (e) {
                var column = table.column($(this).attr('data-column'));
                column.visible($(this).is(':checked'));
                table.columns.adjust().draw();
            });
            $(document).on('click', '.row_edit', function () {
                id = $(this).data('id');
                tr = $(this).parents('tr');
                $.ajax({
                    method: 'POST',
                    url: '{{ route('admin.campaigns.show') }}',
                    dataType: 'JSON',
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (data) {
                        $('.indicator-progress').hide();
                        $('.indicator-label').show();
                        if (data.success) {
                            $('#kt_modal_edit_campaign_form input[name="name"]').val(data.campaign.name);
                            $('#kt_modal_edit_campaign_form select[name="leads_types"] option[value="' + data.campaign.leads_type_id + '"]').attr('selected', true);
                            $('#kt_modal_edit_campaign_form select[name="costs_types"] option[value="' + data.campaign.cost_type_id + '"]').attr('selected', true);
                            $('#kt_modal_edit_campaign_form select[name="costs_types"], #kt_modal_edit_campaign_form select[name="leads_types"]').change();
                            $('#kt_modal_edit_campaign_form input[name="sale_percentage"]').val(data.campaign.cost_amount);
                            $('#kt_modal_edit_campaign_form input[name="cost_amount"]').val(data.campaign.cost_amount);
                            $('#kt_modal_edit_campaign_form input[name="start_date"]').val(data.campaign.start_date);
                            $('#kt_modal_edit_campaign_form input[name="end_date"]').val(data.campaign.end_date);
                            $('#kt_modal_edit_campaign_form input[name="leads_vmax"]').val(data.campaign.leads_vmax);
                            $('#kt_modal_edit_campaign_form input[name="fee"]').val(data.campaign.fee);
                            $('#kt_modal_edit_campaign_form select[name="fee_type"] option[value="' + data.campaign.fee_type + '"]').attr('selected', true);
                            $('#kt_modal_edit_campaign_form input[name="selling_price"]').val(data.campaign.selling_price);
                            $('#kt_modal_edit_campaign_form input[name="buying_price"]').val(data.campaign.publishers.length != 0 ? data.campaign.publishers[0].pivot.buying_price : 0);
                            $('#kt_modal_edit_campaign_form select[name="publisher"] option[value="' + (data.campaign.publishers.length != 0 ? data.campaign.publishers[0].id : 0) + '"]').attr('selected', true);
                            $('#kt_modal_edit_campaign_form input[name="leads_vmax"]').val(data.campaign.leads_vmax);
                            $('#kt_modal_edit_campaign_form select[name="leads_volume"] option[value="' + data.campaign.leads_volume + '"]').attr('selected', true);
                            $('#kt_modal_edit_campaign_form select[name="country"] option:selected').attr('selected', false);
                            $.each(JSON.parse(data.campaign.countries), function (country) {
                                $('#kt_modal_edit_campaign_form select[name="country"] option[value="' + this + '"]').attr('selected', true);
                            });
                            $('#kt_modal_edit_campaign_form select[name="country"]').change();
                            $('#kt_modal_edit_campaign_form select[name="Thematic"] option[value="' + data.campaign.thematic_id + '"]').attr('selected', true);
                            $('#kt_modal_edit_campaign').modal('show');
                        }
                    }
                });

            });
            $('#kt_modal_edit_campaign_form').on('submit', function (e) {
                e.preventDefault();

                $('.indicator-progress').show();
                $('.indicator-label').hide();
                $.ajax({
                    method: 'POST',
                    url: '{{ route('admin.campaigns.update') }}',
                    dataType: 'JSON',
                    data: {
                        name: $('#kt_modal_edit_campaign_form input[name="name"]').val(),
                        leads_type_id: $('#kt_modal_edit_campaign_form select[name="leads_types"]').val(),
                        cost_type_id: $('#kt_modal_edit_campaign_form select[name="costs_types"]').val(),
                        sale_percentage: $('#kt_modal_edit_campaign_form input[name="sale_percentage"]').val(),
                        cost_amount: $('#kt_modal_edit_campaign_form input[name="cost_amount"]').val(),
                        start_date: $('#kt_modal_edit_campaign_form input[name="start_date"]').val(),
                        end_date: $('#kt_modal_edit_campaign_form input[name="end_date"]').val(),
                        leads_vmax: $('#kt_modal_edit_campaign_form input[name="leads_vmax"]').val(),
                        leads_volume: $('#kt_modal_edit_campaign_form select[name="leads_volume"]').val(),
                        countries: $('#kt_modal_edit_campaign_form select[name="country"]').val(),
                        thematic_id: $('#kt_modal_edit_campaign_form select[name="Thematic"]').val(),
                        fee: $('#kt_modal_edit_campaign_form input[name="fee"]').val(),
                        selling_price: $('#kt_modal_edit_campaign_form input[name="selling_price"]').val(),
                        buying_price: $('#kt_modal_edit_campaign_form input[name="buying_price"]').val(),
                        fee_type: $('#kt_modal_edit_campaign_form select[name="fee_type"]').val(),
                        publisher_id: $('#kt_modal_edit_campaign_form select[name="publisher"]').val(),
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (data) {
                        $('.indicator-progress').hide();
                        $('.indicator-label').show();
                        if (data.success) {
                            Swal.fire({
                                text: "Campaign successfully updated",
                                icon: "success",
                                showConfirmButton: false,
                                timer: 1500
                            });
                            let DTdata = table.row(tr).data();
                            DTdata[0] = data.campaign.publishers.map((O, V) => '<div class="badge badge-light">' + O.name + '</div>').join('');
                            DTdata[1] = data.campaign.publishers[0].pivot.buying_price;
                            DTdata[2] = data.campaign.selling_price;
                            DTdata[3] = data.campaign.fee;
                            table.row(tr).data(DTdata).draw();
                            KTMenu.createInstances();
                            $('#kt_modal_edit_campaign_cancel').click();
                        } else {
                            Swal.fire({
                                text: "@lang('alert.error_general_text')",
                                icon: "error",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                }
                            });
                        }
                    }
                })
            });
        })

    </script>
@endsection
