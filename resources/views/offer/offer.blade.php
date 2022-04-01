<div class="col-lg-4 col-xxl-3 offer" data-name="{{$offer->name}}">
    <div class="card h-100">
        <div class="card-header border-0 pt-9">
            <div class="card-title m-0">
                <div class="d-flex align-items-center">
                    <div class="symbol symbol-45px w-45px bg-light me-5">
                        <span class="symbol-label fs-6 fw-bolder text-primary">{{$offer->id}}</span>
                    </div>
                    <div class="ms-5">
                        <a href="#" class="fs-4 fw-bold text-hover-primary text-gray-600 m-0">{{$offer->name}}</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body p-9">
            <div class="fs-2tx fw-bolder text-center">{{ $offer->leads_vmax }}</div>
            <div class="mb-3 text-center">
                <small class="text-muted">@lang('publisher/offers.leads_offer')</small>
            </div>
            <div class="row mb-5">
                <div class="align-items-center d-flex border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
                    <div class="fw-bold text-gray-500 me-4">@choice('publisher/offers.cost_type',1)</div>
                    <div class="badge badge-light text-black fw-bolder m-1">{{$offer->costsTypes->name}}</div>
                </div>
                <div class="align-items-center d-flex border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
                    <div class="fw-bold text-gray-500 me-4">@choice('publisher/offers.lead_type',1)</div>
                    <div class="badge badge-light text-black fw-bolder m-1">{{$offer->leadsTypes->name}}</div>
                </div>
                <div class="align-items-center d-flex border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
                    <div class="fw-bold text-gray-500 me-4">@choice('publisher/offers.thematic',1)</div>
                    <div class="badge badge-light text-black fw-bolder m-1">{{$offer->thematics->name}}</div>
                </div>
                <div class="align-items-center d-flex border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
                    <div class="fw-bold text-gray-500 me-4">@choice('publisher/offers.country',2)</div>
                    <div class="fs-6 text-gray-800 fw-bolder">
                        @foreach($offer->countries_details as $country)
                            <div class="badge badge-light fw-bolder m-1 text-black">
                                <img src="{{asset('assets/media/flags/'.str_replace(' ','-',$country['name']).'.svg')}}"
                                     class="me-4 w-15px" style="border-radius: 4px" alt="">{{ $country['name'] }}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="text-center">
                <button type="button" class="btn btn-sm btn-light-danger delete" data-id="{{$offer->id}}">@choice('actions.delete',1)</button>
            </div>
        </div>
    </div>
</div>
