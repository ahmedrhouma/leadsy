<div class="col-lg-4 col-xxl-3 offer" data-name="{{$offer->name}}">
    <div class="card h-100">
        <div class="card-body p-9">
            <div class="row mb-5">
                <div class="align-items-center d-flex border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
                    <div class="fw-bold text-gray-500 me-4">@choice('publisher/offers.thematic',1)</div>
                    <div class="badge badge-light text-black fw-bolder m-1">{{$offer->name}}</div>
                </div>
                <div class="align-items-center d-flex border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
                    <div class="fw-bold text-gray-500 me-4">@choice('publisher/offers.cost_type',1)</div>
                    <div class="badge badge-light text-black fw-bolder m-1">{{$offer->costsTypes->first()->name}}</div>
                </div>
                <div class="align-items-center d-flex border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
                    <div class="fw-bold text-gray-500 me-4">@choice('publisher/offers.lead_type',1)</div>
                    <div class="badge badge-light text-black fw-bolder m-1">{{$offer->leadsTypes->first()->name}}</div>
                </div>
                <div class="align-items-center d-flex border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
                    <div class="fw-bold text-gray-500 me-4">@choice('publisher/offers.country',2)</div>
                    <div class="fs-6 text-gray-800 fw-bolder">
                        @foreach(json_decode($offer->pivot->countries) as $country)
                            <div class="badge badge-light fw-bolder m-1 text-black">
                                <img src="{{asset('assets/media/flags/'.str_replace(' ','-',\App\Helper\Countries::getCountry($country)).'.svg')}}" class="me-4 w-15px" style="border-radius: 4px" alt="">{{ \App\Helper\Countries::getCountry($country) }}
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
