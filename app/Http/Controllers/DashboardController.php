<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        return view(auth()->user()->getAccountName().'.dashboard');
    }
}
