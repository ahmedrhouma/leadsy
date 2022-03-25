@extends('layouts.layout')
@section('pageTitle')
    Opportunities list
@endsection
@section('pageDescription')
    List of all opportunities
@endsection
@section('content')
    <div class="row g-6 g-xl-9">
        @foreach($campaigns as $campaign)
            <div class="col-lg-4 col-xxl-3">
                <div class="card h-100">
                    <div class="card-header border-0 pt-9">
                        <div class="card-title m-0">
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-45px w-45px bg-light me-5">
                                    <span class="symbol-label fs-6 fw-bolder text-primary">{{$campaign->id}}</span>
                                </div>
                                <div class="ms-5">
                                    <a href="#" class="fs-4 fw-bold text-hover-primary text-gray-600 m-0">{{$campaign->name}}</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body p-9">
                        <div class="fs-2tx fw-bolder text-center">{{ intval($campaign->leads_vmax) - intval($campaign->leads_count) }}</div>
                        <div class="mb-3 text-center">
                            <small class="text-muted">Leads requested</small>
                        </div>
                        <div class="row mb-5">
                            <div class="align-items-center d-flex border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
                                <div class="fw-bold text-gray-500 me-4">Cost Type</div>
                                <div class="badge badge-light text-black fw-bolder m-1">{{$campaign->costsTypes->name}}</div>
                            </div>
                            <div class="align-items-center d-flex border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
                                <div class="fw-bold text-gray-500 me-4">Lead type</div>
                                <div class="badge badge-light text-black fw-bolder m-1">{{$campaign->leadsTypes->name}}</div>
                            </div>
                            <div class="align-items-center d-flex border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
                                <div class="fw-bold text-gray-500 me-4">Thematic</div>
                                <div class="badge badge-light text-black fw-bolder m-1">{{$campaign->thematics->name}}</div>
                            </div>
                            <div class="align-items-center d-flex border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
                                <div class="fw-bold text-gray-500 me-4">Countries</div>
                                <div class="fs-6 text-gray-800 fw-bolder">
                                    @foreach($campaign->countriesName as $country)
                                        <div class="badge badge-light fw-bolder m-1 text-black">
                                            <img src="{{asset('assets/media/flags/'.str_replace(' ','-',$country).'.svg')}}" class="me-4 w-15px" style="border-radius: 4px" alt="">{{ $country }}
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="button" class="btn btn-sm btn-light-primary requestNegoiation" data-campaign="{{$campaign->id}}">Start negotiation</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
@endsection

@section('javascript')
    <script>
        $('.requestNegoiation').click(function () {
            let btn = $(this);
            $.ajax({
               url : '{{ route('publisher.opportunities.request') }}',
               method : 'POST',
               dataType : 'JSON',
               data : {
                   _token : '{{ csrf_token() }}',
                   campaign_id : $(this).data('campaign')
               },
                success: function (data) {
                    if(data.success){
                        Swal.fire({
                            icon : 'success',
                            title : 'negotiation start',
                            footer: '<a href="{{ route('publisher.negotiations') }}?negotiation='+data.data.id+'">Go to negotiation page</a>'
                        })
                        btn.remove();
                    }
                }
            });
        })
    </script>
@endsection
