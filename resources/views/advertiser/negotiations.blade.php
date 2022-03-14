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
                                    <div class="ms-5 mw-125px">
                                        <span class="fs-5 fw-bold text-truncate  text-gray-600 text-hover-primary mb-2 name">{{ $negotiation->campaign->name }}</span>
                                        @if($negotiation->lastMessage)
                                            <div class="fs-7 @if(is_null($negotiation->lastMessage->message_read) && $negotiation->lastMessage->receiver_id == auth()->id())fw-bolder@else fw-bold @endif text-truncate  text-gray-900 lastmessage">{{ $negotiation->lastMessage?($negotiation->lastMessage->sender_id == auth()->user()->id ?'You : ':'').$negotiation->lastMessage->message_content:'' }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="d-flex flex-column align-items-end ms-2">
                                    <span class="text-muted fs-7 mb-1">{{ !is_null($negotiation->lastMessage)?$negotiation->lastMessage->message_sent->format('D , h:m'):'' }}</span>
                                    <span class="badge badge-sm badge-circle badge-light-success messages_count_{{ $negotiation->id }}">{{ $negotiation->unread_messages_count }}</span>
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

                    </div>
                    <div class="text-end seen d-none">
                        <span class="text-success fs-7 fw-bold">Seen</span>
                        <span class="svg-icon-success svg-icon svg-icon-1" data-kt-element="message-text" data-bs-toggle="tooltip" data-bs-original-title="Not seen" data-bs-placement="left" data-bs-custom-class="tooltip-dark"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path opacity="0.5" d="M12.8956 13.4982L10.7949 11.2651C10.2697 10.7068 9.38251 10.7068 8.85731 11.2651C8.37559 11.7772 8.37559 12.5757 8.85731 13.0878L12.7499 17.2257C13.1448 17.6455 13.8118 17.6455 14.2066 17.2257L21.1427 9.85252C21.6244 9.34044 21.6244 8.54191 21.1427 8.02984C20.6175 7.47154 19.7303 7.47154 19.2051 8.02984L14.061 13.4982C13.7451 13.834 13.2115 13.834 12.8956 13.4982Z" fill="black"></path>
                            <path d="M7.89557 13.4982L5.79487 11.2651C5.26967 10.7068 4.38251 10.7068 3.85731 11.2651C3.37559 11.7772 3.37559 12.5757 3.85731 13.0878L7.74989 17.2257C8.14476 17.6455 8.81176 17.6455 9.20663 17.2257L16.1427 9.85252C16.6244 9.34044 16.6244 8.54191 16.1427 8.02984C15.6175 7.47154 14.7303 7.47154 14.2051 8.02984L9.06096 13.4982C8.74506 13.834 8.21146 13.834 7.89557 13.4982Z" fill="black"></path>
                            </svg>
                        </span>
                    </div>
                    <div class="text-end notSeen d-none">
                        <span class="text-muted fs-7 fw-bold">Not Seen</span>
                        <span class="svg-icon-muted svg-icon svg-icon-1" data-kt-element="message-text" data-bs-toggle="tooltip" data-bs-original-title="Not seen" data-bs-placement="left" data-bs-custom-class="tooltip-dark"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path opacity="0.5" d="M12.8956 13.4982L10.7949 11.2651C10.2697 10.7068 9.38251 10.7068 8.85731 11.2651C8.37559 11.7772 8.37559 12.5757 8.85731 13.0878L12.7499 17.2257C13.1448 17.6455 13.8118 17.6455 14.2066 17.2257L21.1427 9.85252C21.6244 9.34044 21.6244 8.54191 21.1427 8.02984C20.6175 7.47154 19.7303 7.47154 19.2051 8.02984L14.061 13.4982C13.7451 13.834 13.2115 13.834 12.8956 13.4982Z" fill="black"></path>
                            <path d="M7.89557 13.4982L5.79487 11.2651C5.26967 10.7068 4.38251 10.7068 3.85731 11.2651C3.37559 11.7772 3.37559 12.5757 3.85731 13.0878L7.74989 17.2257C8.14476 17.6455 8.81176 17.6455 9.20663 17.2257L16.1427 9.85252C16.6244 9.34044 16.6244 8.54191 16.1427 8.02984C15.6175 7.47154 14.7303 7.47154 14.2051 8.02984L9.06096 13.4982C8.74506 13.834 8.21146 13.834 7.89557 13.4982Z" fill="black"></path>
                            </svg>
                        </span>
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
        <!--end::Content-->
    </div>
@endsection
@section('javascript')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.34/moment-timezone-with-data.min.js"></script>
    <script>
        var sender_id = '{{ auth()->user()->id }}';
        var sender_name = '{{ auth()->user()->username }}';
        var sender_avatar = '{{auth()->user()->photo}}';
        var receiver_id = null;
        var negotiation_id;
        var campaign;
        var conn = new WebSocket('ws://localhost:8090');
        conn.onopen = function (e) {
            conn.send(JSON.stringify({
                action: "attach",
                user_id: sender_id,
                role: 2,
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
                    var negotiations = [];
                    debugger;
                    if (localStorage.getItem("negotiations")) {
                        negotiations.concat(JSON.parse(localStorage.getItem("negotiations")));
                    }
                    negotiations[msg.negotiation_id] = msg.sender_id;
                    localStorage.setItem("negotiations", JSON.stringify(negotiations));
                    break;
                case 'message':
                    if ($('.campaign_item[data-negotiation="' + msg.negotiation_id + '"]').data('receiver_id') != msg.sender_id) {
                        $('.campaign_item[data-negotiation="' + msg.negotiation_id + '"]').data('receiver_id', msg.sender_id);
                    }
                    if (msg.sender_id == sender_id) {
                        $('.campaign_item[data-negotiation="' + msg.negotiation_id + '"] .name,.campaign_item[data-negotiation="' + msg.negotiation_id + '"] .lastmessage').addClass('fw-bold text-gray-600');
                        $('.campaign_item[data-negotiation="' + msg.negotiation_id + '"] .name,.campaign_item[data-negotiation="' + msg.negotiation_id + '"] .lastmessage').removeClass('active fw-bolder text-gray-900');
                    } else {
                        $('.messages_count_' + msg.negotiation_id).text(parseInt($('.messages_count_' + msg.negotiation_id).text()) + 1);
                        $('.campaign_item[data-negotiation="' + msg.negotiation_id + '"] .name,.campaign_item[data-negotiation="' + msg.negotiation_id + '"] .lastmessage').removeClass('fw-bold text-gray-600');
                        $('.campaign_item[data-negotiation="' + msg.negotiation_id + '"] .name,.campaign_item[data-negotiation="' + msg.negotiation_id + '"] .lastmessage').addClass('active fw-bolder text-gray-900');
                    }
                    $('.campaign_item[data-negotiation="' + msg.negotiation_id + '"] .lastmessage').text(msg.content);
                    if (msg.negotiation_id == negotiation_id) {
                        if (msg.sender_id == sender_id) {
                            $('#kt_chat_messenger_body div[data-kt-element="messages"]').append(`<div class="d-flex justify-content-end mb-10">
                                <div class="d-flex flex-column align-items-end">
                                <div class="d-flex align-items-center mb-2">
                                <div class="me-3">
                                <span class="text-muted fs-7 mb-1">${moment.utc(msg.message_sent).tz(Intl.DateTimeFormat().resolvedOptions().timeZone).calendar()}</span>
                                <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary ms-1">{{ auth()->user()->username }}</a>
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
                            $('.seen').addClass('d-none');
                            $('.notSeen').removeClass('d-none');
                        } else {
                            $('#kt_chat_messenger_body div[data-kt-element="messages"]').append(`<div class="d-flex justify-content-start mb-10">
                                    <div class="d-flex flex-column align-items-start">
                                    <div class="d-flex align-items-center mb-2">
                                    <div class="symbol symbol-35px symbol-circle">
                                    <img alt="Pic" src="${msg.sender_avatar}">
                                    </div>
                                    <div class="ms-3">
                                    <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary me-1">${msg.sender_name}</a>
                                    <span class="text-muted fs-7 mb-1">${moment.utc(msg.message_sent).tz(Intl.DateTimeFormat().resolvedOptions().timeZone).calendar()}</span>
                                    </div>
                                    </div>
                                    <div class="p-5 rounded bg-light-info text-dark fw-bold mw-lg-400px text-start" data-kt-element="message-text">
                                    ${msg.content}
                                    </div>
                                    </div>
                                    </div>`);
                        }
                        $('#kt_chat_messenger_body div[data-kt-element="messages"]').scrollTop(1E10);
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
                        $('.seen').removeClass('d-none');$('.notSeen').addClass('d-none');
                    }
                    break;
            }
        };
        $('.campaign_item').click(function () {
            $('.campaign_item.active').removeClass('active');
            $('.name,.lastmessage', $(this)).removeClass(' fw-bolder text-gray-900').addClass('fw-bold text-gray-600');
            $('.messages_count_' + $(this).data('negotiation')).text('0');
            $(this).addClass('active');
            $('.campaign_name').text($('.name', $(this)).text());
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
        $('#send_msg').click(function () {
            if ($('#msg_content').val().replace(/\s/g, '').length !== 0) {
                sendMessage({
                    action: "message",
                    sender_id: sender_id,
                    receiver_id: receiver_id,
                    negotiation_id: negotiation_id,
                    role: 2,
                    content: $('#msg_content').val(),
                    sender_name: sender_name,
                    sender_avatar: sender_avatar,
                });
                $('#msg_content').val('');
            }
        });
        $('#msg_content').keypress(function (e) {
            if (e.keyCode == 13) {
                $("#send_msg").trigger("click");
                $("#msg_content").trigger("focusout");
                setTimeout(() => $("#msg_content").trigger("focusin"), 20);
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
            $('.campaign_item[data-negotiation="' + negotiation_id + '"] .name,.campaign_item[data-negotiation="' + negotiation_id + '"] .lastmessage').removeClass(' fw-bolder text-gray-900').addClass('fw-bold text-gray-600');
            $('.messages_count_' + negotiation_id).text('0');
            if (receiver_id != null) {
                sendMessage({
                    action: "seen",
                    sender_id: sender_id,
                    receiver_id: receiver_id,
                    negotiation_id: negotiation_id,
                    role: 2,
                });
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
            $('#kt_chat_messenger_body div[data-kt-element="messages"]').empty();
            if (receiver_id != null) {
                sendMessage({
                    action: "seen",
                    sender_id: sender_id,
                    receiver_id: receiver_id,
                    negotiation_id: negotiation_id,
                    role: 2,
                });
            }
            $.ajax({
                url: '{{ route('advertiser.negotiations.messages') }}',
                method: 'POST',
                dataType: 'JSON',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: negotiation,
                },
                success: function (data) {
                    $('#kt_chat_messenger_body div[data-kt-element="messages"]').empty();
                    if (data.data.length != 0) {
                        $.each(data.data, function () {
                            if (this.sender_id == sender_id) {
                                $('#kt_chat_messenger_body div[data-kt-element="messages"]').prepend(`<div class="d-flex justify-content-end mb-10">
                                <div class="d-flex flex-column align-items-end">
                                <div class="d-flex align-items-center mb-2">
                                <div class="me-3">
                                <span class="text-muted fs-7 mb-1">${moment.utc(this.message_sent).tz(Intl.DateTimeFormat().resolvedOptions().timeZone).calendar()}</span>
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
                            } else {
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
                            }
                        });
                        if (data.data[data.data.length -1].message_read){
                            $('.seen').removeClass('d-none');$('.notSeen').addClass('d-none');
                        }
                    } else {
                        $('#kt_chat_messenger_body div[data-kt-element="messages"]').append('<div class="text-center startNegotiation"><h2 class="fs-2x fw-bolder mb-10">No negotiation started yet</h2><img width="200" height="200" src="{{ asset('assets/media/illustrations/sigma-1/16.png') }}"></div>');
                    }
                    $('#negotiations_main').hide();
                    $('#negotiations_content').show();
                    $('#kt_chat_messenger_body div[data-kt-element="messages"]').scrollTop(1E10);
                }
            });
        };
        var sendMessage = function (msg) {
            if ($('.startNegotiation').length != 0) $('.startNegotiation').remove();
            if (conn.readyState === WebSocket.OPEN) {
                conn.send(JSON.stringify(msg));
            }
        }
        $(document).ready(function () {
            var negotiations = JSON.parse(localStorage.getItem("negotiations"));
            $.each(negotiations,function (index,value) {
                debugger;
                $('.campaign_item[data-negotiation="'+index+'"]').data('receiver_id',value);
            })
        })
    </script>
@endsection


