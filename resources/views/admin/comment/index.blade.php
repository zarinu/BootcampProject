@extends('admin.layouts.master')
@section('content')
<div>
    <h1>All Comments</h1>
    <hr>
    @foreach($comments as $comment)
    <p>created by : {{$comment->user->name}}</p>
    <p>title Advertisement : {{$comment->advertisement->title}}</p>
    <p>comment body : {{$comment->body}}</p>
    <a href="#">show this</a>
    <br>
    <hr>
    @endforeach
</div>
<ul class="pagination justify-content-center" style="margin:20px 0">
    <li class="page-item">{{$comments->links()}}</li>
</ul>
@endsection