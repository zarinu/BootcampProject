@extends('layouts.masterUserPanel')
@section('content')
<div>
    <p>welcome {{Auth::user()->name}}</p>
    <br>
    <p>title : {{$ade->title}}</p>
    <p>desc : {{$ade->desc}}</p>
    <p>price : {{$ade->price}}</p>
    <p>mobile number : {{$ade->mobileNo}}</p>
    <p>address : {{$ade->adress}}</p>
</div>
@endsection
