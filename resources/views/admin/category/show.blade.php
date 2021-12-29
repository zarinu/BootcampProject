@extends('admin.layouts.master')
@section('content')
{{dd($category->childs)}}
<div class="card">
    <div class="card-header">
        <div class="d-inline-flex p-3">
            <h5>name : <strong>{{$category->name}}</strong></h5>
        </div>
    </div>
    <div class="card-body">
        <div class="d-flex flex-column ">
            <p>english name : {{$category->name_en}}</p>
            <p>parent directory name : {{$category->parent_id}}</p>
        </div>
        <div>
            <div class="btn-group" style="margin-top: 50px;">
                <a href="{{route('category.edit', ['category' => $category->id])}}">
                    <button type="button" class="btn btn-block  btn-secondary">Edit</button>
                </a>
            </div>
            <div class="btn-group" style="margin-top: 50px;">
                <a href="{{route('category.delete', ['category' => $category->id])}}">
                    <button type="button" class="btn btn-danger btn-block">Delete</button>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection