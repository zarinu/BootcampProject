<?php

namespace App\Http\Controllers\admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Events\CategoryDeletedEvent;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }
    // this controller have show, create, update method..
    public function show(Category $category)
    {
        return view('admin.category.show', compact('category'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
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
        event(new CategoryDeletedEvent($category));
        return redirect()->route('category.index');
    }
}
