@extends('admin.layouts.master')
@section('content')
<div>
    <form action="{{route('category.store')}}" method="POST">
        @csrf
        enter persian name : <input type="text" name="name" required autocomplete="name"><br>
        enter English name : <input type="text" name="name_en" required autocomplete="name_en"><br>
        enter parent ID : <input type="number" name="parent_id" required autocomplete="parent_id"><br>
        <input type="submit">
    </form>
</div>
@endsection