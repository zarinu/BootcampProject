<?php

namespace App\Http\Controllers\admin;

use App\Models\{Comment, Category};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    //
    public function delete(Request $request, $id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();
        return redirect()->back();
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
