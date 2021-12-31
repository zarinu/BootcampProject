@extends('admin.layouts.master')
@section('content')
<div>
    <p>created by : {{$comment->user->name}}</p>
    <p>title Advertisement : {{$comment->advertisement->title}}</p>
    <p>comment body : {{$comment->body}}</p>
    <p>created at : {{$comment->created_at}}</p>
    <p>last update at : {{$comment->updated_at}}</p>
    <a href="{{route('comment.edit', ['comment' => $comment->id])}}">edit this comment</a><br>
    <form action="{{route('comment.delete', ['comment' => $comment->id])}}" method="POST">
        @csrf
        @method('DELETE')
        <input type="submit" class="btn btn-danger" style="margin-left: 300px;" value="delete this commnet">
    </form>

    <br>
    <hr>
</div>
@endsection