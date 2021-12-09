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
<<<<<<< HEAD
        $coments = Comment::where('user_id', Auth::user()->id)->get();

=======
>>>>>>> e268df01898d752db74b9649b1d7a3b2875cfd81
        return view('allAds.comments.create');
    }
}
