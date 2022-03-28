<div class="d-flex flex-wrap flex-sm-nowrap mb-3">
    <div class="flex-grow-1">
        <div class="d-flex flex-column">
            <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                <div>
                    <a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bolder me-1 show-subject">{{ $campaign->name }}</a>
                    <a href="#" class="btn btn-sm btn-light-success fw-bolder ms-2 fs-8 py-1 px-3 show-type">{{ \App\Models\Campaigns::status[$campaign->status] }}</a>
                    <div class="d-flex mt-4">
                        <a href="javascript:" class="d-flex align-items-center text-gray-400 text-hover-primary me-4 mb-2 fw-bold"><span class="show-start-at">{{ $campaign->start_date }}</span></a>
                        <span class=" text-gray-400">-</span>
                        <a href="javascript:" class="d-flex align-items-center text-gray-400 text-hover-primary mx-4 mb-2  fw-bold"><span class="show-end-at">{{ $campaign->end_date }}</span></a>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <span class="text-muted">@lang('admin/negotiations.creation_date') : {{ $campaign->created_at->diffforhumans() }}</span>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black"></rect>
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black"></rect>
                            </svg>
                        </span>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-wrap justify-content-start">
                <div class="row">
                    <div class="col-md-4 p-2">
                        <div class="border border-gray-300 border-dashed rounded py-3 px-4  mb-3">
                            <div class="fw-bold fs-6 text-gray-400">@choice('admin/negotiations.thematic',1)</div>
                            <div class="d-flex align-items-center">
                                <div class="fs-4 fw-bolder">{{ $campaign->thematics->name }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 p-2">
                        <div class="border border-gray-300 border-dashed rounded py-3 px-4  mb-3">
                            <div class="fw-bold fs-6 text-gray-400">@choice('admin/negotiations.country_scope',1)</div>
                            <div class="d-flex align-items-center">
                                @foreach($campaign->countriesName as $country)
                                    <div class="fw-bolder d-block">
                                        <img src="{{asset('assets/media/flags/'.str_replace(' ','-',$country).'.svg')}}" class="me-4 w-15px" style="border-radius: 4px" alt="">{{ $country }}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 p-2">
                        <div class="border border-gray-300 border-dashed rounded py-3 px-4  mb-3">
                            <div class="fw-bold fs-6 text-gray-400">@choice('admin/negotiations.leads_type',1)</div>
                            <div class="d-flex align-items-center">
                                <div class="fs-4 fw-bolder">
                                    {{$campaign->leadsTypes->name}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 p-2">

                        <div class="border border-gray-300 border-dashed rounded py-3 px-4  mb-3">
                            <div class="fw-bold fs-6 text-gray-400">@choice('admin/negotiations.costs_type',1)</div>
                            <div class="d-flex align-items-center">
                                <div class="fs-4 fw-bolder">
                                    {{$campaign->costsTypes->name}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 p-2">

                        <div class="border border-gray-300 border-dashed rounded py-3 px-4  mb-3">
                            <div class="fw-bold fs-6 text-gray-400">@lang('admin/negotiations.expected_leads_volume')</div>
                            <div class="d-flex align-items-center">
                                <div class="fs-4 fw-bolder">
                                    {{$campaign->leads_vmax}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 p-2">
                        <div class="border border-gray-300 border-dashed rounded py-3 px-4  mb-3">
                            <div class="fw-bold fs-6 text-gray-400">@lang('admin/negotiations.max_fixed_amount')</div>
                            <div class="d-flex align-items-center">
                                <div class="fs-4 fw-bolder">
                                    {{$campaign->cost_amount}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="separator separator-dashed my-6"></div>
            <h4 class="mb-0">@choice('admin/negotiations.negotiation',2)
                (<span class="show-publishers-count">{{ $campaign->publishers->count()+1 }}</span>) </h4>
            <div class="row g-6 g-xl-9 mt-2">

                <div class="col-md-4 col-xxl-4">
                    <div class="d-flex align-items-sm-center mb-7">
                        <div class="symbol symbol-50px me-5">
                                <span class="symbol-label">
                                    <img src="{{ $campaign->advertiser->user->photo }}" class="align-self-center" alt="">
                                </span>
                        </div>
                        <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                            <div class="flex-grow-1 me-2">
                                <div class="d-flex align-items-center mb-2">
                                    <a href="#" class="text-gray-900 text-hover-primary fs-4 fw-bolder me-1">{{ $campaign->advertiser->name }}</a>
                                    <a href="#" class="btn btn-sm btn-light-primary fw-bolder ms-2 fs-8 py-1 px-3">@choice('admin/negotiations.advertiser',1)</a>
                                </div>
                                <span class="text-muted fw-bold d-block fs-7"> @choice('admin/negotiations.selling_price',1) : {{ $campaign->selling_price }} </span>
                            </div>
                        </div>
                    </div>
                </div>
                @foreach($campaign->campaignPublishers as $publisher)
                    <div class="col-md-4 col-xxl-4">
                        <div class="d-flex align-items-sm-center mb-7">
                            <div class="symbol symbol-50px me-5">
                                <span class="symbol-label">
                                    <img src="{{ $publisher->publisher->user->photo }}" class="align-self-center" alt="">
                                </span>
                            </div>
                            <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                                <div class="flex-grow-1 me-2">
                                    <div class="d-flex align-items-center mb-2">
                                        <a href="#" class="text-gray-900 text-hover-primary fs-4 fw-bolder me-1 ellipsis">{{ $publisher->publisher->name }}</a>
                                        <a href="#" class="btn btn-sm btn-light fw-bolder ms-2 fs-8 py-1 px-3">@choice('admin/negotiations.publisher',1)</a>
                                    </div>
                                    <span class="text-muted fw-bold d-block fs-7"> @choice('admin/negotiations.buying_price',1) : {{ $publisher->buying_price }} </span>
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
            <div class="show-contacts hover-scroll-y mh-200px"></div>
        </div>
    </div>
</div>
