@extends('layouts.layout')
@section('pageTitle')
    Dashboard
@endsection
@section('pageDescription')
    Dashboard
@endsection
@section('content')
    <div class="row g-5 g-xl-8">

        <div class="col-xl-4">

            <div class="row mb-5 mb-xl-8 g-5 g-xl-8">
                <div class="col-6">
                    <div class="card ">
                        <div class="card-body">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen032.svg-->
                            <span class="svg-icon svg-icon-primary svg-icon-3x ms-n1">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
								<rect x="8" y="9" width="3" height="10" rx="1.5" fill="black"></rect>
								<rect opacity="0.5" x="13" y="5" width="3" height="14" rx="1.5" fill="black"></rect>
								<rect x="18" y="11" width="3" height="8" rx="1.5" fill="black"></rect>
								<rect x="3" y="13" width="3" height="6" rx="1.5" fill="black"></rect>
							</svg>
							<div class="fw-bold text-gray-400">Campaigns</div>
						</span>
                            <!--end::Svg Icon-->
                            <div class="text-gray-900 fw-bolder fs-2 mt-5">{{ $campaigns }}</div>

                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen032.svg-->
                            <span class="svg-icon svg-icon-primary svg-icon-3x ms-n1">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
								<rect x="8" y="9" width="3" height="10" rx="1.5" fill="black"></rect>
								<rect opacity="0.5" x="13" y="5" width="3" height="14" rx="1.5" fill="black"></rect>
								<rect x="18" y="11" width="3" height="8" rx="1.5" fill="black"></rect>
								<rect x="3" y="13" width="3" height="6" rx="1.5" fill="black"></rect>
							</svg>
							<div class="fw-bold text-gray-400">Countries scope</div>
						</span>
                            <!--end::Svg Icon-->
                            <div class="text-gray-900 fw-bolder fs-2 mt-5">{{ $countries }}</div>

                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen032.svg-->
                            <span class="svg-icon svg-icon-primary svg-icon-3x ms-n1">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
								<rect x="8" y="9" width="3" height="10" rx="1.5" fill="black"></rect>
								<rect opacity="0.5" x="13" y="5" width="3" height="14" rx="1.5" fill="black"></rect>
								<rect x="18" y="11" width="3" height="8" rx="1.5" fill="black"></rect>
								<rect x="3" y="13" width="3" height="6" rx="1.5" fill="black"></rect>
							</svg>
							<div class="fw-bold text-gray-400">Leads</div>
						</span>
                            <!--end::Svg Icon-->
                            <div class="text-gray-900 fw-bolder fs-2 mt-5">{{ $leads }}</div>

                        </div>
                    </div>
                </div>
            </div>


        </div>


        <div class="col-xl-8 ps-xl-12">

            <!--begin::Row-->
            <div class="row g-5 g-xl-8">
                <div class="card bgi-position-y-bottom bgi-position-x-end bgi-no-repeat bgi-size-cover min-h-250px bg-primary mb-5 mb-xl-8" style="background-color: ;background-position: 100% 50px;background-size: 500px auto;background-image: url('https://preview.keenthemes.com/metronic8/demo17/assets/media/misc/city.png');background-color: rgba(176,220,0,1)!important;">
                    <!--begin::Body-->
                    <div class="card-body d-flex flex-column justify-content-center ps-lg-12">
                        <!--begin::Title-->
                        <h3 class="text-dark fs-2qx fw-bolder mb-7">We are working
                            <br>to boost lovely mood
                        </h3>
                        <!--end::Title-->
                        <!--begin::Action-->
                        <div class="m-0">
                            <a href="{{ route('publisher.campaigns') }}" class="btn btn-dark fw-bold px-6 py-3" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">Manage
                                Campaigns</a>
                        </div>
                        <!--begin::Action-->
                    </div>
                    <!--end::Body-->
                </div>

            </div>

        </div>

    </div>
@endsection
