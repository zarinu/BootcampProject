@extends('layouts.masterUserPanel')
@section('content')

<div class="card">
    <div class="card-header">
        <div class="d-inline-flex p-3">
            <h5>Title:</h5>
            <div class="p-2">{{$ade->title}}</div>
        </div>
    </div>
    <div class="card-body">
        <div class="d-flex flex-column ">
            <h5>Mobile Number:</h5>
            <div class="p-2">{{$ade->mobileNo}}</div>
            <h5>Price:</h5>
            <div class="p-2">{{$ade->price}}</div>
            <h5>Description:</h5>
            <div class="p-2">{{$ade->desc}}</div>
            <h5>Addres:</h5>
            <div class="p-2">{{$ade->adress}}</div>
        </div>
        <div >
            <div class="btn-group" style="margin-top: 50px;">
                <a href="{{route('ads.index')}}">
                    <button type="button" class="btn btn-block" style="background-color:#E7D2CC ">Click For Veiw All Ads</button>
                </a>
            </div>
            <div class="btn-group" style="margin-top: 50px;">
                <a href="{{route('ads.index')}}">
            <button type="button" class="btn btn-danger btn-block">Click For Veiw All Ads</button>
                </a>
            </div>
        </div>
    </div>
    {{-- <div class="card">
        <h2>All Comments :</h2>
        @foreach ($comments as $comment)
        <div class="card-body">
            <p>{{$comment->body}}</p>
            <p>added by : {{$comment->user->name}}</p>
            <br>
        </div>
        @endforeach
        <a href="{{route('comments.create', ['tadID' => $ade->id])}}">Add a comment</a>
    </div> --}}
</div>
{{-- THIS PLACE FOR SHOW ALL COMMENTS --}}
@endsection
