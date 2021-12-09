@extends('layouts.master')
@section('content')
    @foreach ($ads as $ade)
    <div class="d-inline-flex p-2">
        <div class="card " style="width:250px;">
            <div class="card-body">
                <h3 class="card-title">{{$ade->title}}</h3>
                <hr>
                <p class="card-text">{{$ade->desc}}
                    <hr>
                    {{$ade->price}}
                </p>
                <form action="{{route('show')}}" method="POST">
                    @csrf
                    <input type="hidden"  name="id" value="{{$ade->id}}">
                    <button type="submit" class="btn btn-primary">See Ads</button>
                </form>

            </div>
        </div>
    </div>
    @endforeach
    <ul class="pagination justify-content-center" style="margin:20px 0">
        <li class="page-item">{{$ads->links()}}</li>
    </ul>
@endsection
