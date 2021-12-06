<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //this controller have show, create, update method..
    public function show($id){

        $category=Category::findOrFail($id);
      return view('ads.ShowCategory',compact('id'));
      }

    public function create(){
        return view('ads.create');
        }

    public function store(Request $request){
          $request->validate([
              'name'=>'required'
          ]);
          Category::create([
              'name'=>$request-> name
          ]);
        }
    public function edit($id){
            $id=Category::findOrFail($id);
            return view('ads.edit',compact('id'));

        }
    public function update(Request $request, $id){
            $id=Category::findOrFail($id);
            $request->validate([
            'name'=>'required'
            ]);
            $id->update([
                'name'=>$request-> name
                ]);
            return redirect()->route('ads.index');
        }
    public function delete(Request $request, $id){
            $id=Category::findOrFail($id);
            $id->delete();
            return redirect()->route('ads.index');
        }
}
