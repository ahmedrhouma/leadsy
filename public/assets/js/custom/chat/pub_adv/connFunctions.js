var receiver_id = null;
var negotiation_id;
var campaign;
let last_message;
let seen_icon = '<div class="symbol-badge border-0 start-100 top-100 ms-n2 mt-n2">\n' +
    '                                <span class="svg-icon-success svg-icon svg-icon-1" data-kt-element="message-text">    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">        <path opacity="0.5" d="M12.8956 13.4982L10.7949 11.2651C10.2697 10.7068 9.38251 10.7068 8.85731 11.2651C8.37559 11.7772 8.37559 12.5757 8.85731 13.0878L12.7499 17.2257C13.1448 17.6455 13.8118 17.6455 14.2066 17.2257L21.1427 9.85252C21.6244 9.34044 21.6244 8.54191 21.1427 8.02984C20.6175 7.47154 19.7303 7.47154 19.2051 8.02984L14.061 13.4982C13.7451 13.834 13.2115 13.834 12.8956 13.4982Z" fill="black"></path>        <path d="M7.89557 13.4982L5.79487 11.2651C5.26967 10.7068 4.38251 10.7068 3.85731 11.2651C3.37559 11.7772 3.37559 12.5757 3.85731 13.0878L7.74989 17.2257C8.14476 17.6455 8.81176 17.6455 9.20663 17.2257L16.1427 9.85252C16.6244 9.34044 16.6244 8.54191 16.1427 8.02984C15.6175 7.47154 14.7303 7.47154 14.2051 8.02984L9.06096 13.4982C8.74506 13.834 8.21146 13.834 7.89557 13.4982Z" fill="black"></path></svg></span>\n' +
    '                                </div>';
