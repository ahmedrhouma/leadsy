@extends('layouts.layout')
@section('pageTitle')
    @lang('advert/negotiations.page_title')
@endsection
@section('pageDescription')
    @lang('advert/negotiations.page_description')
@endsection
@section('css')
    <style>
        .campaign_item.active {
            background: #2c294b08;
        }
    </style>
@endsection
@section('content')
    <div class="d-flex flex-column flex-lg-row">
        <div class="flex-column flex-lg-row-auto w-100 w-lg-300px w-xl-400px mb-10 mb-lg-0">
            <div class="card card-flush">
                <div class="card-header pt-7" id="kt_chat_contacts_header">
                    <form class="w-100 position-relative" autocomplete="off">
                        <span class="svg-icon svg-icon-2 svg-icon-lg-1 svg-icon-gray-500 position-absolute top-50 ms-5 translate-middle-y">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black"></rect>
                                <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black"></path>
                            </svg>
                        </span>
                        <input type="text" class="form-control form-control-solid px-15" name="search" value="" placeholder="Search by campaign ID or campaign Name">
                    </form>
                </div>
                <div class="card-body pt-5" id="kt_chat_contacts_body">
                    <div class="scroll-y me-n5 pe-5 " data-kt-scroll="true" data-kt-scroll-max-height="39vh" data-kt-scroll-dependencies="#kt_header, #kt_toolbar, #kt_footer, #kt_chat_contacts_header" data-kt-scroll-wrappers="#kt_content, #kt_chat_contacts_body" data-kt-scroll-offset="0px" style="max-height: 696px;">
                        @foreach($negotiations as $negotiation)
                            <div class="separator separator-dashed d-none"></div>
                            <a href="#" class="d-flex flex-stack py-4 bg-hover-light rounded px-2 campaign_item" data-id="{{ $negotiation->campaign->id }}" data-negotiation="{{ $negotiation->id }}" @if(!is_null($negotiation->lastMessage)) data-receiver_id="{{ $negotiation->lastMessage->receiver_id == auth()->id()?$negotiation->lastMessage->sender_id:$negotiation->lastMessage->receiver_id}}" @endif >
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-45px symbol-circle">
                                        <span class="symbol-label bg-light-danger text-danger fs-6 fw-bolder id">{{ $negotiation->campaign->id }}</span>
                                    </div>
                                    <div class="ms-5 mw-125px">
                                        <span class="fs-5 fw-bold text-truncate  text-gray-600 text-hover-primary mb-2 name">{{ $negotiation->campaign->name }}</span>
                                        @if($negotiation->lastMessage)
                                            <div class="fs-7 @if(is_null($negotiation->lastMessage->message_read) && $negotiation->lastMessage->receiver_id == auth()->id())fw-bolder@else fw-bold @endif text-truncate  text-gray-900 lastmessage">{{ $negotiation->lastMessage?($negotiation->lastMessage->sender_id == auth()->user()->id ?'You : ':'').$negotiation->lastMessage->message_content:'' }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="d-flex flex-column align-items-end ms-2">
                                    <span class="text-muted fs-7 mb-1">{{ !is_null($negotiation->lastMessage)?$negotiation->lastMessage->message_sent->diffforhumans():'' }}</span>
                                    <span class="badge badge-sm badge-circle badge-light-primary messages_count_{{ $negotiation->id }}">{{ $negotiation->unread_messages_count }}</span>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="flex-lg-row-fluid ms-lg-7 ms-xl-10 card card-flush h-lg-100" id="negotiations_main">
            <div class="card-body p-0">
                <div class="card-px text-center pt-20 mt-10">
                    <h2 class="fs-2x fw-bolder mb-10">@lang('admin/negotiations.negotiations_main_title')</h2>
                    <p class="text-gray-400 fs-4 fw-bold mb-10">@lang('admin/negotiations.negotiations_main_subtitle')</p>
                </div>
                <div class="text-center px-4">
                    <img class="mw-100 mh-300px" alt="" src="{{asset('assets/media/illustrations/sketchy-1/5.png')}}">
                </div>
            </div>
        </div>
        <div class="flex-lg-row-fluid ms-lg-7 ms-xl-10" id="negotiations_content" style="display: none">
            <div class="card mb-5">
                <div class="card-body pb-0">
                    <div class="row">
                        <div class="col-11">
                            <div class="row mb-4">
                                <div class="col-3">
                                    <div class="fw-bold text-gray-600 fs-7">@lang('admin/negotiations.id')</div>
                                    <div class="fw-bolder text-gray-800 fs-6 campaign_id"></div>
                                </div>
                                <div class="col-3">
                                    <div class="fw-bold text-gray-600 fs-7">@lang('admin/negotiations.name')</div>
                                    <div class="fw-bolder text-gray-800 fs-6 campaign_name"></div>
                                </div>
                                <div class="col-3">
                                    <div class="fw-bold text-gray-600 fs-7">@lang('admin/negotiations.creation_date')</div>
                                    <div class="fw-bolder text-gray-800 fs-6 campaign_created_at"></div>
                                </div>
                                <div class="col-3">
                                    <div class="fw-bold text-gray-600 fs-7">@lang('admin/negotiations.starting_date')</div>
                                    <div class="fw-bolder text-gray-800 fs-6 campaign_start_at"></div>
                                </div>
                            </div>
                            <div class="collapse" id="more_info">
                                <div class="row mb-4">
                                    <div class="col-3">
                                        <div class="fw-bold text-gray-600 fs-7">@lang('admin/negotiations.advertiser_name')</div>
                                        <div class="fw-bolder text-gray-800 fs-6 campaign_advertiser_name"></div>
                                    </div>
                                    <div class="col-3">
                                        <div class="fw-bold text-gray-600 fs-7">@choice('admin/negotiations.thematic',1)</div>
                                        <div class="fw-bolder text-gray-800 fs-6 campaign_thematic"></div>
                                    </div>
                                    <div class="col-3">
                                        <div class="fw-bold text-gray-600 fs-7">@choice('admin/negotiations.country_scope',1)</div>
                                        <div class="fw-bolder text-gray-800 fs-6 campaign_countries"></div>
                                    </div>
                                    <div class="col-3">
                                        <div class="fw-bold text-gray-600 fs-7">@choice('admin/negotiations.leads_type',1)</div>
                                        <div class="fw-bolder text-gray-800 fs-6 campaign_leads_type"></div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-3">
                                        <div class="fw-bold text-gray-600 fs-7">@lang('admin/negotiations.expected_leads_volume')</div>
                                        <div class="fw-bolder text-gray-800 fs-6 campaign_max_volume"></div>
                                    </div>
                                    <div class="col-3">
                                        <div class="fw-bold text-gray-600 fs-7">@choice('admin/negotiations.costs_type',1)</div>
                                        <div class="fw-bolder text-gray-800 fs-6 campaign_cost_type"></div>
                                    </div>
                                    <div class="col-3">
                                        <div class="fw-bold text-gray-600 fs-7">@choice('admin/negotiations.buying_price',1)</div>
                                        <div class="fw-bolder text-gray-800 fs-6 campaign_selling_price"></div>
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
                </div>
            </div>
            <div class="card" id="kt_chat_messenger">
                <div class="card-header" id="kt_chat_messenger_header">
                    <!--begin::Title-->
                    <div class="card-title">
                        <!--begin::User-->
                        <div class="d-flex justify-content-center flex-column me-3">
                            <a href="#" class="fs-4 fw-bolder text-gray-900 text-hover-primary me-1 mb-2 lh-1 campaign_name"></a>
                            <!--begin::Info-->
                            <div class="mb-0 lh-1">
                                <span class="badge badge-success badge-circle w-10px h-10px me-1"></span>
                                <span class="fs-7 fw-bold text-muted">Active</span>
                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::User-->
                    </div>
                    <!--end::Title-->
                </div>
                <div class="card-body" id="kt_chat_messenger_body">
                    <div class="scroll-y me-n5 pe-5 h-300px h-lg-auto" data-kt-element="messages" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="50vh" data-kt-scroll-dependencies="#kt_header, #kt_toolbar, #kt_footer, #kt_chat_messenger_header, #kt_chat_messenger_footer" data-kt-scroll-wrappers="#kt_content, #kt_chat_messenger_body" data-kt-scroll-offset="-2px" style="max-height: 39vh">
                    </div>
                </div>
                <!--end::Card body-->
                <!--begin::Card footer-->
                <div class="card-footer pt-4" id="kt_chat_messenger_footer">
                    <div class="d-flex flex-stack">
                        <textarea class="form-control form-control-flush me-3" rows="1" id="msg_content" placeholder="@lang('admin/negotiations.type_a_message')"></textarea>
                        <button class="btn btn-primary" type="button" id="send_msg">@lang('admin/negotiations.send')</button>
                    </div>
                    <!--end::Toolbar-->
                </div>
                <!--end::Card footer-->
            </div>
            <!--end::Messenger-->
        </div>
        <!--end::Content-->
    </div>
@endsection
@section('javascript')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.34/moment-timezone-with-data.min.js"></script>
    <script>
        var sender_id = '{{ auth()->user()->id }}';
        var sender_name = '{{ auth()->user()->username }}';
        var sender_avatar = '{{auth()->user()->photo}}';
        var role = {{ auth()->user()->profile }};
        moment.locale('{{ Lang::locale() }}');
    </script>
    <script src="{{ asset('assets/js/custom/chat/conn.js') }}"></script>
    <script src="{{ asset('assets/js/custom/chat/pub_adv/connFunctions.js') }}"></script>
@endsection


