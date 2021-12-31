@extends('admin.layouts.master')
@section('content')
<div>
    <p>created by : {{$comment->user->name}}</p>
    <p>title Advertisement : {{$comment->advertisement->title}}</p>
    <p>comment body : {{$comment->body}}</p>
    <p>created at : {{$comment->created_at}}</p>
    <p>last update at : {{$comment->updated_at}}</p>
    <a href="{{route('comment.edit', ['comment' => $comment->id])}}">edit this comment</a><br>
    <a href="{{route('comment.delete', ['comment' => $comment->id])}}">delete this comment</a>
    <br>
    <hr>
</div>
@endsection