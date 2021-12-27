<?php

namespace App\Http\Controllers\common;

use App\Models\Favorite;
use Illuminate\Support\Arr;
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
    {  $adsId= DB::table('favorites')
        ->selectRaw('ads_id, COUNT(*) as total')
        ->groupBy('ads_id')
        ->orderBy('total', 'desc')
        ->get()->toArray();
        $id=Arr::pluck($adsId, 'ads_id');
        $ads = Advertisement::whereIn('id', $id)->paginate(8);
        return view('common.index', compact('ads'));
    }
}
