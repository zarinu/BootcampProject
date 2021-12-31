<?php

namespace App\Http\Controllers\common;

use App\Http\Controllers\Controller;
use App\Models\{Advertisement, Category, User, Comment};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class AdvertisementController extends Controller
{
    public function index()
    {
        $currentPage = request()->get('page', 1);

        $ads = Cache::remember('common-' . $currentPage, now()->addMinutes(10), function () {
            return Advertisement::paginate(6);
        });
        return view('common.index', compact('ads'));
    }
    public function show(Request $request, $id)
    {
        $ade = Advertisement::where('id', $id)->with('comments')->first();
        return view('common.show', compact('ade'));
    }
}
