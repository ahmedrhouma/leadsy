@extends('layouts.layout')
@section('pageTitle')
    @lang('publisher/campaigns.page_title')
@endsection
@section('pageDescription')
    @lang('publisher/campaigns.page_title')
@endsection
@section('css')
    <style>
        .ellipsis {
            white-space: nowrap;
            overflow: hidden !important;
            text-overflow: ellipsis;
            display: inline-block;
            width: 100px;
        }
    </style>
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
                    <input type="text" data-kt-campaigns-table-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search"/>
                </div>
            </div>
            <div class="card-toolbar">
                <div class="d-flex justify-content-end" data-kt-subscription-table-toolbar="base">
                    <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                        <span class="svg-icon svg-icon-2">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
								<path d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z" fill="black"/>
							</svg>
						</span>
                        <!--end::Svg Icon-->@choice('datatables.column',2)
                    </button>
                    <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true" id="kt-toolbar-filter">
                        <!--begin::Header-->
                        <div class="px-7 py-5">
                            <div class="fs-4 text-dark fw-bolder">@choice('datatables.column',2)</div>
                        </div>
                        <div class="separator border-gray-200"></div>
                        <div class="px-7 py-5">
                            <div class="mb-10">
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input columnToggleBtn" type="checkbox" checked="ckeched" data-column="0"/>
                                        <span class="form-check-label text-gray-600">@lang('publisher/campaigns.id')</span>
                                    </label>
                                </div>
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input columnToggleBtn" type="checkbox" checked="ckeched" data-column="1"/>
                                        <span class="form-check-label text-gray-600">@lang('publisher/campaigns.name')</span>
                                    </label>
                                </div>
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input columnToggleBtn" type="checkbox" checked="ckeched" data-column="2"/>
                                        <span class="form-check-label text-gray-600">@lang('publisher/campaigns.creation_date')</span>
                                    </label>
                                </div>
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input columnToggleBtn" type="checkbox" checked="ckeched" data-column="3"/>
                                        <span class="form-check-label text-gray-600">@lang('publisher/campaigns.starting_date')</span>
                                    </label>
                                </div>
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input columnToggleBtn" type="checkbox" checked="ckeched" data-column="4"/>
                                        <span class="form-check-label text-gray-600">@lang('publisher/campaigns.ending_date')</span>
                                    </label>
                                </div>
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input columnToggleBtn" type="checkbox" checked="ckeched" data-column="5"/>
                                        <span class="form-check-label text-gray-600">@lang('publisher/campaigns.status')</span>
                                    </label>
                                </div>
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input columnToggleBtn" type="checkbox" checked="ckeched" data-column="6"/>
                                        <span class="form-check-label text-gray-600">@choice('publisher/campaigns.thematic',1)</span>
                                    </label>
                                </div>
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input columnToggleBtn" type="checkbox" checked="ckeched" data-column="7"/>
                                        <span class="form-check-label text-gray-600">@choice('publisher/campaigns.country_scope',1)</span>
                                    </label>
                                </div>
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input columnToggleBtn" type="checkbox" checked="ckeched" data-column="8"/>
                                        <span class="form-check-label text-gray-600">@choice('publisher/campaigns.lead_type',1)</span>
                                    </label>
                                </div>
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input columnToggleBtn" type="checkbox" checked="ckeched" data-column="9"/>
                                        <span class="form-check-label text-gray-600">@lang('publisher/campaigns.expected_leads_volume')</span>
                                    </label>
                                </div>
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input columnToggleBtn" type="checkbox" checked="ckeched" data-column="10"/>
                                        <span class="form-check-label text-gray-600">@choice('publisher/campaigns.cost_type',1)</span>
                                    </label>
                                </div>
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input columnToggleBtn" type="checkbox" checked="ckeched" data-column="11"/>
                                        <span class="form-check-label text-gray-600">@lang('publisher/campaigns.max_fixed_amount')</span>
                                    </label>
                                </div>
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input columnToggleBtn" type="checkbox" checked="ckeched" data-column="12"/>
                                        <span class="form-check-label text-gray-600">@choice('publisher/campaigns.unit_price',1)</span>
                                    </label>
                                </div>
                                <div class="d-flex flex-column flex-wrap fw-bold">
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input columnToggleBtn" type="checkbox" checked="ckeched" data-column="13"/>
                                        <span class="form-check-label text-gray-600">Actions</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Toolbar-->
            </div>
        </div>
        <div class="card-body pt-0">
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_campaigns_table">
                <thead>
                <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                    <th>@lang('publisher/campaigns.id')</th>
                    <th>@lang('publisher/campaigns.name')</th>
                    <th>@lang('publisher/campaigns.creation_date')</th>
                    <th>@lang('publisher/campaigns.starting_date')</th>
                    <th>@lang('publisher/campaigns.ending_date')</th>
                    <th>@lang('publisher/campaigns.status')</th>
                    <th>@choice('publisher/campaigns.thematic',1)</th>
                    <th>@choice('publisher/campaigns.country_scope',1)</th>
                    <th>@choice('publisher/campaigns.lead_type',1)</th>
                    <th>@lang('publisher/campaigns.expected_leads_volume')</th>
                    <th>@choice('publisher/campaigns.cost_type',1)</th>
                    <th>@choice('publisher/campaigns.unit_price',1)</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody class="text-gray-600 fw-bold">
                @foreach($campaigns as $campaign)
                    <tr>
                        <td>{{$campaign->id}}</td>
                        <td>{{$campaign->name}}</td>
                        <td>{{$campaign->created_at}}</td>
                        <td>{{$campaign->start_date}}</td>
                        <td>{{$campaign->end_date}}</td>
                        <td>
                            @if($campaign->status == 1)
                                <div class="badge badge-light-success">Active</div>
                            @else
                                <div class="badge badge-light-info">Disabled</div>
                            @endif
                        </td>
                        <td>
                            <div class="badge badge-light">{{$campaign->thematics->name}}</div>
                        </td>
                        <td>@foreach($campaign->countriesName as $country)
                                <div class="badge badge-light fw-bolder">
                                    <img src="{{asset('assets/media/flags/'.str_replace(' ','-',$country).'.svg')}}" class="me-4 w-15px" style="border-radius: 4px" alt="">{{ $country }}
                                </div>
                            @endforeach</td>
                        <td>
                            <div class="badge badge-light">{{$campaign->leadsTypes->name}}</div>
                        </td>
                        <td>{{$campaign->leads_vmax}}</td>
                        <td>{{$campaign->costsTypes->name}}</td>
                        <td>{{$campaign->selling_price}}</td>
                        <td class="text-end">
                            <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                <span class="svg-icon svg-icon-5 m-0">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
										<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black"/>
									</svg>
								</span>
                            </a>
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                                @if((intval($campaign->leads_vmax) - intval($campaign->leads_count)) > 0)
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3 upload" data-id="{{ $campaign->id }}">@lang('actions.upload')</a>
                                    </div>
                                @endif
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3 view" data-id="{{ $campaign->id }}">@lang('actions.view')</a>
                                </div>
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3 stop" data-id="{{ $campaign->id }}">@lang('actions.stop')</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" id="kt_modal_upload_leads" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <div class="modal-header" id="kt_modal_edit_user_header">
                    <h2 class="fw-bolder">@lang('publisher/campaigns.upload_leads')</h2>
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
                    <form id="kt_modal_upload_leads_form" class="form" action="#">
                        <div class="fv-row fv-plugins-icon-container">
                            <label class="required form-label">Source</label>
                            <select class="form-select mb-2" data-control="select2" data-placeholder="Select an option" name="source">
                                <option></option>
                                <option value="1">Landing Page</option>
                            </select>
                        </div>
                        <div class="fv-row fv-plugins-icon-container">
                            <label class="required form-label">@lang('publisher/campaigns.source_id')</label>
                            <select class="form-select mb-2" data-control="select2" data-placeholder="Select an option" name="source_id">
                                <option></option>
                                @foreach($landings as $landing)
                                    <option value="{{ $landing->id }}">{{ $landing->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="fv-row fv-plugins-icon-container">
                            <div class="dropzone" id="kt_dropzonejs_example_1">
                                <div class="dz-message needsclick">
                                    <i class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>
                                    <div class="ms-4">
                                        <h3 class="fs-5 fw-bolder text-gray-900 mb-1">@lang('publisher/campaigns.drop_file_title')</h3>
                                        <span class="fs-7 fw-bold text-gray-400">@lang('publisher/campaigns.drop_file_subtitle')</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center pt-15">
                            <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">@lang('actions.cancel')</button>
                            <button type="submit" class="btn btn-primary ">
                                <span class="indicator-label">@lang('actions.upload')</span>
                                <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="campaign_details_modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-body scroll-y campaign_details_body">

                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
    <script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
    <script>
        let id;
        let fileDT;
        let myDropzone = new Dropzone("#kt_dropzonejs_example_1", {
            url: "https://keenthemes.com/scripts/void.php",
            paramName: "file",
            maxFiles: 10,
            maxFilesize: 10,
            acceptedFiles: ".csv",
            addRemoveLinks: true,
            accept: function (file, done) {
                fileDT = file;
            }
        });
        $(document).ready(function () {

            var table = $("#kt_campaigns_table").DataTable({
                "pageLength": 5,
                lengthMenu: [[5, 10, 20], [5, 10, 20]],
                "language": {
                    "zeroRecords": '@lang('datatables.zeroRecords')',
                    "info": '@lang('datatables.info')',
                    "infoEmpty": '@lang('datatables.infoEmpty')',
                }
            });
            $(document).on('click', '.upload', function () {
                id = $(this).data('id');
                $('#kt_modal_upload_leads').modal('show');
            });
            $('#kt_modal_upload_leads_form').on('submit', function (e) {
                e.preventDefault();
                $('.indicator-progress').show();
                $('.indicator-label').hide();
                var form_data = new FormData();
                form_data.append('file', fileDT);
                form_data.append('id_campaign', id);
                form_data.append('source', $('#kt_modal_upload_leads_form select[name="source"]').val());
                form_data.append('source_id', $('#kt_modal_upload_leads_form select[name="source_id"]').val());
                form_data.append('_token', '{{ csrf_token() }}');
                $.ajax({
                    url: '{{ route('publisher.leads.upload') }}',
                    dataType: 'text',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,
                    type: 'POST',
                    dataType: 'JSON',
                    success: function (data) {
                        if (data.success) {
                            Swal.fire({
                                text: data.count + " lead successfully uploaded",
                                icon: "success",
                                showConfirmButton: false,
                                timer: 1500
                            });
                            $('.indicator-progress').hide();
                            $('.indicator-label').show();
                            $('#kt_modal_upload_leads button[data-bs-dismiss="modal"]').click();
                        }
                    }
                });
            });
            $('.columnToggleBtn').on('click', function (e) {
                var column = table.column($(this).attr('data-column'));
                column.visible($(this).is(':checked'));
                table.columns.adjust().draw();
            });
            $('[data-kt-campaigns-table-filter="search"]').on('keyup', function (e) {
                table.search($(this).val()).draw();
            });

        });
        $(document).on('click','.view',function () {
            $.ajax({
                url: route('publisher.campaigns.view'),
                method: 'POST',
                data: {
                    id: $(this).data('id'),
                    _token : '{{ csrf_token() }}'
                },
                success: function (data) {
                    $('.campaign_details_body').html(data);
                    $('#campaign_details_modal').modal('show');
                }
            });
        });
    </script>
@endsection
