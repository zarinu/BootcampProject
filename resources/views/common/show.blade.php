@extends('layouts.master')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="d-inline-flex p-3">
                <h3>{{$ade->title}}</h3>
            </div>
        </div>
        <div class="card-body">
            <div class="d-flex flex-column ">
                <h5>{{$ade->getCreated_at()}} | {{$ade->adress}} | {{$ade->category->name}}</h5><br>
                <h6>moblie number : {{$ade->mobileNo}} | price : {{$ade->price}} |
                    <div class='d-inline-flex'>
                        <form action="{{route('favorite.store')}}" method="POST">
                            @csrf
                            <input type="hidden" value="{{$ade->id}}" name='ads_id'>
                            <input type="hidden" value="{{Auth::id()}}" name='user_id'>
                            <button type="submit" class="btn btn-secondery" id="fav_btn">
                                <i class="fa fa-heart" >favorite</i>
                            </button>
                        </form>
                        <form action="{{route('favorite.delete')}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" value="{{$ade->id}}" name='ads_id'>
                            <button type="submit" class="btn btn-secondery" id="unfav_btn">
                                <i class="fa fa-heart-o">unfavorite</i>
                            </button>
                        </form>
                    </div>
                    <a href="#comments">Commnets</a>
                </h6><br>
                <p><strong>description : </strong>{{$ade->desc}}</p>
            </div>
        </div>
    </div><br>
    <div class="card">
        <div class="card-header">
            <div class="d-inline-flex p-3">
                <h3 id="comments">All Comments </h3>
            </div>
        </div>
        <div class="card-body">
            @foreach ($ade->comments as $comment)
            <p>{{$comment->body}} <strong>Added by : {{$comment->user->name}}</strong></p>
            @endforeach
            <a href="{{route('comment.create', ['id' => $ade->id])}}">Add a comment</a>
        </div>
    </div>
</div>
@endsection
