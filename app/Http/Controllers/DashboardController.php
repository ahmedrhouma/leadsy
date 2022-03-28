<?php

namespace App\Http\Controllers;

use App\Models\Advertisers;
use App\Models\CampaignPublisher;
use App\Models\Campaigns;
use App\Models\CampaignsLeads;
use App\Models\Leads;
use App\Models\Negotiations;
use App\Models\Publishers;
use App\Models\Publishers_thematics;
use Illuminate\Database\Eloquent\Builder;

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
            case 1:
                $options['advertisers_count'] = Advertisers::all()->count();
                $options['publishers_count'] = Publishers::all()->count();
                $options['campaigns_count'] = Campaigns::where('status',1)->count();
                $options['negotiations'] = Negotiations::where('status',1)->count();
                $options['saleLeads'] = CampaignsLeads::where('sale_status_id',1)->count();
                $options['allLeads'] = CampaignsLeads::all()->count();
                $options['opportunities'] = Campaigns::whereDoesntHave('publishers')->count();
                $options['countriesCount'] = Leads::all()->groupBy('country')->count();
                $options['leads'] = Leads::all()->count();
                $options['leadsByCountry'] = Leads::all()->groupBy('country')->map(fn($leads, $cnt)=> ['country'=>$cnt,'count'=>$leads->count()]);
                $options['publishers'] = Publishers::withCount('leads')->orderBy('leads_count','DESC')->take(5)->get();
                $options['campaigns'] = Campaigns::where('status',1)->withCount('leads')->orderBy('leads_count','DESC')->take(10)->get();
                break;
            case 2:
                $options['campaigns_count'] = auth()->user()->account->campaigns()->where('status',1)->count();
                $options['negotiations'] = auth()->user()->account->negotiations()->where('status',1)->count();
                $options['saleLeads'] = CampaignsLeads::where('sale_status_id',1)->count();
                $options['allLeads'] = CampaignsLeads::all()->count();
                $options['leadsByCountry'] = Leads::with('campaigns')->whereHas('campaigns',function (Builder $query) {
                    $query->where('advertiser_id', '=', auth()->user()->account->id);
                })->get()->groupBy('country')->map(fn($leads, $cnt)=> ['country'=>$cnt,'count'=>$leads->count()]);
                $options['countriesCount'] = Leads::with('campaigns')->whereHas('campaigns',function (Builder $query) {
                    $query->where('advertiser_id', '=', auth()->user()->account->id);
                })->get()->groupBy('country')->count();
                $options['campaigns'] =  auth()->user()->account->campaigns()->where('status',1)->withCount('leads')->orderBy('leads_count','DESC')->take(10)->get();
                $campaigns = Campaigns::with('leads')->where('advertiser_id',auth()->user()->account->id)->withCount(['leads'])->get();
                $options['leads'] =  $campaigns->sum('leads_count');
                $options['countries'] = count(array_unique(array_merge(...$campaigns->pluck('countriesName'))));
                break;
            case 3:
                $options['campaigns_count'] = auth()->user()->account->campaigns()->get()->where('status',1)->count();
                $options['negotiations'] = auth()->user()->account->negotiations()->get()->where('status',1)->count();
                $options['saleLeads'] = CampaignsLeads::with('lead')->whereHas('lead',function (Builder $query){
                    $query->where('publisher_id', '=', auth()->user()->account->id);
                })->where('sale_status_id',1)->count();
                $options['allLeads'] =  Leads::where('publisher_id', '=', auth()->user()->account->id)->count();
                $options['leadsByCountry'] = Leads::where('publisher_id', '=', auth()->user()->account->id)->get()->groupBy('country')->map(fn($leads, $cnt)=> ['country'=>$cnt,'count'=>$leads->count()]);
                $options['countriesCount'] = Leads::where('publisher_id', '=', auth()->user()->account->id)->get()->groupBy('country')->count();
                $options['campaigns'] =  auth()->user()->account->campaigns()->withCount('leads')->orderBy('leads_count','DESC')->get()->where('status',1)->take(10);
                $campaigns = Campaigns::with('leads')->where('advertiser_id',auth()->user()->account->id)->withCount(['leads'])->get();
                $options['leads'] =  $campaigns->sum('leads_count');
                $options['countries'] = count(array_unique(array_merge(...$campaigns->pluck('countriesName'))));
                $options['leads'] = Leads::where('publisher_id',auth()->user()->account->id)->get()->count();
                /*$options['campaigns'] = CampaignPublisher::where('publisher_id',auth()->user()->account->id)->get()->count();*/
                $options['countries'] = Publishers_thematics::where('publisher_id',auth()->user()->account->id)->get()->count();
                break;
            default:
                break;
        }
        return view(auth()->user()->getAccountName().'.dashboard',$options);
    }

}
