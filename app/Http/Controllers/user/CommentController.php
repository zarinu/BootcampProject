<?php

namespace App\Http\Controllers\user;

use App\Models\{Comment, Category};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Auth::user()->comments;
        return view('user.comment.index', compact('comments'));
    }
    public function create($id)
    {
        return view('user.comment.create', compact('id'));
    }
    public function store(Request $request)
    {
        $comment = Comment::create($request->all());

        if ($comment->save()) {
            return redirect()->route('show', ['id' => $comment->ads_id]);
        }

        return; // 422
    }
}
