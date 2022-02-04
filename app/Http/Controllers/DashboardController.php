<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        switch (auth()->user()->profile) {
            case 1:
                return view('administration.dashboard');
                break;
            case 2:
                return view('advertiser.dashboard');
                break;
            case 3:
                return view('publisher.dashboard');
                break;
        }
    }
}
