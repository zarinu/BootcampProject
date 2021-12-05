@extends('layouts.master')
@section('content')
<div>
    <p>welcome {{Auth::user()->name}}</p>
    <form>
        <p>enter title : </p><input type="text">
        <p>enter desc :</p><input type="text">
        <p>enter price : </p><input type="text">
        <p>enter mobile number : </p><input type="text">
        <p>enter address : </p><input type="text">
        <p>enter category</p> :
        <select name="category">
            @foreach($categories as $category)
            <option value={{$category->name}}>{{$category->name}}</option>
            @endforeach
        </select>
    </form>
</div>
@endsection