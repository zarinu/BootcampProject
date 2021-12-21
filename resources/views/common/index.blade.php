@extends('layouts.master')
@section('content')
@foreach ($ads as $ade)
<div class="d-inline-flex p-2">
    <div class="card" style="width:250px;">
        <form action="{{route('show', ['id' => $ade->id])}}" id="{{$ade->id}}" method="GET">
            <div class="card-body"  style="cursor: pointer; background-color: gainsboro; color: darkslategray;" onclick="(function(){
                document.getElementById('{{$ade->id}}').submit();})();">
                <h3 class="card-title" style="height: 60px;">{{$ade->title}}</h3>
                <hr>
                <h5>price : {{$ade->price}}</h5>
                <hr>
                <h6 style="height: 40px;">created at {{$ade->getCreated_at()}} <strong>in</strong> {{$ade->adress}}</h6>
            </div>
        </form>
    </div>
</div>
@endforeach
<ul class="pagination justify-content-center" style="margin:20px 0">
    <li class="page-item">{{$ads->links()}}</li>
</ul>
@endsection