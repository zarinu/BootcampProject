<?php

namespace App\Http\Controllers\Panel\UserPanel;

use App\Http\Requests\AdeStoreRequest;
use App\Models\{Advertisement, Comment};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Category;

class AdvertisementController extends Controller
{
    //
    public function index()
    {
        $ads = Advertisement::where('user_id', Auth::user()->id)->paginate(8);
        return view('userAds.index', compact('ads'));
    }
    public function show($adID)
    {
        $ade = Advertisement::where('user_id', Auth::user()->id)->where('id', $adID)->first();

        //check if this $ade does not exist
        if (empty($ade)) abort(404);
        return view('show', compact('ade'));
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

        return view('edit', compact('ade'));
    }
    public function update(AdeStoreRequest $request, $adID)
    {
        $ade = Advertisement::where('user_id', Auth::user()->id)->where('id', $adID)->first();
        if (empty($ade)) abort(404);
        $this->authorize('update', $ade);

        $ade->update($request->all());
        if ($ade->save()) {
            return redirect('/ads/' . $ade->id);
        }

        return; // 422
    }
    public function delete($adID)
    {
        //inja bayad permission mojod and ejaze bedam
        $ade = Advertisement::where('user_id', Auth::user()->id)->where('id', $adID)->first();
        if (empty($ade)) abort(404);

        return view('delete', compact('ade'));
    }
    public function destroy(Request $request, $adID)
    {
        $ade = Advertisement::where('user_id', Auth::user()->id)->where('id', $adID)->first();
        if (empty($ade)) abort(404);
        $this->authorize('delete', $ade);

        $ade->delete();
        return redirect('/');
    }
    public function logout(Request $request) {

        Auth::logout();

        return redirect('/');

    }

}
