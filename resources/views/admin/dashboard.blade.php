@extends('layouts.layout')
@section('pageTitle')
    @lang('admin/dashboard.dashboard')
@endsection
@section('pageDescription')
    Dashboard
@endsection
@section('content')
    <div class="row mb-5 mb-xl-8 g-5 g-xl-8">
        <div class="col-md-2 col-sm-6">
            <div class="card card-stretch">
                <a href="{{ route('admin.advertisers') }}" class="btn btn-flex btn-text-gray-800 btn-icon-gray-400 btn-active-color-primary bg-body flex-column justfiy-content-start align-items-start text-start w-100 p-10">
                    <span class="fs-2x fw-bolder d-block text-gray-800 me-2 mb-2 lh-1 ls-n2  mb-4">{{ $advertisers_count }}</span>
                    <span class="fs-5 fw-bolder text-muted">@lang('admin/dashboard.advertisers')</span>
                </a>
            </div>
        </div>
        <div class="col-md-2 col-sm-6">
            <div class="card card-stretch">
                <a href="{{ route('admin.publishers') }}" class="btn btn-flex btn-text-gray-800 btn-icon-gray-400 btn-active-color-primary bg-body flex-column justfiy-content-start align-items-start text-start w-100 p-10">
                    <span class="fs-2x fw-bolder d-block text-gray-800 me-2 mb-2 lh-1 ls-n2  mb-4">{{ $publishers_count }}</span>
                    <span class="fs-5 fw-bolder text-muted">@lang('admin/dashboard.publishers')</span>
                </a>
            </div>
        </div>
        <div class="col-md-2 col-sm-6">
            <div class="card card-stretch">
                <a href="{{ route('admin.campaigns') }}" class="btn btn-flex btn-text-gray-800 btn-icon-gray-400 btn-active-color-primary bg-body flex-column justfiy-content-start align-items-start text-start w-100 p-10">
                    <span class="fs-2x fw-bolder d-block text-gray-800 me-2 mb-2 lh-1 ls-n2  mb-4">{{ $campaigns_count }}</span>
                    <span class="fs-5 fw-bolder text-muted">@lang('admin/dashboard.active_campaigns')</span>
                </a>
            </div>
        </div>
        <div class="col-md-2 col-sm-6">
            <div class="card card-stretch">
                <a href="{{ route('admin.negotiations') }}" class="btn btn-flex btn-text-gray-800 btn-icon-gray-400 btn-active-color-primary bg-body flex-column justfiy-content-start align-items-start text-start w-100 p-10">
                    <span class="fs-2x fw-bolder d-block text-gray-800 me-2 mb-2 lh-1 ls-n2  mb-4">{{ $negotiations }}</span>
                    <span class="fs-5 fw-bolder text-muted">@lang('admin/dashboard.inProgress_negotiations')</span>
                </a>
            </div>
        </div>
        <div class="col-md-2 col-sm-6">
            <div class="card card-stretch">
                <a href="#" class="btn btn-flex btn-text-gray-800 btn-icon-gray-400 btn-active-color-primary bg-body flex-column justfiy-content-start align-items-start text-start w-100 p-10">
                    <span class="fs-2x fw-bolder d-block text-gray-800 me-2 mb-2 lh-1 ls-n2  mb-4">{{ $opportunities }}</span>
                    <span class="fs-5 fw-bolder text-muted">@lang('admin/dashboard.new_opportunities')</span>
                </a>
            </div>
        </div>
        <div class="col-md-2 col-sm-6">
            <div class="card card-stretch">
                <a href="{{ route('admin.leads') }}" class="btn btn-flex btn-text-gray-800 btn-icon-gray-400 btn-active-color-primary bg-body flex-column justfiy-content-start align-items-start text-start w-100 p-10">
                    <div class="d-flex align-items-center mb-2">
                        <span class="fs-2x fw-bolder text-gray-800 me-2 lh-1 ls-n2">{{ $saleLeads }}</span>
                        <span class="badge badge-light-primary fs-base">{{ round($saleLeads/$allLeads,2 )*100 }}%</span>
                    </div>
                    <span class="fs-5 fw-bolder text-muted">@lang('admin/dashboard.sale_leads')</span>
                </a>
            </div>
        </div>
    </div>
    <div class="row gy-5 g-xl-10">
        <div class="mb-5 mb-xl-10">
            <div class="row g-5 g-xl-10 h-xxl-50 mb-0 mb-xl-10">
                <div class="col-xxl-4 mb-5">
                    <div class="card card-flush h-lg-100">
                        <div class="card-header pt-7 mb-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bolder text-gray-800">@lang('admin/dashboard.leads_by_country')</span>
                                <span class="text-gray-400 mt-1 fw-bold fs-6">{{ $countriesCount }} @lang('admin/dashboard.countries')</span>
                            </h3>
                            <div class="card-toolbar">
                                <a href="{{ route('admin.leads') }}" class="btn btn-sm btn-light">@lang('admin/dashboard.all_leads')</a>
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
                                                {{ round($lead['count']/$leads,2)*100 }}%
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
                <div class="col-xxl-4 mb-5">
                    <!--begin::List widget 6-->
                    <div class="card card-flush h-md-100">
                        <!--begin::Header-->
                        <div class="card-header pt-7">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bolder text-gray-800">@lang('admin/dashboard.top_publishers')</span>
                                <span class="text-gray-400 mt-1 fw-bold fs-6">@lang('admin/dashboard.top_5_publishers')</span>
                            </h3>
                            <div class="card-toolbar">
                                <a href="{{ route('admin.publishers') }}" class="btn btn-sm btn-light">@lang('admin/dashboard.all_publishers')</a>
                            </div>
                        </div>
                        <div class="card-body pt-4">
                            <div class="table-responsive">
                                <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4 my-0">
                                    <thead>
                                    <tr class="fs-7 fw-bolder text-gray-500 border-bottom-0">
                                        <th class="p-0 w-50px pb-1">@lang('admin/dashboard.publisher')</th>
                                        <th class="ps-0 min-w-140px"></th>
                                        <th class="text-end min-w-140px p-0 pb-1">@lang('admin/dashboard.total_leads')</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($publishers as $publisher)
                                        <tr>
                                            <td>
                                                <img src="{{ $publisher->user->photo }}" class="w-50px h-50px rounded" alt="">
                                            </td>
                                            <td class="ps-0">
                                                <a href="#" class="text-gray-800 fw-bolder text-hover-primary mb-1 fs-6 text-start pe-0">{{ $publisher->name }}</a>
                                                <span class="text-gray-400 fw-bold fs-7 d-block text-start ps-0">@lang('admin/dashboard.joined') {{  $publisher->created_at->diffforhumans() }}</span>
                                            </td>
                                            <td>
                                                <span class="text-gray-800 fw-bolder d-block fs-6 ps-0 text-end">{{ $publisher->leads_count }}</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
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
                                <a href="{{ route('admin.campaigns') }}" class="btn btn-sm btn-light">@lang('admin/dashboard.all_campaigns')</a>
                            </div>
                        </div>
                        <div class="card-body pt-5">
                            @foreach($campaigns as $campaign)
                                <div class="d-flex flex-stack">
                                    <div class="d-flex align-items-center me-3">
                                        <div class="symbol symbol-40px me-4">
                                            <div class="symbol-label fs-4 fw-bold bg-primary text-inverse-danger">{{ $campaign->id }}</div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bolder lh-0 campaign_details" data-id="{{ $campaign->id }}">{{ $campaign->name }}</a>
                                            <span class="text-gray-400 fw-bold d-block fs-6">@lang('admin/dashboard.max_leads') : {{ $campaign->leads_vmax }}</span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center w-100 mw-125px">
                                        <div class="progress h-6px w-100 me-2 bg-light-success">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: {{ ($campaign->leads_count/$campaign->leads_vmax)*100 }}%" aria-valuenow="{{ ($campaign->leads_count/$campaign->leads_vmax)*100 }}" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <span class="text-gray-400 fw-bold">{{ ($campaign->leads_count/$campaign->leads_vmax)*100 }}%</span>
                                    </div>
                                </div>
                                <div class="separator separator-dashed my-3"></div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="campaign_details_modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header pb-0 border-0 justify-content-end">
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black"></rect>
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black"></rect>
                            </svg>
                        </span>
                    </div>
                </div>
                <div class="modal-body scroll-y campaign_details_body">

                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script>
        $(document).on('click', '.campaign_details', function () {
            $.ajax({
                url: route('admin.campaigns.view'),
                method: 'POST',
                data: {
                    id: $(this).data('id'),
                    _token: '{{ csrf_token() }}'
                },
                success: function (data) {
                    $('.campaign_details_body').html(data);
                    $('#campaign_details_modal').modal('show');
                }
            });
        });
    </script>
@endsection
