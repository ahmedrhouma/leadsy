<?php

namespace App\Http\Controllers;

use App\Models\Advertisers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdvertisersController extends Controller
{
    public function index()
    {
        $advertisers = Advertisers::all();
        $advertisers->load(['campaigns','campaigns.thematics']);
        return view('admin.advertisers',['advertisers'=>$advertisers]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), ['name' => 'required'], $messages = [
            'required' => 'The :attribute field is required.',
        ]);
        if ($validator->fails()) {
            return Response()->json(['success' => false]);
        }
        $advertiser = Advertisers::create(['name' => $request->name, 'status' => 1]);
        if ($advertiser) {
            return Response()->json(['success' => true, 'advertiser' => $advertiser]);
        }
        return Response()->json(['success' => false]);
    }
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), ['id' => 'required|exists:Advertisers,id', 'name' => 'required'], $messages = [
            'required' => 'The :attribute field is required.',
        ]);
        if ($validator->fails()) {
            return Response()->json(['success' => false]);
        }
        $advertiser = Advertisers::find($request->id);
        if ($advertiser) {
            $advertiser->update(['name' => $request->name]);
            if ($advertiser->wasChanged()){
                return Response()->json(['success' => true, 'advertiser' => $advertiser]);
            }
        }
        return Response()->json(['success' => false]);
    }
    public function show(Request $request)
    {
        $advertiser = Advertisers::find($request->id);
        if ($advertiser) {
            return Response()->json(['success' => true, 'publisher' => $advertiser]);
        }
        return Response()->json(['success' => false]);
    }

    public function destroy(Request $request)
    {
        $advertiser = Advertisers::find($request->id);
        if ($advertiser->delete()) {
            return Response()->json(['success' => true]);
        }
        return Response()->json(['success' => false]);
    }
}
