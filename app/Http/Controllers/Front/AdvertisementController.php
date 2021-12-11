<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\{Advertisement, Category, User, Comment};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdvertisementController extends Controller
{
    // for all user can see it complete tomoroow
    public function index()
    {
        $categories = Category::all();
        // dd(User::pluck('name', 'id')->toSql();;rawSql);
        $ads = Advertisement::paginate(6);
        return view('allAds.index', compact(['ads', 'categories']));
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
        $categories = Category::all();
        $ade = Advertisement::find($adID);
        $comments = Comment::where('ads_id', $ade->id)->get();
        return view('allAds.show', compact('ade', 'comments', 'categories'));
    }
}
