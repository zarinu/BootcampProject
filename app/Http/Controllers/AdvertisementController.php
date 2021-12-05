<?php

namespace App\Http\Controllers;

use App\Models\{Advertisement, Category, User};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdvertisementController extends Controller
{
    //
    public function index()
    {
        // $userwiht = User::has('sdkfj')->get;
        // dd($userwiht);
        $ads = Advertisement::where('user_id', Auth::user()->id)->paginate(5);
        return view('index', compact('ads'));
    }
    public function show($adID)
    {
        $ade = Advertisement::where('user_id', Auth::user()->id)->where('id', $adID)->get();
        //check if this $ade does not exist
        if(empty($ade->toArray())) dd("fuck it empty");
        return view('show')->with(['ade' => $ade[0]]);
    }
    public function create() {
        $categories = Category::all();
        return view('create')->with(['categories' => $categories]);
    }
}
