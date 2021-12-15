@extends('layouts.masterUserPanel')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5 mb-3">
            <div class="card">
                <div class="card-header">Create New Advertisement </div>
                <div class="card-body">
                    <div>
                        {{-- <p>{{$id->category_id->name}}</p> --}}
                    </div>
                    <form action="{{route('ads.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="sel1">Select your Category:</label>
                            <select class="form-control" id="sel1" name="category">
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                            <br>
                            <div class="form-group" >
                                <label for="title">title</lable>
                                    <input  style="width:680px;" class="form-control @error('title') form-control-invalid @enderror " name="category" type="text" id="category" value="{{old('title')}}" required autocomplete="title">
                                    @error('title')
                                    <p class="invalid-feedback d-block">
                                        <strong>{{$message}}</strong>
                                    </p>
                                    @enderror
                            </div>
                            <div class="form-group" >
                                <label for="desc">description</lable>
                                    <input  style="width:680px;" class="form-control @error('desc') form-control-invalid @enderror " name="desc" type="text" id="desc" value="{{old('desc')}}" required autocomplete="desc">
                                    @error('desc')
                                    <p class="invalid-feedback d-block">
                                        <strong>{{$message}}</strong>
                                    </p>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label for="price">price</lable>
                                    <input style="width:680px;" class="form-control @error('price') form-control-invalid @enderror " name="price" type="text" id="price" value="{{old('price')}}" required autocomplete="price">
                                    @error('price')
                                    <p class="invalid-feedback d-block">
                                        <strong>{{$message}}</strong>
                                    </p>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label for="adress">address</lable>
                                    <input style="width:680px;" class="form-control @error('adress') form-control-invalid @enderror " name="adress" type="text" id="adress" value="{{old('adress')}}" required autocomplete="adress">
                                    @error('adress')
                                    <p class="invalid-feedback d-block">
                                        <strong>{{$message}}</strong>
                                    </p>
                                    @enderror
                            </div>
                            <div class="form-group" >
                                <label for="mobileNo">mobileNumber</lable>
                                    <input  style="width:680px;" class="form-control @error('mobileNo') form-control-invalid @enderror " name="mobileNo" type="text" id="mobileNo" value="{{old('mobileNo')}}" required autocomplete="mobileNO">
                                    @error('mobileNo')
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
