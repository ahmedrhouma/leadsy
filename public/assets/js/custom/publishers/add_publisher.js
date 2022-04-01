let themath = $(`<div class="thematic">
    <div class="float-end d-flex flex-column">
        <button type="button" class="btn btn-sm btn-icon btn-outline-danger delThem">
            <span class="svg-icon svg-icon-muted svg-icon-22">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black"></rect>
                </svg>
            </span>
        </button>
        <button type="button" class="btn btn-sm btn-icon btn-outline-secondary editThem">
            <span class="svg-icon svg-icon-muted svg-icon-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd" d="M2 4.63158C2 3.1782 3.1782 2 4.63158 2H13.47C14.0155 2 14.278 2.66919 13.8778 3.04006L12.4556 4.35821C11.9009 4.87228 11.1726 5.15789 10.4163 5.15789H7.1579C6.05333 5.15789 5.15789 6.05333 5.15789 7.1579V16.8421C5.15789 17.9467 6.05333 18.8421 7.1579 18.8421H16.8421C17.9467 18.8421 18.8421 17.9467 18.8421 16.8421V13.7518C18.8421 12.927 19.1817 12.1387 19.7809 11.572L20.9878 10.4308C21.3703 10.0691 22 10.3403 22 10.8668V19.3684C22 20.8218 20.8218 22 19.3684 22H4.63158C3.1782 22 2 20.8218 2 19.3684V4.63158Z" fill="currentColor"></path>
                    <path d="M10.9256 11.1882C10.5351 10.7977 10.5351 10.1645 10.9256 9.77397L18.0669 2.6327C18.8479 1.85165 20.1143 1.85165 20.8953 2.6327L21.3665 3.10391C22.1476 3.88496 22.1476 5.15129 21.3665 5.93234L14.2252 13.0736C13.8347 13.4641 13.2016 13.4641 12.811 13.0736L10.9256 11.1882Z" fill="currentColor"></path>
                    <path d="M8.82343 12.0064L8.08852 14.3348C7.8655 15.0414 8.46151 15.7366 9.19388 15.6242L11.8974 15.2092C12.4642 15.1222 12.6916 14.4278 12.2861 14.0223L9.98595 11.7221C9.61452 11.3507 8.98154 11.5055 8.82343 12.0064Z" fill="currentColor"></path>
                </svg>
            </span>
        </button>
    </div>
    <div class="card bg-light-primary rounded border-primary border border-dashed  h-100">
        <div class="card-body p-3">
            <div class="fs-6 d-flex justify-content-between mb-4">
                <div class="fw-bold">Thematic</div>
                <div class="d-flex fw-bolder thematics"></div>
            </div>
            <div class="separator separator-dashed"></div>
            <div class="fs-6 d-flex justify-content-between my-4">
                <div class="fw-bold">Countries</div>
                <div class="d-flex fw-bolder countries"></div>
            </div>
            <div class="separator separator-dashed"></div>
            <div class="fs-6 d-flex justify-content-between my-4">
                <div class="fw-bold">Leads type</div>
                <div class="d-flex fw-bolder lead_types"></div>
            </div>
            <div class="separator separator-dashed"></div>
            <div class="fs-6 d-flex justify-content-between my-4">
                <div class="fw-bold">Cost types</div>
                <div class="d-flex fw-bolder cost_types"></div>
            </div>
            <div class="separator separator-dashed"></div>
            <div class="fs-6 d-flex justify-content-between mt-4">
                <div class="fw-bold">Amount</div>
                <div class="d-flex fw-bolder amount"></div>
            </div>
        </div>
    </div>
</div>
`);
$(document).on('click','.delThem',function () {
    $(this).closest('.thematic').remove();
});
$(document).on('click','.addThem',function () {
    $('#kt_modal_add_publisher').modal('hide');
    $('#modal_add_them').modal('show');
});
$('#modal_add_them').on('hidden.bs.modal', function (e) {
    $('#kt_modal_add_publisher').modal('show');
});
$('#add_them_form').submit(function (e) {
    e.preventDefault();
    let newThem = themath.clone();
    newThem.data('values',$(this).serialize());
    $.each($('#add_them_form [name="thematics"] option:selected'),function () {
        newThem.find('.thematics').append('<div class="badge badge-white">'+$(this).text()+'</div>');
    });
    $.each($('#add_them_form [name="country"] option:selected'),function () {
        newThem.find('.countries').append('<div class="badge badge-white">'+$(this).text()+'</div>');
    });
    $.each($('#add_them_form [name="leads_types"] option:selected'),function () {
        newThem.find('.lead_types').html('<div class="badge badge-white">'+$(this).text()+'</div>');
    });
    $.each($('#add_them_form [name="costs_types"] option:selected'),function () {
        newThem.find('.cost_types').html('<div class="badge badge-white mt-2 d-inline">'+$(this).text()+'</div>');
    });
    newThem.find('.amount').html('<div class="badge badge-white mt-2 d-inline">'+$('#add_them_form [name="unit_price"]').val()+'</div>');
    $('.thematics').prepend(newThem);
    $('#modal_add_them').modal('hide');
});
$(document).on('click','.editThem',function () {
   let them = $(this).closest('.thematic ')
});
$('#edit_them_form').submit(function (e) {
    e.preventDefault();
    let newThem = themath.clone();
    $.each($('#add_them_form .thematics option:selected'),function () {
        newThem.find('.thematics').append('<div class="badge badge-white">'+$(this).text()+'</div>');
    });
    $.each($('#add_them_form .countries option:selected'),function () {
        newThem.find('.countries').append('<div class="badge badge-white">'+$(this).text()+'</div>');
    });
    $.each($('#add_them_form .lead_types option:selected'),function () {
        newThem.find('.lead_types').html('<div class="badge badge-white">'+$(this).text()+'</div>');
    });
    $.each($('#add_them_form .cost_types option:selected'),function () {
        newThem.find('.cost_types').html('<div class="badge badge-white">'+$(this).text()+'</div>');
    });
    newThem.find('.amount').html('<div class="badge badge-white mt-2 d-inline">'+$('#add_them_form .amount').val()+'</div>');
    $('thematics').prepend(newThem);
});
