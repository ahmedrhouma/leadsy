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
        return view('administration.thematics', ['thematics' => $thematics]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), ['name' => 'required', 'end_date' => 'required', 'start_date' => 'required'], $messages = [
            'required' => 'The :attribute field is required.',
        ]);
        if ($validator->fails()) {
            return Response()->json(['success' => false]);
        }
        $thematic = Thematics::create($request->all());
        if ($thematic) {
            foreach ($request->countries as $country) {
                $thematic->countries()->create(['country' => $country, 'status' => 1]);
            }
            $thematic = $thematic->load('countries');
            return Response()->json(['success' => true, 'thematic' => $thematic]);
        }
        return Response()->json(['success' => false]);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), ['id' => 'required|exists:Thematics,id', 'name' => 'required', 'end_date' => 'required', 'start_date' => 'required'], $messages = [
            'required' => 'The :attribute field is required.',
        ]);
        if ($validator->fails()) {
            return Response()->json(['success' => false]);
        }
        $thematic = Thematics::find($request->id);
        if ($thematic) {
            $thematic->update($request->all());
            $thematic->countries()->delete();
            if (isset($request->countries)) {
                foreach ($request->countries as $country) {
                    $thematic->countries()->create(['country' => $country, 'status' => 1]);
                }
            }
            $thematic = $thematic->load('countries');
            return Response()->json(['success' => true, 'thematic' => $thematic]);
        }
        return Response()->json(['success' => false]);
    }

    public function show(Request $request)
    {
        $thematic = Thematics::find($request->id);
        if ($thematic) {
            return Response()->json(['success' => true, 'thematic' => $thematic->load('countries')]);
        }
        return Response()->json(['success' => false]);
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