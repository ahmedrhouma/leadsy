@extends('layouts.layout')
@section('pageTitle')
    Dashboard
@endsection
@section('pageDescription')
    Dashboard
@endsection
@section('content')
    <!--begin::Row-->
    <div class="row gy-5 g-xl-10">
        <div class="mb-5 mb-xl-10">
            <div class="row g-5 g-xl-10 h-xxl-50 mb-0 mb-xl-10">
                <div class="col-xxl-4 mb-5">
                    <div class="row mb-5 mb-xl-8 g-5 g-xl-8">
                        <div class="col-md-6 col-sm-12">
                            <div class="card card-stretch">
                                <a href="#" class="btn btn-flex btn-text-gray-800 btn-icon-gray-400 btn-active-color-primary bg-body flex-column justfiy-content-start align-items-start text-start w-100 p-10">
                                    <span class="fs-2x fw-bolder d-block text-gray-800 me-2 mb-2 lh-1 ls-n2  mb-4">{{ $campaigns_count }}</span>
                                    <span class="fs-5 fw-bolder text-muted">@lang('admin/dashboard.active_campaigns')</span>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="card card-stretch">
                                <a href="#" class="btn btn-flex btn-text-gray-800 btn-icon-gray-400 btn-active-color-primary bg-body flex-column justfiy-content-start align-items-start text-start w-100 p-10">
                                    <span class="fs-2x fw-bolder d-block text-gray-800 me-2 mb-2 lh-1 ls-n2  mb-4">{{ $negotiations }}</span>
                                    <span class="fs-5 fw-bolder text-muted">@lang('admin/dashboard.inProgress_negotiations')</span>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="card card-stretch">
                                <a href="#" class="btn btn-flex btn-text-gray-800 btn-icon-gray-400 btn-active-color-primary bg-body flex-column justfiy-content-start align-items-start text-start w-100 p-10">
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="fs-2x fw-bolder text-gray-800 me-2 lh-1 ls-n2">{{ $saleLeads }}</span>
                                        <span class="badge badge-light-primary fs-base">{{ ($saleLeads/$allLeads)*100 }}%</span>
                                    </div>
                                    <span class="fs-5 fw-bolder text-muted">@lang('admin/dashboard.sale_leads')</span>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="card card-stretch">
                                <a href="#" class="btn btn-flex btn-text-gray-800 btn-icon-gray-400 btn-active-color-primary bg-body flex-column justfiy-content-start align-items-start text-start w-100 p-10">
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="fs-2x fw-bolder text-gray-800 me-2 lh-1 ls-n2">{{ $countries }}</span>
                                    </div>
                                    <span class="fs-5 fw-bolder text-muted">@lang('admin/dashboard.countries_scope')</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 mb-5">
                    <div class="card card-flush h-lg-100">
                        <div class="card-header pt-7 mb-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bolder text-gray-800">@lang('admin/dashboard.leads_by_country')</span>
                                <span class="text-gray-400 mt-1 fw-bold fs-6">{{ $countriesCount }} @lang('admin/dashboard.countries')</span>
                            </h3>
                            <div class="card-toolbar">
                                <a href="{{ route('advertiser.leads') }}" class="btn btn-sm btn-light">@lang('admin/dashboard.all_leads')</a>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            @foreach($leadsByCountry as $lead)
                                <div class="d-flex flex-stack">
                                    <img src="{{asset('assets/media/flags/'.\App\Helper\Countries::getCountry($lead['country']) .'.svg')}}" class="me-4 w-25px" style="border-radius: 4px" alt="">
                                    <div class="d-flex flex-stack flex-row-fluid d-grid gap-2">
                                        <div class="me-5">
                                            <a href="#" class="text-gray-800 fw-bolder text-hover-primary fs-6">{{ \App\Helper\Countries::getCountry($lead['country']) }}</a>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <span class="text-gray-800 fw-bolder fs-6 me-3 d-block">{{ $lead['count'] }}</span>
                                            <div class="m-0">
                                            <span class="badge badge-success fs-base">
                                                {{ ($lead['count']/$leads)*100 }}%
                                            </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="separator separator-dashed my-3"></div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card card-flush h-xl-100">
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bolder text-dark">@lang('admin/dashboard.active_campaigns')</span>
                            </h3>
                            <div class="card-toolbar">
                                <a href="{{ route('advertiser.campaigns') }}" class="btn btn-sm btn-light">@lang('admin/dashboard.all_campaigns')</a>
                            </div>
                        </div>
                        <div class="card-body pt-5">
                            @foreach($campaigns as $campaign)
                                <div class="d-flex flex-stack">
                                    <!--begin::Wrapper-->
                                    <div class="d-flex align-items-center me-3">
                                        <div class="symbol symbol-40px me-4">
                                            <div class="symbol-label fs-4 fw-bold bg-primary text-inverse-danger">{{ $campaign->id }}</div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <!--begin::Text-->
                                            <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bolder lh-0">{{ $campaign->name }}</a>
                                            <!--end::Text-->
                                            <!--begin::Description-->
                                            <span class="text-gray-400 fw-bold d-block fs-6">@lang('admin/dashboard.max_leads') : {{ $campaign->leads_vmax }}</span>
                                            <!--end::Description=-->
                                        </div>
                                        <!--end::Section-->
                                    </div>
                                    <!--end::Wrapper-->
                                    <!--begin::Statistics-->
                                    <div class="d-flex align-items-center w-100 mw-125px">
                                        <!--begin::Progress-->
                                        <div class="progress h-6px w-100 me-2 bg-light-success">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: {{ ($campaign->leads_count/$campaign->leads_vmax)*100 }}%" aria-valuenow="{{ ($campaign->leads_count/$campaign->leads_vmax)*100 }}" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <!--end::Progress-->
                                        <!--begin::Value-->
                                        <span class="text-gray-400 fw-bold">{{ ($campaign->leads_count/$campaign->leads_vmax)*100 }}%</span>
                                        <!--end::Value-->
                                    </div>
                                    <!--end::Statistics-->
                                </div>
                                <div class="separator separator-dashed my-3"></div>
                            @endforeach
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::List widget 21-->
                </div>
            </div>
        </div>
    </div>
    {{--<div class="row g-5 g-xl-8">
        <div class="col-xl-4">
            <div class="row mb-5 mb-xl-8 g-5 g-xl-8">
                <div class="col-6">
                    <div class="card ">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-primary svg-icon-3x ms-n1">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
								<rect x="8" y="9" width="3" height="10" rx="1.5" fill="black"></rect>
								<rect opacity="0.5" x="13" y="5" width="3" height="14" rx="1.5" fill="black"></rect>
								<rect x="18" y="11" width="3" height="8" rx="1.5" fill="black"></rect>
								<rect x="3" y="13" width="3" height="6" rx="1.5" fill="black"></rect>
							</svg>
							<div class="fw-bold text-gray-400">Campaigns</div>
						</span>
                            <div class="text-gray-900 fw-bolder fs-2 mt-5">{{ $campaigns }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-primary svg-icon-3x ms-n1">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
								<rect x="8" y="9" width="3" height="10" rx="1.5" fill="black"></rect>
								<rect opacity="0.5" x="13" y="5" width="3" height="14" rx="1.5" fill="black"></rect>
								<rect x="18" y="11" width="3" height="8" rx="1.5" fill="black"></rect>
								<rect x="3" y="13" width="3" height="6" rx="1.5" fill="black"></rect>
							</svg>
							<div class="fw-bold text-gray-400">Countries scope</div>
						</span>
                            <div class="text-gray-900 fw-bolder fs-2 mt-5">{{ $countries }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-primary svg-icon-3x ms-n1">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
								<rect x="8" y="9" width="3" height="10" rx="1.5" fill="black"></rect>
								<rect opacity="0.5" x="13" y="5" width="3" height="14" rx="1.5" fill="black"></rect>
								<rect x="18" y="11" width="3" height="8" rx="1.5" fill="black"></rect>
								<rect x="3" y="13" width="3" height="6" rx="1.5" fill="black"></rect>
							</svg>
							<div class="fw-bold text-gray-400">Leads</div>
						</span>
                            <div class="text-gray-900 fw-bolder fs-2 mt-5">{{ $leads }}</div>
                        </div>
                    </div>
                </div>
            </div>


        </div>


        <div class="col-xl-8 ps-xl-12">
            <!--begin::Row-->
            <div class="row g-5 g-xl-8">
                <div class="card bgi-position-y-bottom bgi-position-x-end bgi-no-repeat bgi-size-cover min-h-250px bg-primary mb-5 mb-xl-8" style="background-position: 100% 50px;background-size: 500px auto;background-image: url('https://preview.keenthemes.com/metronic8/demo17/assets/media/misc/city.png');background-color: rgba(176,220,0,1)!important;">
                    <!--begin::Body-->
                    <div class="card-body d-flex flex-column justify-content-center ps-lg-12">
                        <!--begin::Title-->
                        <h3 class="text-dark fs-2qx fw-bolder mb-7">We are working
                            <br>to boost lovely mood
                        </h3>
                        <!--end::Title-->
                        <!--begin::Action-->
                        <div class="m-0">
                            <a href="{{ route('advertiser.campaigns') }}" class="btn btn-dark fw-bold px-6 py-3" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">Create
                                a Campaign</a>
                        </div>
                        <!--begin::Action-->
                    </div>
                    <!--end::Body-->
                </div>
            </div>
            <!--end::Row-->
        </div>

    </div>--}}
    <!--end::Row-->
@endsection
