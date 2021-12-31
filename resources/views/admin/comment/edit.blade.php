@extends('admin.layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5 mb-3">
            <div class="card">
                <div class="card-header">Edit Comment</div>
                <div class="card-body">
                    <form action="{{route('comment.update', ['comment' => $comment->id])}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <div class="form-group">
                                <label for="body">Enter comment Text</lable>
                                    <input class="form-control @error('desc') form-control-invalid @enderror " name="body" type="text" id="body" value="{{old('body')}}" required autocomplete="body">
                                    @error('body')
                                    <p class="invalid-feedback d-block">
                                        <strong>{{$message}}</strong>
                                    </p>
                                    @enderror
                            </div>
                            <button type="submit" class="btn  btn-dark">save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
