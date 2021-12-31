<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminPanelController extends Controller
{
    //
    public function index() {
        $ads = Advertisement::paginate(8);
        return view('admin.index', compact('ads'));
    }
}
