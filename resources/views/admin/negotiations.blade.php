@extends('layouts.layout')
@section('pageTitle')
    Leads Negotiation
@endsection
@section('pageDescription')
    Negotiation room
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
                            <a href="#" class="d-flex flex-stack py-4 bg-hover-light rounded px-2 campaign_item" data-id="{{ $negotiation->id }}">
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-45px symbol-circle">
                                        <span class="symbol-label bg-light-danger text-danger fs-6 fw-bolder id">{{ $negotiation->id }}</span>
                                    </div>
                                    <div class="ms-5">
                                        <span class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2 name">{{ $negotiation->name }}</span>
                                        <div class="fw-bold text-muted">{{ $negotiation->advertiser->name }}</div>
                                    </div>
                                </div>
                                <span class="badge badge-sm badge-circle badge-light-success messages_count_total me-2">{{ $negotiation->total_unread }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="flex-lg-row-fluid ms-lg-7 ms-xl-10 card card-flush h-lg-100" id="negotiations_main">
            <div class="card-body p-0">
                <div class="card-px text-center pt-20 mt-10">
                    <h2 class="fs-2x fw-bolder mb-10">Welcome to the Negotiations Room</h2>
                    <p class="text-gray-400 fs-4 fw-bold mb-10">Select a campaign from the list on left.
                        <br>Negotiate your campaign leads price with all privacy and secure method.</p>
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
                        <div class="col-md-11">
                            <div class="row mb-4">
                                <div class="col-md-3">
                                    <div class="fw-bold text-gray-600 fs-7">ID</div>
                                    <div class="fw-bolder text-gray-800 fs-6 campaign_id"></div>
                                </div>
                                <div class="col-md-3">
                                    <div class="fw-bold text-gray-600 fs-7">Name</div>
                                    <div class="fw-bolder text-gray-800 fs-6 campaign_name"></div>
                                </div>
                                <div class="col-md-3">
                                    <div class="fw-bold text-gray-600 fs-7">creation date</div>
                                    <div class="fw-bolder text-gray-800 fs-6 campaign_created_at"></div>
                                </div>
                                <div class="col-md-3">
                                    <div class="fw-bold text-gray-600 fs-7">Starting date</div>
                                    <div class="fw-bolder text-gray-800 fs-6 campaign_start_at"></div>
                                </div>
                            </div>
                            <div class="collapse" id="more_info">
                                <div class="row mb-4">
                                    <div class="col-md-3">
                                        <div class="fw-bold text-gray-600 fs-7">Advertiser name</div>
                                        <div class="fw-bolder text-gray-800 fs-6 campaign_advertiser_name"></div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="fw-bold text-gray-600 fs-7">Thematic</div>
                                        <div class="fw-bolder text-gray-800 fs-6 campaign_thematic"></div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="fw-bold text-gray-600 fs-7">Country scope</div>
                                        <div class="fw-bolder text-gray-800 fs-6 campaign_countries"></div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="fw-bold text-gray-600 fs-7">Leads type</div>
                                        <div class="fw-bolder text-gray-800 fs-6 campaign_leads_type"></div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-3">
                                        <div class="fw-bold text-gray-600 fs-7">Expected leads volume</div>
                                        <div class="fw-bolder text-gray-800 fs-6 campaign_max_volume"></div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="fw-bold text-gray-600 fs-7">Cost type</div>
                                        <div class="fw-bolder text-gray-800 fs-6 campaign_cost_type"></div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="fw-bold text-gray-600 fs-7">Last buying price</div>
                                        <div class="fw-bolder text-gray-800 fs-6 campaign_buying_price"></div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="fw-bold text-gray-600 fs-7">Last selling price</div>
                                        <div class="fw-bolder text-gray-800 fs-6 campaign_selling_price"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1">
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
                                <a href="#" class="menu-link flex-stack px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_users_search">Invite
                                    Publishers
                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Specify a publisher to send an invitation" aria-label="Specify a publisher to send an invitation"></i></a>
                            </div>
                            <div class="menu-item px-5">
                                <a href="#" class="menu-link flex-stack px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_prices">
                                    Update prices
                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Specify negotiation prices" aria-label="Specify negotiation prices"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="overlay card" id="kt_chat_messenger">
                <div class="card-body" id="kt_chat_messenger_body">
                    <div class="scroll-y me-n5 pe-5 h-300px h-lg-auto" data-kt-element="messages" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="35vh" data-kt-scroll-dependencies="#kt_header, #kt_toolbar, #kt_footer, #kt_chat_messenger_header, #kt_chat_messenger_footer" data-kt-scroll-wrappers="#kt_content, #kt_chat_messenger_body" data-kt-scroll-offset="-2px" style="max-height: 39vh">
                    </div>
                    <div class="text-end seen d-none">
                        <span class="text-success fs-7 fw-bold">Seen</span>
                        <span class="svg-icon-success svg-icon svg-icon-1" data-kt-element="message-text"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path opacity="0.5" d="M12.8956 13.4982L10.7949 11.2651C10.2697 10.7068 9.38251 10.7068 8.85731 11.2651C8.37559 11.7772 8.37559 12.5757 8.85731 13.0878L12.7499 17.2257C13.1448 17.6455 13.8118 17.6455 14.2066 17.2257L21.1427 9.85252C21.6244 9.34044 21.6244 8.54191 21.1427 8.02984C20.6175 7.47154 19.7303 7.47154 19.2051 8.02984L14.061 13.4982C13.7451 13.834 13.2115 13.834 12.8956 13.4982Z" fill="black"></path>
                            <path d="M7.89557 13.4982L5.79487 11.2651C5.26967 10.7068 4.38251 10.7068 3.85731 11.2651C3.37559 11.7772 3.37559 12.5757 3.85731 13.0878L7.74989 17.2257C8.14476 17.6455 8.81176 17.6455 9.20663 17.2257L16.1427 9.85252C16.6244 9.34044 16.6244 8.54191 16.1427 8.02984C15.6175 7.47154 14.7303 7.47154 14.2051 8.02984L9.06096 13.4982C8.74506 13.834 8.21146 13.834 7.89557 13.4982Z" fill="black"></path>
                            </svg>
                        </span>
                    </div>
                    <div class="text-end notSeen d-none">
                        <span class="text-muted fs-7 fw-bold">Not Seen</span>
                        <span class="svg-icon-muted svg-icon svg-icon-1" data-kt-element="message-text"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path opacity="0.5" d="M12.8956 13.4982L10.7949 11.2651C10.2697 10.7068 9.38251 10.7068 8.85731 11.2651C8.37559 11.7772 8.37559 12.5757 8.85731 13.0878L12.7499 17.2257C13.1448 17.6455 13.8118 17.6455 14.2066 17.2257L21.1427 9.85252C21.6244 9.34044 21.6244 8.54191 21.1427 8.02984C20.6175 7.47154 19.7303 7.47154 19.2051 8.02984L14.061 13.4982C13.7451 13.834 13.2115 13.834 12.8956 13.4982Z" fill="black"></path>
                            <path d="M7.89557 13.4982L5.79487 11.2651C5.26967 10.7068 4.38251 10.7068 3.85731 11.2651C3.37559 11.7772 3.37559 12.5757 3.85731 13.0878L7.74989 17.2257C8.14476 17.6455 8.81176 17.6455 9.20663 17.2257L16.1427 9.85252C16.6244 9.34044 16.6244 8.54191 16.1427 8.02984C15.6175 7.47154 14.7303 7.47154 14.2051 8.02984L9.06096 13.4982C8.74506 13.834 8.21146 13.834 7.89557 13.4982Z" fill="black"></path>
                            </svg>
                        </span>
                    </div>
                </div>
                <div class="card-footer pt-4" id="kt_chat_messenger_footer">
                    <div class="d-flex flex-stack">
                        <textarea class="form-control form-control-flush me-3" rows="1" id="msg_content" placeholder="Type a message"></textarea>
                        <button class="btn btn-primary" type="button" id="send_msg">Send</button>
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
                        <h1 class="mb-3">Invite Publishers</h1>
                        <div class="text-muted fw-bold fs-5">Search and invite Publisher To this negotiation</div>
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
                                            <div class="d-flex align-items-center">
                                                <label class="form-check form-check-custom form-check-solid me-5">
                                                    <input class="form-check-input" type="checkbox" name="publishers[]" data-kt-check="true" value="{{ $publisher->id }}" data-name="{{ $publisher->name }}">
                                                </label>
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <img alt="Pic" src="{{ $publisher->user->photo }}">
                                                </div>
                                                <div class="ms-5">
                                                    <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">{{ $publisher->name }}</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                                    @endforeach
                                </div>
                                <div class="d-flex flex-center mt-15">
                                    <button type="reset" id="kt_modal_users_search_reset" data-bs-dismiss="modal" class="btn btn-active-light me-3">
                                        Cancel
                                    </button>
                                    <button type="button" id="kt_modal_users_search_submit" class="btn btn-primary">Add
                                        Selected Users
                                    </button>
                                </div>
                            </div>
                            <div data-kt-search-element="empty" class="text-center d-none">
                                <div class="fw-bold py-10">
                                    <div class="text-gray-600 fs-3 mb-2">No users found</div>
                                    <div class="text-muted fs-6">Try to search by username, full name or email...</div>
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
                        <h1 class="mb-3">Edit Prices</h1>
                        <div class="text-muted fw-bold fs-5">Update campaign prices after negotiations</div>
                    </div>
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="fs-6 fw-bold mb-2">
                            Selling price
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="This price is defined after advertiser negotiation" aria-label="This price is defined after advertiser negotiation"></i>
                        </label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="number" step="0.1" class="form-control form-control-solid" placeholder="" name="selling_price">
                        <!--end::Input-->
                    </div>
                    <div class="fv-row mb-7 buy_price_item">
                        <!--begin::Label-->
                        <label class="fs-6 fw-bold mb-2">
                            Buying price
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="This price is defined after publisher negotiation" aria-label="This price is defined after publisher negotiation"></i>
                        </label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <div class="buying_block">

                        </div>
                    </div>

                    <div class="modal-footer flex-center">
                        <button type="reset" id="kt_modal_add_campaign_cancel" data-bs-dismiss="modal" class="btn btn-light me-3">
                            Cancel
                        </button>
                        <button type="submit" id="kt_modal_update_prices_submit" class="btn btn-primary">
                            <span class="indicator-label">Save</span>
                            <span class="indicator-progress">Please wait...
								<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                        <!--end::Button-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.34/moment-timezone-with-data.min.js"></script>
    <script>
        var sender_id = '{{ auth()->user()->id }}';
        var sender_name = '{{ auth()->user()->username }}';
        var sender_avatar = '{{auth()->user()->photo}}';
        var receiver_id;
        var negotiation_id;
        var campaign;
        var conn = new WebSocket('ws://localhost:8090');
        conn.onopen = function (e) {
            conn.send(JSON.stringify({
                action: "attach",
                user_id: '{{ auth()->user()->id }}',
                role: 1,
            }));
        };
        conn.onmessage = function (e) {
            let msg = JSON.parse(e.data);
            switch (msg.action) {
                case 'assigned':
                    if ($('.campaign_item[data-id="' + msg.campaign.id + '"]').length !== 0) {
                        $('.campaign_item[data-id="' + msg.campaign.id + '"]').css('background', 'aliceblue').addClass('attach').data('negotiation', msg.negotiation_id);
                    } else {
                        $('#kt_chat_contacts_body').children().append(`<a href="#" class="d-flex flex-stack py-4 bg-hover-light rounded px-2 campaign_item attach" data-id="${msg.campaign.id}">
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-45px symbol-circle">
                                        <span class="symbol-label bg-light-danger text-danger fs-6 fw-bolder id">${msg.campaign.id}</span>
                                    </div>
                                    <div class="ms-5">
                                        <span class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2 name">${msg.campaign.name}</span>
                                        <div class="fw-bold text-muted">advertiser</div>
                                    </div>
                                </div>
                                <div class="d-flex flex-column align-items-end ms-2">
                                    <span class="text-muted fs-7 mb-1">NOW</span>
                                    <span class="badge badge-sm badge-circle badge-light-success">1</span>
                                </div>
                            </a>`);
                    }
                    break;
                case 'message':
                    if (msg.negotiation_id == negotiation_id) {
                        if (msg.sender_id == sender_id) {
                            $('#kt_chat_messenger_body div[data-kt-element="messages"]').append(`<div class="d-flex justify-content-end mb-10">
                                <div class="d-flex flex-column align-items-end">
                                <div class="d-flex align-items-center mb-2">
                                <div class="me-3">
                                <span class="text-muted fs-7 mb-1">${moment.utc(msg.message_sent).tz(Intl.DateTimeFormat().resolvedOptions().timeZone).calendar(null, {
                                lastWeek: 'dddd , h:mm A',
                                lastDay: '[Yesterday] , h:mm A',
                                sameDay: '[Today] , h:mm A',
                                nextDay: '[Tomorrow] , h:mm A',
                                nextWeek: 'dddd , h:mm A',
                                sameElse: function () {
                                    return "[" + fromNow + "]";
                                }
                            })}</span>
                                <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary ms-1">{{ auth()->user()->username }}</a>
                                </div>
                                <div class="symbol symbol-35px symbol-circle">
                                <img alt="Pic" src="{{ auth()->user()->photo }}">
                                </div>
                                </div>
                                <div class="p-5 rounded bg-light-primary text-dark fw-bold mw-lg-400px text-end" >
                                ${msg.content}
                                </div>
                                </div>
                                </div>`);
                            $('.seen').addClass('d-none');
                            $('.notSeen').removeClass('d-none');
                        } else if (msg.sender_id == receiver_id) {
                            $('#kt_chat_messenger_body div[data-kt-element="messages"]').append(`<div class="d-flex justify-content-start mb-10">
                                    <div class="d-flex flex-column align-items-start">
                                    <div class="d-flex align-items-center mb-2">
                                    <div class="symbol symbol-35px symbol-circle">
                                    <img alt="Pic" src="${msg.sender_avatar}">
                                    </div>
                                    <div class="ms-3">
                                    <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary me-1">${msg.sender_name}</a>
                                    <span class="text-muted fs-7 mb-1">${moment.utc(msg.message_sent).tz(Intl.DateTimeFormat().resolvedOptions().timeZone).calendar(null, {
                                lastWeek: 'dddd , h:mm A',
                                lastDay: '[Yesterday] , h:mm A',
                                sameDay: '[Today] , h:mm A',
                                nextDay: '[Tomorrow] , h:mm A',
                                nextWeek: 'dddd , h:mm A',
                                sameElse: function () {
                                    return "[" + fromNow + "]";
                                }
                            })}</span>
                            </div>
                            </div>
                            <div class="p-5 rounded bg-light-info text-dark fw-bold mw-lg-400px text-start" data-kt-element="message-text">
                            ${msg.content}
                            </div>
                            </div>
                            </div>`);
                        }
                        $('#kt_chat_messenger_body [data-bs-toggle="tooltip"]').tooltip();
                        $('#kt_chat_messenger_body div[data-kt-element="messages"]').scrollTop(1E10);
                    }
                    if (msg.sender_id != sender_id) {
                        $('.messages_count_' + msg.negotiation_id).text(parseInt($('.messages_count_' + msg.negotiation_id).text()) + 1);
                    }
                    break;
                case 'attachNegotiation':
                    if (msg.sender_id != sender_id) {
                        $('.campaign_item[data-negotiation="' + msg.negotiation_id + '"]').remove();
                    }
                    break;
                case 'writing':
                    if (msg.negotiation_id == negotiation_id) {
                        if (msg.status == 1) {
                            if ($('.writing').length == 0) {
                                let element = $(`<div class="d-flex justify-content-start mb-10 writing">
                                    <div class="d-flex flex-column align-items-start">
                                    <div class="p-5 rounded bg-light-info text-dark fw-bold mw-lg-400px text-start" data-kt-element="message-text">
                                    writing ...
                                    </div>
                                    </div>
                                    </div>`);
                                element.hide();
                                $('#kt_chat_messenger_body div[data-kt-element="messages"]').append(element)
                                element.show('slow');
                            }
                        } else {
                            $('.writing').hide('slow').remove();
                        }
                        $('#kt_chat_messenger_body div[data-kt-element="messages"]').scrollTop(1E10);
                    }
                    break;
                case 'seen':
                    if (msg.negotiation_id == negotiation_id) {
                        $('.seen').removeClass('d-none');
                        $('.notSeen').addClass('d-none');
                    }
                    break;
            }
        };
        $('#kt_modal_prices').on('shown.bs.modal', function () {
            $('.buying_block').empty();
            $('#receivers .chat-item[data-type="2"]').each(function () {
                $('.buying_block').append(`<div class="row py-4">
                                <div class="col d-flex align-items-center">
                                    <div class="ms-4">
                                        <a href="javascript:" class="fs-6 fw-bolder text-gray-900 text-hover-primary mb-2">${$(this).find('.name').text()}</a>
                                    </div>
                                </div>
                                <input type="number" step="0.1" class="col form-control form-control-solid" placeholder="" name="buying_price" data-id="${$(this).data('id')}">
                            </div>`);
            });
        });
        $('#kt_modal_users_search_handler input[name="search"]').keyup(function () {
            $('#kt_modal_users_search_handler .spinner-border').parent().removeClass("d-none");
            $this = $(this);
            setTimeout((function () {
                $('#kt_modal_users_search_handler .spinner-border').parent().addClass("d-none");
                $('input[name="publishers[]"]').each(function () {
                    if ($(this).data("name").toLowerCase().indexOf($this.val()) >= 0 || $(this).val().toLowerCase().indexOf($this.val()) >= 0) {
                        $(this).parents('.rounded').show();
                        $(this).parents('.rounded').addClass('d-flex');
                        $(this).closest('.border-bottom-dashed').show();
                    } else {
                        $(this).parents('.rounded').hide();
                        $(this).parents('.rounded').removeClass('d-flex');
                        $(this).closest('.border-bottom-dashed').hide();
                    }
                });
            }), 1500);
        });
        $('#kt_modal_users_search_submit').click(function (e) {
            e.preventDefault();
            $.ajax({
                url: '{{ route('admin.negotiations.invite') }}',
                method: 'POST',
                dataType: 'JSON',
                data: {
                    _token: '{{ @csrf_token() }}',
                    publishers: $('input[name="publishers[]"]:checked').map((O, V) => $(V).val()).toArray(),
                    campaign_id: campaign,
                },
                success: function (data) {
                    if (data.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Invitations successfully sent!',
                            timeout: 1500,
                        });
                        $('#kt_modal_users_search').modal('hide');
                        if ($('#invitation_msg').val().replace(/\s/g, '').length !== 0) {
                            $.each(data.data, function () {
                                sendMessage({
                                    action: "message",
                                    receiver_id: this.publisher_id,
                                    sender_id: sender_id,
                                    negotiation_id: this.negotiation_id,
                                    role: 1,
                                    content: $('#invitation_msg').val(),
                                });
                            });
                        }
                        $('.campaign_item.active').click();
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Something wrong ! please try again',
                        })
                    }
                }
            });
        });
        $('#kt_modal_update_prices_submit').click(function (e) {
            e.preventDefault();
            $.ajax({
                url: '{{ route('admin.negotiations.updatePrices') }}',
                method: 'POST',
                dataType: 'JSON',
                data: {
                    _token: '{{ @csrf_token() }}',
                    selling_price: $('input[name="selling_price"]').val(),
                    buying_price: $('input[name="buying_price"]').map((O,V)=> ({'id' : $(V).data('id') , 'value' : $(V).val()})).toArray(),
                    campaign_id: campaign,
                },
                success: function (data) {
                    if (data.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Prices successfully changed',
                            timeout: 1500,
                        });
                        $('.campaign_buying_price').text($('input[name="buying_price"]').val());
                        $('.campaign_selling_price').text($('input[name="selling_price"]').val());
                        $('input[name="buying_price"]').val('');
                        $('input[name="selling_price"]').val('');
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Something wrong ! please try again',
                        })
                    }
                }
            });
        });
        $('#msg_content').on("focusout", function (e) {
            sendMessage({
                action: "writing",
                status: 0,
                sender_id: sender_id,
                receiver_id: receiver_id,
                negotiation_id: negotiation_id,
                sender_name: sender_name,
                sender_avatar: sender_avatar,
            });
        });
        $('#msg_content').on("focusin", function (e) {
            sendMessage({
                action: "seen",
                sender_id: sender_id,
                receiver_id: receiver_id,
                negotiation_id: negotiation_id,
                role: 1,
            });
            sendMessage({
                action: "writing",
                status: 1,
                sender_id: sender_id,
                receiver_id: receiver_id,
                negotiation_id: negotiation_id
            });
        });
        $('#msg_content').keypress(function (e) {
            if (e.keyCode == 13) {
                $("#send_msg").trigger("click");
                $("#msg_content").focusout();
                $("#msg_content").focusin();
                return false;
            }
        });
        $('.campaign_item').click(function () {
            $('.campaign_item.active').removeClass('active');
            $(this).addClass('active');
            let campElement = $(this);
            $.ajax({
                url: '{{ route('admin.campaigns.show') }}',
                method: 'POST',
                dataType: 'JSON',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: $(this).data('id')
                },
                success: function (data) {
                    if (data.success) {
                        campaign = data.campaign.id;
                        $('.campaign_id').text(data.campaign.id);
                        $('.campaign_name').text(data.campaign.name);
                        $('.campaign_created_at').text(data.campaign.created_at);
                        $('.campaign_start_at').text(data.campaign.start_date);
                        $('.campaign_advertiser_name').text(data.campaign.advertiser.name);
                        $('.campaign_thematic').text(data.campaign.thematics.name);
                        $('.campaign_countries').text(data.campaign.countriesName.join(' , '));
                        $('.campaign_leads_type').text(data.campaign.leads_types.name);
                        $('.campaign_max_volume').text(data.campaign.leads_vmax);
                        $('.campaign_cost_type').text(data.campaign.costs_types.name);
                        $('.campaign_buying_price').text(data.campaign.last_campaign_publisher ? data.campaign.last_campaign_publisher.buying_price : '');
                        $('.campaign_selling_price').text(data.campaign.selling_price);
                        $('#receivers').empty();
                        $('#send_msg').attr('disabled', true);
                        $.each(data.campaign.negotiations, function () {
                            if (this.part_type === 1) {
                                $('#receivers').append(`<li class="nav-item">
                                    <a href="#" class="nav-link text-active-primary py-5 pe-6 chat-item" data-price="${data.campaign.selling_price}" data-id="${this.advertiser.user.id}" data-type="${this.part_type}" data-negotiation="${this.id}">
                                        <span class="badge badge-sm badge-circle badge-light-success messages_count_${this.id} me-2">${this.unread_messages_count}</span>
                                        <span class="d-flex flex-column align-items-start">
                                            <span class="fs-4 fw-bolder">${this.advertiser.name}</span>
                                            <span class="fs-8 text-gray-500">Advertiser</span>
                                        </span>
                                    </a>
                                </li>`);
                            } else if (this.part_type === 2) {
                                $('#receivers').append(`<li class="nav-item">
                                    <a href="#" class="nav-link text-active-primary py-5 pe-6 chat-item" data-id="${this.publisher.user.id}" data-negotiation="${this.id}" data-type="${this.part_type}">
                                        <span class="badge badge-sm badge-circle badge-light-success messages_count_${this.id} me-2">${this.unread_messages_count}</span>
                                        <span class="d-flex flex-column align-items-start">
                                            <span class="fs-4 fw-bolder name">${this.publisher.name}</span>
                                            <span class="fs-8 text-gray-500">Publisher</span>
                                        </span>
                                    </a>
                                </li>`);
                            }
                        });
                        $('#negotiations_main').hide();
                        $('#negotiations_content').show();
                        if (campElement.hasClass('attach')) {
                            $('.chat-item[data-negotiation="' + campElement.data('negotiation') + '"]').click();
                            campElement.removeClass('attach');
                        }
                    }
                }
            });
        });
        $('#kt_chat_contacts_header input[name="search"]').keyup(function () {
            $this = $(this);
            $(".campaign_item").each(function () {
                if ($(this).find(".name").text().toLowerCase().indexOf($this.val()) >= 0 || $(this).find(".id").text().toLowerCase().indexOf($this.val()) >= 0) {
                    $(this).show();
                    $(this).addClass('d-flex');
                } else {
                    $(this).hide();
                    $(this).removeClass('d-flex');
                }
            });
        });
        $(document).on('click', '.chat-item', function () {
            $('.chat-item.active').removeClass('active');
            $(this).addClass('active');
            negotiation_id = $(this).data('negotiation');
            receiver_id = $(this).data('id');
            switchConversation($(this).data('negotiation'));
            if ($('.campaign_item.active').hasClass('attach')) {
                conn.send(JSON.stringify({
                    action: "attachNegotiation",
                    sender_id: sender_id,
                    receiver_id: receiver_id,
                    negotiation_id: negotiation_id,
                }));
            }
        });
        $('#send_msg').click(function () {
            if ($('#msg_content').val().replace(/\s/g, '').length !== 0 && receiver_id != null) {
                sendMessage({
                    action: "message",
                    sender_id: sender_id,
                    role: 1,
                    receiver_id: receiver_id,
                    negotiation_id: negotiation_id,
                    content: $('#msg_content').val(),
                    sender_name: sender_name,
                    sender_avatar: sender_avatar,
                });
                $('#msg_content').val('');
            }
        });
        var switchConversation = function (negociation) {
            let total = parseInt($('.campaign_item.active .messages_count_total').text()) - parseInt($('.messages_count_' + negociation).text());
            $('.campaign_item.active .messages_count_total').text(total > 0 ? total : 0);
            $('.messages_count_' + negociation).text(0);
            $('.overlay-layer').show();
            $('.overlay').addClass('overlay-block');
            sendMessage({
                action: "seen",
                sender_id: sender_id,
                receiver_id: receiver_id,
                negotiation_id: negotiation_id,
                role: 1,
            });
            $.ajax({
                url: '{{ route('admin.negotiations.messages') }}',
                method: 'POST',
                dataType: 'JSON',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: negociation,
                },
                success: function (data) {
                    $('#kt_chat_messenger_body div[data-kt-element="messages"]').empty();
                    if (data.data.length != 0) {
                        $.each(data.data, function () {
                            if (this.sender_id == receiver_id) {
                                $('#kt_chat_messenger_body div[data-kt-element="messages"]').prepend(`<div class="d-flex justify-content-start mb-10">
                                    <div class="d-flex flex-column align-items-start">
                                    <div class="d-flex align-items-center mb-2">
                                    <div class="symbol symbol-35px symbol-circle">
                                    <img alt="Pic" src="${this.sender.photo}">
                                    </div>
                                    <div class="ms-3">
                                    <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary me-1">${this.sender.username}</a>
                                    <span class="text-muted fs-7 mb-1">${moment.utc(this.message_sent).tz(Intl.DateTimeFormat().resolvedOptions().timeZone).calendar(null, {
                                    lastWeek: 'dddd, h:mm A',
                                    lastDay: '[Yesterday], h:mm A',
                                    sameDay: '[Today], h:mm A',
                                    nextDay: '[Tomorrow], h:mm A',
                                    nextWeek: 'dddd, h:i A',
                                    sameElse: function () {
                                        return "[" + fromNow + "]";
                                    }
                                })}</span>
                                    </div>
                                    </div>
                                    <div class="p-5 rounded bg-light-info text-dark fw-bold mw-lg-400px text-start" data-kt-element="message-text">
                                    ${this.message_content}
                                    </div>
                                    </div>
                                    </div>`);
                            } else {
                                $('#kt_chat_messenger_body div[data-kt-element="messages"]').prepend(`<div class="d-flex justify-content-end mb-10">
                                <div class="d-flex flex-column align-items-end">
                                <div class="d-flex align-items-center mb-2">
                                <div class="me-3">
                                <span class="text-muted fs-7 mb-1">${moment.utc(this.message_sent).tz(Intl.DateTimeFormat().resolvedOptions().timeZone).calendar(null, {
                                    lastWeek: 'dddd, h:mm A',
                                    lastDay: '[Yesterday], h:mm A',
                                    sameDay: '[Today], h:mm A',
                                    nextDay: '[Tomorrow], h:mm A',
                                    nextWeek: 'dddd, h:mm A',
                                    sameElse: function () {
                                        return "[" + fromNow + "]";
                                    }
                                })}</span>
                                <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary ms-1">${this.sender.username}</a>
                                </div>
                                <div class="symbol symbol-35px symbol-circle">
                                <img alt="Pic" src="${this.sender.photo}">
                                </div>
                                </div>
                                <div class="p-5 rounded bg-light-primary text-dark fw-bold mw-lg-400px text-end" data-kt-element="message-text">
                                ${this.message_content}
                                </div>
                                </div>
                                </div>`);
                            }
                            if (data.data[data.data.length - 1].message_read) {
                                $('.seen').removeClass('d-none');
                                $('.notSeen').addClass('d-none');
                            }
                            $('#kt_chat_messenger_body div[data-kt-element="messages"]').scrollTop(1E10);
                        });
                        $('#kt_chat_messenger_body [data-bs-toggle="tooltip"]').tooltip();
                    } else {
                        $('#kt_chat_messenger_body div[data-kt-element="messages"]').append('<div class="text-center startNegotiation"><h2 class="fs-2x fw-bolder mb-10">No negotiation started yet</h2><img width="200" height="200" src="{{ asset('assets/media/illustrations/sigma-1/16.png') }}"></div>');
                    }
                    $('#send_msg').attr('disabled', false);
                    $('.overlay-layer').hide();
                    $('.overlay').removeClass('overlay-block');
                }
            });
        };
        var sendMessage = function (msg) {
            if ($('.startNegotiation').length !== 0) $('.startNegotiation').remove();
            if (conn.readyState === WebSocket.OPEN) {
                conn.send(JSON.stringify(msg));
            }
        }
    </script>
@endsection

