<?php

namespace App\Http\Controllers;

use App\Models\CampaignPublisher;
use App\Models\Campaigns;
use App\Models\NegotiationMessage;
use App\Models\Negotiations;
use App\Models\Publishers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NegotiationsController extends Controller
{
    public function index()
    {
        $options = [];
        if (auth()->user()->profile == 1) {
            $options['negotiations'] = Campaigns::with(['advertiser', 'negotiations' => function ($q) {
                $q->withCount(['unreadMessages' => function ($q) {
                    $q->whereHas('sender', function ($q) {
                        $q->whereNotIn('profile', [User::ADMIN_PROFILE]);
                    });
                }]);
            }])->orderBy('created_at', 'DESC')->get();
            $options['negotiations']->map(function ($counts) {
                return $counts->total_unread = $counts->negotiations->pluck('unread_messages_count')->sum();
            });
            $options['publishers'] = Publishers::with(['user'])->get();
        } elseif (auth()->user()->profile == 2) {
            $options['negotiations'] = Negotiations::with(['advertiser', 'campaign', 'lastMessage'])->withCount(['unreadMessages' => function ($q) {
                return $q->where('receiver_id', auth()->user()->id);
            }])->orderBy('start_date', 'DESC')->get();
        } elseif (auth()->user()->profile == 3) {
            $options['negotiations'] = Negotiations::with('publisher', 'campaign', 'lastMessage')->withCount(['unreadMessages' => function ($q) {
                return $q->where('receiver_id', auth()->user()->id);
            }])->orderBy('start_date', 'DESC')->get();
        }
        return view(auth()->user()->getAccountName() . '.negotiations', $options);
    }

    public function show(Request $request)
    {
        $negotiation = Negotiations::where(['part_type' => $request->part_type, 'part' => $request->part, 'campaign_id' => $request->campaign_id])->with('messages')->get();
        return Response()->json([
            'success' => true,
            'data' => $negotiation
        ]);
    }

    public function messages(Request $request)
    {
        $negotiationMessages = NegotiationMessage::where('negotiation_id', $request->id)->orderByDesc('message_sent')->with('sender')->get();
        return Response()->json([
            'success' => true,
            'data' => $negotiationMessages
        ]);
    }

    public function invite(Request $request)
    {
        $publishers = [];
        foreach ($request->publishers as $publisherId) {
            if ($publisher = Publishers::find($publisherId)) {
                $negotiation = Negotiations::updateOrCreate(['campaign_id' => $request->campaign_id, 'part_type' => Negotiations::PART_TYPE_PUBLISHER, 'part_id' => $publisherId], ['campaign_id' => $request->campaign_id, 'part_type' => Negotiations::PART_TYPE_PUBLISHER, 'part_id' => $publisherId, 'status' => 0, 'start_date' => date('Y-m-d')]);
                if ($negotiation->wasRecentlyCreated) {
                    $publishers[] = ['publisher_id' => $publisher->id,'user_id' => $publisher->user->id,'publisher_avatar' => $publisher->user->photo,'publisher_name' => $publisher->name,'publisher_type' => trans_choice('admin/negotiations.publisher',1), 'negotiation_id' => $negotiation->id];
                }
            }
        }
        return Response()->json([
            'success' => true,
            'data' => $publishers
        ]);
    }


    public function prices(Request $request)
    {
        $validator = Validator::make($request->all(), ['campaign_id' => 'required|exists:campaigns,id', 'selling_price' => 'nullable', 'buying_price' => 'nullable', 'negotiation_id' => 'nullable'], $messages = [
            'required' => 'The :attribute field is required.',
        ]);
        if ($validator->fails()) {
            return Response()->json(['success' => false]);
        }
        $campaign = Campaigns::find($request->campaign_id);
        $campaign->update([
            'selling_price' => $request->selling_price
        ]);
        foreach ($request->buying_price as $buying_price) {
            CampaignPublisher::updateOrCreate(['campaign_id' => $request->campaign_id, 'publisher_id' => $buying_price['id']], ['buying_price' => $buying_price['value'], 'campaign_id' => $request->campaign_id, 'publisher_id' => $buying_price['id'], 'status' => 1, 'start_date' => date('Y-m-d h:i:s')]);
        }
        return Response()->json([
            'success' => true
        ]);
    }
}
