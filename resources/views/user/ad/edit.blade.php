@extends('user.layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5 mb-3">
            <div class="card">
                <div class="card-header">Edit Advertisement </div>
                <div class="card-body">
                    <div>
                        {{-- <p>{{$id->category_id->name}}</p> --}}
                    </div>
                    <form action="{{route('ad.update', ['id' => $ade->id])}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="sel1">Select your Category:</label>
                            <select class="form-control" id="sel1" name="category_id">
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}" {{ ($ade->category_id == $category->id) ? 'selected' : '';}}>{{$category->name}}</option>
                                @endforeach
                            </select>
                            <br>
                            <div class="form-group">
                                <label for="title">title</lable>
                                    <input style="width:680px;" class="form-control @error('title') form-control-invalid @enderror " name="title" type="text" id="title" placeholder="{{$ade->title}}" required autocomplete="title">

                                    {{-- <input class="form-control @error('title') form-control-invalid @enderror " name="title" type="text" id="title" value="{{old('title')}}" required autocomplete="title"> --}}
                                    @error('title')
                                    <p class="invalid-feedback d-block">
                                        <strong>{{$message}}</strong>
                                    </p>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label for="desc">description</lable>
                                    <input style="width:680px;" class="form-control @error('desc') form-control-invalid @enderror " name="desc" type="text" id="desc" value="{{old('desc')}}" placeholder="{{$ade->desc}}" required autocomplete="desc">
                                    @error('desc')
                                    <p class="invalid-feedback d-block">
                                        <strong>{{$message}}</strong>
                                    </p>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label for="price">price</lable>
                                    <input style="width:680px;" class="form-control @error('price') form-control-invalid @enderror " name="price" type="text" id="price" value="{{old('price')}}" placeholder="{{$ade->price}}" required autocomplete="price">
                                    @error('price')
                                    <p class="invalid-feedback d-block">
                                        <strong>{{$message}}</strong>
                                    </p>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label for="adress">address</lable>
                                    <input style="width:680px;" class="form-control @error('adress') form-control-invalid @enderror " name="adress" type="text" id="adress" value="{{old('adress')}}" placeholder="{{$ade->adress}}" required autocomplete="adress">
                                    @error('adress')
                                    <p class="invalid-feedback d-block">
                                        <strong>{{$message}}</strong>
                                    </p>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label for="mobileNo">mobileNumber</lable>
                                    <input style="width:680px;" class="form-control @error('mobileNo') form-control-invalid @enderror " name="mobileNo" type="text" id="mobileNo" value="{{old('mobileNo')}}" placeholder="{{$ade->mobileNo}}" required autocomplete="mobileNO">
                                    @error('mobileNo')
                                    <p class="invalid-feedback d-block">
                                        <strong>{{$message}}</strong>
                                    </p>
                                    @enderror
                            </div>
                            <!-- <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"> bbninm mishe age shood toyam bokon-->
                            <button type="submit" class="btn  btn-dark">submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection