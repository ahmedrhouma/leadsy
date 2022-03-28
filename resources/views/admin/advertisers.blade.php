@extends('layouts.layout')
@section('pageTitle')
    @lang('admin/advertisers.page_title')
@endsection
@section('pageDescription')
@endsection
@section('css')
    <style>
        .ellipsis {
            white-space: nowrap;
            overflow: hidden !important;
            text-overflow: ellipsis;
            display: inline-block;
            width: 250px;
        }
    </style>
@endsection
@section('content')
    <div class="card">
        <div class="card-header border-0 pt-6">
            <div class="card-title">
                <div class="d-flex align-items-center position-relative my-1">
                    <span class="svg-icon svg-icon-1 position-absolute ms-6">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
							<rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black"/>
							<path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black"/>
						</svg>
					</span>
                    <input type="text" data-kt-advertisers-table-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search"/>
                </div>
            </div>
            <div class="card-toolbar">
                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                {{--<button type="button" class="btn btn-light-primary me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_export_users">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr078.svg-->
                    <span class="svg-icon svg-icon-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.3" x="12.75" y="4.25" width="12" height="2" rx="1" transform="rotate(90 12.75 4.25)" fill="black"/>
                            <path d="M12.0573 6.11875L13.5203 7.87435C13.9121 8.34457 14.6232 8.37683 15.056 7.94401C15.4457 7.5543 15.4641 6.92836 15.0979 6.51643L12.4974 3.59084C12.0996 3.14332 11.4004 3.14332 11.0026 3.59084L8.40206 6.51643C8.0359 6.92836 8.0543 7.5543 8.44401 7.94401C8.87683 8.37683 9.58785 8.34458 9.9797 7.87435L11.4427 6.11875C11.6026 5.92684 11.8974 5.92684 12.0573 6.11875Z" fill="black"/>
                            <path d="M18.75 8.25H17.75C17.1977 8.25 16.75 8.69772 16.75 9.25C16.75 9.80228 17.1977 10.25 17.75 10.25C18.3023 10.25 18.75 10.6977 18.75 11.25V18.25C18.75 18.8023 18.3023 19.25 17.75 19.25H5.75C5.19772 19.25 4.75 18.8023 4.75 18.25V11.25C4.75 10.6977 5.19771 10.25 5.75 10.25C6.30229 10.25 6.75 9.80228 6.75 9.25C6.75 8.69772 6.30229 8.25 5.75 8.25H4.75C3.64543 8.25 2.75 9.14543 2.75 10.25V19.25C2.75 20.3546 3.64543 21.25 4.75 21.25H18.75C19.8546 21.25 20.75 20.3546 20.75 19.25V10.25C20.75 9.14543 19.8546 8.25 18.75 8.25Z" fill="#C4C4C4"/>
                        </svg>
                    </span>
                    Export
                </button>--}}
                <!--end::Export-->
                    <!--begin::Add Advertiser-->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_advertiser">
                        <span class="svg-icon svg-icon-2">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
								<rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black"/>
								<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black"/>
							</svg>
						</span>
                        @lang('admin/advertisers.add_advertiser')
                    </button>
                </div>
                <div class="d-flex justify-content-end align-items-center d-none" data-kt-user-table-toolbar="selected">
                    <div class="fw-bolder me-5">
                        <span class="me-2" data-kt-user-table-select="selected_count"></span>Selected
                    </div>
                    <button type="button" class="btn btn-danger" data-kt-user-table-select="delete_selected">Delete
                        Selected
                    </button>
                </div>
                <div class="modal fade" id="kt_modal_export_users" tabindex="-1" aria-hidden="true">
                    <!--begin::Modal dialog-->
                    <div class="modal-dialog modal-dialog-centered mw-650px">
                        <!--begin::Modal content-->
                        <div class="modal-content">
                            <!--begin::Modal header-->
                            <div class="modal-header">
                                <!--begin::Modal title-->
                                <h2 class="fw-bolder">Export Users</h2>
                                <!--end::Modal title-->
                                <!--begin::Close-->
                                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
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
                            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                <!--begin::Form-->
                                <form id="kt_modal_export_users_form" class="form" action="#">
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-10">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-bold form-label mb-2">Select Roles:</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <select name="role" data-control="select2" data-placeholder="Select a role" data-hide-search="true" class="form-select form-select-solid fw-bolder">
                                            <option></option>
                                            <option value="Administrator">Administrator</option>
                                            <option value="Analyst">Analyst</option>
                                            <option value="Developer">Developer</option>
                                            <option value="Support">Support</option>
                                            <option value="Trial">Trial</option>
                                        </select>
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-10">
                                        <!--begin::Label-->
                                        <label class="required fs-6 fw-bold form-label mb-2">Select Export
                                            Format:</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <select name="format" data-control="select2" data-placeholder="Select a format" data-hide-search="true" class="form-select form-select-solid fw-bolder">
                                            <option></option>
                                            <option value="excel">Excel</option>
                                            <option value="pdf">PDF</option>
                                            <option value="cvs">CVS</option>
                                            <option value="zip">ZIP</option>
                                        </select>
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Actions-->
                                    <div class="text-center">
                                        <button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">
                                            Cancel
                                        </button>
                                        <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                                            <span class="indicator-label">Save</span>
                                            <span class="indicator-progress">Please wait...
												<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                    </div>
                                    <!--end::Actions-->
                                </form>
                                <!--end::Form-->
                            </div>
                            <!--end::Modal body-->
                        </div>
                        <!--end::Modal content-->
                    </div>
                    <!--end::Modal dialog-->
                </div>
            </div>
        </div>
        <div class="card-body pt-0">
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_advertisers">
                <thead>
                <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                    <th class="min-w-125px">@lang('admin/advertisers.id')</th>
                    <th class="min-w-125px">@lang('admin/advertisers.name')</th>
                    <th class="mw-250px">@choice('admin/advertisers.thematic',2)</th>
                    <th class="mw-250px">@choice('admin/advertisers.country_scope',1)</th>
                    <th class="min-w-125px">@lang('admin/advertisers.creation_date')</th>
                    <th class="text-end min-w-100px">@choice('admin/advertisers.action',2)</th>
                </tr>
                </thead>
                <tbody class="text-gray-600 fw-bold">
                @foreach($advertisers as $advertiser)
                    <tr data-email="{{$advertiser->user->email}}">
                        <td>{{ $advertiser->id }}</td>
                        <td>{{ $advertiser->name }}</td>
                        <td >
                            <div class="ellipsis">
                            @if($advertiser->campaigns->count() != 0)
                                @foreach(array_unique($advertiser->campaigns->each->thematics->pluck('name')->toArray()) as $thematic)
                                    <div class="badge badge-light">{{ $thematic }}</div>
                                @endforeach
                            @endif
                            </div>

                        </td>
                        <td>
                            <div class="ellipsis">
                                @if($advertiser->campaigns->count() != 0)
                                    @foreach(array_unique(array_merge(...$advertiser->campaigns->pluck('countriesName'))) as $country)
                                        <div class="badge badge-light">
                                            <img src="{{asset('assets/media/flags/'.str_replace(' ','-',$country).'.svg')}}" class="me-4 w-15px" style="border-radius: 4px" alt="">{{ $country }}
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </td>
                        <td>{{ $advertiser->created_at }}</td>
                        <td class="text-end">
                            <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                <span class="svg-icon svg-icon-5 m-0">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
										<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black"/>
									</svg>
								</span>
                            </a>
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3 edit_row" data-id="{{ $advertiser->id }}">@choice('actions.edit',1)</a>
                                </div>
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3 credentials" data-email="{{ $advertiser->user->email }}" data-password="{{ str_replace(' ','',$advertiser->name).'@'.$advertiser->id }}">@lang('admin/publishers.credentials')</a>
                                </div>

                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3 delete_row" data-id="{{ $advertiser->id }}">@choice('actions.delete',1)</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" id="kt_modal_add_advertiser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header" id="kt_modal_add_user_header">
                    <!--begin::Modal title-->
                    <h2 class="fw-bolder">@lang('admin/advertisers.add_advertiser')</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close" data-bs-dismiss="modal">
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
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <!--begin::Form-->
                    <form id="kt_modal_add_advertiser_form" class="form" action="#">
                        <!--begin::Scroll-->
                        <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">@lang('admin/advertisers.full_name')</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Full name"/>
                                <!--end::Input-->
                            </div>
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">@lang('admin/advertisers.email')</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="email" name="email" class="form-control form-control-solid mb-3 mb-lg-0"/>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->

                        </div>
                        <!--end::Scroll-->
                        <!--begin::Actions-->
                        <div class="text-center pt-15">
                            <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal" data-kt-users-modal-action="cancel">
                                @lang('actions.cancel')
                            </button>
                            <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                                <span class="indicator-label">@lang('actions.save')</span>
                                <span class="indicator-progress">Please wait...
												<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>
    <div class="modal fade" id="kt_modal_edit_advertiser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header" id="kt_modal_edit_user_header">
                    <!--begin::Modal title-->
                    <h2 class="fw-bolder">@lang('admin/advertisers.edit_advertiser')</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close" data-bs-dismiss="modal">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black"/>
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black"/>
                            </svg>
                        </span>
                    </div>
                </div>
                <!--end::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <!--begin::Form-->
                    <form id="kt_modal_edit_advertiser_form" class="form" action="#">
                        <!--begin::Scroll-->
                        <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">@lang('admin/advertisers.full_name')</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Full name"/>
                                <!--end::Input-->
                            </div>
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">@lang('admin/advertisers.email')</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="email" name="email" class="form-control form-control-solid mb-3 mb-lg-0"/>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Scroll-->
                        <!--begin::Actions-->
                        <div class="text-center pt-15">
                            <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal" data-kt-advertises-modal-action="cancel">
                                @lang('actions.cancel')
                            </button>
                            <button type="submit" class="btn btn-primary" data-kt-advertises-modal-action="submit">
                                <span class="indicator-label">@lang('actions.save_changes')</span>
                                <span class="indicator-progress">Please wait...
												<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>
    <div class="modal fade" id="kt_modal_credentials_advertiser" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <div class="modal-header" id="kt_modal_edit_user_header">
                    <h2 class="fw-bolder">@lang('admin/advertisers.default_credentials')</h2>
                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close" data-bs-dismiss="modal">
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black"/>
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black"/>
                            </svg>
                        </span>
                    </div>
                </div>
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <div class="credentials_body"></div>
                </div>
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
        var table = $("#kt_table_advertisers").DataTable({
            "language": {
                "zeroRecords": '@lang('datatables.zeroRecords')',
                "info": '@lang('datatables.info')',
                "infoEmpty": '@lang('datatables.infoEmpty')',
            }
        });
        $('[data-kt-advertisers-table-filter="search"]').on('keyup', function (e) {
            table.search($(this).val()).draw();
        });
        $(document).on('click', '.delete_row', function () {
            let tr = $(this).parents('tr');
            let id = $(this).data('id');
            Swal.fire({
                icon: 'warning',
                title: '{{ trans('alert.validation_message',['action' => trans_choice('actions.delete',1),'attribute'=>trans_choice('admin/advertisers.advertiser',1)])}} ',
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
                        url: '{{ route('admin.advertisers.destroy') }}',
                        dataType: 'JSON',
                        data: {
                            id: id,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function (data) {
                            if (data.success) {
                                Swal.fire({
                                    text: "{{ trans('alert.success_action',['action' => trans_choice('actions.delete',2),'attribute'=>trans_choice('admin/advertisers.advertiser',1)])}}",
                                    icon: "success",
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                table.row(tr).remove().draw();
                            } else {
                                Swal.fire({
                                    text: "@lang('alert.error_general_text')",
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
            id = $(this).data('id');
            tr = $(this).parents('tr');
            let data = table.row($(this).parents('tr')).data();
            $('#kt_modal_edit_advertiser_form input[name="name"]').val(data[1]);
            $('#kt_modal_edit_advertiser_form input[name="email"]').val(tr.data('email'));
            $('#kt_modal_edit_advertiser').modal('show');
        });
        $(document).on('click', '.credentials', function () {
            $('.credentials_body').html('Login : ' + $(this).data('email') + '<br> Pass : ' + $(this).data('password'));
            $('#kt_modal_credentials_advertiser').modal('show');
        });
        $('#kt_modal_add_advertiser_form').on('submit', function (e) {
            e.preventDefault();
            $('.indicator-progress').show();
            $('.indicator-label').hide();
            $.ajax({
                method: 'POST',
                url: '{{ route('admin.advertisers.store') }}',
                dataType: 'JSON',
                data: {
                    name: $('#kt_modal_add_advertiser_form input[name="name"]').val(),
                    email: $('#kt_modal_add_advertiser_form input[name="email"]').val(),
                    _token: '{{ csrf_token() }}'
                },
                success: function (data) {
                    $('.indicator-progress').hide();
                    $('.indicator-label').show();
                    if (data.success) {
                        Swal.fire({
                            text: "{{ trans('alert.success_action',['action' => trans_choice('actions.create',2),'attribute'=>trans_choice('admin/advertisers.advertiser',1)])}}",
                            icon: "success",
                            showConfirmButton: false,
                            timer: 1500
                        });
                        table.row.add([data.advertiser.id, data.advertiser.name, '', '', 'Now', '<a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions\n' +
                        '                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->\n' +
                        '                                <span class="svg-icon svg-icon-5 m-0">\n' +
                        '\t\t\t\t\t\t\t\t\t<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">\n' +
                        '\t\t\t\t\t\t\t\t\t\t<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black"/>\n' +
                        '\t\t\t\t\t\t\t\t\t</svg>\n' +
                        '\t\t\t\t\t\t\t\t</span>\n' +
                        '                                <!--end::Svg Icon--></a>\n' +
                        '                            <!--begin::Menu-->\n' +
                        '                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">\n' +
                        '                                <!--begin::Menu item-->\n' +
                        '                                <div class="menu-item px-3">\n' +
                        '                                    <a href="#" class="menu-link px-3 edit_row" data-id="' + data.advertiser.id + '">Edit</a>\n' +
                        '                                </div>\n' +
                        '                                <div class="menu-item px-3">' +
                        '                                   <a href="#" class="menu-link px-3 credentials" data-email="' + data.advertiser.user.email + '" data-password="' + data.advertiser.name.replace(" ", "") + '@' + data.advertiser.id + '">Credentials</a>' +
                        '                               </div>\n' +
                        '                                <div class="menu-item px-3">\n' +
                        '                                    <a href="#" class="menu-link px-3 delete_row" data-id="' + data.advertiser.id + '">Delete</a>\n' +
                        '                                </div>\n' +
                        '                                <!--end::Menu item-->\n' +
                        '                            </div>']).draw();
                        $('#kt_modal_add_advertiser_form button[data-bs-dismiss="modal"]').click();
                        KTMenu.createInstances();
                    } else {
                        Swal.fire({
                            text: "@lang('alert.error_general_text')",
                            icon: "error",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        });
                    }
                }
            })
        });
        $('#kt_modal_edit_advertiser_form').on('submit', function (e) {
            e.preventDefault();
            $('.indicator-progress').show();
            $('.indicator-label').hide();
            $.ajax({
                method: 'POST',
                url: '{{ route('admin.advertisers.update') }}',
                dataType: 'JSON',
                data: {
                    id: id,
                    name: $('#kt_modal_edit_advertiser_form input[name="name"]').val(),
                    email: $('#kt_modal_edit_advertiser_form input[name="email"]').val(),
                    _token: '{{ csrf_token() }}'
                },
                success: function (data) {
                    $('.indicator-progress').hide();
                    $('.indicator-label').show();
                    if (data.success) {
                        Swal.fire({
                            text: "{{ trans('alert.success_action',['action' => trans_choice('actions.update',2),'attribute'=>trans_choice('admin/advertisers.advertiser',1)])}}",
                            icon: "success",
                            showConfirmButton: false,
                            timer: 1500
                        });
                        $(tr.find('td')[1]).text(data.advertiser.name);
                        $('#kt_modal_edit_advertiser_form button[data-bs-dismiss="modal"]').click();
                    } else {
                        Swal.fire({
                            text: "@lang('alert.error_general_text')",
                            icon: "error",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        });
                    }
                }
            })
        });
    </script>
@endsection
