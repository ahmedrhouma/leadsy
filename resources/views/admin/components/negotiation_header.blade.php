<div class="row">
    <div class="col-11">
        <div class="row mb-4">
            <div class="col-3">
                <div class="fw-bold text-gray-600 fs-7">@lang('admin/negotiations.campaign_id')</div>
                <div class="fw-bolder text-gray-800 fs-6 campaign_id">{{$campaign->id}}</div>
            </div>
            <div class="col-3">
                <div class="fw-bold text-gray-600 fs-7">@lang('admin/negotiations.name')</div>
                <div class="fw-bolder text-gray-800 fs-6 campaign_name">{{$campaign->name}}</div>
            </div>
            <div class="col-3">
                <div class="fw-bold text-gray-600 fs-7">@lang('admin/negotiations.creation_date')</div>
                <div class="fw-bolder text-gray-800 fs-6 campaign_created_at">{{$campaign->created_at}}</div>
            </div>
            <div class="col-3">
                <div class="fw-bold text-gray-600 fs-7">@lang('admin/negotiations.starting_date')</div>
                <div class="fw-bolder text-gray-800 fs-6 campaign_start_at">{{$campaign->start_date}}</div>
            </div>
        </div>
        <div class="collapse" id="more_info">
            <div class="row mb-4">
                <div class="col-3">
                    <div class="fw-bold text-gray-600 fs-7">@lang('admin/negotiations.advertiser_name')</div>
                    <div class="fw-bolder text-gray-800 fs-6 campaign_advertiser_name">{{$campaign->advertiser->name}}</div>
                </div>
                <div class="col-3">
                    <div class="fw-bold text-gray-600 fs-7">@choice('admin/negotiations.thematic',1)</div>
                    <div class="fw-bolder text-gray-800 fs-6 campaign_thematic">{{ $campaign->thematics->name }}</div>
                </div>
                <div class="col-3">
                    <div class="fw-bold text-gray-600 fs-7">@choice('admin/negotiations.country_scope',1)</div>
                    <div class="fw-bolder text-gray-800 fs-6 campaign_countries">
                        @foreach($campaign->countriesName as $country)
                            {{ $country }}
                        @endforeach
                    </div>
                </div>
                <div class="col-3">
                    <div class="fw-bold text-gray-600 fs-7">@choice('admin/negotiations.leads_type',1)</div>
                    <div class="fw-bolder text-gray-800 fs-6 campaign_leads_type">{{$campaign->leadsTypes->name}}</div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-3">
                    <div class="fw-bold text-gray-600 fs-7">@lang('admin/negotiations.expected_leads_volume')</div>
                    <div class="fw-bolder text-gray-800 fs-6 campaign_max_volume">{{$campaign->leads_vmax}}</div>
                </div>
                <div class="col-3">
                    <div class="fw-bold text-gray-600 fs-7">@choice('admin/negotiations.costs_type',1)</div>
                    <div class="fw-bolder text-gray-800 fs-6 campaign_cost_type">{{$campaign->costsTypes->name}}</div>
                </div>
                <div class="col-3">
                    <div class="fw-bold text-gray-600 fs-7">@choice('admin/negotiations.buying_price',1)</div>
                    <div class="fw-bolder text-gray-800 fs-6 campaign_buying_price">{{$campaign->avg_buying_price}}</div>
                </div>
                <div class="col-3">
                    <div class="fw-bold text-gray-600 fs-7">@choice('admin/negotiations.selling_price',1)</div>
                    <div class="fw-bolder text-gray-800 fs-6 campaign_selling_price">{{$campaign->selling_price}}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col -1">
        <button type="button" data-bs-target="#more_info" data-bs-toggle="collapse" class="btn btn-sm btn-light btn-active-light-primary">
            <span class="svg-icon svg-icon-5 m-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black"></path>
                </svg>
            </span>
        </button>
    </div>
</div>
<div class="separator separator-dashed border-gray my-2"></div>
<div class="d-flex justify-content-between align-items-center">
    <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bolder" id="receivers">
        @foreach($campaign->negotiations as $negotiation)
            <li class="nav-item">
                @if($negotiation->part_type == 1)
                    <a href="javascript:" class="nav-link text-active-primary py-5 pe-6 chat-item position-relative {{$negotiation->unread_messages_count > 0 ? 'attach' : ''}}" data-price="{{$campaign->selling_price }}" data-id="{{$negotiation->advertiser->user->id }}" data-account="{{$negotiation->advertiser->id }}" data-type="{{$negotiation->part_type }}" data-negotiation="{{$negotiation->id }}">
                        <div class="symbol symbol-45px symbol-circle">
                            <img alt="Pic" src="{{$negotiation->advertiser->user->photo }}">
                            <div class="symbol-badge bg-danger start-100 top-100 border-4 h-15px w-15px ms-n2 mt-n2 connection_{{$negotiation->advertiser->user->id}}"></div>
                        </div>
                        <span class="d-flex flex-column align-items-start ms-5">
                        <span class="fs-4 fw-bolder name">{{$negotiation->advertiser->name }}</span>
                            <span class="fs-8 text-gray-500">@choice('admin/negotiations.advertiser',1)</span>
                    </span>
                        <span class="bullet bullet-dot bg-success h-8px w-8px position-absolute translate-middle top-25 start-100 animation-blink {{$negotiation->unread_messages_count == 0? 'd-none' : ''}} bull_{{$negotiation->id}}"></span>
                    </a>
                @elseif($negotiation->part_type == 2)
                    <a href="javascript:" class="nav-link text-active-primary py-5 pe-6 chat-item position-relative {{$negotiation->unread_messages_count > 0 ? 'attach' : ''}}" data-price="{{$campaign->selling_price }}" data-id="{{$negotiation->publisher->user->id }}" data-account="{{$negotiation->publisher->id }}" data-type="{{$negotiation->part_type }}" data-negotiation="{{$negotiation->id }}">
                        <div class="symbol symbol-45px symbol-circle">
                            <img alt="Pic" src="{{$negotiation->publisher->user->photo }}">
                            <div class="symbol-badge bg-danger start-100 top-100 border-4 h-15px w-15px ms-n2 mt-n2 connection_{{$negotiation->publisher->user->id}}"></div>
                        </div>
                        <span class="d-flex flex-column align-items-start ms-5">
                        <span class="fs-4 fw-bolder name">{{$negotiation->publisher->name }}</span>
                            <span class="fs-8 text-gray-500">@choice('admin/negotiations.publisher',1)</span>
                    </span>
                        <span class="bullet bullet-dot bg-success h-8px w-8px position-absolute translate-middle top-25 start-100 animation-blink {{$negotiation->unread_messages_count == 0? 'd-none' : ''}} bull_{{$negotiation->id}}"></span>
                    </a>
                @endif
            </li>
        @endforeach
    </ul>
    <button class="btn btn-sm btn-icon btn-active-light-primary me-1" type="button" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
        <i class="bi bi-gear fs-3"></i>
    </button>
    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-225px" data-kt-menu="true" style="">
        <div class="menu-item px-5">
            <a href="javascript:" class="menu-link flex-stack px-3 campaign_details">
                @lang('admin/negotiations.campaign_details')
            </a>
        </div>
        <div class="menu-item px-5">
            <a href="javascript:" class="menu-link flex-stack px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_users_search">
                @lang('admin/negotiations.invite_publishers')
            </a>
        </div>
        <div class="menu-item px-5">
            <a href="javascript:" class="menu-link flex-stack px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_prices">
                @lang('admin/negotiations.update_prices')
            </a>
        </div>
    </div>
</div>

