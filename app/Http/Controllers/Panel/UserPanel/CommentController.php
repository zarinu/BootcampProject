<?php

namespace App\Http\Controllers\Panel\UserPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    public function create()
    {
        return view('allAds.comments.create');
    }
}
