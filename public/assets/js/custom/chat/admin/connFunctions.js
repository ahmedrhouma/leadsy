var receiver_id = null;
var negotiation_id;
var campaign;
let last_message;
let seen_icon = '<div class="symbol-badge border-0 start-100 top-100 ms-n2 mt-n2">\n' +
    '<span class="svg-icon-success svg-icon svg-icon-1" data-kt-element="message-text">    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">        <path opacity="0.5" d="M12.8956 13.4982L10.7949 11.2651C10.2697 10.7068 9.38251 10.7068 8.85731 11.2651C8.37559 11.7772 8.37559 12.5757 8.85731 13.0878L12.7499 17.2257C13.1448 17.6455 13.8118 17.6455 14.2066 17.2257L21.1427 9.85252C21.6244 9.34044 21.6244 8.54191 21.1427 8.02984C20.6175 7.47154 19.7303 7.47154 19.2051 8.02984L14.061 13.4982C13.7451 13.834 13.2115 13.834 12.8956 13.4982Z" fill="black"></path>        <path d="M7.89557 13.4982L5.79487 11.2651C5.26967 10.7068 4.38251 10.7068 3.85731 11.2651C3.37559 11.7772 3.37559 12.5757 3.85731 13.0878L7.74989 17.2257C8.14476 17.6455 8.81176 17.6455 9.20663 17.2257L16.1427 9.85252C16.6244 9.34044 16.6244 8.54191 16.1427 8.02984C15.6175 7.47154 14.7303 7.47154 14.2051 8.02984L9.06096 13.4982C8.74506 13.834 8.21146 13.834 7.89557 13.4982Z" fill="black"></path></svg></span>\n' +
    '</div>';
let notseen_icon = '<div class="symbol-badge border-0 start-100 top-100 ms-n2 mt-n2">\n' +
    '<span class="svg-icon-muted svg-icon svg-icon-1" data-kt-element="message-text">    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">        <path opacity="0.5" d="M12.8956 13.4982L10.7949 11.2651C10.2697 10.7068 9.38251 10.7068 8.85731 11.2651C8.37559 11.7772 8.37559 12.5757 8.85731 13.0878L12.7499 17.2257C13.1448 17.6455 13.8118 17.6455 14.2066 17.2257L21.1427 9.85252C21.6244 9.34044 21.6244 8.54191 21.1427 8.02984C20.6175 7.47154 19.7303 7.47154 19.2051 8.02984L14.061 13.4982C13.7451 13.834 13.2115 13.834 12.8956 13.4982Z" fill="black"></path>        <path d="M7.89557 13.4982L5.79487 11.2651C5.26967 10.7068 4.38251 10.7068 3.85731 11.2651C3.37559 11.7772 3.37559 12.5757 3.85731 13.0878L7.74989 17.2257C8.14476 17.6455 8.81176 17.6455 9.20663 17.2257L16.1427 9.85252C16.6244 9.34044 16.6244 8.54191 16.1427 8.02984C15.6175 7.47154 14.7303 7.47154 14.2051 8.02984L9.06096 13.4982C8.74506 13.834 8.21146 13.834 7.89557 13.4982Z" fill="black"></path></svg></span>\n' +
    '</div>';