let notseen_icon = '<div class="symbol-badge border-0 start-100 top-100 ms-n2 mt-n2">\n' +
    '                                <span class="svg-icon-muted svg-icon svg-icon-1" data-kt-element="message-text">    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">        <path opacity="0.5" d="M12.8956 13.4982L10.7949 11.2651C10.2697 10.7068 9.38251 10.7068 8.85731 11.2651C8.37559 11.7772 8.37559 12.5757 8.85731 13.0878L12.7499 17.2257C13.1448 17.6455 13.8118 17.6455 14.2066 17.2257L21.1427 9.85252C21.6244 9.34044 21.6244 8.54191 21.1427 8.02984C20.6175 7.47154 19.7303 7.47154 19.2051 8.02984L14.061 13.4982C13.7451 13.834 13.2115 13.834 12.8956 13.4982Z" fill="black"></path>        <path d="M7.89557 13.4982L5.79487 11.2651C5.26967 10.7068 4.38251 10.7068 3.85731 11.2651C3.37559 11.7772 3.37559 12.5757 3.85731 13.0878L7.74989 17.2257C8.14476 17.6455 8.81176 17.6455 9.20663 17.2257L16.1427 9.85252C16.6244 9.34044 16.6244 8.54191 16.1427 8.02984C15.6175 7.47154 14.7303 7.47154 14.2051 8.02984L9.06096 13.4982C8.74506 13.834 8.21146 13.834 7.89557 13.4982Z" fill="black"></path></svg></span>\n' +
    '                                </div>';
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
            if (msg.sender_id == sender_id) {
                $('.campaign_item[data-negotiation="' + msg.negotiation_id + '"] .name,.campaign_item[data-negotiation="' + msg.negotiation_id + '"] .lastmessage').addClass('fw-bold text-gray-600');
                $('.campaign_item[data-negotiation="' + msg.negotiation_id + '"] .name,.campaign_item[data-negotiation="' + msg.negotiation_id + '"] .lastmessage').removeClass('active fw-bolder text-gray-900');
            } else {
                $('.messages_count_' + msg.negotiation_id).text(parseInt($('.messages_count_' + msg.negotiation_id).text()) + 1);
                $('.campaign_item[data-negotiation="' + msg.negotiation_id + '"] .name,.campaign_item[data-negotiation="' + msg.negotiation_id + '"] .lastmessage').removeClass('fw-bold text-gray-600');
                $('.campaign_item[data-negotiation="' + msg.negotiation_id + '"] .name,.campaign_item[data-negotiation="' + msg.negotiation_id + '"] .lastmessage').addClass('active fw-bolder text-gray-900');
            }
            $('.campaign_item[data-negotiation="' + msg.negotiation_id + '"] .lastmessage').text((msg.sender_id == sender_id ? 'You : ' : '') + msg.content);
            if (msg.negotiation_id == negotiation_id) {
                if (msg.sender_id == sender_id) {
                    if (last_message.hasClass('justify-content-end') && moment.utc(this.message_sent).diff(moment(last_message.find('.time').text(), 'HH:mm'), 'minutes') === 0) {
                        $(`<div class="symbol p-3 rounded bg-light-primary text-dark fw-bold mw-lg-400px text-end mt-2" data-kt-element="message-text">${msg.content + notseen_icon}</div>`).insertAfter(last_message.find('div[data-kt-element="message-text"]').last());
                    } else {
                        last_message = $(`<div class="d-flex justify-content-end mb-10 message">
                                <div class="d-flex flex-column align-items-end">
                                <div class="d-flex align-items-center mb-2">
                                <div class="me-3 text-end">
                                <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary ms-1 d-block">${sender_name}</a>
                                <span class="text-muted fs-7 mb-1 time">${moment.utc(msg.message_sent).tz(Intl.DateTimeFormat().resolvedOptions().timeZone).calendar(null, {
                            lastWeek: 'dddd, H:mm',
                            lastDay: '[Yesterday], H:mm',
                            sameDay: 'H:mm'
                        })}
                                </span>
                                </div>
                                <div class="symbol symbol-35px symbol-circle">
                                <img alt="Pic" src="${sender_avatar}">
                                </div>
                                </div>
                                <div class="symbol p-3 rounded bg-light-primary text-dark fw-bold mw-lg-400px text-end" data-kt-element="message-text">
                                ${msg.content}
                                <div class="symbol-badge border-0 start-100 top-100 ms-n2 mt-n2">
                                        <span class="svg-icon-muted svg-icon svg-icon-1" data-kt-element="message-text">    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">        <path opacity="0.5" d="M12.8956 13.4982L10.7949 11.2651C10.2697 10.7068 9.38251 10.7068 8.85731 11.2651C8.37559 11.7772 8.37559 12.5757 8.85731 13.0878L12.7499 17.2257C13.1448 17.6455 13.8118 17.6455 14.2066 17.2257L21.1427 9.85252C21.6244 9.34044 21.6244 8.54191 21.1427 8.02984C20.6175 7.47154 19.7303 7.47154 19.2051 8.02984L14.061 13.4982C13.7451 13.834 13.2115 13.834 12.8956 13.4982Z" fill="black"></path>        <path d="M7.89557 13.4982L5.79487 11.2651C5.26967 10.7068 4.38251 10.7068 3.85731 11.2651C3.37559 11.7772 3.37559 12.5757 3.85731 13.0878L7.74989 17.2257C8.14476 17.6455 8.81176 17.6455 9.20663 17.2257L16.1427 9.85252C16.6244 9.34044 16.6244 8.54191 16.1427 8.02984C15.6175 7.47154 14.7303 7.47154 14.2051 8.02984L9.06096 13.4982C8.74506 13.834 8.21146 13.834 7.89557 13.4982Z" fill="black"></path></svg></span>
                                    </div>
                                </div>
                                </div>
                                </div>`);
                        $('#kt_chat_messenger_body div[data-kt-element="messages"]').append(last_message);
                    }
                } else {
                    if (last_message && last_message.hasClass('justify-content-start') && moment.utc(this.message_sent).diff(moment(last_message.find('.time').text(), 'HH:mm'), 'minutes') === 0) {
                        $(`<div class="p-3 rounded bg-light-info text-dark fw-bold mw-lg-400px text-start mt-2" data-kt-element="message-text">${msg.content}</div>`).insertAfter(last_message.find('div[data-kt-element="message-text"]').last());
                    } else {
                        last_message = $(`<div class="d-flex justify-content-start mb-10">
                                    <div class="d-flex flex-column align-items-start">
                                    <div class="d-flex align-items-center mb-2">
                                    <div class="symbol symbol-35px symbol-circle">
                                    <img alt="Pic" src="${msg.sender_avatar}">
                                    </div>
                                    <div class="ms-3  text-start">
                                    <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary me-1 d-block">${msg.sender_name}</a>
                                    <span class="text-muted fs-7 mb-1 time">${moment.utc(msg.message_sent).tz(Intl.DateTimeFormat().resolvedOptions().timeZone).calendar(null, {
                            lastWeek: 'dddd, H:mm',
                            lastDay: '[Yesterday], H:mm',
                            sameDay: 'H:mm'
                        })}
                                    </div>
                                    </div>
                                    <div class="p-3 rounded bg-light-info text-dark fw-bold mw-lg-400px text-start" data-kt-element="message-text">
                                    ${msg.content}
                                    </div>
                                    </div>
                                    </div>`);
                        $('#kt_chat_messenger_body div[data-kt-element="messages"]').append(last_message);
                    }
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
                                    <div class="p-3 rounded bg-light-info text-dark fw-bold mw-lg-400px text-start" data-kt-element="message-text">
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
        case "invitation" :
            $('#kt_chat_contacts_body').children().prepend(`<a href="#" class="d-flex flex-stack py-4 bg-hover-light rounded px-2 campaign_item" data-id="${msg.campaign_id}" data-negotiation="${msg.negotiation_id}">
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-45px symbol-circle">
                                        <span class="symbol-label bg-light-danger text-danger fs-6 fw-bolder id">${msg.campaign_id}</span>
                                    </div>
                                    <div class="ms-5 mw-125px">
                                        <span class="fs-5 fw-bold text-truncate  text-gray-600 text-hover-primary mb-2 name">${msg.campaign_name}</span>
                                                                            </div>
                                </div>
                                <div class="d-flex flex-column align-items-end ms-2">
                                    <span class="text-muted fs-7 mb-1"></span>
                                    <span class="badge badge-sm badge-circle badge-light-primary messages_count_19">0</span>
                                </div>
                            </a>`);
            break;
    }
};
$(document).on('click', '.campaign_item', function () {
    $('.campaign_item.active').removeClass('active');
    $('.name,.lastmessage', $(this)).removeClass(' fw-bolder text-gray-900').addClass('fw-bold text-gray-600');
    $('.messages_count_' + $(this).data('negotiation')).text('0');
    $(this).addClass('active');
    $('.campaign_name').text($('.name', $(this)).text());
    campaign = $(this).data('id');
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
var switchConversation = function (negotiation) {
    $('#kt_chat_messenger_body div[data-kt-element="messages"]').empty();
    if (receiver_id != null) {
        sendMessage({
            action: "seen",
            sender_id: sender_id,
            receiver_id: receiver_id,
            negotiation_id: negotiation_id,
            role: role,
        });
    }
    $.ajax({
        url: role == 2 ? route('advertiser.campaigns.show') : (role == 3 ? route('publisher.campaigns.show') : ''),
        method: 'POST',
        dataType: 'JSON',
        data: {
            id: campaign,
        },
        success: function (data) {
            $('.campaign_id').text(data.campaign.id);
            $('.campaign_advertiser_id').text(data.campaign.advertiser.id);
            $('.campaign_name').text(data.campaign.name);
            $('.campaign_created_at').text(data.campaign.created_at);
            $('.campaign_start_at').text(data.campaign.start_date);
            $('.campaign_advertiser_name').text(data.campaign.advertiser.name);
            $('.campaign_thematic').text(data.campaign.thematics.name);
            $('.campaign_countries').text(data.campaign.countriesName.join(' , '));
            $('.campaign_leads_type').text(data.campaign.leads_types.name);
            $('.campaign_max_volume').text(data.campaign.leads_vmax);
            $('.campaign_cost_type').text(data.campaign.costs_types.name);
            $('.campaign_buying_price').text(data.campaign.selling_price);
        }
    });
    $.ajax({
        url: role == 2 ? route('advertiser.negotiations.messages') : (role == 3 ? route('publisher.negotiations.messages') : ''),
        method: 'POST',
        dataType: 'JSON',
        data: {
            id: negotiation,
        },
        success: function (data) {
            if (data.data.length != 0) {
                $.each(data.data, function (index, value) {
                    if (this.sender_id == sender_id) {
                        if (data.data[index - 1] && data.data[index - 1].sender_id === this.sender_id && moment.utc(this.message_sent).diff(data.data[index - 1].message_sent, 'minutes') === 0) {
                            $(`<div class="p-3 rounded bg-light-primary text-dark fw-bold mw-lg-400px text-end mt-2" data-kt-element="message-text">
                                ${this.message_content}
                                </div>`).insertAfter(last_message.find('div[data-kt-element="message-text"]').last());
                        } else {
                            last_message = $(`<div class="d-flex justify-content-end mb-10 message ${this.message_read != null ? 'seen' : ''}">
                                <div class="symbol d-flex flex-column align-items-end">
                                <div class="d-flex align-items-center mb-2">
                                <div class="me-3  text-end">
                                <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary ms-1 d-block">${this.sender.username}</a>
                                <span class="text-muted fs-8 mb-1">${moment.utc(this.message_sent).tz(Intl.DateTimeFormat().resolvedOptions().timeZone).calendar(null, {
                                lastWeek: 'dddd, H:mm',
                                lastDay: '[Yesterday], H:mm',
                                sameDay: 'H:mm'
                            })}</span>
                                </div>
                                <div class="symbol symbol-35px symbol-circle">
                                <img alt="Pic" src="${this.sender.photo}">
                                </div>
                                </div>
                                <div class="p-3 rounded bg-light-primary text-dark fw-bold mw-lg-400px text-end" data-kt-element="message-text">
                                ${this.message_content}
                                ${this.message_read == null ? '<div class="symbol-badge border-0 start-100 top-100 ms-n2 mt-n2" data-bs-toggle="tooltip" data-bs-original-title="Not seen" data-bs-placement="left" data-bs-custom-class="tooltip-dark"><span class="svg-icon-muted svg-icon svg-icon-1" data-kt-element="message-text">    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">        <path opacity="0.5" d="M12.8956 13.4982L10.7949 11.2651C10.2697 10.7068 9.38251 10.7068 8.85731 11.2651C8.37559 11.7772 8.37559 12.5757 8.85731 13.0878L12.7499 17.2257C13.1448 17.6455 13.8118 17.6455 14.2066 17.2257L21.1427 9.85252C21.6244 9.34044 21.6244 8.54191 21.1427 8.02984C20.6175 7.47154 19.7303 7.47154 19.2051 8.02984L14.061 13.4982C13.7451 13.834 13.2115 13.834 12.8956 13.4982Z" fill="black"></path>        <path d="M7.89557 13.4982L5.79487 11.2651C5.26967 10.7068 4.38251 10.7068 3.85731 11.2651C3.37559 11.7772 3.37559 12.5757 3.85731 13.0878L7.74989 17.2257C8.14476 17.6455 8.81176 17.6455 9.20663 17.2257L16.1427 9.85252C16.6244 9.34044 16.6244 8.54191 16.1427 8.02984C15.6175 7.47154 14.7303 7.47154 14.2051 8.02984L9.06096 13.4982C8.74506 13.834 8.21146 13.834 7.89557 13.4982Z" fill="black"></path></svg></span></div>' : ''}
                                </div>
                                </div>
                                </div>`);
                            $('#kt_chat_messenger_body div[data-kt-element="messages"]').prepend(last_message);
                        }
                    } else {
                        if (data.data[index - 1] && data.data[index - 1].sender_id === this.sender_id && moment.utc(this.message_sent).diff(data.data[index - 1].message_sent, 'minutes') === 0) {
                            $(`<div class="p-3 rounded bg-light-info text-dark fw-bold mw-lg-400px text-start mt-2" data-kt-element="message-text">
                                ${this.message_content}
                                </div>`).insertAfter(last_message.find('div[data-kt-element="message-text"]').last());
                        } else {
                            last_message = $(`<div class="d-flex justify-content-start mb-10">
                                    <div class="d-flex flex-column align-items-start">
                                    <div class="d-flex align-items-center mb-2">
                                    <div class="symbol symbol-35px symbol-circle">
                                    <img alt="Pic" src="${this.sender.photo}">
                                    </div>
                                    <div class="ms-3  text-start">
                                    <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary me-1 d-block">${this.sender.username}</a>
                                    <span class="text-muted fs-8 mb-1">${moment.utc(this.message_sent).tz(Intl.DateTimeFormat().resolvedOptions().timeZone).calendar(null, {
                                lastWeek: 'dddd, H:mm',
                                lastDay: '[Yesterday], H:mm',
                                sameDay: 'H:mm'
                            })}
                                    </span>
                                    </div>
                                    </div>
                                    <div class="p-3 rounded bg-light-info text-dark fw-bold mw-lg-400px text-start" data-kt-element="message-text">
                                        ${this.message_content}
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
                $('#kt_chat_messenger_body div[data-kt-element="messages"]').append('<div class="text-center startNegotiation"><h2 class="fs-2x fw-bolder mb-10">No negotiation started yet</h2><img width="200" height="200" src="/assets/media/illustrations/sigma-1/16.png"></div>');
            }
            $('#negotiations_main').hide();
            $('#negotiations_content').show();
            $('#kt_chat_messenger_body div[data-kt-element="messages"]').scrollTop(1E10);
        }
    });
};
