<?php

namespace App\Http\Controllers;

use App\Models\Ade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdeController extends Controller
{
    //
    public function index()
    {
        $ads = Ade::where('user_id', Auth::user()->id)->get();
        return view('index', ['ads' => $ads]);
    }
}
