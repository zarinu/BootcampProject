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
                    <a href="{{route('favorite.store')}}">
                        <button type="submit" class="btn btn-warning" data-toggle="modal" data-target="#myModal">
                            Favorite This
                        </button>
                    </a>
                        <!-- The Modal -->
                        <div class="modal" id="myModal">
                            <div class="modal-dialog">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                <h4 class="modal-title">منتخب ها</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                با موفقیت به منتخب ها اضافه شد.
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>

                            </div>
                            </div>
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
            @foreach ($comments as $comment)
            <p>{{$comment->body}} <strong>Added by : {{$comment->user->name}}</strong></p>
            @endforeach
            <a href="{{route('comment.create', ['id' => $ade->id])}}">Add a comment</a>
        </div>
    </div>
</div>
@endsection
