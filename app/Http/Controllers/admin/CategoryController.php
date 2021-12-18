<?php

namespace App\Http\Controllers\Panel\AdminPanel;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }
    // this controller have show, create, update method..
    // public function show($id){

    //     $category=Category::findOrFail($id);
    //   return view('ads.ShowCategory',compact('id'));
    //   }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => 'required'
        // ]);
        $category = Category::create($request->all());
        if ($category->save()) {
            return redirect()->route('category.index');
        }

        return; // 422
    }
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        // $request->validate([
        //     'name' => 'required'
        // ]);
        $category->update($request->all());
        return redirect()->route('category.index');
    }
    public function delete(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('category.index');
    }
}
