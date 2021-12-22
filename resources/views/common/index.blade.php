@extends('layouts.master')
@section('content')
@foreach ($ads as $ade)
<div class="d-inline-flex p-2">
    <div class="card" style="width:250px;">
        <a href="{{route('show', ['id' => $ade->id])}}" id="{{$ade->id}}">
            <div class="card-body"  style="cursor: pointer; background-color: gainsboro; color: darkslategray;" onclick="(function(){
                document.getElementById('{{$ade->id}}').submit();})();">
                <h3 class="card-title" style="height: 60px;">{{$ade->title}}</h3>
                <hr>
                <h5>price : {{$ade->price}}</h5>
                <hr>
                <h6 style="height: 40px;">created at {{$ade->getCreated_at()}} <strong>in</strong> {{$ade->adress}}</h6>
            </div>
            </a>
    </div>
</div>
@endforeach
@if(empty($ads->toArray()['data']))
<h4>there`s nothing yet ...<h4>
@endif
<ul class="pagination justify-content-center" style="margin:20px 0">
    <li class="page-item">{{$ads->links()}}</li>
</ul>
@endsection