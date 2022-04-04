<?php

namespace App\Http\Controllers;

use App\Models\Cost_types;
use App\Models\Leads_types;
use App\Models\Publishers;
use App\Models\Publishers_cost_types;
use App\Models\Publishers_leads_types;
use App\Models\Publishers_thematics;
use App\Models\Thematics;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PublishersController extends Controller
{
    public function index()
    {
        $publishers = Publishers::with('thematics', 'thematics.leadsTypes', 'thematics.costsTypes', 'user')->get();
        $thematics = Thematics::all();
        $costs_type = Cost_types::all();
        $leads_type = Leads_types::all();
        return view('admin.publishers', ['publishers' => $publishers, 'thematics' => $thematics, 'costs_types' => $costs_type, 'leads_types' => $leads_type]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), ['name' => 'required', 'thematics' => 'required'], $messages = [
            'required' => 'The :attribute field is required.',
        ]);
        if ($validator->fails()) {
            return Response()->json(['success' => false]);
        }
        $publisher = Publishers::create(['name' => $request->name, 'status' => 1]);
        if ($publisher) {
             $user = User::create([
                'username' => $request->name,
                'email' => $request->email,
                'profile' => 3,
                'account_id' => $publisher->id,
                'role' => 0,
                'status' => 1,
                'password' => Hash::make(str_replace(' ', '', $request->name) . '@' . $publisher->id),
            ]);
            foreach ($request->thematics as $thematic) {
                foreach ($thematic['thematics'] as $thematicID){
                    if ($thematicID != null) {
                        Publishers_thematics::create(['countries' => $thematic['countries'], 'status' => 1, 'unit_price' => $thematic['amount'] != "" ? $thematic['amount'] : NULL, 'sale_percentage' => $thematic['sale_percentage']??NULL, 'publisher_id' => $publisher->id, 'thematic_id' => $thematicID]);
                        Publishers_leads_types::create(['status' => 1, 'publisher_id' => $publisher->id, 'thematic_id' => $thematicID, 'lead_type_id' => $thematic['leads_types']]);
                        Publishers_cost_types::create(['status' => 1, 'publisher_id' => $publisher->id, 'thematic_id' => $thematicID, 'cost_type_id' => $thematic['cost_types']]);
                    }
                }
            }
            $publisher = $publisher->load('thematics', 'leadsTypes', 'costsTypes', 'user');
            return Response()->json(['success' => true, 'publisher' => $publisher]);
        }
        return Response()->json(['success' => false]);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), ['id' => 'required|exists:publishers,id', 'name' => 'required', 'thematics' => 'required'], $messages = [
            'required' => 'The :attribute field is required.',
        ]);
        if ($validator->fails()) {
            return Response()->json(['success' => false]);
        }
        $publisher = Publishers::find($request->id);
        if ($publisher) {
            $publisher->load('user');
            $publisher->update(['name' => $request->name]);
            $publisher->user->update(['email' => $request->email]);
            $publisher->thematics()->detach();
            $publisher->leadsTypes()->detach();
            $publisher->costsTypes()->detach();
            foreach ($request->thematics as $thematic) {
                foreach ($thematic['thematics'] as $thematicID){
                    if ($thematicID != null) {
                        Publishers_thematics::create(['countries' => $thematic['countries'], 'status' => 1, 'unit_price' => $thematic['amount'] != "" ? $thematic['amount'] : NULL, 'sale_percentage' => $thematic['sale_percentage']??NULL, 'publisher_id' => $publisher->id, 'thematic_id' => $thematicID]);
                        Publishers_leads_types::create(['status' => 1, 'publisher_id' => $publisher->id, 'thematic_id' => $thematicID, 'lead_type_id' => $thematic['leads_types']]);
                        Publishers_cost_types::create(['status' => 1, 'publisher_id' => $publisher->id, 'thematic_id' => $thematicID, 'cost_type_id' => $thematic['cost_types']]);
                    }
                }
            }
            $publisher = $publisher->load('thematics', 'leadsTypes', 'costsTypes');
            return Response()->json(['success' => true, 'publisher' => $publisher]);
        }
        return Response()->json(['success' => false]);
    }

    public function sources(Request $request)
    {
        $publisher = Publishers::find($request->id);
        if ($publisher) {
            $publisher->load('landings');
            return Response()->json(['success' => true, 'landings' => $publisher->landings]);
        }
        return Response()->json(['success' => false]);
    }

    public function show(Request $request)
    {
        $publisher = Publishers::find($request->id);
        if ($publisher) {
            return Response()->json(['success' => true, 'publisher' => $publisher->load(['thematics',
            'thematics.leadsTypes'=>function($q) use($publisher){
                return $q->where('publisher_id',$publisher->id);
            },
            'thematics.costsTypes'=>function($q)use($publisher){
                return $q->where('publisher_id',$publisher->id);
            }, 'user'])]);
        }
        return Response()->json(['success' => false]);
    }

    public function destroy(Request $request)
    {
        $publisher = Publishers::find($request->id);
        if ($publisher->delete()) {
            return Response()->json(['success' => true]);
        }
        return Response()->json(['success' => false]);
    }
}
