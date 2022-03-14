<?php

namespace App\Http\Controllers;

use App\Helper\Countries;
use App\Models\CampaignsLeads;
use App\Models\Rejections;
use App\Models\SaleStatuses;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class LeadsController extends Controller
{
    public function index()
    {

        return view(\auth()->user()->getAccountName() . '.leads', ['salesStatus' => SaleStatuses::all(), 'rejections' => Rejections::all()]);
    }

    public function updateStatus(Request $request)
    {
        $lead = CampaignsLeads::find($request->id_lead);
        $status = SaleStatuses::find($request->id_status);
        if (!$lead || !$status) {
            return Response()->json(['success' => false]);
        }
        $lead->update(['sale_status_id' => $status->id]);
        if ($lead->wasChanged()) {
            return Response()->json(['success' => true]);
        }
        return Response()->json(['success' => false]);
    }

    public function updateRejection(Request $request)
    {
        $lead = CampaignsLeads::find($request->id_lead);
        $reject = Rejections::find($request->id_reject);
        if (!$lead || !$reject) {
            return Response()->json(['success' => false]);
        }
        $lead->update(['rejection_id' => $reject->id]);
        if ($lead->wasChanged()) {
            return Response()->json(['success' => true]);
        }
        return Response()->json(['success' => false]);
    }

    public function addComment(Request $request)
    {
        $comment = $this->addNote('lead', $request->id, $request->text);
        if ($comment) {
            return Response()->json(['success' => true]);
        }
        return Response()->json(['success' => false]);
    }

    public function saleComments(Request $request)
    {
        $comments = $this->getNotes('lead', $request->id);
        return Response()->json($comments);
    }

    public function indexList(Request $request)
    {
        if (auth()->user()->profile == 1) {
            $data = CampaignsLeads::with(['campaign', 'lead', 'saleStatus', 'rejection'])->get();
        } elseif (auth()->user()->profile == 2) {
            $data = CampaignsLeads::with(['campaign', 'lead', 'saleStatus', 'rejection'])->whereHas('campaign', function ($q) {
                $q->where('advertiser_id', '=', \auth()->user()->account->id);
            })->get();
        } elseif (auth()->user()->profile == 3) {
            $data = CampaignsLeads::with(['campaign', 'lead', 'saleStatus', 'rejection'])->whereHas('lead', function ($q) {
                $q->where('publisher_id', '=', \auth()->user()->account->id);
            })->get();
        }
        return Datatables::of($data)
            ->addColumn('id_lead', function ($row) {
                return $row->lead->id;
            })
            ->addColumn('first_name', function ($row) {
                return $row->lead->first_name;
            })->addColumn('last_name', function ($row) {
                return $row->lead->last_name;
            })->addColumn('publisher_id', function ($row) {
                return $row->lead->publisher_id;
            })->addColumn('advertiser_id', function ($row) {
                return $row->campaign->advertiser_id;
            })->addColumn('phone_number', function ($row) {
                return $row->lead->phone_number;
            })->addColumn('email', function ($row) {
                return $row->lead->email;
            })->addColumn('subscription_date', function ($row) {
                return $row->lead->subscription_date;
            })->addColumn('advertiser_id', function ($row) {
                return $row->campaign->advertiser_id;
            })
            ->addColumn('sale_income', function ($row) {
                return  $row->sale_status_id ==1? $row->campaign->selling_price:'';
            })
            ->addColumn('sending_date', function ($row) {
                return $row->sending_date;
            })
            ->addColumn('sale_status', function ($row) {
                return $row->saleStatus != null ? $row->saleStatus->name : '';
            })
            ->addColumn('rejection', function ($row) {
                return $row->rejection != null ? $row->rejection->name : '';
            })
            ->addColumn('campaign_id', function ($row) {
                return $row->campaign->id;
            })
            ->addColumn('campaign_name', function ($row) {
                return $row->campaign->name;
            })
            ->addColumn('web_page_name', function ($row) {
                return '';
            })->addColumn('country', function ($row) {
                //return Countries::getCountry(strtoupper($row->lead->country));
                return '';
            })->addColumn('web_page_url', function ($row) {
                return '';
            })->addColumn('sale_status_comment', function ($row) {
                return $this->getNotes('lead', $row->lead->id)->count();
            })
            ->make(true);
    }
}
