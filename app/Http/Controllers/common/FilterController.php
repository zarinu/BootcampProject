<?php

namespace App\Http\Controllers\common;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function category($id)
    {
        $ads = Advertisement::where('category_id', $id)->paginate(8);
        return view('common.index', compact('ads'));
    }

    public function favoritest()
    {
        $ads = Advertisement::paginate(6);
        return view('common.index', compact('ads'));
    }
}
