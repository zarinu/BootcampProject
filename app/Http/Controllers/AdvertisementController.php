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
    public function store(Request $request) {
        //validate kardan request ha badan anjam mishe haji
    
        //inja mikham logic konam
        $ade = new Advertisement();
        $ade->title = $request->title;
        $ade->desc = $request->desc;
        $ade->price = $request->price;
        $ade->adress = $request->adress;
        $ade->mobileNo = $request->phoneNo;
        $ade->user_id = Auth::user()->id;
        $ade->category_id = $request->category;

        if ($ade->save()) {
            return redirect('/ads/' . $ade->id);
        }

        return; // 422
    }
    public function edit($adID) {
        //inja bayad permission mojod and ejaze bedam
        $ade = Advertisement::find($adID);

        $categories = Category::all();
        return view('edit')->with(['categories' => $categories, 'ade' => $ade]);
    }
    public function update(Request $request, $adID) {
        //validate kardan request ha badan anjam mishe haji
    
        //inja mikham logic konam
        $ade = Advertisement::find($adID);
        $ade->title = $request->title;
        $ade->desc = $request->desc;
        $ade->price = $request->price;
        $ade->adress = $request->adress;
        $ade->mobileNo = $request->phoneNo;
        $ade->user_id = Auth::user()->id;
        $ade->category_id = $request->category;

        if ($ade->save()) {
            return redirect('/ads/' . $ade->id);
        }

        return; // 422
    }
}