conn.onmessage = function (e) {
    let msg = JSON.parse(e.data);
    switch (msg.action) {
        case 'assigned':
            if ($('.campaign_item[data-id="' + msg.campaign.id + '"]').length !== 0) {
                $('.campaign_item[data-id="' + msg.campaign.id + '"]').addClass('attach').data('negotiation', msg.negotiation_id);
                $('.campaign_item[data-id="' + msg.campaign.id + '"] .messages_count_total').text(parseInt($('.campaign_item[data-id="' + msg.campaign.id + '"] .messages_count_total').text()) + 1);
            } else {
                $('#kt_chat_contacts_body').children().append(`<a href="javascript:" class="d-flex flex-stack py-4 bg-hover-light rounded px-2 campaign_item attach" data-id="${msg.campaign.id}">
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
                                    <span class="badge badge-sm badge-circle badge-light-success">1</span>
                                </div>
                            </a>`);
            }
            break;
        case 'message':
            if (msg.negotiation_id == negotiation_id) {
                if (msg.sender_id == sender_id) {
                    if (last_message.hasClass('justify-content-end') && moment.utc(this.message_sent).diff(moment(last_message.find('.time').text(),'HH:mm'), 'minutes') === 0) {
                        $(`<div class="symbol p-5 rounded bg-light-primary text-dark fw-bold mw-lg-400px text-end mt-2" data-kt-element="message-text">${msg.content + notseen_icon}</div>`).insertAfter(last_message.find('div[data-kt-element="message-text"]').last());

                    } else {
                        last_message = $(`<div class="d-flex justify-content-end mb-10 message">
                                <div class="symbol d-flex flex-column align-items-end">
                                <div class="d-flex align-items-center mb-2">
                                <div class="me-3 text-end">
                                <a href="javascript:" class="fs-5 fw-bolder text-gray-900 text-hover-primary ms-1 d-block">${sender_name}</a>
                                <span class="text-muted fs-8 mb-1 time">${moment.utc(msg.message_sent).tz(Intl.DateTimeFormat().resolvedOptions().timeZone).calendar(null, {sameDay: 'H:mm'})}
                               </span>
                                </div>
                                <div class="symbol symbol-35px symbol-circle">
                                <img alt="Pic" src="${sender_avatar}">
                                </div>
                                </div>
                                <div class="symbol p-5 rounded bg-light-primary text-dark fw-bold mw-lg-400px text-end" data-kt-element="message-text">
                                    ${msg.content}
                                    <div class="symbol-badge border-0 start-100 top-100 ms-n2 mt-n2">
                                        <span class="svg-icon-muted svg-icon svg-icon-1" data-kt-element="message-text">    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">        <path opacity="0.5" d="M12.8956 13.4982L10.7949 11.2651C10.2697 10.7068 9.38251 10.7068 8.85731 11.2651C8.37559 11.7772 8.37559 12.5757 8.85731 13.0878L12.7499 17.2257C13.1448 17.6455 13.8118 17.6455 14.2066 17.2257L21.1427 9.85252C21.6244 9.34044 21.6244 8.54191 21.1427 8.02984C20.6175 7.47154 19.7303 7.47154 19.2051 8.02984L14.061 13.4982C13.7451 13.834 13.2115 13.834 12.8956 13.4982Z" fill="black"></path>        <path d="M7.89557 13.4982L5.79487 11.2651C5.26967 10.7068 4.38251 10.7068 3.85731 11.2651C3.37559 11.7772 3.37559 12.5757 3.85731 13.0878L7.74989 17.2257C8.14476 17.6455 8.81176 17.6455 9.20663 17.2257L16.1427 9.85252C16.6244 9.34044 16.6244 8.54191 16.1427 8.02984C15.6175 7.47154 14.7303 7.47154 14.2051 8.02984L9.06096 13.4982C8.74506 13.834 8.21146 13.834 7.89557 13.4982Z" fill="black"></path></svg></span>
                                    </div>
                                </div>

                                </div>
                                </div>`);
                        $('#kt_chat_messenger_body div[data-kt-element="messages"]').append(last_message);
                    }
                } else if (msg.sender_id == receiver_id) {
                    if (last_message.hasClass('justify-content-start') && moment.utc(this.message_sent).diff(moment(last_message.find('.time').text(),'HH:mm'), 'minutes') === 0) {
                        $(`<div class="p-5 rounded bg-light-info text-dark fw-bold mw-lg-400px text-start mt-2" data-kt-element="message-text">${msg.content}</div>`).insertAfter(last_message.find('div[data-kt-element="message-text"]').last());
                    } else {
                        last_message = $(`<div class="d-flex justify-content-start mb-10">
                                    <div class="d-flex flex-column align-items-start">
                                    <div class="d-flex align-items-center mb-2">
                                    <div class="symbol symbol-35px symbol-circle">
                                    <img alt="Pic" src="${msg.sender_avatar}">
                                    </div>
                                    <div class="ms-3">
                                    <a href="javascript:" class="fs-5 fw-bolder text-gray-900 text-hover-primary me-1 d-block">${msg.sender_name}</a>
                                    <span class="text-muted fs-8 mb-1 time">${moment.utc(msg.message_sent).tz(Intl.DateTimeFormat().resolvedOptions().timeZone).calendar(null, {sameDay: 'H:mm'})}
                                    </span>
                                    </div>
                                    </div>
                                    <div class="p-5 rounded bg-light-info text-dark fw-bold mw-lg-400px text-start" data-kt-element="message-text">
                                    ${msg.content}
                                    </div>
                                    </div>
                                    </div>`);
                        $('#kt_chat_messenger_body div[data-kt-element="messages"]').append(last_message);
                    }
                }
                $('#kt_chat_messenger_body [data-bs-toggle="tooltip"]').tooltip();
                $('#kt_chat_messenger_body div[data-kt-element="messages"]').scrollTop(1E10);
            }
            $('.campaign_item[data-id="' + msg.campaign_id + '"] .messages_count_total').text(parseInt($('.campaign_item[data-id="' + msg.campaign_id + '"] .messages_count_total').text()) + 1);
            if (msg.sender_id != sender_id) {
                $('.bull_' + msg.sender_id).removeClass('d-none');
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
                        let element = $(`<div class="d-flex justify-content-start mb-3 writing">
                                    <div class="d-flex flex-column align-items-start">
                                    <div class="p-5 rounded bg-light-info text-dark fw-bold mw-lg-400px text-start fs-8" data-kt-element="message-text">
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
                $('.message').find('.symbol-badge').remove();
                $('.message').last().find('div[data-kt-element="message-text"]').last().append('<div class="symbol-badge border-0 start-100 top-100 ms-n2 mt-n2"><span class="svg-icon-success svg-icon svg-icon-1" data-kt-element="message-text">    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">        <path opacity="0.5" d="M12.8956 13.4982L10.7949 11.2651C10.2697 10.7068 9.38251 10.7068 8.85731 11.2651C8.37559 11.7772 8.37559 12.5757 8.85731 13.0878L12.7499 17.2257C13.1448 17.6455 13.8118 17.6455 14.2066 17.2257L21.1427 9.85252C21.6244 9.34044 21.6244 8.54191 21.1427 8.02984C20.6175 7.47154 19.7303 7.47154 19.2051 8.02984L14.061 13.4982C13.7451 13.834 13.2115 13.834 12.8956 13.4982Z" fill="black"></path>        <path d="M7.89557 13.4982L5.79487 11.2651C5.26967 10.7068 4.38251 10.7068 3.85731 11.2651C3.37559 11.7772 3.37559 12.5757 3.85731 13.0878L7.74989 17.2257C8.14476 17.6455 8.81176 17.6455 9.20663 17.2257L16.1427 9.85252C16.6244 9.34044 16.6244 8.54191 16.1427 8.02984C15.6175 7.47154 14.7303 7.47154 14.2051 8.02984L9.06096 13.4982C8.74506 13.834 8.21146 13.834 7.89557 13.4982Z" fill="black"></path></svg></span></div>');
            }
            break;
        case 'connected':
            $.each(msg.users, function () {
                $('.connection_' + this).removeClass('bg-danger').addClass('bg-success');
            });
            break;
        case 'openConnection':
            $('.connection_' + msg.id).removeClass('bg-danger').addClass('bg-success');
            break;
        case 'closedConnection':
            $('.connection_' + msg.id).removeClass('bg-success').addClass('bg-danger');
            break;
    }
};
$(document).on('click','.campaign_details',function () {
    $.ajax({
        url: route('admin.campaigns.view'),
        method: 'POST',
        data: {
            id: campaign
        },
        success: function (data) {
            $('.campaign_details_body').html(data);
            $('#campaign_details_modal').modal('show');
        }
    });
});
$('#kt_modal_prices').on('show.bs.modal', function () {
    $('.buying_block').empty();
    $('#receivers .chat-item[data-type="2"]').each(function () {
        $('.buying_block').append(`<label class="row py-4">
                                <div class="col d-flex align-items-center">
                                    <div class="ms-4">
                                        <span class="fs-6 fw-bolder text-gray-900 text-hover-primary mb-2">${$(this).find('.name').text()}</span>
                                    </div>
                                </div>
                                <input type="number" step="0.1" class="col form-control form-control-solid" placeholder="" name="buying_price" data-id="${$(this).data('account')}">
                            </label>`);
    });
    $('input[name="selling_price"]').val($('.campaign_selling_price').text());
});
$('#kt_modal_users_search').on('show.bs.modal', function () {
    $('div[data-kt-search-element="results"] .rounded').removeClass('d-none');
    $('#receivers .chat-item[data-type="2"]').each(function () {
        $('div[data-kt-search-element="results"] .rounded[data-user-id="' + $(this).data('account') + '"]').addClass('d-none').closest('.border-bottom').addClass('d-none');
    });
    $('input[name="selling_price"]').val($('.campaign_selling_price').text());
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
        url: route('admin.negotiations.invite'),
        method: 'POST',
        dataType: 'JSON',
        data: {
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
                            role: role,
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
    let buying = $('input[name="buying_price"]').map((O, V) => ({
        'id': $(V).data('id'),
        'value': $(V).val()
    })).toArray();
    $.ajax({
        url: route('admin.negotiations.updatePrices'),
        method: 'POST',
        dataType: 'JSON',
        data: {
            selling_price: $('input[name="selling_price"]').val(),
            buying_price: buying,
            campaign_id: campaign,
        },
        success: function (data) {
            if (data.success) {
                Swal.fire({
                    icon: 'success',
                    title: 'Prices successfully changed',
                    timer: 1500,
                });
                let total = 0;
                $.each(buying, function () {
                    total += parseInt(this.value)
                });
                $('.campaign_buying_price').text(total / buying.length);
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
$(document).on('click', '.campaign_item:not(.active)', function () {
    $('#kt_chat_messenger').hide();
    $('.campaign_item.active').removeClass('active');
    $(this).addClass('active').removeClass('attach');
    $('#kt_chat_messenger_body div[data-kt-element="messages"]').empty();
    let id = $(this).data('id');
    $.ajax({
        url: route('admin.campaigns.negotiationsHeader'),
        method: 'POST',
        dataType: 'HTML',
        data: {
            id: id
        },
        success: function (data) {
            $('.campaign_header').html(data);
            campaign = id;
            /*if (data.success) {
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
                $('.campaign_buying_price').text(data.campaign.avg_buying_price);
                $('.campaign_selling_price').text(data.campaign.selling_price);

                $.each(data.campaign.negotiations, function () {
                    if (this.part_type === 1) {
                        $('#receivers').append(`<li class="nav-item">
                                    <a href="javascript:" class="nav-link text-active-primary py-5 pe-6 chat-item position-relative ${this.unread_messages_count > 0 ? 'attach' : ''}" data-price="${data.campaign.selling_price}" data-id="${this.advertiser.user.id}" data-account="${this.advertiser.id}" data-type="${this.part_type}" data-negotiation="${this.id}">
                                        <div class="symbol symbol-45px symbol-circle">
                                        <img alt="Pic" src="${this.advertiser.user.photo}">
                                        <div class="symbol-badge bg-danger start-100 top-100 border-4 h-15px w-15px ms-n2 mt-n2 connection_${this.advertiser.user.id}"></div>
                                        </div>
                                        <span class="d-flex flex-column align-items-start ms-5">
                                            <span class="fs-4 fw-bolder">${this.advertiser.name}</span>
                                            <span class="fs-8 text-gray-500">Advertiser</span>
                                        </span>
                                        <span class="bullet bullet-dot bg-success h-8px w-8px position-absolute translate-middle top-25 start-100 animation-blink ${this.unread_messages_count == 0 ? 'd-none' : ''} bull_${this.id}"></span>
                                    </a>
                                </li>`);
                    } else if (this.part_type === 2) {
                        $('#receivers').append(`<li class="nav-item">
                                    <a href="javascript:" class="nav-link text-active-primary py-5 pe-6 chat-item position-relative ${this.unread_messages_count > 0 ? 'attach' : ''}" data-id="${this.publisher.user.id}" data-account="${this.publisher.id}" data-negotiation="${this.id}" data-type="${this.part_type}">
                                        <div class="symbol symbol-45px symbol-circle">
                                        <img alt="Pic" src="${this.publisher.user.photo}">
                                        <div class="symbol-badge bg-danger start-100 top-100 border-4 h-15px w-15px ms-n2 mt-n2 connection_${this.publisher.user.id}"></div>
                                        </div>
                                        <span class="d-flex flex-column align-items-start ms-5">
                                            <span class="fs-4 fw-bolder name">${this.publisher.name}</span>
                                            <span class="fs-8 text-gray-500">Publisher</span>
                                        </span>
                                        <span class="bullet bullet-dot bg-success h-8px w-8px position-absolute translate-middle top-25 start-100 animation-blink ${this.unread_messages_count == 0 ? 'd-none' : ''} bull_${this.id}"></span>
                                    </a>
                                </li>`);
                    }
                });
            }*/
            $('#send_msg').attr('disabled', true);
            $('#negotiations_main').hide();
            $('#negotiations_content').show();
            $('.chat-item.attach')[0]?.click();
            KTMenu.createInstances();
            sendMessage({
                action: "connected",
                role: role,
            })
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
    $('#kt_chat_messenger').show();
    $('.chat-item.active').removeClass('active');
    $(this).addClass('active');
    negotiation_id = $(this).data('negotiation');
    receiver_id = $(this).data('id');
    if ($(this).hasClass('attach')) {
        sendMessage({
            action: "attachNegotiation",
            sender_id: sender_id,
            receiver_id: receiver_id,
            negotiation_id: negotiation_id,
        });
    }
    $(this).removeClass('attach');
    switchConversation($(this).data('negotiation'));

});
let switchConversation = function (negociation) {
    let total = parseInt($('.campaign_item.active .messages_count_total').text()) - parseInt($('.messages_count_' + negociation).text());
    $('.campaign_item.active .messages_count_total').text((total > 0 ? total : 0));
    $('.bull_' + receiver_id).addClass('d-none');
    $('.overlay-layer').show();
    $('.overlay').addClass('overlay-block');
    sendMessage({
        action: "seen",
        sender_id: sender_id,
        receiver_id: receiver_id,
        negotiation_id: negotiation_id,
        role: role,
    });
    $.ajax({
        url: route('admin.negotiations.messages'),
        method: 'POST',
        dataType: 'JSON',
        data: {
            id: negociation,
        },
        success: function (data) {
            $('#kt_chat_messenger_body div[data-kt-element="messages"]').empty();
            if (data.data.length != 0) {
                $.each(data.data, function (index, value) {
                    if (this.sender_id == receiver_id) {
                        if (data.data[index - 1] && data.data[index - 1].sender_id === this.sender_id && moment.utc(this.message_sent).diff(data.data[index - 1].message_sent, 'minutes') === 0) {
                            $(`<div class="p-5 rounded bg-light-info text-dark fw-bold mw-lg-400px text-start mt-2" data-kt-element="message-text">
                                ${this.message_content}
                                </div>`).insertAfter(last_message.find('div[data-kt-element="message-text"]').last());
                        } else {
                            last_message = $(`<div class="d-flex justify-content-start mb-10">
                                    <div class="symbol d-flex flex-column align-items-start" >
                                    <div class="d-flex align-items-center mb-2">
                                    <div class="symbol symbol-35px symbol-circle">
                                    <img alt="Pic" src="${this.sender.photo}">
                                    </div>
                                    <div class="ms-3 text-start">
                                    <a href="javascript:" class="fs-5 fw-bolder text-gray-900 text-hover-primary me-1 d-block">${this.sender.username}</a>
                                    <span class="text-muted fs-8 mb-1">${moment.utc(this.message_sent).tz(Intl.DateTimeFormat().resolvedOptions().timeZone).calendar(null, {
                                lastWeek: 'dddd, H:mm',
                                lastDay: '[Yesterday], H:mm',
                                sameDay: 'H:mm',
                                sameElse: function () {
                                    return "d MMMM, H:mm";
                                }
                            })}</span>
                                    </div>
                                    </div>
                                    <div class="p-5 rounded bg-light-info text-dark fw-bold mw-lg-400px text-start" data-kt-element="message-text">
                                    ${this.message_content}
                                    </div>
                                    </div>
                                    </div>`);
                            $('#kt_chat_messenger_body div[data-kt-element="messages"]').prepend(last_message);
                        }
                    } else {
                        if (data.data[index - 1] && data.data[index - 1].sender_id === this.sender_id && moment.utc(this.message_sent).diff(data.data[index - 1].message_sent, 'minutes') === 0) {
                            $(`<div class="p-5 rounded bg-light-primary text-dark fw-bold mw-lg-400px text-end mt-2" data-kt-element="message-text">
                                ${this.message_content}
                                </div>`).insertAfter(last_message.find('div[data-kt-element="message-text"]').last());
                        } else {
                            last_message = $(`<div class="d-flex justify-content-end mb-10 message ${this.message_read != null ? 'seen' : ''}">
                                <div class="symbol d-flex flex-column align-items-end">
                                <div class="d-flex align-items-center mb-2">
                                <div class="me-3 text-end">
                                <a href="javascript:" class="fs-5 fw-bolder text-gray-900 text-hover-primary ms-1 d-block">${this.sender.username}</a>
                                <span class="text-muted fs-8 mb-1">${moment.utc(this.message_sent).tz(Intl.DateTimeFormat().resolvedOptions().timeZone).calendar(null, {
                                lastWeek: 'dddd, H:mm',
                                lastDay: '[Yesterday], H:mm',
                                sameDay: 'H:mm',
                                sameElse: function () {
                                    return "d MMMM, H:mm";
                                }
                            })}</span>
                                </div>
                                <div class="symbol symbol-35px symbol-circle">
                                <img alt="Pic" src="${this.sender.photo}">
                                </div>
                                </div>
                                <div class="p-5 rounded bg-light-primary text-dark fw-bold mw-lg-400px text-end" data-kt-element="message-text">
                                ${this.message_content}
                                ${this.message_read == null ? '<div class="symbol-badge border-0 start-100 top-100 ms-n2 mt-n2" data-bs-toggle="tooltip" data-bs-original-title="Not seen" data-bs-placement="left" data-bs-custom-class="tooltip-dark"><span class="svg-icon-muted svg-icon svg-icon-1" data-kt-element="message-text">    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">        <path opacity="0.5" d="M12.8956 13.4982L10.7949 11.2651C10.2697 10.7068 9.38251 10.7068 8.85731 11.2651C8.37559 11.7772 8.37559 12.5757 8.85731 13.0878L12.7499 17.2257C13.1448 17.6455 13.8118 17.6455 14.2066 17.2257L21.1427 9.85252C21.6244 9.34044 21.6244 8.54191 21.1427 8.02984C20.6175 7.47154 19.7303 7.47154 19.2051 8.02984L14.061 13.4982C13.7451 13.834 13.2115 13.834 12.8956 13.4982Z" fill="black"></path>        <path d="M7.89557 13.4982L5.79487 11.2651C5.26967 10.7068 4.38251 10.7068 3.85731 11.2651C3.37559 11.7772 3.37559 12.5757 3.85731 13.0878L7.74989 17.2257C8.14476 17.6455 8.81176 17.6455 9.20663 17.2257L16.1427 9.85252C16.6244 9.34044 16.6244 8.54191 16.1427 8.02984C15.6175 7.47154 14.7303 7.47154 14.2051 8.02984L9.06096 13.4982C8.74506 13.834 8.21146 13.834 7.89557 13.4982Z" fill="black"></path></svg></span></div>' : ''}
                                </div>
                                </div>
                                </div>`);
                            $('#kt_chat_messenger_body div[data-kt-element="messages"]').prepend(last_message);
                        }
                    }
                });
                $('.message.seen').last().find('div[data-kt-element="message-text"]').parent().append('<div class="symbol-badge border-0 start-100 top-100 ms-n2 mt-n2"><span class="svg-icon-success svg-icon svg-icon-1" data-kt-element="message-text">    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">        <path opacity="0.5" d="M12.8956 13.4982L10.7949 11.2651C10.2697 10.7068 9.38251 10.7068 8.85731 11.2651C8.37559 11.7772 8.37559 12.5757 8.85731 13.0878L12.7499 17.2257C13.1448 17.6455 13.8118 17.6455 14.2066 17.2257L21.1427 9.85252C21.6244 9.34044 21.6244 8.54191 21.1427 8.02984C20.6175 7.47154 19.7303 7.47154 19.2051 8.02984L14.061 13.4982C13.7451 13.834 13.2115 13.834 12.8956 13.4982Z" fill="black"></path>        <path d="M7.89557 13.4982L5.79487 11.2651C5.26967 10.7068 4.38251 10.7068 3.85731 11.2651C3.37559 11.7772 3.37559 12.5757 3.85731 13.0878L7.74989 17.2257C8.14476 17.6455 8.81176 17.6455 9.20663 17.2257L16.1427 9.85252C16.6244 9.34044 16.6244 8.54191 16.1427 8.02984C15.6175 7.47154 14.7303 7.47154 14.2051 8.02984L9.06096 13.4982C8.74506 13.834 8.21146 13.834 7.89557 13.4982Z" fill="black"></path></svg></span></div>');
                $('#kt_chat_messenger_body div[data-kt-element="messages"]').scrollTop(1E10);
                $('#kt_chat_messenger_body [data-bs-toggle="tooltip"]').tooltip();
            } else {
                $('#kt_chat_messenger_body div[data-kt-element="messages"]').append('<div class="text-center startNegotiation" data-bs-toggle="tooltip" data-bs-original-title="Seen" data-bs-placement="left" data-bs-custom-class="tooltip-dark"><h2 class="fs-2x fw-bolder mb-10">No negotiation started yet</h2><img width="200" height="200" src="/assets/media/illustrations/sigma-1/16.png"></div>');
            }
            $('#send_msg').attr('disabled', false);
            $('.overlay-layer').hide();
            $('.overlay').removeClass('overlay-block');
        }
    });
};
