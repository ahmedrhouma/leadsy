@extends('layouts.layout')
@section('pageTitle')
    @lang('admin/publishers.page_title')
@endsection
@section('pageDescription')
    @lang('admin/publishers.page_description')
@endsection
@section('css')
    <style>
        .badge {
            display: block;
            margin-bottom: 5px;
        }
    </style>
@endsection
@section('content')
    <div class="card">
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                    <span class="svg-icon svg-icon-1 position-absolute ms-6">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
							<rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
                                  transform="rotate(45 17.0365 15.1223)" fill="black"/>
							<path
                                d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                fill="black"/>
						</svg>
					</span>
                    <!--end::Svg Icon-->
                    <input type="text" data-kt-publishers-table-filter="search"
                           class="form-control form-control-solid w-250px ps-14" placeholder="@lang('datatables.search')"/>
                </div>
                <!--end::Search-->
            </div>
            <!--begin::Card title-->
            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                    <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click"
                            data-kt-menu-placement="bottom-end">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                        <span class="svg-icon svg-icon-2">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none">
								<path
                                    d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z"
                                    fill="black"/>
							</svg>
						</span>
                        <!--end::Svg Icon-->@choice('datatables.column',2)
                    </button>
                    <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true"
                         id="kt-toolbar-filter">
                        <div class="px-7 py-5">
                            <div class="fs-4 text-dark fw-bolder">@choice('datatables.column',2)</div>
                        </div>
                        <div class="separator border-gray-200"></div>
                        <div class="px-7 py-5">
                            <div class="mb-10">
                                <label class="form-label fs-5 fw-bold mb-3">@choice('datatables.column',2) :</label>
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label
                                        class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input columnToggleBtn" type="checkbox"
                                               checked="ckeched" data-column="0"/>
                                        <span class="form-check-label text-gray-600">@lang('admin/publishers.id')</span>
                                    </label>
                                </div>
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label
                                        class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input columnToggleBtn" type="checkbox"
                                               checked="ckeched" data-column="1"/>
                                        <span class="form-check-label text-gray-600">@lang('admin/publishers.name')</span>
                                    </label>
                                </div>
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label
                                        class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input columnToggleBtn" type="checkbox"
                                               checked="ckeched" data-column="2"/>
                                        <span class="form-check-label text-gray-600">@choice('admin/publishers.thematic',2)</span>
                                    </label>
                                </div>
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label
                                        class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input columnToggleBtn" type="checkbox"
                                               checked="ckeched" data-column="3"/>
                                        <span class="form-check-label text-gray-600">@choice('admin/publishers.country_scope',1)</span>
                                    </label>
                                </div>
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label
                                        class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input columnToggleBtn" type="checkbox"
                                               checked="ckeched" data-column="4"/>
                                        <span class="form-check-label text-gray-600">@choice('admin/publishers.leads_type',1)</span>
                                    </label>
                                </div>
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label
                                        class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input columnToggleBtn" type="checkbox"
                                               checked="ckeched" data-column="5"/>
                                        <span class="form-check-label text-gray-600">@choice('admin/publishers.cost_type',1)</span>
                                    </label>
                                </div>
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label
                                        class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input columnToggleBtn" type="checkbox"
                                               checked="ckeched" data-column="6"/>
                                        <span class="form-check-label text-gray-600">@choice('admin/publishers.unit_price',1)</span>
                                    </label>
                                </div>
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label
                                        class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input columnToggleBtn" type="checkbox"
                                               checked="ckeched" data-column="7"/>
                                        <span class="form-check-label text-gray-600">@lang('admin/publishers.sale')%</span>
                                    </label>
                                </div>
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label
                                        class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input columnToggleBtn" type="checkbox"
                                               checked="ckeched" data-column="8"/>
                                        <span class="form-check-label text-gray-600">@lang('admin/publishers.creation_date')</span>
                                    </label>
                                </div>
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label
                                        class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input columnToggleBtn" type="checkbox"
                                               checked="ckeched" data-column="9"/>
                                        <span class="form-check-label text-gray-600">@choice('admin/publishers.action',2)</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-light-primary me-3 expand_all toggle">
                        @lang('datatables.expand_all')
                        <span class="svg-icon svg-icon-3 m-0 toggle-off">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="11" y="18" width="12" height="2" rx="1" transform="rotate(-90 11 18)" fill="black"></rect>
                                <rect x="6" y="11" width="12" height="2" rx="1" fill="black"></rect>
                            </svg>
                        </span>
                        <span class="svg-icon svg-icon-3 m-0 toggle-on">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect x="6" y="11" width="12" height="2" rx="1" fill="black"></rect>
                            </svg>
                        </span>
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_publisher">
                        <span class="svg-icon svg-icon-2">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
								<rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black"/>
								<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black"/>
							</svg>
						</span>
                        @lang('admin/publishers.add_publisher')
                    </button>
                    <!--end::Add publisher-->
                </div>
                <!--end::Toolbar-->
            </div>
            <!--end::Card toolbar-->
        </div>
        <div class="card-body pt-0">
            <!--begin::Table-->
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_publishers">
                <!--begin::Table head-->
                <thead>
                <!--begin::Table row-->
                <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                    <th></th>
                    <th>@lang('admin/publishers.id')</th>
                    <th class="min-w-125px">@lang('admin/publishers.name')</th>
                    <th class="min-w-125px">@choice('admin/publishers.thematic',1)</th>
                    <th class="min-w-125px">@choice('admin/publishers.country_scope',1)</th>
                    <th class="min-w-125px">@choice('admin/publishers.lead_type',1)</th>
                    <th class="min-w-125px">@choice('admin/publishers.cost_type',1)</th>
                    <th class="min-w-125px">@choice('admin/publishers.unit_price',1)</th>
                    <th class="min-w-125px">@lang('admin/publishers.sale')%</th>
                    <th class="min-w-125px">@lang('admin/publishers.creation_date')</th>
                    <th class="text-end min-w-100px">@choice('admin/publishers.action',2)</th>
                </tr>
                <!--end::Table row-->
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody class="text-gray-600 fw-bold">
                <!--begin::Table row-->
                @foreach($publishers as $publisher)

                    <tr>
                        <td>
                            @if($publisher->thematics->count() > 1)
                                <button type="button"
                                        class="btn btn-sm btn-icon btn-light btn-active-light-primary toggle h-25px w-25px"
                                        data-kt-publisher-datatable-subtable="expand_row"
                                        data-id="{{ $publisher->id }}">
                                <span class="svg-icon svg-icon-3 m-0 toggle-off">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                         height="24" viewBox="0 0 24 24" fill="none">
																		<rect opacity="0.5" x="11" y="18" width="12"
                                                                              height="2" rx="1"
                                                                              transform="rotate(-90 11 18)"
                                                                              fill="black"></rect>
																		<rect x="6" y="11" width="12" height="2" rx="1"
                                                                              fill="black"></rect>
																	</svg>
																</span>
                                    <span class="svg-icon svg-icon-3 m-0 toggle-on">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                         height="24" viewBox="0 0 24 24" fill="none">
																		<rect x="6" y="11" width="12" height="2" rx="1"
                                                                              fill="black"></rect>
																	</svg>
																</span>
                                </button>
                            @endif
                        </td>
                        <td>{{$publisher->id}} </td>
                        <td>
                            {{$publisher->name}}
                        </td>
                        <td>
                            <div class="badge badge-light">{{ $publisher->thematics->first()->name }}</div>
                        </td>
                        <td>
                            @foreach(json_decode($publisher->thematics->first()->pivot->countries) as $country)
                                <div class="badge badge-light fw-bolder"><img
                                        src="{{asset('assets/media/flags/'. \App\Helper\Countries::getCountry($country) .'.svg')}}"
                                        class="me-4 w-15px" style="border-radius: 4px"
                                        alt="">{{ \App\Helper\Countries::getCountry($country) }}</div>
                            @endforeach
                        </td>
                        <td>
                            {{ $publisher->thematics->first()->leadsTypes->where('pivot.publisher_id',$publisher->id)->first()->name  }}
                        </td>
                        <td>
                            {{ $publisher->thematics->first()->costsTypes->where('pivot.publisher_id',$publisher->id)->first()->name }}
                        </td>
                        <td>
                            {{ $publisher->thematics->first()->pivot->unit_price }}
                        </td>
                        <td>
                            {{ $publisher->thematics->first()->pivot->sale_percentage?? NULL}}
                        </td>
                        <td>{{ $publisher->created_at }}</td>
                        <td class="text-end">
                            <a href="#" class="btn btn-light btn-active-light-primary btn-sm"
                               data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                <span class="svg-icon svg-icon-5 m-0">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none">
										<path
                                            d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                            fill="black"/>
									</svg>
								</span>
                            </a>
                            <div
                                class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
                                data-kt-menu="true">
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3 edit_row" data-id="{{ $publisher->id }}">@choice('actions.edit',1)</a>
                                </div>
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3 credentials" data-email="{{ $publisher->user->email }}" data-password="{{ str_replace(' ','',$publisher->name).'@'.$publisher->id }}">@lang('admin/publishers.credentials')</a>
                                </div>
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3 sources" data-id="{{ $publisher->id }}">@lang('admin/publishers.sources')</a>
                                </div>
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3 delete_row"
                                       data-id="{{ $publisher->id }}">@choice('actions.delete',1)</a>
                                </div>
                            </div>
                        </td>

                    </tr>
                    @foreach($publisher->thematics->skip(1) as $key => $thematic)
                        <tr data-kt-publisher-datatable-subtable="subtable_template_{{ $publisher->id }}"
                            class="d-none">
                            <td></td>
                            <td></td>
                            <td>
                            </td>
                            <td>
                                <div class="badge badge-light fw-bolder">{{ $thematic->name }}</div>
                            </td>
                            <td>
                                @foreach(json_decode($thematic->pivot->countries) as $country)
                                    <div class="badge badge-light fw-bolder"><img
                                            src="{{asset('assets/media/flags/'. \App\Helper\Countries::getCountry($country) .'.svg')}}"
                                            class="me-4 w-15px" style="border-radius: 4px"
                                            alt="">{{ \App\Helper\Countries::getCountry($country) }}</div>
                                @endforeach
                            </td>
                            <td>
                                {{ $thematic->leadsTypes->where('pivot.publisher_id',$publisher->id)->first()->name }}
                            </td>
                            <td>
                                {{ $thematic->costsTypes->where('pivot.publisher_id',$publisher->id)->first()->name }}
                            </td>
                            <td>
                                {{ $thematic->pivot->unit_price }}
                            </td>
                            <td>
                                {{ $thematic->pivot->sale_percentage?? NULL}}
                            </td>
                            <td></td>
                            <td class="text-end">
                            </td>
                        </tr>
                    @endforeach

                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" id="kt_modal_add_publisher" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <div class="modal-header" id="kt_modal_add_user_header">
                    <h2 class="fw-bolder">@lang('admin/publishers.add_publisher')</h2>
                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close"
                         data-bs-dismiss="modal">
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black"/>
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black"/>
                            </svg>
                        </span>
                    </div>
                </div>
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <form id="kt_modal_add_publisher_form" class="form" action="#">
                        <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll"
                             data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                             data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header"
                             data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
                            <div class="fv-row mb-7">
                                <label class="required fw-bold fs-6 mb-2">@lang('admin/publishers.full_name')</label>
                                <input type="text" name="name" class="form-control form-control-solid mb-3 mb-lg-0"
                                       placeholder="Full name"/>
                            </div>
                            <div class="fv-row mb-7">
                                <label class="required fw-bold fs-6 mb-2">@lang('admin/publishers.email')</label>
                                <input type="email" name="email" class="form-control form-control-solid mb-3 mb-lg-0"/>
                            </div>
                            <div class="row g-9 mb-7 them">
                                <div class="d-flex col-5 flex-column mb-7 fv-row">
                                    <label class="fs-6 fw-bold mb-2">
                                        <span class="required">@choice('admin/publishers.thematic',1)</span>
                                    </label>
                                    <select name="thematics" aria-label="Select a Thematic" data-control="select2"
                                            data-placeholder="Select a Thematic..."
                                            class="form-select form-select-solid fw-bolder">
                                        <option value="">Select a Thematic...</option>
                                        @foreach($thematics as $thematic)
                                            <option value="{{ $thematic->id }}">{{ $thematic->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="d-flex col-5 flex-column mb-7 fv-row">
                                    <label class="fs-6 fw-bold mb-2">
                                        <span class="required">@choice('admin/publishers.country',2)</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                           title="Country of origination"></i>
                                    </label>
                                    <select name="country" aria-label="Select Countries"
                                            data-placeholder="Select Countries..."
                                            class="form-select form-select-solid fw-bolder" multiple="multiple">
                                        <option value="">Select a Country...</option>
                                        @foreach(\App\Helper\Countries::getCountries() as $key => $country)
                                            <option value="{{ $key}}">{{ $country}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-2 d-flex align-items-center">
                                    <button type="button" class="btn btn-sm btn-icon btn-outline-secondary addThem">
                                        <span class="svg-icon svg-icon-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1"
                                                  transform="rotate(-90 11.364 20.364)" fill="black"/>
                                            <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black"/>
                                            </svg>
                                        </span>
                                    </button>
                                </div>
                            </div>
                            <div class="d-flex flex-column mb-7 fv-row">
                                <label class="fs-6 fw-bold mb-2">
                                    <span class="required">@choice('admin/publishers.lead_type',2)</span>
                                </label>
                                <select name="leads_types" aria-label="Select a Thematic" data-control="select2"
                                        data-placeholder="Select a Leads type..."
                                        data-dropdown-parent="#kt_modal_add_publisher"
                                        class="form-select form-select-solid fw-bolder">
                                    <option value="">Select a Leads type...</option>
                                    @foreach($leads_types as $lead_type)
                                        <option value="{{ $lead_type->id }}">{{ $lead_type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row g-9 mb-7">
                                <div class="col-md-6 fv-row fv-plugins-icon-container">
                                    <label class="required fs-6 fw-bold mb-2">@choice('admin/publishers.cost_type',2)</label>
                                    <select name="costs_types" aria-label="Select a Thematic" data-control="select2"
                                            data-placeholder="Select a Thematic..."
                                            data-dropdown-parent="#kt_modal_add_publisher"
                                            class="form-select form-select-solid fw-bolder">
                                        <option value="">Select a Cost type...</option>
                                        @foreach($costs_types as $cost_type)
                                            <option value="{{ $cost_type->id }}">{{ $cost_type->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <div style="display: none" class="col-md-6 fv-row fv-plugins-icon-container unit_price">
                                    <!--begin::Label-->
                                    <label class="required fs-6 fw-bold mb-2">@lang('admin/publishers.amount')</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="number" class="form-control form-control-solid" name="unit_price">
                                    <!--end::Input-->
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <div style="display: none"
                                     class="col-md-6 fv-row fv-plugins-icon-container sale_percentage">
                                    <!--begin::Label-->
                                    <label class="required fs-6 fw-bold mb-2">@lang('admin/publishers.sale') %</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="number" max="100" class="form-control form-control-solid"
                                           name="sale_percentage">
                                    <!--end::Input-->
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center pt-15">
                            <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal"
                                    data-kt-users-modal-action="cancel">
                                Cancel
                            </button>
                            <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                                <span class="indicator-label">@lang('actions.save')</span>
                                <span class="indicator-progress">Please wait...
												<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="kt_modal_edit_publisher" data-bs-backdrop="static" data-bs-keyboard="false"
         tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <div class="modal-header" id="kt_modal_edit_user_header">
                    <h2 class="fw-bolder">@lang('admin/publishers.edit_publisher')</h2>
                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close"
                         data-bs-dismiss="modal">
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                 viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                      transform="rotate(-45 6 17.3137)" fill="black"/>
                                <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                      transform="rotate(45 7.41422 6)" fill="black"/>
                            </svg>
                        </span>
                    </div>
                </div>
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <form id="kt_modal_edit_publisher_form" class="form" action="#">
                        <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll"
                             data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                             data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header"
                             data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
                            <div class="fv-row mb-7">
                                <label class="required fw-bold fs-6 mb-2">@lang('admin/publishers.full_name')</label>
                                <input type="text" name="name" class="form-control form-control-solid mb-3 mb-lg-0"
                                       placeholder="Full name" value="Emma Smith"/>
                            </div>
                            <div class="fv-row mb-7">
                                <label class="required fw-bold fs-6 mb-2">@lang('admin/publishers.email')</label>
                                <input type="email" name="email" class="form-control form-control-solid mb-3 mb-lg-0" value="Email"/>
                            </div>
                            <div class="thematics">

                            </div>
                            <div class="d-flex flex-column mb-7 fv-row">
                                <label class="fs-6 fw-bold mb-2">
                                    <span class="required">@choice('admin/publishers.lead_type',2)</span>
                                </label>
                                <select name="leads_types" aria-label="Select a Thematic" data-control="select2"
                                        data-placeholder="Select a Leads type..."
                                        data-dropdown-parent="#kt_modal_edit_publisher"
                                        class="form-select form-select-solid fw-bolder">
                                    <option value="">Select a Leads type...</option>
                                    @foreach($leads_types as $lead_type)
                                        <option value="{{ $lead_type->id }}">{{ $lead_type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row g-9 mb-7">
                                <div class="col-md-6 fv-row fv-plugins-icon-container">
                                    <label class="required fs-6 fw-bold mb-2">@choice('admin/publishers.cost_type',2)</label>
                                    <select name="costs_types" aria-label="Select a Thematic" data-control="select2"
                                            data-placeholder="Select a Thematic..."
                                            data-dropdown-parent="#kt_modal_edit_publisher"
                                            class="form-select form-select-solid fw-bolder">
                                        <option value="">Select a Cost type...</option>
                                        @foreach($costs_types as $cost_type)
                                            <option value="{{ $cost_type->id }}">{{ $cost_type->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <div style="display: none" class="col-md-6 fv-row fv-plugins-icon-container unit_price">
                                    <!--begin::Label-->
                                    <label class="required fs-6 fw-bold mb-2">@choice('admin/publishers.amount',2)</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="number" class="form-control form-control-solid" name="unit_price">
                                    <!--end::Input-->
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <div style="display: none"
                                     class="col-md-6 fv-row fv-plugins-icon-container sale_percentage">
                                    <!--begin::Label-->
                                    <label class="required fs-6 fw-bold mb-2">@lang('admin/publishers.sale') %</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="number" max="100" class="form-control form-control-solid"
                                           name="sale_percentage">
                                    <!--end::Input-->
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center pt-15">
                            <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">
                                @lang('actions.cancel')
                            </button>
                            <button type="submit" class="btn btn-primary" data-kt-publishers-modal-action="submit">
                                <span class="indicator-label">@lang('actions.save_changes')</span>
                                <span class="indicator-progress">Please wait...
								<span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="kt_modal_credentials_publisher" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header" id="kt_modal_edit_user_header">
                    <!--begin::Modal title-->
                    <h2 class="fw-bolder">@lang('admin/publishers.default_credentials')</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close" data-bs-dismiss="modal">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black"/>
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black"/>
                            </svg>
                        </span>
                    </div>
                </div>
                <!--end::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <div class="credentials_body"></div>
                </div>
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>
    <div class="modal fade" id="kt_modal_sources_publisher" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <div class="modal-header" id="kt_modal_edit_user_header">
                    <h2 class="fw-bolder">@lang('admin/publishers.publisher_sources')</h2>
                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close" data-bs-dismiss="modal">
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black"/>
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black"/>
                            </svg>
                        </span>
                    </div>
                </div>
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <div class="sources_body">
                        <div class="row g-9 mb-7 source_body">
                            <div class="d-flex col-4 flex-column mb-7 fv-row">
                                <label class="fs-6 fw-bold mb-2">
                                    <span class="required">@lang('admin/publishers.sources')</span>
                                </label>
                                <select name="source" aria-label="Select a Source" data-control="select2" data-placeholder="Select a Source..." class="form-select form-select-solid fw-bolder">
                                    <option value="">Select a Source...</option>
                                    <option value="1">Landing page</option>
                                </select>
                            </div>
                            <div class="d-flex col-3 flex-column mb-7 fv-row">
                                <label class="fs-6 fw-bold mb-2">
                                    <span class="required">@lang('admin/publishers.name')</span>
                                </label>
                                <input type="text" name="name" class="form-control form-control-solid mb-3 mb-lg-0"/>
                            </div>
                            <div class="d-flex col-3 flex-column mb-7 fv-row">
                                <label class="fs-6 fw-bold mb-2">
                                    <span class="required">URL</span>
                                </label>
                                <input type="text" name="URL" class="form-control form-control-solid mb-3 mb-lg-0"/>
                            </div>
                            <div class="col-2 d-flex align-items-center">
                                <button type="button" class="btn btn-sm btn-icon btn-outline-secondary addSource">
                                        <span class="svg-icon svg-icon-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1"
                                                  transform="rotate(-90 11.364 20.364)" fill="black"/>
                                            <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black"/>
                                            </svg>
                                        </span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="text-center pt-15">
                        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">
                            @lang('actions.cancel')
                        </button>
                        <button type="button" class="btn btn-primary saveSources">
                            <span class="indicator-label">@lang('actions.save_changes')</span>
                            <span class="indicator-progress">Please wait...
												<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script>
        let themath = $('.them').clone();
        let source = $('.source_body').clone();
    </script>
    <script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
    <script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
    <script>
        let tr;
        let id;
        $(document).on('click', 'button[data-kt-publisher-datatable-subtable="expand_row"]', function () {
            if (!$(this).hasClass('expanded')) {
                $('tr[data-kt-publisher-datatable-subtable="subtable_template_' + $(this).data('id') + '"]').insertAfter($(this).parents('tr'));
                $('tr[data-kt-publisher-datatable-subtable="subtable_template_' + $(this).data('id') + '"]').removeClass('d-none');
                $(this).addClass('expanded');
            } else {
                $('tr[data-kt-publisher-datatable-subtable="subtable_template_' + $(this).data('id') + '"]').addClass('d-none');
                $(this).removeClass('expanded');
            }
            let onBTN = $(this).find('.toggle-on');
            let offBTN = $(this).find('.toggle-off');
            onBTN.addClass('toggle-off').removeClass('toggle-on');
            offBTN.addClass('toggle-on').removeClass('toggle-off');
        });
        let Utils = $.fn.select2.amd.require('select2/utils');
        let Dropdown = $.fn.select2.amd.require('select2/dropdown');
        let DropdownSearch = $.fn.select2.amd.require('select2/dropdown/search');
        let CloseOnSelect = $.fn.select2.amd.require('select2/dropdown/closeOnSelect');
        let AttachBody = $.fn.select2.amd.require('select2/dropdown/attachBody');

        let dropdownAdapter = Utils.Decorate(Utils.Decorate(Utils.Decorate(Dropdown, DropdownSearch), CloseOnSelect), AttachBody);
        $(document).on('click', '.addThem', function () {
            var newTh = themath.clone();
            $('select[name="thematics"]', $(this).parents('form')).each(function (e) {
                $('select[name="thematics"] option[value="' + $(this).val() + '"]', newTh).attr('disabled', true);
            });
            newTh.insertAfter($(this).parents('.row'));
            $(this).parent().html('<button type="button" class="btn btn-sm btn-icon btn-outline-danger del"><span class="svg-icon svg-icon-muted svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">\n' +
                '<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black"/>\n' +
                '</svg></span></button>');
            $($('select[data-control="select2"]', newTh)).select2();
            $($('select[name="country"]', newTh)).select2({
                dropdownAdapter: dropdownAdapter,
                multiple: true
            });
        });
        $(document).on('click', '.addSource', function () {
            var newTh = source.clone();
            newTh.insertAfter($(this).parents('.row'));
            $(this).parent().html('<button type="button" class="btn btn-sm btn-icon btn-outline-danger del"><span class="svg-icon svg-icon-muted svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">\n' +
                '<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black"/>\n' +
                '</svg></span></button>');
            $($('select[data-control="select2"]', newTh)).select2();
            $($('select[name="country"]', newTh)).select2({
                dropdownAdapter: dropdownAdapter,
                multiple: true
            });
        });
        $(document).on('click', '.del', function () {
            $('select[name="thematics"] option[value="' + $(this).parents('.row').find('select[name="thematics"]').val() + '"]', $(this).parents('form')).attr('disabled', false);
            $(this).parents('.row').remove();
        });
        $('select[name="country"]').select2({
            dropdownAdapter: dropdownAdapter,
            multiple: true
        });
        $(document).on('click', '.credentials', function () {
            $('.credentials_body').html('Login : ' + $(this).data('email') + '<br> Pass : ' + $(this).data('password'));
            $('#kt_modal_credentials_publisher').modal('show');
        });
        $(document).on('click', '.sources', function () {
            id = $(this).data('id');
            $.ajax({
                method: 'POST',
                url: '{{ route('admin.publishers.sources') }}',
                dataType: 'JSON',
                data: {
                    id: id,
                    _token: '{{ csrf_token() }}'
                },
                success: function (data) {
                    $('.source_body').empty();
                    if (data.success) {
                        $.each(data.landings, function (index, landing) {
                            var newTh = source.clone();
                            $('input[name="name"]', newTh).val(landing.name);
                            $('input[name="URL"]', newTh).val(landing.url);
                            $('select[name="source"] option[value="1"]', newTh).attr('selected', true);
                            $('.addSource', newTh).parent().html('<button type="button" class="btn btn-sm btn-icon btn-outline-danger del"><span class="svg-icon svg-icon-muted svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">\n' +
                                '<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black"/>\n' +
                                '</svg></span></button>');
                            $('.source_body').append(newTh);
                            $($('select[data-control="select2"]', newTh)).select2();
                            $($('select[name="country"]', newTh)).select2({
                                dropdownAdapter: dropdownAdapter,
                                multiple: true
                            });
                        })
                        var newTh = source.clone();
                        $('.source_body').append(newTh);
                    }
                }
            })
            $('#kt_modal_sources_publisher').modal('show');
        });
        $('.expand_all').click(function () {
            if (!$(this).hasClass('expanded')) {
                $(this).addClass('expanded');
                $('button[data-kt-publisher-datatable-subtable="expand_row"]', document).removeClass('expanded').click();
            } else {
                $(this).removeClass('expanded');
                $('button[data-kt-publisher-datatable-subtable="expand_row"]', document).addClass('expanded').click();
            }
            let onBTN = $(this).find('.toggle-on');
            let offBTN = $(this).find('.toggle-off');
            onBTN.addClass('toggle-off').removeClass('toggle-on');
            offBTN.addClass('toggle-on').removeClass('toggle-off');
        });
        $('.columnToggleBtn').on('click', function (e) {
            var column = table.column($(this).attr('data-column'));
            column.visible($(this).is(':checked'));
            table.columns.adjust().draw();
        });
        /*$(document).on('change', 'select[name="thematics"]', function () {
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
                    $('select[name="country"]', select.parents('.them')).empty();
                    if (data.success) {
                        $.each(data.countries, function (index, country) {
                            let sel = $.inArray(index, selectedCountries[select.val()]) != -1 ? 'selected' : '';
                            $('select[name="country"]', select.parents('.them')).append('<option value="' + index + '" ' + sel + ' >' + country + '</option>')
                        })
                    }
                }
            })
        });*/
        $('select[name="leads_types"],select[name="costs_types"]').select2({
            minimumResultsForSearch: Infinity
        });
        var table = $("#kt_table_publishers").DataTable({
            "order": [[1, "desc"]],
            "language": {
                "zeroRecords": '@lang('datatables.zeroRecords')',
                "info": '@lang('datatables.info')',
                "infoEmpty": '@lang('datatables.infoEmpty')',
            }
        });
        $('[data-kt-publishers-table-filter="search"]').on('keyup', function (e) {
            table.search($(this).val()).draw();
        });
        var validator = FormValidation.formValidation(
            $('#kt_modal_add_publisher_form')[0],
            {
                fields: {
                    'name': {
                        validators: {
                            notEmpty: {
                                message: 'Name is required'
                            }
                        }
                    }, 'thematics': {
                        validators: {
                            notEmpty: {
                                message: 'Tematics is required'
                            }
                        }
                    }, 'country': {
                        validators: {
                            notEmpty: {
                                message: 'Countries is required'
                            }
                        }
                    }, 'leads_types': {
                        validators: {
                            notEmpty: {
                                message: 'Leads types is required'
                            }
                        }
                    }
                },

                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
                    })
                }
            }
        );
        $('#kt_modal_add_publisher_form').on('reset', function (e) {
            $(this).find('select').change();
        });
        var validator1 = FormValidation.formValidation(
            $('#kt_modal_edit_publisher_form')[0],
            {
                fields: {
                    'name': {
                        validators: {
                            notEmpty: {
                                message: 'Name is required'
                            }
                        }
                    }, 'thematics': {
                        validators: {
                            notEmpty: {
                                message: 'Start date is required'
                            }
                        }
                    }, 'country': {
                        validators: {
                            notEmpty: {
                                message: 'Countries is required'
                            }
                        }
                    }, 'leads_types': {
                        validators: {
                            notEmpty: {
                                message: 'Leads types is required'
                            }
                        }
                    }
                },

                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
                    })
                }
            }
        );
        $('#kt_modal_add_publisher').on('show.bs.modal', function (e) {
            $('#kt_modal_add_publisher_form').trigger('reset');
            $('#kt_modal_add_thematic_form select').change();
        });
        let selectedCountries = [];
        $('select[name="costs_types"]').change(function () {
            if ($(this).val() == 2) {
                $('.sale_percentage').show();
                $('.unit_price').hide();

            } else {
                $('.unit_price').show();
                $('.sale_percentage').hide();
            }
        });
        $(document).on('click', '.delete_row', function () {
            let tr = $(this).parents('tr');
            let id = $(this).data('id');
            Swal.fire({
                icon: 'warning',
                title: 'Your really want to delete this Publisher ?',
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
                        url: '{{ route('admin.publishers.destroy') }}',
                        dataType: 'JSON',
                        data: {
                            id: id,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function (data) {
                            if (data.success) {
                                Swal.fire({
                                    text: "Publisher successfully Removed",
                                    icon: "success",
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                table.row(tr).remove().draw();
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
                }
            })
        });
        $(document).on('click', '.edit_row', function () {
            tr = $(this).parents('tr');
            id = $(this).data('id');
            $.ajax({
                method: 'POST',
                url: '{{ route('admin.publishers.show') }}',
                dataType: 'JSON',
                data: {
                    id: id,
                    _token: '{{ csrf_token() }}'
                },
                success: function (data) {
                    if (data.success) {
                        $('#kt_modal_edit_publisher').modal('show');
                        $('#kt_modal_edit_publisher_form input[name="name"]').val(data.publisher.name);
                        $('#kt_modal_edit_publisher_form input[name="email"]').val(data.publisher.user.email);
                        if (data.publisher.leads_types.length != 0) $('#kt_modal_edit_publisher_form select[name="leads_types"] option[value="' + data.publisher.leads_types[0].id + '"]').prop('selected', true).change();
                        if (data.publisher.costs_types.length != 0) $('#kt_modal_edit_publisher_form select[name="costs_types"] option[value="' + data.publisher.costs_types[0].id + '"]').prop('selected', true).change();
                        if (data.publisher.thematics.length != 0) $('#kt_modal_edit_publisher_form input[name="sale_percentage"]').val(data.publisher.thematics[0].pivot.sale_percentage);
                        $('#kt_modal_edit_publisher_form input[name="unit_price"]').val(data.publisher.thematics[0].pivot.unit_price);
                        $('#kt_modal_edit_publisher_form .thematics').empty();
                        $.each(data.publisher.thematics, function () {
                            let newThem = themath.clone();
                            $($('select[name="thematics"] option[value="' + this.id + '"]', newThem)).attr('selected', true);
                            selectedCountries = JSON.parse(this.pivot.countries);
                            $.each(selectedCountries, function () {
                                $('select[name="country"] option[value="' + this + '"]', newThem).attr('selected', true);
                            });
                            $('.addThem', newThem).parent().html('<button type="button" class="btn btn-sm btn-icon btn-outline-danger del"><span class="svg-icon svg-icon-muted svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">\n' +
                                '<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black"/>\n' +
                                '</svg></span></button>');
                            $('#kt_modal_edit_publisher_form .thematics').append(newThem);
                            $($('select[data-control="select2"]', newThem)).select2();
                            $($('select[name="country"]', newThem)).select2({
                                dropdownAdapter: dropdownAdapter,
                                multiple: true
                            });
                        });
                        let newThem = themath.clone();
                        $('#kt_modal_edit_publisher_form .thematics').append(newThem);
                        $($('select[data-control="select2"]', newThem)).select2();
                        $($('select[name="country"]', newThem)).select2({
                            dropdownAdapter: dropdownAdapter,
                            multiple: true
                        });

                    }
                }
            });
        });
        $('#kt_modal_add_publisher_form').on('submit', function (e) {
            e.preventDefault();
            var thematics = [];
            $('#kt_modal_add_publisher_form select[name="thematics"]').map(function (i, v) {
                thematics.push({
                    'val': $(v).val(),
                    'countries': $(v).parents('.them').find('select[name="country"]').val()
                });
            });
            if (validator) {
                validator.validate().then(function (status) {
                    if (status == 'Valid') {
                        $('.indicator-progress').show();
                        $('.indicator-label').hide();
                        $.ajax({
                            method: 'POST',
                            url: '{{ route('admin.publishers.store') }}',
                            dataType: 'JSON',
                            data: {
                                name: $('#kt_modal_add_publisher_form input[name="name"]').val(),
                                email: $('#kt_modal_add_publisher_form input[name="email"]').val(),
                                leads_types: $('#kt_modal_add_publisher_form select[name="leads_types"]').val(),
                                costs_types: $('#kt_modal_add_publisher_form select[name="costs_types"]').val(),
                                sale_percentage: $('#kt_modal_add_publisher_form input[name="sale_percentage"]').val(),
                                unit_price: $('#kt_modal_add_publisher_form input[name="unit_price"]').val(),
                                status: 1,
                                thematics: thematics,
                                _token: '{{ csrf_token() }}'
                            },
                            success: function (data) {
                                $('.indicator-progress').hide();
                                $('.indicator-label').show();
                                if (data.success) {
                                    Swal.fire({
                                        text: "Publisher successfully created",
                                        icon: "success",
                                        showConfirmButton: false,
                                        timer: 1500
                                    });
                                    var today = new Date();
                                    table.row.add(['', data.publisher.id, data.publisher.name, data.publisher.thematics.map((O, K) => '<div class="badge badge-light">' + O.name + '</div>').join(""), $('#kt_modal_add_publisher_form select[name="country"] option:selected').map((O, K) => '<div class="badge badge-light">' + $(K).text() + '</div>').toArray().join(""), data.publisher.leads_types[0].name, data.publisher.costs_types[0].name, data.publisher.thematics[0].pivot.unit_price, data.publisher.thematics[0].pivot.sale_percentage, today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate() + ' ' + today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds(), '<a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions\n' +
                                    '                                <span class="svg-icon svg-icon-5 m-0">\n' +
                                    '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">\n' +
                                    '<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black"/>\n' +
                                    '</svg>\n' +
                                    '</span>\n' +
                                    '                            </a>\n' +
                                    '                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">\n' +
                                    '                                <div class="menu-item px-3">' +
                                    '                                   <a href="#" class="menu-link px-3 edit_row" data-id="' + data.publisher.id + '">Edit</a>' +
                                    '                               </div>\n' +
                                    '<div class="menu-item px-3">' +
                                    '                                   <a href="#" class="menu-link px-3 credentials" data-email="' + data.publisher.user.email + '" data-password="' + data.publisher.name.replace(" ", "") + '@' + data.publisher.id + '">Credentials</a>' +
                                    '                               </div>\n' +
                                    '                                <div class="menu-item px-3">\n' +
                                    '                                    <a href="#" class="menu-link px-3 delete_row" data-id="' + data.publisher.id + '">Delete</a>\n' +
                                    '                                </div>\n' +
                                    '                            </div>']).draw();
                                    KTMenu.createInstances();
                                    $('#kt_modal_add_publisher_form button[type="reset"]').click();
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
                    }
                })
            }
        });
        $('#kt_modal_edit_publisher_form').on('submit', function (e) {
            e.preventDefault();
            var thematics = [];
            $('#kt_modal_edit_publisher_form select[name="thematics"]').map(function (i, v) {
                if ($(this).val() != "" && $(v).parents('.them').find('select[name="country"]').val().length != 0) thematics.push({
                    'val': $(v).val(),
                    'countries': $(v).parents('.them').find('select[name="country"]').val()
                });
            });
            if (validator1 && thematics.length != 0) {
                validator1.validate().then(function (status) {
                    if (status == 'Valid') {
                        $('.indicator-progress').show();
                        $('.indicator-label').hide();
                        $.ajax({
                            method: 'POST',
                            url: '{{ route('admin.publishers.update') }}',
                            dataType: 'JSON',
                            data: {
                                id: id,
                                name: $('#kt_modal_edit_publisher_form input[name="name"]').val(),
                                email: $('#kt_modal_edit_publisher_form input[name="email"]').val(),
                                leads_types: $('#kt_modal_edit_publisher_form select[name="leads_types"]').val(),
                                costs_types: $('#kt_modal_edit_publisher_form select[name="costs_types"]').val(),
                                sale_percentage: $('#kt_modal_edit_publisher_form input[name="sale_percentage"]').val(),
                                unit_price: $('#kt_modal_edit_publisher_form input[name="unit_price"]').val(),
                                thematics: thematics,
                                _token: '{{ csrf_token() }}'
                            },
                            success: function (data) {
                                $('.indicator-progress').hide();
                                $('.indicator-label').show();
                                if (data.success) {
                                    Swal.fire({
                                        text: "Publisher successfully updated",
                                        icon: "success",
                                        showConfirmButton: false,
                                        timer: 1500
                                    });
                                    let DTdata = table.row(tr).data();
                                    DTdata[2] = data.publisher.name;
                                    DTdata[3] = $('#kt_modal_edit_publisher_form select[name="thematics"] option:selected').map((O, V) => '<div class="badge badge-light">' + $(V).text() + '</div>').toArray().join('');
                                    DTdata[4] = $('#kt_modal_edit_publisher_form select[name="country"] option:selected').map((O, V) => '<div class="badge badge-light">' + $(V).text() + '</div>').toArray().join('');
                                    DTdata[5] = $('#kt_modal_edit_publisher_form select[name="leads_types"] option:selected').text();
                                    DTdata[6] = $('#kt_modal_edit_publisher_form select[name="costs_types"] option:selected').text();
                                    DTdata[7] = $('#kt_modal_edit_publisher_form input[name="unit_price"]').val();
                                    table.row(tr).data(DTdata).draw();
                                    $('#kt_modal_edit_publisher_form button[data-bs-dismiss="modal"]').click();
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
            }
        });
    </script>
@endsection
