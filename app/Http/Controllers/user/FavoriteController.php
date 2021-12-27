<?php

namespace App\Http\Controllers\user;

use App\Models\User;
use App\Models\Favorite;
use Illuminate\Http\Request;
use App\Models\Advertisement;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    //
    public function store(Request $request) {
        $fav=Favorite::create($request->all());
        return redirect()->route('favorite.index');

    }
    public function delete(Request $request) {
        $adId=$request->input('ads_id');
        $userid = Favorite::where('ads_id',$adId)->delete();
        return redirect()->route('show',[$adId]);
    }
    public function index() {
        $fav = Favorite::where('user_id', Auth::user()->id)->pluck('ads_id')->toArray();
        $ads = Advertisement::findMany($fav);

        return(view('user.favorite.index', compact('ads')));
    }

}
