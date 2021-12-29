@extends('user.layouts.master')
@section('content')
@foreach ($ads as $ade)
<div class="pt-2">
    <div class="card ">

        <div class="card-header">
            <h3 class="card-title">
                <p>title: {{$ade->title}} </p>
            </h3>
            {{-- <p class="card-text">{{$ade->desc}} --}}
        </div>
        <div class="card-body ">
            <p>address: {{$ade->adress}}</p>
            <hr>
            <p>price: {{$ade->price}}</p>
            <div class="d-inline-flex btn-group">
                <a href="{{route('user.show', ['id' => $ade])}}">
                    <button type="submit" class="btn btn-secondary " style="margin-right: 50px">Show Ads</button>
                </a>
            </div>
        </div>

    </div>
</div>
@endforeach
@endsection