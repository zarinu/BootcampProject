<?php

namespace App\Http\Controllers\common;

use App\Models\Favorite;
use Illuminate\Http\Request;
use App\Models\Advertisement;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class FilterController extends Controller
{
    public function category($id)
    {
        $ads = Advertisement::where('category_id', $id)->paginate(8);
        return view('common.index', compact('ads'));
    }

    public function favoritest()
    {
        $adsId=Favorite::get()->mode('ads_id');
        $ads = Advertisement::where('id', $adsId)->paginate(8);
        return view('common.index', compact('ads'));
    }
}
