<?php

namespace App\Http\Controllers;

use App\Helper\Countries;
use App\Models\CampaignPublisher;
use App\Models\campaigns;
use App\Models\CampaignsLeads;
use App\Models\Cost_types;
use App\Models\Leads;
use App\Models\Leads_types;
use App\Models\Publishers;
use App\Models\Thematics;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CampaignsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        switch (auth()->user()->profile) {
            case 1:
                $campaigns = campaigns::with(['publishers', 'advertisers', 'thematics', 'leadsTypes', 'costsTypes'])->get();
                return view('admin.campaigns', ['campaigns' => $campaigns,'publishers'=>Publishers::all(),'thematics' => Thematics::all(), 'costs_types' => Cost_types::all(), 'leads_types' => Leads_types::all()]);
                break;
            case 2:
                $thematics = Thematics::all();
                $costs_type = Cost_types::all();
                $leads_type = Leads_types::all();
                $campaigns = campaigns::where('status',1)->with(['thematics', 'leadsTypes', 'costsTypes'])->get();
                return view('advertiser.campaigns', ['campaigns' => $campaigns,'thematics' => $thematics, 'costs_types' => $costs_type, 'leads_types' => $leads_type]);
                break;
            case 3:
                $campaigns = campaigns::where('status',1)->with(['publishers','thematics', 'leadsTypes', 'costsTypes'])->whereHas('publishers', function ($q) {
                    $q->where('publisher_id', '=', \auth()->user()->account->id);
                })->get();
                return view('publisher.campaigns', ['campaigns' => $campaigns]);
                break;
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), ['name' => 'required'], $messages = [
            'required' => 'The :attribute field is required.',
        ]);
        if ($validator->fails()) {
            return Response()->json(['success' => false]);
        }
        $data = $request->all();
        $data['countries'] = json_encode($request['countries'] );
        $data['fee'] = env('DEFAULT_FEE');
        $data['fee_type'] = env('DEFAULT_FEE_TYPE');
        $data['status'] = 1;
        $data['advertiser_id'] = Auth::user()->account->id;
        $campaign = campaigns::create($data);
        if ($campaign) {
            return Response()->json(['success' => true, 'campaign' => $campaign->load(['thematics', 'leadsTypes', 'costsTypes'])]);
        }
        return Response()->json(['success' => false]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), ['id' => 'required|exists:Campaigns,id'], $messages = [
            'required' => 'The :attribute field is required.',
        ]);
        if ($validator->fails()) {
            return Response()->json(['success' => false]);
        }
        $campaign = campaigns::find($request->id);
        $request->countries =json_encode($request->countries);
        $campaign->update($request->all());
        if (auth()->user()->profile == 1){
            $campaignPublisher = CampaignPublisher::updateOrCreate(['publisher_id'=>$request->publisher_id,'campaign_id'=>$campaign->id],['buying_price'=>$request->buying_price,'status'=>1,'start_date'=>$campaign->start_date,'end_date'=>$campaign->end_date,'publisher_id'=>$request->publisher_id,'campaign_id'=>$campaign->id]);
            if ($campaignPublisher || $campaignPublisher->wasChanged()) {
                return Response()->json(['success' => true, 'campaign' => $campaign->load('publishers')]);
            }
        }
        if ($campaign->wasChanged()) {
            return Response()->json(['success' => true, 'campaign' => $campaign->load('publishers')]);
        }
        return Response()->json(['success' => false]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Request $request)
    {
        $campaign = campaigns::find($request->id);
        if ($campaign) {
            return Response()->json(['success' => true, 'campaign' => $campaign->load(['publishers', 'advertisers', 'thematics', 'leadsTypes', 'costsTypes'])]);
        }
        return Response()->json(['success' => false]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function offers()
    {
        $campaigns = campaigns::where('status',1)->with(['publishers','thematics', 'leadsTypes', 'costsTypes'])->whereHas('publishers', function ($q) {
            $q->where('publisher_id', '=', \auth()->user()->account->id);
        })->get();
        return view('publisher.offers', ['campaigns' => $campaigns]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function upload(Request $request)
    {
        $file = $request->file('file');
        while (($line = fgetcsv($file, 1000, ";")) !== FALSE) {
            $lead = Leads::create(['first_name'=>$line[0],'last_name'=>$line[1],'gender'=>$line[2],'email'=>$line[3],'phone_number'=>$line[4],'country'=>$line[5],'language'=>$line[6],'source'=>$line[7],'source_id'=>$line[8],'status'=>1,'subscription_date'=>date('y-m-d H:i')]);
            CampaignsLeads::create(['lead_id'=>$lead->id,'campaign_id'=>$request->id,'sending_date'=>date('y-m-d')]);
        }
    }
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request)
    {
        $campaign = campaigns::find($request->id);
        $campaign->update(['status'=>2]);
        if ($campaign->wasChanged()) {
            return Response()->json(['success' => true]);
        }
        return Response()->json(['success' => false]);
    }
}
