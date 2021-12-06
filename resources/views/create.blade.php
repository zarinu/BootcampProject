@extends('layouts.master')
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div>
    <p>welcome {{Auth::user()->name}}</p>
    <form action="{{route('ads.store')}}" method="POST">
        @csrf
        <p>enter title : </p><input type="text" name="title" id="title" required autocomplete="name">
        <p>enter desc :</p><input type="text" name="desc">
        <p>enter price : </p><input type="text" name="price">
        <p>enter mobile number : </p><input type="text" name="phoneNo">
        <p>enter adress : </p><input type="text" name="adress">
        <p>enter category</p> :
        <select name="category">
            @foreach($categories as $category)
            <option value={{$category->id}}>{{$category->name}}</option>
            @endforeach
        </select>
        <input type="submit">
    </form>
</div>
@endsection