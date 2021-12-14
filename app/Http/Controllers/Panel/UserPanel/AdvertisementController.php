<?php

namespace App\Http\Controllers\Panel\UserPanel;

use App\Http\Requests\AdeStoreRequest;
use App\Models\{Advertisement, Category, User, Comment};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AdvertisementController extends Controller
{
    //
    public function index()
    {
        $categories = Category::all();
        $ads = Advertisement::where('user_id', Auth::user()->id)->paginate(8);
        return view('userAds.index', compact('ads', 'categories'));
    }
    public function show($adID)
    {
        $ade = Advertisement::where('user_id', Auth::user()->id)->where('id', $adID)->get();
        //check if this $ade does not exist
        if (empty($ade->toArray())) abort(404);
        $categories = Category::all();
        return view('show')->with(['ade' => $ade[0], 'categories' => $categories]);
    }
    public function create(Request $request)
    {
        $categories = Category::all();
        return view('userAds.create')->with(['categories' => $categories]);
    }
    public function store(AdeStoreRequest $request)
    {
        $ade = Advertisement::create($request->all());

        if ($ade->save()) {
            return redirect('/ads/' . $ade->id);
        }

        return; // 422
    }
    public function edit($adID)
    {
        //inja bayad permission mojod and ejaze bedam
        $ade = Advertisement::where('user_id', Auth::user()->id)->where('id', $adID)->first();
        if (empty($ade)) abort(404);

        $categories = Category::all();
        return view('edit')->with(['categories' => $categories, 'ade' => $ade]);
    }
    public function update(AdeStoreRequest $request, $adID)
    {
        //validate kardan request ha badan anjam mishe haji
        $ade = Advertisement::where('user_id', Auth::user()->id)->where('id', $adID)->get();
        if (empty($ade->toArray())) abort(404);

        //inja mikham logic konam
        $ade = Advertisement::find($adID);
        $ade->title = $request->title;
        $ade->desc = $request->desc;
        $ade->price = $request->price;
        $ade->adress = $request->adress;
        $ade->mobileNo = $request->phoneNo;
        $ade->user_id = Auth::user()->id;
        $ade->category_id = $request->category;
        // $ade->update($request);

        if ($ade->save()) {
            return redirect('/ads/' . $ade->id);
        }

        return; // 422
    }
    public function delete($adID)
    {
        //inja bayad permission mojod and ejaze bedam
        $ade = Advertisement::where('user_id', Auth::user()->id)->where('id', $adID)->get();
        if (empty($ade->toArray())) abort(404);

        return view('delete')->with(['ade' => $ade]);
    }
    public function destroy(Request $request, $adID)
    {
        $ade = Advertisement::where('user_id', Auth::user()->id)->where('id', $adID)->get();
        if (empty($ade->toArray())) abort(404);

        $ade->delete();
        return redirect('/');
    }
}
