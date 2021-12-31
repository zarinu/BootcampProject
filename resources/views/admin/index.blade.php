@extends('admin.layouts.master')
@section('content')
@foreach ($ads as $ade)
<div class="pt-2">
    <div class="card ">

        <div class="card-header">
            <h3 class="card-title">
                <p>title: {{$ade->title}} </p>
            </h3>
            {{-- <p class="card-text">{{$ade->desc}} --}}
        </div>
        <div class="card-body ">
            <p>address: {{$ade->adress}}</p>
            <hr>
            <p>price: {{$ade->price}}</p>
            <div class="d-inline-flex btn-group">
                <a href="{{route('ad.show', ['id' => $ade->id])}}">
                    <button type="submit" class="btn btn-secondary " style="margin-right: 50px">Show Ads</button>
                </a>
            </div>
        </div>

    </div>
</div>
@endforeach
<ul class="pagination justify-content-center" style="margin:20px 0">
    <li class="page-item">{{$ads->links()}}</li>
</ul>
@endsection