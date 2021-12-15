@extends('layouts.master')
@section('content')
<div>
    <p>welcome {{Auth::user()->name}}</p>
    <form action="{{route('ads.update', ['adID' => $ade->id])}}" method="POST">
        @csrf
        @method('PUT')
        <p>enter title : </p><input type="text" name="title" placeholder="{{$ade->title}}">
        <p>enter desc :</p><input type="text" name="desc" placeholder="{{$ade->desc}}">
        <p>enter price : </p><input type="text" name="price" placeholder="{{$ade->price}}">
        <p>enter mobile number : </p><input type="text" name="mobileNo" placeholder="{{$ade->mobileNo}}">
        <p>enter adress : </p><input type="text" name="adress" placeholder="{{$ade->adress}}">
        <p>enter category</p> :
        <select name="category_id">
            @foreach($categories as $category)
            <option value={{$category->id}}>{{$category->name}}</option>
            @endforeach
        </select>
        <input type="submit">
    </form>
</div>
@endsection