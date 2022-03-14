<?php

namespace App\Http\Controllers;

use App\Models\CampaignPublisher;
use App\Models\Campaigns;
use App\Models\CampaignsLeads;
use App\Models\Leads;
use App\Models\Publishers_thematics;
use Cassandra\Session;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class DashboardController extends Controller
{
    public function index()
    {
        $options = [
            'leads'=>0,
            'campaigns'=>0,
            'countries'=>0
        ];
        switch (auth()->user()->profile) {
            case 2:
                $campaigns = Campaigns::with('leads')->where('advertiser_id',auth()->user()->account->id)->withCount(['leads'])->get();
                $options['leads'] =  $campaigns->sum('leads_count');
                $options['campaigns'] = $campaigns->count();
                $options['countries'] = count(array_unique(array_merge(...$campaigns->pluck('countriesName'))));
                break;
            case 3:
                $options['leads'] = Leads::where('publisher_id',auth()->user()->account->id)->get()->count();
                $options['campaigns'] = CampaignPublisher::where('publisher_id',auth()->user()->account->id)->get()->count();
                $options['countries'] = Publishers_thematics::where('publisher_id',auth()->user()->account->id)->get()->count();
                break;
            default:
                break;
        }
        return view(auth()->user()->getAccountName().'.dashboard',$options);
    }

}
