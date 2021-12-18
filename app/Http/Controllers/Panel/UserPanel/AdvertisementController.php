<?php

namespace App\Http\Controllers\Panel\UserPanel;

use App\Http\Requests\AdeStoreRequest;
use App\Models\{Advertisement, Comment};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Log;

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
        $ade = Advertisement::findNcheck($this, 'view', $adID);
        Log::info('Showing the user advertisement for user: '. Auth::user()->id . 'on ad with this id' . $adID);
        return view('userAds.show', compact('ade'));
    }
    public function create(Request $request)
    {
        return view('userAds.create');
    }
    public function store(AdeStoreRequest $request)
    {
        $ade = Advertisement::create($request->all());
        if ($ade->save()) {
            return redirect()->route('ads.show', ['adID' => $ade->id]);
        }
        abort(422);
    }
    public function edit($adID)
    {
        $ade = Advertisement::findNcheck($this, 'update', $adID);
        return view('edit', compact('ade'));
    }
    public function update(AdeStoreRequest $request, $adID)
    {
        $ade = Advertisement::findNcheck($this, 'update', $adID);
        $ade->update($request->all());
        if ($ade->save()) {
            return redirect()->route('ads.show', ['adID' => $ade->id]);
        }

        abort(422);
    }
    public function delete($adID)
    {
        $ade = Advertisement::findNcheck($this, 'delete', $adID);
        return view('delete', compact('ade'));
    }
    public function destroy(Request $request, $adID)
    {
        $ade = Advertisement::findNcheck($this, 'delete', $adID);
        $ade->delete();
        return redirect()->route('ads.index');
    }
    public function logout(Request $request) {

        Auth::logout();
        return redirect()->route('ads.index');
    }

}
