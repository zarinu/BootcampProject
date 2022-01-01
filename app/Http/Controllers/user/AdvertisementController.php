<?php

namespace App\Http\Controllers\user;

use App\Http\Requests\AdvertisementStoreRequest;
use App\Models\{Advertisement, Comment};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Jobs\LogingUserAddAd;

class AdvertisementController extends Controller
{
    //
    public function index()
    {
        $ads = Auth::user()->advertisement;
        return view('user.ad.index', compact('ads'));
    }
    public function show($id)
    {
        $ade = Advertisement::findNcheck($this, 'view', $id);
        return view('user.ad.show', compact('ade'));
    }
    public function create(Request $request)
    {
        return view('user.ad.create');
    }
    public function store(AdvertisementStoreRequest $request)
    {
        $ade = Advertisement::create($request->validated()+['user_id' => Auth::id()]);
        if ($ade->save()) {
            $this->logingUserAddAd($ade);
            return redirect()->route('ad.show', ['id' => $ade->id]);
        }
        abort(422);
    }
    public function edit($id)
    {
        $ade = Advertisement::findNcheck($this, 'update', $id);
        return view('user.ad.edit', compact('ade'));
    }
    public function update(AdvertisementStoreRequest $request, $id)
    {
        $ade = Advertisement::findNcheck($this, 'update', $id);
        $ade->update($request->validated()+['user_id' => Auth::id()]);
        if ($ade->save()) {
            return redirect()->route('ad.show', ['id' => $ade->id]);
        }

        abort(422);
    }
    public function delete($id)
    {
        $ade = Advertisement::findNcheck($this, 'delete', $id);
        return view('user.ad.delete', compact('ade'));
    }
    public function destroy(Request $request, $id)
    {
        $ade = Advertisement::findNcheck($this, 'delete', $id);
        $ade->delete();
        return redirect()->route('ad.index');
    }
    public function logout(Request $request) {

        Auth::logout();
        return redirect()->route('index');
    }
    public function logingUserAddAd(Advertisement $advertisement)
    {
        $this->dispatch(new LogingUserAddAd(Auth::user(), $advertisement));
    }
}
