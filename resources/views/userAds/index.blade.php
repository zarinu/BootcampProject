@extends('layouts.masterUserPanel')
@section('content')
     @foreach ($ads as $ade)
    <div class="d-inline-flex p-2">
        <div class="card " style="width:250px;">
            <div class="card-body">
                <h3 class="card-title">{{$ade->title}}</h3>
                <hr>
                <p class="card-text">{{$ade->desc}}
                   <hr>
                    {{$ade->price}}
                </p>
                <form action="{{route('ads.show', ['adID' => $ade])}}" method="GET">
                    @csrf
                    <input type="hidden"  name="id" value="{{$ade->id}}">
                    <button type="submit" class="btn btn-danger">Show Ads</button>
                </form>
                <form action="{{route('storefavorite', ['adID' => $ade])}}" method="post">
                    @csrf
                    <input type="hidden"  name="ade-id" value="{{$ade->id}}">
                    <button type="submit" class="btn btn-danger">Add Favorite</button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
    <ul class="pagination justify-content-center" style="margin:20px 0">
        <li class="page-item">{{$ads->links()}}</li>
    </ul>
@endsection
