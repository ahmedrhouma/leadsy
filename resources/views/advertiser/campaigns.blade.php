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
                    <input type="text" data-kt-campaigns-table-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search"/>
                </div>
            </div>
            <div class="card-toolbar">
                <div class="d-flex justify-content-end" data-kt-subscription-table-toolbar="base">
                    <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                        <span class="svg-icon svg-icon-2">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
								<path d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z" fill="black"/>
							</svg>
						</span>
                        <!--end::Svg Icon-->Columns
                    </button>
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
                                        <span class="form-check-label text-gray-600">ID</span>
                                    </label>
                                </div>
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input columnToggleBtn" type="checkbox" checked="ckeched" data-column="1"/>
                                        <span class="form-check-label text-gray-600">Name</span>
                                    </label>
                                </div>
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input columnToggleBtn" type="checkbox" checked="ckeched" data-column="2"/>
                                        <span class="form-check-label text-gray-600">Creation date</span>
                                    </label>
                                </div>
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input columnToggleBtn" type="checkbox" checked="ckeched" data-column="3"/>
                                        <span class="form-check-label text-gray-600">Starting date</span>
                                    </label>
                                </div>
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input columnToggleBtn" type="checkbox" checked="ckeched" data-column="4"/>
                                        <span class="form-check-label text-gray-600">Ending date</span>
                                    </label>
                                </div>
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input columnToggleBtn" type="checkbox" checked="ckeched" data-column="5"/>
                                        <span class="form-check-label text-gray-600">Status</span>
                                    </label>
                                </div>
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input columnToggleBtn" type="checkbox" checked="ckeched" data-column="6"/>
                                        <span class="form-check-label text-gray-600">Thematic</span>
                                    </label>
                                </div>
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input columnToggleBtn" type="checkbox" checked="ckeched" data-column="7"/>
                                        <span class="form-check-label text-gray-600">Country scope</span>
                                    </label>
                                </div>
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input columnToggleBtn" type="checkbox" checked="ckeched" data-column="8"/>
                                        <span class="form-check-label text-gray-600">Leads type</span>
                                    </label>
                                </div>
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input columnToggleBtn" type="checkbox" checked="ckeched" data-column="9"/>
                                        <span class="form-check-label text-gray-600">Expected leads volume + Value</span>
                                    </label>
                                </div>
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input columnToggleBtn" type="checkbox" checked="ckeched" data-column="10"/>
                                        <span class="form-check-label text-gray-600">Cost type</span>
                                    </label>
                                </div>
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input columnToggleBtn" type="checkbox" checked="ckeched" data-column="11"/>
                                        <span class="form-check-label text-gray-600">Max fixed amount</span>
                                    </label>
                                </div>
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input columnToggleBtn" type="checkbox" checked="ckeched" data-column="12"/>
                                        <span class="form-check-label text-gray-600">Unit price</span>
                                    </label>
                                </div>
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input columnToggleBtn" type="checkbox" checked="ckeched" data-column="13"/>
                                        <span class="form-check-label text-gray-600">Actions</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
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
                        <td>@foreach($campaign->countriesName as $country)
                                <div class="badge badge-light fw-bolder">
                                    <img src="{{asset('assets/media/flags/'.str_replace(' ','-',$country).'.svg')}}" class="me-4 w-15px" style="border-radius: 4px" alt="">{{ $country }}
                                </div>
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
                                    <a href="#" class="menu-link px-3 row_edit" data-id="{{ $campaign->id }}">Edit</a>
                                </div>
                                <div class="menu-item px-3">
                                    <a href="#" data-id="{{ $campaign->id }}" class="menu-link px-3 row_delete">Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" id="kt_modal_add_campaign" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
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
                        <div id="kt_modal_add_campaign_close" class="btn btn-icon btn-sm btn-active-icon-primary"  data-bs-dismiss="modal">
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
                                    <input class="form-control form-control-solid dateStart" placeholder="" name="start_date" value="" autocomplete="off">
                                    <!--end::Input-->
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-md-6 fv-row fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold mb-2">Ending date</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input class="form-control form-control-solid dateEnd" placeholder="" name="end_date" value="" autocomplete="off">
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
                                    <option></option>
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
                                <select name="country" aria-label="Select a Country" data-control="select2" data-placeholder="Select a Country..." data-dropdown-parent="#kt_modal_add_campaign" class="form-select form-select-solid fw-bolder" multiple>
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
                                    <option></option>
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
                                    <select name="leads_volume" aria-label="Select a lead volume" data-control="select2" data-placeholder="Select a Lead volume..." data-dropdown-parent="#kt_modal_add_campaign" class="form-select form-select-solid fw-bolder">
                                        <option></option>
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
                                    <select name="costs_types" aria-label="Select a Cost type" data-control="select2" data-placeholder="Select a Cost type..." data-dropdown-parent="#kt_modal_add_campaign" class="form-select form-select-solid fw-bolder">
                                        <option></option>
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
                        </div>
                    </div>
                    <div class="modal-footer flex-center">
                        <button type="reset" id="kt_modal_add_campaign_cancel" data-bs-dismiss="modal" class="btn btn-light me-3">
                            Cancel
                        </button>
                        <button type="submit" id="kt_modal_add_campaign_submit" class="btn btn-primary">
                            <span class="indicator-label">Save</span>
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
                        <div id="kt_modal_edit_campaign_close" class="btn btn-icon btn-sm btn-active-icon-primary"  data-bs-dismiss="modal">
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
    <script>
        let id ;
        let tr ;
        $(document).ready(function () {
            let table = $("#kt_campaigns_table").DataTable({
                "pageLength": 5,
                lengthMenu: [[5, 10, 20], [5, 10, 20]],
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
                        leads_type_id: $('#kt_modal_add_campaign_form select[name="leads_types"]').val(),
                        cost_type_id: $('#kt_modal_add_campaign_form select[name="costs_types"]').val(),
                        sale_percentage: $('#kt_modal_add_campaign_form input[name="sale_percentage"]').val(),
                        cost_amount: $('#kt_modal_add_campaign_form input[name="cost_amount"]').val(),
                        start_date: $('#kt_modal_add_campaign_form input[name="start_date"]').val(),
                        end_date: $('#kt_modal_add_campaign_form input[name="end_date"]').val(),
                        leads_vmax: $('#kt_modal_add_campaign_form input[name="leads_vmax"]').val(),
                        leads_volume: $('#kt_modal_add_campaign_form select[name="leads_volume"]').val(),
                        status: 1,
                        countries: $('#kt_modal_add_campaign_form select[name="country"]').val(),
                        thematic_id: $('#kt_modal_add_campaign_form select[name="Thematic"]').val(),
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (data) {
                        $('.indicator-progress').hide();
                        $('.indicator-label').show();
                        if (data.success) {
                            Swal.fire({
                                text: "Campaign successfully created",
                                icon: "success",
                                showConfirmButton: false,
                                timer: 1500
                            });
                            var today = new Date();
                            table.row.add([data.campaign.id, data.campaign.name, today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate() + ' ' + today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds(), data.campaign.start_date, data.campaign.end_date, '<div class="badge badge-light-success">Active</div>', '<div class="badge badge-light">' + data.campaign.thematics.name + '</div>', data.campaign.countriesName.map((O) => '<div class="badge badge-light">' + O + '</div>').join(''), '<div class="badge badge-light">' + data.campaign.leads_types.name + '</div>', data.campaign.leads_vmax, '<div class="badge badge-light">' + data.campaign.costs_types.name + '</div>', data.campaign.cost_amount, '', '<a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions\n' +
                            '                                <span class="svg-icon svg-icon-5 m-0">\n' +
                            '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">\n' +
                            '<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black"/>\n' +
                            '</svg>\n' +
                            '</span>\n' +
                            '                            </a>\n' +
                            '                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">\n' +
                            '                                <div class="menu-item px-3">\n' +
                            '                                    <a href="#" class="menu-link px-3 row_edit" data-id="' + data.campaign.id + '" >Edit</a>\n' +
                            '                                </div>\n' +
                            '                                <div class="menu-item px-3">\n' +
                            '                                    <a href="#" data-kt-subscriptions-table-filter="delete_row" data-id="' + data.campaign.id + '"  class="menu-link px-3">Delete</a>\n' +
                            '                                </div>\n' +
                            '                            </div>']).draw();
                            KTMenu.createInstances();
                            $('#kt_modal_add_campaign_cancel').click();
                            $('#kt_modal_add_campaign_form select').change();
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
                            $('#kt_modal_edit_campaign_form select[name="costs_types"],#kt_modal_edit_campaign_form select[name="leads_types"]').change();
                            $('#kt_modal_edit_campaign_form input[name="sale_percentage"]').val(data.campaign.cost_amount);
                            $('#kt_modal_edit_campaign_form input[name="cost_amount"]').val(data.campaign.cost_amount);
                            $('#kt_modal_edit_campaign_form input[name="start_date"]').val(data.campaign.start_date);
                            $('#kt_modal_edit_campaign_form input[name="end_date"]').val(data.campaign.end_date);
                            $('#kt_modal_edit_campaign_form input[name="leads_vmax"]').val(data.campaign.leads_vmax);
                            $('#kt_modal_edit_campaign_form select[name="publisher"] option[value="' + (data.campaign.publishers.length != 0 ? data.campaign.publishers[0].id : 0) + '"]').attr('selected', true);
                            $('#kt_modal_edit_campaign_form select[name="leads_volume"] option[value="' + data.campaign.leads_volume + '"]').attr('selected', true);
                            $('#kt_modal_edit_campaign_form select[name="country"] option:selected').attr('selected', false);
                            selectedCountries = JSON.parse(data.campaign.countries);
                            selectedCountries.forEach(function(country){
                                $('#kt_modal_edit_campaign_form select[name="country"] option[value="'+country+'"]').attr('selected', true);
                            });
                            $('#kt_modal_edit_campaign_form select[name="Thematic"] option[value="' + data.campaign.thematic_id + '"]').attr('selected', true);
                            $('#kt_modal_edit_campaign_form select[name="Thematic"],#kt_modal_edit_campaign_form select[name="country"]').change();
                            $('#kt_modal_edit_campaign').modal('show');
                        }
                    }
                });

            });
            $(document).on('click', '.row_delete', function () {
                let tr = $(this).parents('tr');
                let id = $(this).data('id');
                Swal.fire({
                    icon: 'warning',
                    title: 'Your really want to delete this Campaign ?',
                    showCancelButton: true,
                    confirmButtonText: "Yes Delete It",
                    cancelButtonText: 'Cancel',
                    customClass: {
                        cancelButton: "btn btn-primary",
                        confirmButton: 'btn btn-danger'
                    }
                }).then(function (e) {
                    if (e.isConfirmed) {
                        $.ajax({
                            method: 'DELETE',
                            url: '{{ route('advertiser.campaigns.destroy') }}',
                            dataType: 'JSON',
                            data: {
                                id: id,
                                _token: '{{ csrf_token() }}'
                            },
                            success: function (data) {
                                if (data.success) {
                                    Swal.fire({
                                        text: "Campaign successfully Removed",
                                        icon: "success",
                                        showConfirmButton: false,
                                        timer: 1500
                                    });
                                    table.row(tr).remove().draw();
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
                    }
                })
            });
            $('#kt_modal_add_campaign').on('show.bs.modal', function (e) {
                $('#kt_modal_add_campaign_form').trigger('reset');
                $('#kt_modal_add_campaign_form select').change();
            });
            /*$('select[name="Thematic"]').change(function () {
                var select = $(this);
                $.ajax({
                    method: 'POST',
                    url: '{{ route('admin.thematics.countries') }}',
                    dataType: 'JSON',
                    data: {
                        thematics: $(this).val(),
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (data) {
                        $('select[name="country"]', select.parents('form')).empty();
                        if (data.success) {
                            $.each(data.countries, function (index, country) {
                                let sel = $.inArray(index,selectedCountries) != -1?'selected':'';
                                $('select[name="country"]', select.parents('form')).append('<option value="' + index + '" '+sel+'>' + country + '</option>');
                            })
                        }
                    }
                })
            });*/
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
                            DTdata[1] = data.campaign.name;
                            DTdata[3] = $('#kt_modal_edit_campaign_form input[name="start_date"]').val();
                            DTdata[4] = $('#kt_modal_edit_campaign_form input[name="end_date"]').val();
                            DTdata[6] = $('#kt_modal_edit_campaign_form select[name="thematics"] option:selected').map((O, V) => '<div class="badge badge-light">' + $(V).text() + '</div>').toArray().join('');
                            DTdata[7] = $('#kt_modal_edit_campaign_form select[name="country"] option:selected').map((O, V) => '<div class="badge badge-light">' + $(V).text() + '</div>').toArray().join('');
                            DTdata[8] = $('#kt_modal_edit_campaign_form select[name="leads_types"] option:selected').text();
                            DTdata[9] = $('#kt_modal_edit_campaign_form input[name="leads_vmax"]').val();
                            DTdata[10] = $('#kt_modal_edit_campaign_form select[name="costs_types"] option:selected').text();
                            DTdata[11] = $('#kt_modal_edit_campaign_form input[name="cost_amount"]').val();
                            table.row(tr).data(DTdata).draw();
                            KTMenu.createInstances();
                            $('#kt_modal_edit_campaign_cancel').click();
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
            let selectedCountries;

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
        });


        $(".dateStart").daterangepicker({
            autoUpdateInput: false,
                autoApply: true,
                singleDatePicker: true,
                showDropdowns: true,
                minYear: 2020,
                locale: {
                    format: 'YYYY-MM-DD'
                }
            }
        ).on("apply.daterangepicker", function (e, picker) {
            picker.element.val(picker.startDate.format(picker.locale.format));
        });
        $(".dateEnd").daterangepicker({
            autoUpdateInput: false,
                autoApply: true,
                singleDatePicker: true,
                showDropdowns: true,
                minYear: 2020,
                locale: {
                    format: 'YYYY-MM-DD'
                }
            }
        ).on("apply.daterangepicker", function (e, picker) {
            picker.element.val(picker.startDate.format(picker.locale.format));
        });

    </script>
@endsection
