<?php

namespace App\Http\Controllers;

use App\Models\Thematics;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ThematicsController extends Controller
{
    public function index()
    {
        $thematics = Thematics::with('countries')->get();
        return view('admin.thematics', ['thematics' => $thematics]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), ['name' => 'required', 'start_date' => 'required'], $messages = [
            'required' => 'The :attribute field is required.',
        ]);
        if ($validator->fails()) {
            return Response()->json(['success' => false]);
        }
        $thematic = Thematics::create($request->all());
        if ($thematic) {
            /*foreach ($request->countries as $country) {
                $thematic->countries()->create(['country' => $country, 'status' => 1]);
            }
            $thematic = $thematic->load('countries');*/
            return Response()->json(['success' => true, 'thematic' => $thematic]);
        }
        return Response()->json(['success' => false]);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), ['id' => 'required|exists:thematics,id', 'name' => 'required', 'start_date' => 'required'], $messages = [
            'required' => 'The :attribute field is required.',
        ]);
        if ($validator->fails()) {
            return Response()->json(['success' => false]);
        }
        $thematic = Thematics::find($request->id);
        if ($thematic) {
            $thematic->update($request->all());
            /*$thematic->countries()->delete();
            if (isset($request->countries)) {
                foreach ($request->countries as $country) {
                    $thematic->countries()->create(['country' => $country, 'status' => 1]);
                }
            }
            $thematic = $thematic->load('countries');*/
            return Response()->json(['success' => true, 'thematic' => $thematic]);
        }
        return Response()->json(['success' => false]);
    }

    public function show(Request $request)
    {
        $thematic = Thematics::find($request->id);
        if ($thematic) {
            return Response()->json(['success' => true, 'thematic' => $thematic]);
        }
        return Response()->json(['success' => false]);
    }

    public function countries(Request $request)
    {
        $countries = [];
        $thematic = Thematics::find($request->thematics);
        $thematic->load('countries');
        foreach ($thematic->countries as $country) {
            $countries[$country->country] = $country->countryName;
        }
        return Response()->json(['success' => true, 'countries' => $countries]);
    }

    public function destroy(Request $request)
    {
        $thematic = Thematics::find($request->id);
        if ($thematic->delete()) {
            return Response()->json(['success' => true]);
        }
        return Response()->json(['success' => false]);
    }
}
