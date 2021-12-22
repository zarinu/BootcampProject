@extends('user.layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5 mb-3">
            <div class="card">
                <div class="card-header">All Your Comment</div>
                <div class="card-body">
                    <ul>
                        @foreach($comments as $comment)
                        <li><strong>comment : </strong>{{$comment->body}}</li>
                        <li><strong>for Ads with title : </strong>{{$comment->Advertisement->title}}</li>
                        <br>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection