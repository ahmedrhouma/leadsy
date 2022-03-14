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
        <!--begin::Sidebar-->
        <div class="flex-column flex-lg-row-auto w-100 w-lg-300px w-xl-400px mb-10 mb-lg-0">
            <!--begin::Contacts-->
            <div class="card card-flush">
                <!--begin::Card header-->
                <div class="card-header pt-7" id="kt_chat_contacts_header">
                    <!--begin::Form-->
                    <form class="w-100 position-relative" autocomplete="off">
                        <!--begin::Icon-->
                        <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                        <span class="svg-icon svg-icon-2 svg-icon-lg-1 svg-icon-gray-500 position-absolute top-50 ms-5 translate-middle-y">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black"></rect>
                                <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black"></path>
                            </svg>
                        </span>
                        <input type="text" class="form-control form-control-solid px-15" name="search" value="" placeholder="Search by campaign ID or campaign Name">
                        <!--end::Input-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-5" id="kt_chat_contacts_body">
                    <!--begin::List-->
                    <div class="scroll-y me-n5 pe-5 " data-kt-scroll="true" data-kt-scroll-max-height="39vh" data-kt-scroll-dependencies="#kt_header, #kt_toolbar, #kt_footer, #kt_chat_contacts_header" data-kt-scroll-wrappers="#kt_content, #kt_chat_contacts_body" data-kt-scroll-offset="0px" style="max-height: 696px;">
                        @foreach($negotiations as $negotiation)
                            <div class="separator separator-dashed d-none"></div>
                            <a href="#" class="d-flex flex-stack py-4 bg-hover-light rounded px-2 campaign_item" data-id="{{ $negotiation->campaign->id }}" data-negotiation="{{ $negotiation->id }}">
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-45px symbol-circle">
                                        <span class="symbol-label bg-light-danger text-danger fs-6 fw-bolder id">{{ $negotiation->campaign->id }}</span>
                                    </div>
                                    <div class="ms-5">
                                        <span class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2 name">{{ $negotiation->campaign->name }}</span>
                                        <div class="fw-bold text-muted"></div>
                                    </div>
                                </div>
                                <div class="d-flex flex-column align-items-end ms-2">
                                    <span class="text-muted fs-7 mb-1">5 hrs</span>
                                    <span class="badge badge-sm badge-circle badge-light-success">2</span>
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
            <div class="card" id="kt_chat_messenger">
                <div class="card-header" id="kt_chat_messenger_header">
                    <!--begin::Title-->
                    <div class="card-title">
                        <!--begin::User-->
                        <div class="d-flex justify-content-center flex-column me-3">
                            <a href="#" class="fs-4 fw-bolder text-gray-900 text-hover-primary me-1 mb-2 lh-1">Campaign
                                FR</a>
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
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Menu-->
                        <div class="me-n3">
                            <button class="btn btn-sm btn-icon btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                <i class="bi bi-three-dots fs-2"></i>
                            </button>
                            <!--begin::Menu 3-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3" data-kt-menu="true">
                                <!--begin::Heading-->
                                <div class="menu-item px-3">
                                    <div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">Contacts</div>
                                </div>
                                <!--end::Heading-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_users_search">Add
                                        Contact</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link flex-stack px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_invite_friends">Invite
                                        Contacts
                                        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Specify a contact email to send an invitation" aria-label="Specify a contact email to send an invitation"></i></a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-start">
                                    <a href="#" class="menu-link px-3">
                                        <span class="menu-title">Groups</span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <!--begin::Menu sub-->
                                    <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3" data-bs-toggle="tooltip" title="" data-bs-original-title="Coming soon">Create
                                                Group</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3" data-bs-toggle="tooltip" title="" data-bs-original-title="Coming soon">Invite
                                                Members</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3" data-bs-toggle="tooltip" title="" data-bs-original-title="Coming soon">Settings</a>
                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu sub-->
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3 my-1">
                                    <a href="#" class="menu-link px-3" data-bs-toggle="tooltip" title="" data-bs-original-title="Coming soon">Settings</a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu 3-->
                        </div>
                        <!--end::Menu-->
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <div class="card-body" id="kt_chat_messenger_body">
                    <!--begin::Messages-->
                    <div class="scroll-y me-n5 pe-5 h-300px h-lg-auto" data-kt-element="messages" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="50vh" data-kt-scroll-dependencies="#kt_header, #kt_toolbar, #kt_footer, #kt_chat_messenger_header, #kt_chat_messenger_footer" data-kt-scroll-wrappers="#kt_content, #kt_chat_messenger_body" data-kt-scroll-offset="-2px" style="max-height: 39vh">
                        <div class="d-flex justify-content-end mb-10 d-none" data-kt-element="template-out">
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-column align-items-end">
                                <!--begin::User-->
                                <div class="d-flex align-items-center mb-2">
                                    <!--begin::Details-->
                                    <div class="me-3">
                                        <span class="text-muted fs-7 mb-1">Just now</span>
                                        <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary ms-1">You</a>
                                    </div>
                                    <!--end::Details-->
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-35px symbol-circle">
                                        <img alt="Pic" src="http://localhost/v2/assets/media/avatars/150-26.jpg">
                                    </div>
                                    <!--end::Avatar-->
                                </div>
                                <!--end::User-->
                                <!--begin::Text-->
                                <div class="p-5 rounded bg-light-primary text-dark fw-bold mw-lg-400px text-end" data-kt-element="message-text"></div>
                                <!--end::Text-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <div class="d-flex justify-content-start mb-10 d-none" data-kt-element="template-in">
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-column align-items-start">
                                <!--begin::User-->
                                <div class="d-flex align-items-center mb-2">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-35px symbol-circle">
                                        <img alt="Pic" src="http://localhost/v2/assets/media/avatars/150-15.jpg">
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Details-->
                                    <div class="ms-3">
                                        <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary me-1">Brian
                                            Cox</a>
                                        <span class="text-muted fs-7 mb-1">Just now</span>
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::User-->
                                <!--begin::Text-->
                                <div class="p-5 rounded bg-light-info text-dark fw-bold mw-lg-400px text-start" data-kt-element="message-text">
                                    Right before vacation season we have the next Big Deal for you.
                                </div>
                                <!--end::Text-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                    </div>
                    <!--end::Messages-->
                </div>
                <!--end::Card body-->
                <!--begin::Card footer-->
                <div class="card-footer pt-4" id="kt_chat_messenger_footer">
                    <div class="d-flex flex-stack">
                        <textarea class="form-control form-control-flush me-3" rows="1" id="msg_content" placeholder="Type a message"></textarea>
                        <button class="btn btn-primary" type="button" id="send_msg">Send</button>
                    </div>
                    <!--end::Toolbar-->
                </div>
                <!--end::Card footer-->
            </div>
            <!--end::Messenger-->
        </div>
    </div>
@endsection
@section('javascript')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.34/moment-timezone-with-data.min.js"></script>
    <script>
        var sender_id = '{{ auth()->user()->id }}';
        var receiver_id = null;
        var negotiation_id;
        var campaign;
        var conn = new WebSocket('ws://localhost:8090');
        conn.onopen = function (e) {
            conn.send(JSON.stringify({
                action: "attach",
                user_id: sender_id,
                role: 3,
            }));
        };
        conn.onmessage = function (e) {
            let msg = JSON.parse(e.data);
            switch (msg.action) {
                case 'attachNegotiation':
                    if (negotiation_id == msg.negotiation_id) {
                        receiver_id = msg.sender_id;
                    }
                    $('.campaign_item[data-negotiation="' + msg.negotiation_id + '"]').data('receiver_id', msg.sender_id);
                    break;
                case 'message':
                    if ($('.campaign_item[data-negotiation="' + msg.negotiation_id + '"]').data('receiver_id') != msg.sender_id) {
                        $('.campaign_item[data-negotiation="' + msg.negotiation_id + '"]').data('receiver_id', msg.sender_id);
                    }
                    if (msg.negotiation_id == negotiation_id) {
                        if (msg.sender_id == sender_id) {
                            $('#kt_chat_messenger_body').children().append(`<div class="d-flex justify-content-end mb-10">
                                <div class="d-flex flex-column align-items-end">
                                <div class="d-flex align-items-center mb-2">
                                <div class="me-3">
                                <span class="text-muted fs-7 mb-1">${moment.utc(msg.message_sent).tz(Intl.DateTimeFormat().resolvedOptions().timeZone).format('YYYY-MM-DD HH:mm:ss')}</span>
                                <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary ms-1">You</a>
                                </div>
                                <div class="symbol symbol-35px symbol-circle">
                                <img alt="Pic" src="{{auth()->user()->photo}}">
                                </div>
                                </div>
                                <div class="p-5 rounded bg-light-primary text-dark fw-bold mw-lg-400px text-end" data-kt-element="message-text">
                                ${msg.content}
                                </div>
                                </div>
                                </div>`);
                        } else {
                            $('#kt_chat_messenger_body').children().append(`<div class="d-flex justify-content-start mb-10">
                                    <div class="d-flex flex-column align-items-start">
                                    <div class="d-flex align-items-center mb-2">
                                    <div class="symbol symbol-35px symbol-circle">
                                    <img alt="Pic" src="${msg.sender_avatar}">
                                    </div>
                                    <div class="ms-3">
                                    <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary me-1">${msg.sender_name}</a>
                                    <span class="text-muted fs-7 mb-1">${moment.utc(msg.message_sent).tz(Intl.DateTimeFormat().resolvedOptions().timeZone).format('YYYY-MM-DD HH:mm:ss')}</span>
                                    </div>
                                    </div>
                                    <div class="p-5 rounded bg-light-info text-dark fw-bold mw-lg-400px text-start" data-kt-element="message-text">
                                    ${msg.content}
                                    </div>
                                    </div>
                                    </div>`);
                        }
                        $('#kt_chat_messenger_body').children().scrollTop(1E10);
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
                                $('#kt_chat_messenger_body').children().append(element)
                                element.show('slow');
                            }
                        } else {
                            $('.writing').hide('slow').remove();
                        }
                        $('#kt_chat_messenger_body').children().scrollTop(1E10);
                    }
                    break;
            }
        };
        $('.campaign_item').click(function () {
            $('.campaign_item.active').removeClass('active');
            $(this).addClass('active');
            negotiation_id = $(this).data('negotiation');
            receiver_id = $(this).data('receiver_id');
            switchConversation(negotiation_id);
        });
        $('input[name="search"]').keyup(function () {
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
        /*        $(document).on('click', '.chat-item', function () {
                    $('.chat-item.active').removeClass('active');
                    $(this).addClass('active');
                    negotiation_id = $(this).data('negotiation');
                    receiver_id = $(this).data('receiver_id');
                    switchConversation($(this).data('type'), $(this).data('id'), $(this).data('negotiation'));
                });*/
        $('#send_msg').click(function () {
            if ($('#msg_content').val().replace(/\s/g, '').length !== 0) {
                sendMessage({
                    action: "message",
                    sender_id: sender_id,
                    receiver_id: receiver_id,
                    negotiation_id: negotiation_id,
                    role: 3,
                    content: $('#msg_content').val(),
                });
                $('#msg_content').val('');
            }
        });
        $('#msg_content').keypress(function (e) {
            if (e.keyCode == 13) {
                $("#send_msg").trigger("click");
                $("#msg_content").trigger("focusout");
                setTimeout(()=>$("#msg_content").trigger("focusin"),20);
                return false;
            }
        });
        $('#msg_content').on("focusout", function (e) {
            if (receiver_id != null) {
                sendMessage({
                    action: "writing",
                    status: 0,
                    sender_id: sender_id,
                    receiver_id: receiver_id,
                    negotiation_id: negotiation_id
                });
            }
        });
        $('#msg_content').on("focusin", function (e) {
            if (receiver_id != null) {
                sendMessage({
                    action: "writing",
                    status: 1,
                    sender_id: sender_id,
                    receiver_id: receiver_id,
                    negotiation_id: negotiation_id
                });
            }
        });
        var switchConversation = function (negotiation) {
            $('#kt_chat_messenger_body').children().empty();
            $.ajax({
                url: '{{ route('publisher.negotiations.messages') }}',
                method: 'POST',
                dataType: 'JSON',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: negotiation,
                },
                success: function (data) {
                    $('#kt_chat_messenger_body').children().empty();
                    if (data.data.length != 0) {
                        $.each(data.data, function () {
                            if (this.sender_id == receiver_id) {
                                $('#kt_chat_messenger_body').children().prepend(`<div class="d-flex justify-content-start mb-10">
                                    <div class="d-flex flex-column align-items-start">
                                    <div class="d-flex align-items-center mb-2">
                                    <div class="symbol symbol-35px symbol-circle">
                                    <img alt="Pic" src="http://localhost/v2/assets/media/avatars/150-15.jpg">
                                    </div>
                                    <div class="ms-3">
                                    <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary me-1">${this.sender}</a>
                                    <span class="text-muted fs-7 mb-1">${moment.utc(this.message_sent).tz(Intl.DateTimeFormat().resolvedOptions().timeZone).format('YYYY-MM-DD HH:mm:ss')}</span>
                                    </div>
                                    </div>
                                    <div class="p-5 rounded bg-light-info text-dark fw-bold mw-lg-400px text-start" data-kt-element="message-text">
                                    ${this.message_content}
                                    </div>
                                    </div>
                                    </div>`);
                            } else if (this.sender_id == sender_id) {
                                $('#kt_chat_messenger_body').children().prepend(`<div class="d-flex justify-content-end mb-10">
                                <div class="d-flex flex-column align-items-end">
                                <div class="d-flex align-items-center mb-2">
                                <div class="me-3">
                                <span class="text-muted fs-7 mb-1">${moment.utc(this.message_sent).tz(Intl.DateTimeFormat().resolvedOptions().timeZone).format('YYYY-MM-DD HH:mm:ss')}</span>
                                <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary ms-1">You</a>
                                </div>
                                <div class="symbol symbol-35px symbol-circle">
                                <img alt="Pic" src="http://localhost/v2/assets/media/avatars/150-26.jpg">
                                </div>
                                </div>
                                <div class="p-5 rounded bg-light-primary text-dark fw-bold mw-lg-400px text-end" data-kt-element="message-text">
                                ${this.message_content}
                                </div>
                                </div>
                                </div>`);
                            }
                        });
                    } else {
                        $('#kt_chat_messenger_body').children().append('<div class="text-center startNegotiation"><h2 class="fs-2x fw-bolder mb-10">No negotiation started yet</h2><img width="200" height="200" src="{{ asset('assets/media/illustrations/sigma-1/16.png') }}"></div>');
                    }
                    $('#negotiations_main').hide();
                    $('#negotiations_content').show();
                    $('#kt_chat_messenger_body').children().scrollTop(1E10);
                }
            });
        };
        var sendMessage = function (msg) {
            if ($('.startNegotiation').length != 0)$('.startNegotiation').remove();
            if (conn.readyState === WebSocket.OPEN) {
                conn.send(JSON.stringify(msg));
            }
        }
    </script>
@endsection


