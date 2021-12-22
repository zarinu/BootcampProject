@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5 mb-3">
            <div class="card">
                <div class="card-header">Create New Comment </div>
                <div class="card-body">
                    <form action="{{route('comment.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <div class="form-group">
                                <label for="body">Enter comment Text</lable>
                                    <input class="form-control @error('desc') form-control-invalid @enderror " name="body" type="text" id="body" value="{{old('body')}}" required autocomplete="body">
                                    <input type="hidden" name="ads_id" value="{{$id}}">
                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                    <input type="hidden" name="is_status" value="0">
                                    @error('body')
                                    <p class="invalid-feedback d-block">
                                        <strong>{{$message}}</strong>
                                    </p>
                                    @enderror
                            </div>
                            <button type="submit" class="btn  btn-dark">submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection