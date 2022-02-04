<?php

namespace App\Http\Controllers;

use App\Models\campaigns;
use App\Models\Cost_types;
use App\Models\Leads_types;
use App\Models\Thematics;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CampaignsController extends Controller
{
    public function index()
    {
        switch (auth()->user()->profile) {
            case 1:
                $campaigns = campaigns::with(['publishers', 'advertisers', 'thematics', 'leadsTypes', 'costsTypes'])->get();
                return view('administration.campaigns', ['campaigns' => $campaigns]);
                break;
            case 2:
                $thematics = Thematics::all();
                $costs_type = Cost_types::all();
                $leads_type = Leads_types::all();
                $campaigns = campaigns::with(['thematics', 'leadsTypes', 'costsTypes'])->get();
                return view('advertiser.campaigns', ['campaigns' => $campaigns,'thematics' => $thematics, 'costs_types' => $costs_type, 'leads_types' => $leads_type]);
                break;
            case 3:
                $campaigns = campaigns::with(['thematics', 'leadsTypes', 'costsTypes'])->get();
                return view('publisher.campaigns', ['campaigns' => $campaigns]);
                break;
        }

    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), ['name' => 'required'], $messages = [
            'required' => 'The :attribute field is required.',
        ]);
        if ($validator->fails()) {
            return Response()->json(['success' => false]);
        }
        $advertiser = campaigns::create(['name' => $request->name, 'status' => 1]);
        if ($advertiser) {
            return Response()->json(['success' => true, 'advertiser' => $advertiser]);
        }
        return Response()->json(['success' => false]);
    }
}
