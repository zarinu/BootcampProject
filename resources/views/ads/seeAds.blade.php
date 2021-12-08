@extends('layouts.masterShow')
@section('content')
@foreach ($ads as $ade )
        <div class="card">
            <div class="card-header">
                <div class="d-inline-flex p-3">
                    <h5>Title:</h5><div class="p-2">{{$ade->title}}</div>
                </div>
            </div>
            <div class="card-body">
                <div class="d-flex flex-column ">
                    <h5>Mobile Number:</h5><div class="p-2">{{$ade->mobileNo}}</div>
                    <h5>Price:</h5><div class="p-2">{{$ade->price}}</div>
                    <h5>Description:</h5><div class="p-2">{{$ade->desc}}</div>
                    <h5>Addres:</h5><div class="p-2">{{$ade->adress}}</div>
                  </div>
            </div>

        </div>
@endforeach
@endsection