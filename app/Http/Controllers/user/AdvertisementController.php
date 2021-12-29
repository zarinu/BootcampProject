<?php

namespace App\Http\Controllers\user;

use App\Http\Requests\AdvertisementStoreRequest;
use App\Models\{Advertisement, Comment};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Category;

class AdvertisementController extends Controller
{
    //
    public function index()
    {

        $ads = Advertisement::where('user_id', Auth::user()->id)->paginate(8);
        return view('user.index', compact('ads'));
    }
    public function show($id)
    {
        $ade = Advertisement::findNcheck($this, 'view', $id);
        return view('user.show', compact('ade'));
    }
    public function create(Request $request)
    {
        return view('user.create');
    }
    public function store(AdvertisementStoreRequest $request)
    {
        $ade = Advertisement::create($request->all());
        if ($ade->save()) {
            return redirect()->route('user.show', ['id' => $ade->id]);
        }
        abort(422);
    }
    public function edit($id)
    {
        $ade = Advertisement::findNcheck($this, 'update', $id);
        return view('user.edit', compact('ade'));
    }
    public function update(AdvertisementStoreRequest $request, $id)
    {
        $ade = Advertisement::findNcheck($this, 'update', $id);
        $ade->update($request->all());
        if ($ade->save()) {
            return redirect()->route('user.show', ['id' => $ade->id]);
        }

        abort(422);
    }
    public function delete($id)
    {
        $ade = Advertisement::findNcheck($this, 'delete', $id);
        return view('user.delete', compact('ade'));
    }
    public function destroy(Request $request, $id)
    {
        $ade = Advertisement::findNcheck($this, 'delete', $id);
        $ade->delete();
        return redirect()->route('user.index');
    }
    public function logout(Request $request) {

        Auth::logout();
        return redirect()->route('user.index');
    }

}
