@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5 mb-3" >
            <!-- @include('sections.errors') -->
            <div class="card" >
                <div class="card-header">Select Your Category </div>
                <div class="card-body">
                    <form action="{{route('ads.create')}}" method="POST">
                        @csrf
                        <div class="form-group">
                         <label for="title">Category</lable>
                         <input class="form-control @error('category') form-control-invalid @enderror" name="category" type="text" id="category" value="{{old('category')}}">
                          @error('category')
                              <p class="invalid-feedback d-block">
                                  <strong>{{$message}}</strong>
                              </p>
                          @enderror
                     </div>
                    </form>
                   <form action="{{route('ads.create')}}" method="POST">
                       @csrf
                       <div class="form-group">
                        <label for="title">Category</lable>
                        <input class="form-control @error('category') form-control-invalid @enderror s" name="category" type="text" id="category" value="{{old('category')}}">
                         @error('category')
                             <p class="invalid-feedback d-block">
                                 <strong>{{$message}}</strong>
                             </p>
                         @enderror
                    </div>
                       <button type="submit" class="btn  btn-dark">Select</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
