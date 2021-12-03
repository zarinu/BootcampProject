@extends('layouts.master')
@section('content')
    @foreach ($ads as $ade )
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">{{$ade->title}}</h4>
            <p class="card-text">{{$ade->desc}}</p>

        </div>
    </div>
    <div>{{$ads->links()}}}</div>
    @endforeach
@endsection
