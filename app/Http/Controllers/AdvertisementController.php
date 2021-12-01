<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdvertisementController extends Controller
{
    //
    public function index()
    {
        $ads = Advertisement::where('user_id', Auth::user()->id)->get();
        return view('index', ['ads' => $ads]);
    }
}
