@extends('layouts.master')
@section('content')
<div>
    <p>welcome {{Auth::user()->name}}</p>
    <form action="{{route('ads.destroy', ['adID' => $ade->id])}}" method="POST">
        @csrf
        @method('DELETE')
        <h3>are you sure to delete this advertisement, if you delete this not exist any more haaaa</h3>
        <input type="submit">
    </form>
</div>
@endsection