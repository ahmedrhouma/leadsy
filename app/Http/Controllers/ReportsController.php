<?php

namespace App\Http\Controllers;

use App\Models\CampaignPublisher;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ReportsController extends Controller
{
    public function reports()
    {
        return view(auth()->user()->getAccountName() . '.reports');
    }

    public function advertisersReports(Request $request)
    {
        $campaigns = CampaignPublisher::with(['campaign', 'leads.lead']);
        if ($request->start_date != '' && $request->end_date != '') {
            $campaigns->whereBetween('created_at', [$request->start_date, $request->end_date]);
        }
        if (auth()->user()->profile == 3) {
            $campaigns->where('publisher_id','=',auth()->user()->account->id);
        }
        return DataTables::of($campaigns)
            ->addColumn('quantity', function ($row) {
                return $row->leads->filter(function ($campaignLead) use ($row) {
                    return $campaignLead->lead->publisher_id == $row->publisher_id && $campaignLead->sale_status_id == 1;
                })->count();
            })
            ->addColumn('total_amount', function ($row) {
                return $row->leads->filter(function ($campaignLead) use ($row) {
                        return $campaignLead->lead->publisher_id == $row->publisher_id && $campaignLead->sale_status_id == 1;
                    })->count() * $row->campaign->selling_price;
            })
            ->addColumn('rejection', function ($row) {
                return $row->leads->filter(function ($campaignLead) use ($row) {
                    return $campaignLead->lead->publisher_id == $row->publisher_id && $campaignLead->rejection_id != NULL;
                })->count();
            })
            ->addColumn('sale_date', function ($row) {
                return $row->leads->filter(function ($campaignLead) use ($row) {
                    return $campaignLead->lead->publisher_id == $row->publisher_id && $campaignLead->rejection_id != NULL;
                })->count();
            })
            ->make(true);
    }

    public function publishersReports(Request $request)
    {
        $campaigns = CampaignPublisher::with(['campaign', 'leads.lead']);
        if ($request->start_date != '' && $request->end_date != '') {
            $campaigns->whereBetween('created_at', [$request->start_date, $request->end_date]);
        }
        if (auth()->user()->profile == 2) {
            $campaigns->whereHas('campaign', function($query) {
                $query->where('advertiser_id', auth()->user()->account->id);
            });
        }
        return DataTables::of($campaigns)
            ->addColumn('quantity', function ($row) {
                return $row->leads->filter(function ($campaignLead) use ($row) {
                    return $campaignLead->lead->publisher_id == $row->publisher_id && $campaignLead->sale_status_id == 1;
                })->count();
            })
            ->addColumn('total_amount', function ($row) {
                return $row->leads->filter(function ($campaignLead) use ($row) {
                        return $campaignLead->lead->publisher_id == $row->publisher_id && $campaignLead->sale_status_id == 1;
                    })->count() * $row->buying_price;
            })
            ->addColumn('rejection', function ($row) {
                return $row->leads->whereNotNull('rejection_id')->count();
            })
            ->make(true);
    }
    public function banPublisher(Request $request)
    {

    }
}
