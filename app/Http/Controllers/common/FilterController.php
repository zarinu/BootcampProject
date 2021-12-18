<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function category($catID)
    {
        $ads = Advertisement::where('category_id', $catID)->paginate(8);
        return view('allAds.filter.category', compact('ads'));
    }
}
