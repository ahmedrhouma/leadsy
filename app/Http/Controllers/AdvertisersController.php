<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdvertisersController extends Controller
{
    public function index()
    {
        return view('administration.advertisers');
    }
}
