@extends('admin.layouts.master')
@section('content')
<br>
<form action="{{route('admin.index')}}">
    <h3 style="color:rebeccapurple">find Advertisement using ID</h3>
    Admin! pls Enter Ad ID <input type="number" name="ad_id" />
    <input type="submit">
</form><br>
<hr>

@if(empty($ads)) <p>not find ad with this id</p>
@elseif($ads instanceof App\Models\Advertisement)
<div class="row">
    <div class="col-sm-12">
        <div class="pt-2">
            <div class="card ">

                <div class="card-header">
                    <h3 class="card-title">
                        <p>title: {{$ads->title}} created at: {{$ads->getCreated_at()}}</p>
                    </h3>
                </div>
                <div class="card-body ">
                    <p>address: {{$ads->adress}}</p>
                    <hr>
                    <p>price: {{$ads->price}}</p>
                    <div class="d-inline-flex btn-group">
                        <a href="{{route('ad.show', ['id' => $ads])}}">
                            <button type="submit" class="btn btn-secondary " style="margin-right: 50px">Show Ads</button>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@else


@foreach ($ads as $ade)
<div class="row">
    <div class="col-sm-12">
        <div class="pt-2">
            <div class="card ">

                <div class="card-header">
                    <h3 class="card-title">
                        <p>title: {{$ade->title}} created at: {{$ade->getCreated_at()}}</p>
                    </h3>
                </div>
                <div class="card-body ">
                    <p>address: {{$ade->adress}}</p>
                    <hr>
                    <p>price: {{$ade->price}}</p>
                    <div class="d-inline-flex btn-group">
                        <a href="{{route('ad.show', ['id' => $ade])}}">
                            <button type="submit" class="btn btn-secondary " style="margin-right: 50px">Show Ads</button>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endforeach
<ul class="pagination justify-content-center" style="margin:20px 0">
    <li class="page-item">{{$ads->links()}}</li>
</ul>
@endif
@endsection