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
        $ads = Advertisement::where('user_id', Auth::user()->id)->paginate(5);
        return view('ads.index', compact('ads'));
    }
    public function show($adID)
    {
        $ad = Advertisement::find($adID);
        return view('ads.show', compact('ad'));
    }
}
