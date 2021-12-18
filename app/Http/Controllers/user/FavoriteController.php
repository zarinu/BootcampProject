<?php

namespace App\Http\Controllers\user;

use App\Models\Advertisement;
use App\Models\Favorite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    //
    public function store(Request $request) {
        Favorite::create($request->all());
        return redirect()->route('index')
                        ->with('success','Add to favorite successfully.');

        return(view('userAds.index', compact('ads')));
    }
    public function index() {
        $fav = Favorite::where('user_id', Auth::user()->id)->pluck('ads_id')->toArray();
        $ads = Advertisement::findMany($fav);

        return(view('userAds.index', compact('ads')));
    }

}
