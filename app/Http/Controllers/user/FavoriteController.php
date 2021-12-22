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
    public function store() {

        $fav=Favorite::create();
        return redirect()->route('index')
                        ->with('success','Add to favorite successfully.');

        // return(view('user.index', compact('ads')));
    }
    public function index() {
        $fav = Favorite::where('user_id', Auth::user()->id)->pluck('ads_id')->toArray();
        $ads = Advertisement::findMany($fav);

        return(view('user.favorite.index', compact('ads')));
    }

}
