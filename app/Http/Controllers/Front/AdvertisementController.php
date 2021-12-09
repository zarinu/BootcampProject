<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\{Advertisement, Category, User};
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
    // for all user can see it complete tomoroow
    public function index()
    {
        $categories = Category::all();
        $ads = Advertisement::paginate(6);
        return view('allAds.index', compact(['ads','categories']));
    }
// // find ads with user_id forigen key
//     public function findAds()
//     {
//         $ads=User::Find(1)->Advertisements;
//         dd( $ads);
//     }

    public function show(Request $request)
    {
        $id=$request->id;
        //  dd($id);
        $ads = Advertisement::where('id',$id)->get();
        return view('allAds.show',compact('ads'));
    }
}
