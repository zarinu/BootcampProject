@extends('admin.layouts.master')
@section('content')
<div>
    <h1>All Category <a href="{{route('category.create')}}">Create a Category</a></h1>
    @foreach($categories as $category)
    <p>farsi name : {{$category->name}}</p>
    <p>english name : {{$category->name_en}}</p>
    @if($category->parent)
    <p>parent name : {{$category->parent->name}}</p>
    @else
    <p>this have not a parent because this is a main category</p>
    @endif
    <a href="{{route('category.show', ['category' => $category->id])}}">show this</a>
    <br>
    <hr>
    @endforeach
</div>
@endsection