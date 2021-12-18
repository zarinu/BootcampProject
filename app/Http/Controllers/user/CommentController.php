<?php

namespace App\Http\Controllers\user;

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
        $comment = new Comment();
        $comment->body = $request->body;
        $comment->ads_id = $request->tadID;
        $comment->user_id = Auth::user()->id;
        $comment->is_status = false;

        if ($comment->save()) {
            return redirect('/' . $comment->ads_id);
        }

        return; // 422
    }
    public function delete(Request $request,$id)
    {
        $id=Comment::findOrFail($id);
            $id->delete();
            return redirect()->route('ads.show');
    }
    public function edit(Request $request,$id)
    {
        $id=Comment::findOrFail($id);
        $id->update([
            'body'=>$request-> body
            ]);
        return redirect()->route('ads.show');
    }
}
