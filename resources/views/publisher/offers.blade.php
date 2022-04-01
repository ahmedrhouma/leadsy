@extends('layouts.layout')
@section('pageTitle')
    @lang('publisher/offers.page_title')
@endsection
@section('pageDescription')
    @lang('publisher/offers.page_description')
@endsection
@section('content')
    <div class="d-flex  border-0">
        <div class="card-title">
            <div class="d-flex align-items-center position-relative my-1">
                <span class="svg-icon svg-icon-1 position-absolute ms-6">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black"></rect>
                        <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black"></path>
                    </svg>
                </span>
                <input type="text" class="form-control form-control-solid w-250px ps-15 searchOffer" placeholder="Search Offer">
            </div>
        </div>
        <div class="card-toolbar ms-5">
            <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_add_offer">
                    @lang('publisher/offers.add_new_offer')
                </button>
            </div>
        </div>
    </div>
    <div class="row g-6 g-xl-9 offers">
        @if($offers->count() == 0)
            <div class="col-xl-8 mx-auto">
                <div class="card card-flush h-lg-100" id="kt_contacts_main">
                    <div class="card-body p-0">
                        <div class="card-px text-center py-20 my-10">
                            <h2 class="fs-2x fw-bolder mb-10">Welcome to the Offers page</h2>
                            <p class="text-gray-400 fs-4 fw-bold mb-10">It's time to add offers to your profile.
                                <br>Quick start your Business growth by adding your next offer.</p>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#modal_add_offer" class="btn btn-primary">@lang('publisher/offers.add_new_offer')</a>
                        </div>
                        <div class="text-center px-4">
                            <img class="mw-100 mh-300px" alt="" src="{{asset('assets/media/illustrations/sketchy-1/5.png')}}">
                        </div>
                    </div>
                </div>
            </div>
        @else
            @foreach($offers as $offer)
                @include('offer.offer')
            @endforeach
        @endif
    </div>
    <div class="modal fade" id="modal_add_offer" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header" id="modal_add_offer_header">
                    <h2 class="fw-bolder">@lang('publisher/offers.add_new_offer')</h2>
                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close" data-bs-dismiss="modal">
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black"/>
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black"/>
                            </svg>
                        </span>
                    </div>
                </div>
                <form class="form" action="" method="post" id="modal_add_offer_form">
                    @csrf
                    <div class="modal-body scroll-y ">
                        <div class="scroll-y me-n7 pe-7" id="modal_add_offer_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#modal_add_offer_header" data-kt-scroll-wrappers="#kt_modal_add_campaign_scroll" data-kt-scroll-offset="300px">
                            <div class="fv-row mb-7">
                                <label class="required fs-6 fw-bold mb-2">@lang('publisher/offers.name')</label>
                                <input type="text" class="form-control form-control-solid" required placeholder="" name="name"/>
                            </div>
                            <div class="d-flex flex-column mb-7 fv-row">
                                <label class="fs-6 fw-bold mb-2">
                                    <span class="required">@choice('publisher/offers.thematic',1)</span>
                                </label>
                                <select name="thematic" aria-label="Select a Thematic" required data-control="select2" data-placeholder="Select a Thematic..." data-dropdown-parent="#modal_add_offer_form" class="form-select form-select-solid fw-bolder">
                                    <option value="">Select a Thematic</option>
                                    @foreach($thematics as $thematic)
                                        <option value="{{ $thematic->id }}">{{ $thematic->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="d-flex flex-column mb-7 fv-row">
                                <label class="fs-6 fw-bold mb-2">
                                    <span class="required">@choice('publisher/offers.country',2)</span>
                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Country of origination"></i>
                                </label>
                                <select name="country[]" aria-label="Select a Country" required data-control="select2" data-placeholder="Select a Country..." data-dropdown-parent="#modal_add_offer_form" class="form-select form-select-solid fw-bolder" multiple>
                                    {{-- @foreach(\App\Helper\Countries::getCountries() as $key => $country)
                                         <option value="{{ $key}}">{{ $country}}</option>
                                     @endforeach--}}
                                </select>
                            </div>
                            <div class="d-flex flex-column mb-7 fv-row">
                                <label class="fs-6 fw-bold mb-2">
                                    <span class="required">@choice('publisher/offers.lead_type',1)</span>
                                </label>
                                <select name="leads_types" aria-label="Select a Thematic" required data-control="select2" data-placeholder="Select a Lead Type..." data-dropdown-parent="#modal_add_offer_form" class="form-select form-select-solid fw-bolder">
                                    {{--@foreach($leads_types as $lead_type)
                                        <option value="{{ $lead_type->id }}">{{ $lead_type->name }}</option>
                                    @endforeach--}}
                                </select>
                            </div>
                            <div class="row g-9 mb-7">
                                <div class="col-md-6 fv-row fv-plugins-icon-container">
                                    <label class="required fs-6 fw-bold mb-2">@lang('publisher/offers.leads_volume')</label>
                                    <select name="leads_volume" aria-label="Select a lead volume" data-control="select2" data-placeholder="Select a Lead volume..." data-dropdown-parent="#modal_add_offer_form" class="form-select form-select-solid fw-bolder">
                                        <option value="1">Per Day</option>
                                        <option value="2">Per Campaign</option>
                                    </select>
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <div class="col-md-6 fv-row fv-plugins-icon-container">
                                    <label class="required fs-6 fw-bold mb-2">@lang('publisher/offers.max_leads')</label>
                                    <input class="form-control form-control-solid" placeholder="" name="leads_vmax" type="number">
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="row g-9 mb-7">
                                <div class="col-md-6 fv-row fv-plugins-icon-container">
                                    <label class="required fs-6 fw-bold mb-2">@choice('publisher/offers.cost_type',1)</label>
                                    <select name="costs_types" aria-label="Select a Cost type" data-control="select2" data-placeholder="Select a Cost type..." data-dropdown-parent="#modal_add_offer_form" class="form-select form-select-solid fw-bolder" required>
                                        {{-- @foreach($costs_types as $cost_type)
                                             <option value="{{ $cost_type->id }}">{{ $cost_type->name }}</option>
                                         @endforeach--}}
                                    </select>
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <div style="display: none" class="col-md-6 fv-row fv-plugins-icon-container cost_amount">
                                    <label class="required fs-6 fw-bold mb-2">@lang('publisher/offers.amount')</label>
                                    <input type="number" step="0.1" class="form-control form-control-solid" name="cost_amount">
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <div style="display: none" class="col-md-6 fv-row fv-plugins-icon-container sale_percentage">
                                    <label class="required fs-6 fw-bold mb-2">@lang('publisher/offers.sale') %</label>
                                    <input type="number" max="100" step="0.1" class="form-control form-control-solid" name="sale_percentage">
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer flex-center">
                        <button type="reset" id="kt_modal_add_offer_cancel" data-bs-dismiss="modal" class="btn btn-light me-3">
                            @lang('actions.cancel')
                        </button>
                        <button type="submit" id="kt_modal_edit_campaign_submit" class="btn btn-primary" name="addOffer">
                            <span class="indicator-label">@lang('actions.save')</span>
                            <span class="indicator-progress">Please wait...
								<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
    <script>
        $('.searchOffer').keyup(function () {
            $this = $(this);
            setTimeout((function () {
                $('.offer').each(function () {
                    if ($(this).data("name").toLowerCase().indexOf($this.val()) >= 0 || $(this).val().toLowerCase().indexOf($this.val()) >= 0) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            }), 1500);
        });
        $('#modal_add_offer_form').on('submit', function (e) {
            e.preventDefault();
            let form = new FormData($(this)[0]);
            $.ajax({
                url: '{{ route('publisher.offers.add') }}',
                data: form,
                processData: false,
                contentType: false,
                type: 'POST',
                dataType: 'JSON',
                success: function (data) {
                    if (data.success) {
                        Swal.fire({
                            icon: 'success',
                            title: '{{ trans('alert.success_action',['action' => trans_choice('actions.create',2),'attribute'=>trans_choice('publisher/offers.offer',1)]) }}'
                        });
                        $('#kt_modal_add_offer_cancel').click();
                        $('.offers').append(data.component);
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Something went wrong !'
                        })
                    }
                }
            });
        });
        $('select[name="thematic"]').change(function () {
            $.ajax({
                url: '{{ route('publisher.thematic.show') }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: $(this).val()
                },
                type: 'POST',
                dataType: 'JSON',
                success: function (data) {
                    $('select[name="leads_types"]').empty();
                    $('select[name="costs_types"]').empty();
                    $('select[name="country[]"]').empty();
                    $.each(data.leads_types, function () {
                        $('select[name="leads_types"]').append(`<option value="${this.lead_type.id}">${this.lead_type.name}</option>`);
                    });
                    $.each(data.costs_types, function () {
                        $('select[name="costs_types"]').append(`<option value="${this.cost_type.id}">${this.cost_type.name}</option>`);
                    });
                    $.each(data.countries, function (V, K) {
                        $('select[name="country[]"]').append(`<option value="${this.iso}">${this.name}</option>`);
                    });
                    $('select[name="leads_types"],select[name="costs_types"],select[name="country[]"]').change();
                }
            });
        });
        $(document).on('click','.delete',function () {
            let btn = $(this);
            Swal.fire({
                icon: 'warning',
                title: '{{ trans('alert.validation_message',['action' => trans_choice('actions.delete',1),'attribute'=>trans_choice('publisher/offers.offer',1)])}} ',
                showCancelButton: true,
                confirmButtonText: "Yes Delete It",
                cancelButtonText: 'Cancel',
                customClass: {
                    cancelButton: "btn btn-primary",
                    confirmButton: 'btn btn-danger'
                }
            }).then(function (e) {
                if (e.isConfirmed) {
                    $.ajax({
                        url: '{{ route('publisher.offers.destroy') }}',
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: btn.data('id')
                        },
                        type: 'POST',
                        dataType: 'JSON',
                        success: function (data) {
                            if (data.success) {
                                Swal.fire({
                                    icon: 'success',
                                    title: '{{ trans('alert.success_action',['action' => trans_choice('actions.delete',2),'attribute'=>trans_choice('publisher/offers.offer',1)]) }}'
                                });
                                btn.closest('.offer').remove();
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Something went wrong !'
                                })
                            }
                        }
                    });
                }
            })
        });
        $('select[name="costs_types"]').change(function () {
            if ($(this).val() == 2) {
                $('.sale_percentage').show();
                $('.cost_amount').hide();

            } else {
                $('.cost_amount').show();
                $('.sale_percentage').hide();
            }
        });
    </script>
@endsection
