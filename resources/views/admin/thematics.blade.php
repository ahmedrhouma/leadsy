@extends('layouts.layout')
@section('pageTitle')
    Thematic list
@endsection
@section('pageDescription')
    List of all thematics
@endsection
@section('css')
    <link href="{{asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css"/>

@endsection
@section('content')
    <div class="card">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                    <span class="svg-icon svg-icon-1 position-absolute ms-6">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
							<rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black"/>
							<path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black"/>
						</svg>
					</span>
                    <!--end::Svg Icon-->
                    <input type="text" data-kt-thematics-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search"/>
                </div>
                <!--end::Search-->
            </div>
            <!--begin::Card title-->
            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt-subscription-table-toolbar="base">
                    <!--begin::Filter-->
                <!--end::Export-->
                    <!--begin::Add Thematic-->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_thematic">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                        <span class="svg-icon svg-icon-2">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
								<rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black"/>
								<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black"/>
							</svg>
						</span>
                        <!--end::Svg Icon-->Add Thematic
                    </button>
                    <!--end::Add Thematic-->
                </div>
                <!--end::Toolbar-->
            </div>
            <!--end::Card toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-0">
            <!--begin::Table-->
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_thematics_table">
                <!--begin::Table head-->
                <thead>
                <!--begin::Table row-->
                <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                    <th>ID</th>
                    <th>Name</th>
                    {{--<th>Country scope</th>--}}
                    <th>Status</th>
                    <th>Starting date</th>
                    <th>Ending date</th>
                    <th class="min-w-70px">Actions</th>
                </tr>
                <!--end::Table row-->
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody class="text-gray-600 fw-bold">
                @foreach($thematics as $thematic)
                    <tr>
                        <td>{{ $thematic->id }}</td>
                        <td>{{ $thematic->name }}</td>
                        {{--<td>
                            @foreach($thematic->countries as $country)
                                <div class="badge badge-light-info">
                                    <img src="{{asset('assets/media/flags/'.str_replace(' ','-',$country->countryName).'.svg')}}" class="me-4 w-15px" style="border-radius: 4px" alt="">{{ $country->countryName}}
                                </div>
                            @endforeach
                        </td>--}}
                        <td>
                            @if($thematic->status == 1)
                                <div class="badge badge-light-success">Active</div>
                            @else
                                <div class="badge badge-light-danger">Disabled</div>
                            @endif
                        </td>
                        <td>{{ $thematic->start_date }}</td>
                        <td>{{ $thematic->end_date }}</td>
                        <!--begin::Action=-->
                        <td>
                            <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                <span class="svg-icon svg-icon-5 m-0">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
										<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black"/>
									</svg>
								</span>
                            </a>
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3 edit_row" data-id="{{ $thematic->id }}">Edit</a>
                                </div>
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3 delete_row" data-id="{{ $thematic->id }}">Delete</a>
                                </div>
                            </div>
                        </td>
                        <!--end::Action=-->
                    </tr>
                @endforeach
                </tbody>
                <!--end::Table body-->
            </table>
            <!--end::Table-->
        </div>
        <!--end::Card body-->
    </div>
    <div class="modal fade" tabindex="-1" id="kt_modal_add_thematic" data-bs-backdrop="static" data-bs-keyboard="false" >
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Form-->
                <form class="form" action="#" id="kt_modal_add_thematic_form" data-kt-redirect="../../demo9/dist/apps/customers/list.html">
                    <!--begin::Modal header-->
                    <div class="modal-header" id="kt_modal_add_thematic_header">
                        <!--begin::Modal title-->
                        <h2 class="fw-bolder">Add new thematic</h2>
                        <!--end::Modal title-->
                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                            <span class="svg-icon svg-icon-1">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black"/>
									<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black"/>
								</svg>
							</span>
                            <!--end::Svg Icon-->
                        </div>
                        <!--end::Close-->
                    </div>
                    <!--end::Modal header-->
                    <!--begin::Modal body-->
                    <div class="modal-body py-10 px-lg-17">
                        <!--begin::Scroll-->
                        <div class="scroll-y me-n7 pe-7" id="kt_modal_add_thematic_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_thematic_header" data-kt-scroll-wrappers="#kt_modal_add_thematic_scroll" data-kt-scroll-offset="300px">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fs-6 fw-bold mb-2">Name</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" class="form-control form-control-solid" placeholder="" name="name" required/>
                                <!--end::Input-->
                            </div>
                            {{--<div class="d-flex flex-column mb-7 fv-row">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold mb-2">
                                    <span class="required">Countries</span>
                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Country of origination"></i>
                                </label>
                                <!--end::Label-->
                                <select name="country" aria-label="Select a Countries" data-placeholder="Select a Countries..." data-dropdown-parent="#kt_modal_add_thematic" class="form-select form-select-solid fw-bolder" multiple="multiple">
                                    <option value="">Select a Country...</option>
                                    @foreach(\App\Helper\Countries::getCountries() as $key => $country)
                                        <option value="{{ $key}}">{{ $country}}</option>
                                    @endforeach
                                </select>
                            </div>--}}
                            <!--end::Input group-->
                            <div class="row g-9 mb-7">
                                <!--begin::Col-->
                                <div class="col-md-6 fv-row fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="required fs-6 fw-bold mb-2">Starting date</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input class="form-control form-control-solid dateStart" name="startDate" required autocomplete="off">
                                    <!--end::Input-->
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-md-6 fv-row fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold mb-2">Ending date</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input class="form-control form-control-solid dateEnd" name="endDate" autocomplete="off">
                                    <!--end::Input-->
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--begin::Input group-->

                            <!--end::Input group-->
                        </div>
                        <!--end::Scroll-->
                    </div>
                    <!--end::Modal body-->
                    <!--begin::Modal footer-->
                    <div class="modal-footer flex-center">
                        <!--begin::Button-->
                        <button type="reset" id="kt_modal_add_thematic_cancel" data-bs-dismiss="modal" class="btn btn-light me-3">
                            Cancel
                        </button>
                        <button type="submit" id="kt_modal_add_thematic_submit" class="btn btn-primary">
                            <span class="indicator-label">Save</span>
                            <span class="indicator-progress">Please wait...
								<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                        <!--end::Button-->
                    </div>
                    <!--end::Modal footer-->
                </form>
                <!--end::Form-->
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" id="kt_modal_edit_thematic" data-bs-backdrop="static" data-bs-keyboard="false">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Form-->
                <form class="form" action="#" id="kt_modal_edit_thematic_form">
                    <!--begin::Modal header-->
                    <div class="modal-header" id="kt_modal_edit_thematic_header">
                        <!--begin::Modal title-->
                        <h2 class="fw-bolder">Edit thematic</h2>
                        <!--end::Modal title-->
                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                            <span class="svg-icon svg-icon-1">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black"/>
									<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black"/>
								</svg>
							</span>
                            <!--end::Svg Icon-->
                        </div>
                        <!--end::Close-->
                    </div>
                    <!--end::Modal header-->
                    <!--begin::Modal body-->
                    <div class="modal-body py-10 px-lg-17">
                        <!--begin::Scroll-->
                        <div class="scroll-y me-n7 pe-7" id="kt_modal_add_thematic_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_thematic_header" data-kt-scroll-wrappers="#kt_modal_add_thematic_scroll" data-kt-scroll-offset="300px">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fs-6 fw-bold mb-2">Name</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" class="form-control form-control-solid" placeholder="" name="name"/>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            {{--<div class="d-flex flex-column mb-7 fv-row">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold mb-2">
                                    <span class="required">Countries</span>
                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Country of origination"></i>
                                </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <select name="country" aria-label="Select a Country" data-control="select2" data-placeholder="Select a Country..." data-dropdown-parent="#kt_modal_edit_thematic" class="form-select form-select-solid fw-bolder" multiple="multiple">
                                    <option value="">Select a Country...</option>
                                    @foreach(\App\Helper\Countries::getCountries() as $key => $country)
                                        <option value="{{ $key}}">{{ $country}}</option>
                                    @endforeach
                                </select>
                                <!--end::Input-->
                            </div>--}}

                            <div class="row g-9 mb-7">
                                <!--begin::Col-->
                                <div class="col-md-6 fv-row fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="required fs-6 fw-bold mb-2">Starting date</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input class="form-control form-control-solid dateStart" name="startDate">
                                    <!--end::Input-->
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-md-6 fv-row fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold mb-2">Ending date</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input class="form-control form-control-solid dateEnd" name="endDate">
                                    <!--end::Input-->
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--begin::Input group-->
                            <!--end::Input group-->
                        </div>
                        <!--end::Scroll-->
                    </div>
                    <!--end::Modal body-->
                    <!--begin::Modal footer-->
                    <div class="modal-footer flex-center">
                        <!--begin::Button-->
                        <button type="reset" id="kt_modal_edit_thematic_cancel" data-bs-dismiss="modal" class="btn btn-light me-3">
                            Cancel
                        </button>
                        <!--end::Button-->
                        <!--begin::Button-->
                        <button type="submit" id="kt_modal_edit_thematic_submit" class="btn btn-primary">
                            <span class="indicator-label">Save Changes</span>
                            <span class="indicator-progress">Please wait...
								<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                        <!--end::Button-->
                    </div>
                    <!--end::Modal footer-->
                </form>
                <!--end::Form-->
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
    <script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
    <script>
        let tr;
        let id;
        let table = $("#kt_thematics_table").DataTable();
        $('[data-kt-thematics-filter="search"]').on('keyup', function (e) {
            table.search($(this).val()).draw();
        });
        $('[data-kt-thematics-table-filter="filter"]').click(function () {
            table.search('<div class="badge badge-light-success">Active</div>').draw();
        });
        let validator = FormValidation.formValidation(
            $('#kt_modal_add_thematic_form')[0],
            {
                fields: {
                    'name': {
                        validators: {
                            notEmpty: {
                                message: 'Name is required'
                            }
                        }
                    }, 'startDate': {
                        validators: {
                            notEmpty: {
                                message: 'Start date is required'
                            }
                        }
                    }, 'country': {
                        validators: {
                            notEmpty: {
                                message: 'Countries is required'
                            }
                        }
                    },
                },

                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
                    })
                }
            }
        );
        let validator1 = FormValidation.formValidation(
            $('#kt_modal_edit_thematic_form')[0],
            {
                fields: {
                    'name': {
                        validators: {
                            notEmpty: {
                                message: 'Name is required'
                            }
                        }
                    }, 'startDate': {
                        validators: {
                            notEmpty: {
                                message: 'Start date is required'
                            }
                        }
                    }, 'country': {
                        validators: {
                            notEmpty: {
                                message: 'Countries is required'
                            }
                        }
                    },
                },

                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
                    })
                }
            }
        );
        let Utils = $.fn.select2.amd.require('select2/utils');
        let Dropdown = $.fn.select2.amd.require('select2/dropdown');
        let DropdownSearch = $.fn.select2.amd.require('select2/dropdown/search');
        let CloseOnSelect = $.fn.select2.amd.require('select2/dropdown/closeOnSelect');
        let AttachBody = $.fn.select2.amd.require('select2/dropdown/attachBody');

        let dropdownAdapter = Utils.Decorate(Utils.Decorate(Utils.Decorate(Dropdown, DropdownSearch), CloseOnSelect), AttachBody);

        $('select[name="country"]').select2({
            dropdownAdapter: dropdownAdapter,
            multiple: true
        });

        $(".dateStart").daterangepicker({
            autoUpdateInput: false,
            singleDatePicker: true,
                showDropdowns: true,
                autoApply: true,
                minYear: 2020,
                locale: {
                    format: 'YYYY-MM-DD'
                }
            }
        ).on("apply.daterangepicker", function (e, picker) {
            picker.element.val(picker.startDate.format(picker.locale.format));
        });

        $(".dateEnd").daterangepicker({
            autoUpdateInput: false,
            singleDatePicker: true,
                showDropdowns: true,
                autoApply: true,
                minYear: 2020,
                locale: {
                    format: 'YYYY-MM-DD'
                }
            }
        ).on("apply.daterangepicker", function (e, picker) {
            picker.element.val(picker.startDate.format(picker.locale.format));
        });

        $('#kt_modal_add_thematic_form').on('submit', function (e) {
            e.preventDefault();
            if (validator) {
                validator.validate().then(function (status) {
                    if (status == 'Valid') {
                        $('.indicator-progress').show();
                        $('.indicator-label').hide();
                        $.ajax({
                            method: 'POST',
                            url: '{{ route('admin.thematics.store') }}',
                            dataType: 'JSON',
                            data: {
                                name: $('#kt_modal_add_thematic_form input[name="name"]').val(),
                                end_date: $('#kt_modal_add_thematic_form .dateEnd').val(),
                                start_date: $('#kt_modal_add_thematic_form .dateStart').val(),
                                status: 1,
/*
                                countries: $('#kt_modal_add_thematic_form select[name="country"]').val(),
*/
                                _token: '{{ csrf_token() }}'
                            },
                            success: function (data) {
                                $('.indicator-progress').hide();
                                $('.indicator-label').show();
                                if (data.success) {
                                    Swal.fire({
                                        text: "Thematic successfully created",
                                        icon: "success",
                                        showConfirmButton: false,
                                        timer: 1500
                                    });
                                    table.row.add([data.thematic.id, data.thematic.name, '<div class="badge badge-light-success">Active</div>', data.thematic.start_date, data.thematic.end_date, '<a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions\n' +
                                    '                                <span class="svg-icon svg-icon-5 m-0">\n' +
                                    '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">\n' +
                                    '<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black"/>\n' +
                                    '</svg>\n' +
                                    '</span>\n' +
                                    '                            </a>\n' +
                                    '                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">\n' +
                                    '                                <div class="menu-item px-3">' +
                                    '                                   <a href="#" class="menu-link px-3 edit_row" data-id="' + data.thematic.id + '">Edit</a>' +
                                    '                               </div>\n' +
                                    '                                <div class="menu-item px-3">\n' +
                                    '                                    <a href="#" class="menu-link px-3 delete_row" data-id="' + data.thematic.id + '">Delete</a>\n' +
                                    '                                </div>\n' +
                                    '                            </div>']).draw();
                                    KTMenu.createInstances();
                                    $('#kt_modal_add_thematic_cancel').click();
                                } else {
                                    Swal.fire({
                                        text: "Something went wrong ! please try later.",
                                        icon: "error",
                                        customClass: {
                                            confirmButton: "btn btn-primary"
                                        }
                                    });
                                }
                            }
                            ,error:function () {
                                $('.indicator-progress').hide();
                                $('.indicator-label').show();
                                Swal.fire({
                                    text: "Something went wrong ! please try later.",
                                    icon: "error",
                                    customClass: {
                                        confirmButton: "btn btn-primary"
                                    }
                                });
                            }
                        })
                    }
                })
            }
        });
        $('#kt_modal_add_thematic').on('show.bs.modal', function (e) {
            $('#kt_modal_add_thematic_form').trigger('reset');
            $('#kt_modal_add_thematic_form select').change();
        });
        $(document).on('click', '.delete_row', function () {
            let tr = $(this).parents('tr');
            let id = $(this).data('id');
            Swal.fire({
                icon: 'warning',
                title: 'Your really want to delete this thematic ?',
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
                        method: 'DELETE',
                        url: '{{ route('admin.thematics.destroy') }}',
                        dataType: 'JSON',
                        data: {
                            id: id,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function (data) {
                            if (data.success) {
                                Swal.fire({
                                    text: "Thematic successfully Removed",
                                    icon: "success",
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                table.row(tr).remove().draw();
                            } else {
                                Swal.fire({
                                    text: "Something went wrong ! please try later.",
                                    icon: "error",
                                    customClass: {
                                        confirmButton: "btn btn-primary"
                                    }
                                });
                            }
                        }
                    })
                }
            })
        });
        $(document).on('click', '.edit_row', function () {
            tr = $(this).parents('tr');
            id = $(this).data('id');
            $.ajax({
                method: 'POST',
                url: '{{ route('admin.thematics.show') }}',
                dataType: 'JSON',
                data: {
                    id: id,
                    _token: '{{ csrf_token() }}'
                },
                success: function (data) {
                    if (data.success) {
                        $('#kt_modal_edit_thematic_form input[name="name"]').val(data.thematic.name);
                        $('#kt_modal_edit_thematic_form .dateEnd').val(data.thematic.end_date);
                        $('#kt_modal_edit_thematic_form .dateStart').val(data.thematic.start_date);
/*
                        $('#kt_modal_edit_thematic_form select[name="country"] option:selected').attr('selected', false);
*/
                       /* $.each(data.thematic.countries, function () {
                            $('#kt_modal_edit_thematic_form select[name="country"] option[value="' + this.country + '"]').prop('selected', true);
                        });
                        $('#kt_modal_edit_thematic_form select[name="country"]').change();*/
                        $('#kt_modal_edit_thematic').modal('show');
                    }
                }
            });
        });
        $('#kt_modal_edit_thematic_form').on('submit', function (e) {
            e.preventDefault();
            if (validator1) {
                validator1.validate().then(function (status) {
                    if (status == 'Valid') {
                        $('.indicator-progress').show();
                        $('.indicator-label').hide();
                        $.ajax({
                            method: 'POST',
                            url: '{{ route('admin.thematics.update') }}',
                            dataType: 'JSON',
                            data: {
                                name: $('#kt_modal_edit_thematic_form input[name="name"]').val(),
                                end_date: $('#kt_modal_edit_thematic_form .dateEnd').val(),
                                start_date: $('#kt_modal_edit_thematic_form .dateStart').val(),
                                status: 1,
/*
                                countries: $('#kt_modal_edit_thematic_form select[name="country"]').val().length > 0 ? $('#kt_modal_edit_thematic_form select[name="country"]').val() : [],
*/
                                id: id,
                                _token: '{{ csrf_token() }}'
                            },
                            success: function (data) {
                                $('.indicator-progress').hide();
                                $('.indicator-label').show();
                                if (data.success) {
                                    Swal.fire({
                                        text: "Thematic successfully updated",
                                        icon: "success",
                                        showConfirmButton: false,
                                        timer: 1500
                                    });
                                    let DTdata = table.row(tr).data();
                                    DTdata[1] = data.thematic.name;
                                    DTdata[4] = data.thematic.start_date;
                                    DTdata[5] = data.thematic.end_date;
                                    DTdata[2] = data.thematic.countries.map((O, K) => '<div class="badge badge-light-info"><img src="http://127.0.0.1:8000/assets/media/flags/' + O.countryName + '.svg" class="me-4 w-15px" style="border-radius: 4px" alt="">' + O.countryName + '</div>').join("");
                                    table.row(tr).data(DTdata).draw();
                                    KTMenu.createInstances();
                                    $('#kt_modal_edit_thematic_cancel').click();

                                } else {
                                    Swal.fire({
                                        text: "Something went wrong ! please try later.",
                                        icon: "error",
                                        customClass: {
                                            confirmButton: "btn btn-primary"
                                        }
                                    });
                                }
                                $('#kt_modal_edit_thematic_cancel').click();
                            }
                        })
                    }
                })
            }
        })
    </script>
@endsection
