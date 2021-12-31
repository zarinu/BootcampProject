<?php

namespace App\Http\Controllers\admin;

use App\Models\{Comment};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    //
    public function index()
    {
        $comments = Comment::paginate(5);
        return view('admin.comment.index', compact('comments'));
    }
    public function show(Comment $comment)
    {
        return view('admin.comment.show', compact('comment'));
    }
    public function delete(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('admin.comment.index');
    }
    public function edit(Request $request, $id)
    {
        $comment = Comment::findOrFail($id);
        $comment->update([
            'body' => $request->body
        ]);
        return redirect()->route('#');
    }
}
