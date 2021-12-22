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
                <form action="{{route('user.show', ['id' => $ade])}}" method="GET">
                    @csrf
                    <input type="hidden" name="id" value="{{$ade->id}}">
                    <button type="submit" class="btn btn-secondary " style="margin-right: 50px">Show Ads</button>
                </form>
            </div>

            {{-- <form action="{{route('favorite.store', ['id' => $ade])}}" method="post">
            @csrf
            <input type="hidden" name="ade-id" value="{{$ade->id}}">
            <button type="submit" style="margin-left:75px" class="btn btn-danger"><i class="fa fa-heart-o" aria-hidden="true"></i>
            </button>
            </form> --}}
        </div>

    </div>
</div>
@endforeach
@endsection
