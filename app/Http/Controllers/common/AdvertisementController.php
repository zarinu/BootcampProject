<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\{Advertisement, Category, User, Comment};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;

class AdvertisementController extends Controller
{
    // for all user can see it complete tomoroow
    public function index()
    {
        $currentPage = request()->get('page', 1);

        $ads = Cache::remember('allAds-' . $currentPage, now()->addMinutes(10), function () {
            return Advertisement::paginate(6);
        });
        return view('allAds.index', compact('ads'));
    }
    // // find ads with user_id forigen key
    //     public function findAds()
    //     {
    //         $ads=User::Find(1)->Advertisements;
    //         dd( $ads);
    //     }

    public function show(Request $request, $adID)
    {
        // $id=$request->id;
        //  dd($id);
        $ade = Advertisement::find($adID);
        $comments = Comment::where('ads_id', $ade->id)->get();
        return view('allAds.show', compact('ade', 'comments'));
    }
}
