<?php

namespace App\Http\Controllers\Panel\UserPanel;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    //
    public function create()
    {
        $coments = Comment::where('user_id', Auth::user()->id)->get();


        return view('allAds.comments.create');
    }
}
