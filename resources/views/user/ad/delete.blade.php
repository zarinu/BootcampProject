@extends('user.layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5 mb-3">
            <div class="card">
                <div class="card-header">Delete Advertisement</div>
                <div class="card-body">
                    <h5><i>are you sure you want delete this advertisement? if you delete it isn`t exist any more!</i></h5>
                    <h6>with this title : {{$ade->title}} and this price : {{$ade->price}}</h6>
                    <br>
                    <form action="{{route('ad.destroy', ['id' => $ade->id])}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-danger" style="margin-left: 300px;" value="delete">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection