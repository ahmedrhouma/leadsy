@extends('layouts.layout')
@section('pageTitle')
    @lang('admin/negotiations.page_title')
@endsection
@section('pageDescription')
    @lang('admin/negotiations.page_description')
@endsection
@section('css')
    <style>
        .campaign_item.active {
            background: #2c294b08;
        }

        .attach {
            background: aliceblue;
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
                    <div class="scroll-y me-n5 pe-5 " data-kt-scroll="true" data-kt-scroll-max-height="70vh" data-kt-scroll-dependencies="#kt_header, #kt_toolbar, #kt_footer, #kt_chat_contacts_header" data-kt-scroll-wrappers="#kt_content, #kt_chat_contacts_body" data-kt-scroll-offset="0px">
                        @foreach($negotiations as $negotiation)
                            <div class="separator separator-dashed d-none"></div>
                            <a href="javascript:" class="d-flex flex-stack py-4 bg-hover-light rounded px-2 campaign_item @if($negotiation->total_unread > 0) attach @endif" data-id="{{ $negotiation->id }}">
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-45px symbol-circle">
                                        <span class="symbol-label bg-light-danger text-danger fs-6 fw-bolder id">{{ $negotiation->id }}</span>
                                    </div>
                                    <div class="ms-5">
                                        <span class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2 name">{{ $negotiation->name }}</span>
                                        <div class="fw-bold text-muted">{{ $negotiation->advertiser->name }}</div>
                                    </div>
                                </div>
                                <span class="badge badge-sm badge-circle badge-light-primary  messages_count_total me-2">{{ $negotiation->total_unread }}</span>
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
                <div class="card-body pb-0 campaign_header">
                    {{--<div class="row">
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
                                        <div class="fw-bold text-gray-600 fs-7"> </div>
                                        <div class="fw-bolder text-gray-800 fs-6 campaign_max_volume"></div>
                                    </div>
                                    <div class="col-3">
                                        <div class="fw-bold text-gray-600 fs-7">@choice('admin/negotiations.costs_type',1)</div>
                                        <div class="fw-bolder text-gray-800 fs-6 campaign_cost_type"></div>
                                    </div>
                                    <div class="col-3">
                                        <div class="fw-bold text-gray-600 fs-7">@choice('admin/negotiations.buying_price',1)</div>
                                        <div class="fw-bolder text-gray-800 fs-6 campaign_buying_price"></div>
                                    </div>
                                    <div class="col-3">
                                        <div class="fw-bold text-gray-600 fs-7">@choice('admin/negotiations.selling_price',1)</div>
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
                    <div class="separator separator-dashed border-gray my-2"></div>
                    <div class="d-flex justify-content-between align-items-center">
                        <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bolder" id="receivers">
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
                    </div>--}}
                </div>
            </div>
            <div class="overlay card" id="kt_chat_messenger">
                <div class="card-body" id="kt_chat_messenger_body">
                    <div class="scroll-y me-n5 pe-5 h-300px h-lg-auto" data-kt-element="messages" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="35vh" data-kt-scroll-dependencies="#kt_header, #kt_toolbar, #kt_footer, #kt_chat_messenger_header, #kt_chat_messenger_footer" data-kt-scroll-wrappers="#kt_content, #kt_chat_messenger_body" data-kt-scroll-offset="-2px" style="max-height: 39vh">
                    </div>
                </div>
                <div class="card-footer pt-4" id="kt_chat_messenger_footer">
                    <div class="d-flex flex-stack">
                        <textarea class="form-control form-control-flush me-3" rows="1" id="msg_content" placeholder="@lang('admin/negotiations.type_a_message')"></textarea>
                        <button class="btn btn-primary" type="button" id="send_msg">@lang('admin/negotiations.send')</button>
                    </div>
                </div>
                <div class="overlay-layer card-rounded bg-dark bg-opacity-5" style="display: none">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="kt_modal_users_search" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
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
                <div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
                    <div class="text-center mb-13">
                        <h1 class="mb-3">@lang('admin/negotiations.invite_publishers')</h1>
                        <div class="text-muted fw-bold fs-5">@lang('admin/negotiations.invite_publishers_subtitle')</div>
                    </div>
                    <div id="kt_modal_users_search_handler" data-kt-search-keypress="true" data-kt-search-min-length="2" data-kt-search-enter="enter" data-kt-search-layout="inline" data-kt-search="true">
                        <textarea class="form-control form-control-solid mb-8" rows="3" id="invitation_msg" placeholder="Type an invitation message for the publisher"></textarea>
                        <form data-kt-search-element="form" class="w-100 position-relative mb-5" autocomplete="off">
                            <input type="hidden">
                            <span class="svg-icon svg-icon-2 svg-icon-lg-1 svg-icon-gray-500 position-absolute top-50 ms-5 translate-middle-y">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black"></rect>
                                        <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black"></path>
                                    </svg>
                                </span>
                            <input type="text" class="form-control form-control-lg form-control-solid px-15" name="search" value="" placeholder="Search by username or id" data-kt-search-element="input">
                            <span class="position-absolute top-50 end-0 translate-middle-y lh-0 d-none me-5" data-kt-search-element="spinner">
                                <span class="spinner-border h-15px w-15px align-middle text-muted"></span>
                            </span>
                            <span class="btn btn-flush btn-active-color-primary position-absolute top-50 end-0 translate-middle-y lh-0 me-5 d-none" data-kt-search-element="clear">
                            <span class="svg-icon svg-icon-2 svg-icon-lg-1 me-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black"></rect>
                                    <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black"></rect>
                                </svg>
                            </span>
                        </span>
                        </form>
                        <div class="py-5">
                            <div data-kt-search-element="results">
                                <div class="mh-375px scroll-y me-n7 pe-7">
                                    @foreach($publishers as $publisher)
                                        <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="{{ $publisher->id }}">
                                            <label class="d-flex align-items-center">
                                                <span class="form-check form-check-custom form-check-solid me-5">
                                                    <input class="form-check-input" type="checkbox" name="publishers[]" data-kt-check="true" value="{{ $publisher->id }}" data-name="{{ $publisher->name }}">
                                                </span>
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <img alt="Pic" src="{{ $publisher->user->photo }}">
                                                </div>
                                                <div class="ms-5">
                                                    <span class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">{{ $publisher->name }}</span>
                                                </div>
                                            </label>
                                        </div>
                                        <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                                    @endforeach
                                </div>
                                <div class="d-flex flex-center mt-15">
                                    <button type="reset" id="kt_modal_users_search_reset" data-bs-dismiss="modal" class="btn btn-active-light me-3">
                                        @lang('actions.cancel')
                                    </button>
                                    <button type="button" id="kt_modal_users_search_submit" class="btn btn-primary">@lang('admin/negotiations.send_invitations')</button>
                                </div>
                            </div>
                            <div data-kt-search-element="empty" class="text-center d-none">
                                <div class="fw-bold py-10">
                                    <div class="text-gray-600 fs-3 mb-2">@lang('admin/negotiations.no_publisher_found')</div>
                                    <div class="text-muted fs-6">@lang('admin/negotiations.search_publisher')...</div>
                                </div>
                                <div class="text-center px-5">
                                    <img src="{{asset('assets/media/illustrations/sketchy-1/1.png')}}" alt="" class="w-100 h-200px h-sm-325px">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="kt_modal_prices" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
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
                <div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
                    <div class="text-center mb-13">
                        <h1 class="mb-3">@lang('admin/negotiations.update_prices')</h1>
                        <div class="text-muted fw-bold fs-5">@lang('admin/negotiations.update_prices_subtitle')</div>
                    </div>
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="fs-6 fw-bold mb-2">
                            @choice('admin/negotiations.selling_price',1)
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="This price is defined after advertiser negotiation" aria-label="This price is defined after advertiser negotiation"></i>
                        </label>
                        <input type="number" step="0.1" class="form-control form-control-solid" placeholder="" name="selling_price">
                    </div>
                    <div class="fv-row mb-7 buy_price_item">
                        <label class="fs-6 fw-bold mb-2">
                            @choice('admin/negotiations.buying_price',1)
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="This price is defined after publisher negotiation" aria-label="This price is defined after publisher negotiation"></i>
                        </label>
                        <div class="buying_block">

                        </div>
                    </div>

                    <div class="modal-footer flex-center">
                        <button type="reset" id="kt_modal_add_campaign_cancel" data-bs-dismiss="modal" class="btn btn-light me-3">
                            @lang('actions.cancel')
                        </button>
                        <button type="submit" id="kt_modal_update_prices_submit" class="btn btn-primary">
                            <span class="indicator-label">@lang('actions.save')</span>
                            <span class="indicator-progress">Please wait...
								<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                        <!--end::Button-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="campaign_details_modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-body scroll-y campaign_details_body">

                </div>
            </div>
        </div>
    </div>

@endsection
@section('javascript')
    <script src="{{ asset('assets/plugins/custom/moment/moment-timezone-with-data.min.js') }}"></script>
    <script>
        let sender_id = '{{ auth()->user()->id }}';
        let sender_name = '{{ auth()->user()->username }}';
        let sender_avatar = '{{auth()->user()->photo}}';
        var role = {{ auth()->user()->profile }};
        moment.locale('{{ Lang::locale() }}');
    </script>
    <script src="{{ asset('assets/js/custom/chat/conn.js') }}"></script>
    <script src="{{ asset('assets/js/custom/chat/admin/connFunctions.js') }}"></script>
@endsection

