@extends('layouts.master')
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
                <div class="d-flex flex-row ">
                    <form action="{{route('show', ['id' => $ade->id])}}" method="GET">
                        @csrf
                        <input type="hidden"  name="id" value="{{$ade->id}}">
                        <button type="submit" class="btn btn-danger">Show Ads</button>
                    </form>
                    <a style="color:white" href="{{route('home')}}">
                        <button type="submit"  style="margin-left:75px" class="btn btn-danger"><i class="fa fa-heart-o" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <ul class="pagination justify-content-center" style="margin:20px 0">
        <li class="page-item">{{$ads->links()}}</li>
    </ul>
@endsection
