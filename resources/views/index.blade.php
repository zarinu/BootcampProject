@extends('layouts.master')
@section('content')
<div>
    <p>welcome {{Auth::user()->name}}</p>
    <h1>your Ads</h1>
    @foreach($ads as $ade)
    <p>title : {{$ade->title}}</p>
    <p>desc : {{$ade->desc}}</p>
    <p>price : {{$ade->price}}</p>
    <p>mobile number : {{$ade->mobileNo}}</p>
    <p>address : {{$ade->adress}}</p>
    <br>
    <hr>
    @endforeach
</div>
@endsection