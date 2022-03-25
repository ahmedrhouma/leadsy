var conn = new WebSocket('ws://localhost:8090');
conn.onopen = function (e) {
    conn.send(JSON.stringify({
        action: "attach",
        user_id: sender_id,
        role: role,
    }));
};
var sendMessage = function (msg) {
    if ($('.startNegotiation').length != 0) $('.startNegotiation').remove();
    if (conn.readyState === WebSocket.OPEN) {
        conn.send(JSON.stringify(msg));
    }
};
$('#send_msg').click(function () {
    if ($('#msg_content').val().replace(/\s/g, '').length !== 0) {
        sendMessage({
            action: "message",
            sender_id: sender_id,
            receiver_id: receiver_id,
            negotiation_id: negotiation_id,
            role: role,
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
    }else {
        sendMessage({
            action: "writing",
            status: 1,
            sender_id: sender_id,
            receiver_id: receiver_id,
            negotiation_id: negotiation_id,
        });
    }
});
$('#msg_content').on("focusout", function (e) {
    sendMessage({
        action: "writing",
        status: 0,
        sender_id: sender_id,
        receiver_id: receiver_id,
        negotiation_id: negotiation_id,
    });
});
$('#msg_content').on("focusin", function (e) {
    $('.bull_' + negotiation_id).addClass('d-none');
    $('.campaign_item.active .messages_count_total').text(0);
    sendMessage({
        action: "seen",
        sender_id: sender_id,
        receiver_id: receiver_id,
        negotiation_id: negotiation_id,
        role: role,
    });
});
