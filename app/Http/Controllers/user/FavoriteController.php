<?php

namespace App\Http\Controllers\user;

use App\Models\User;
use App\Models\Favorite;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Models\Advertisement;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Exists;
use PHPUnit\Framework\Constraint\IsEmpty;

class FavoriteController extends Controller
{
    //
    public function store(Request $request) {
        $adId=$request->input('ads_id');
        $userId=$request->input('user_id');
        $fav=Favorite::where('user_id',$userId)->get()->isNotEmpty();
        if($fav){
            return redirect()->route('show',[$adId]);
        }else{
            $newfav=Favorite::create($request->all());
            return redirect()->route('show',[$adId]);
        }
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
