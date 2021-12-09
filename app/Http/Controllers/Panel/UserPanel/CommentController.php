<?php

namespace App\Http\Controllers\Panel\UserPanel;

use App\Models\{Comment, Category};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    //
    public function create($tadID)
    {
        // $coments = Comment::where('user_id', Auth::user()->id)->get();
        $categories = Category::all();
        return view('allAds.comments.create', compact('tadID', 'categories'));
    }
    public function store(Request $request)
    {
        dd("skdlf");
    }
}
