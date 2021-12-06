<div class="row">
    {{-- for button and for example user-icon... --}}
    <div class="col-sm-2">
        <a class="btn  btn-sm btn-secondary float-left" href="{{route('ads.create')}}">Create Ads </a>
        <a href="#">
            <span class="glyphicon glyphicon-user"></span>
        </a>
    </div>
    {{-- for navbar search... --}}
    <div class="col-sm-8">
        <form action="{{route('ads.search')}}" method="POST">
            @csrf
            <input type="text" placeholder="Search.." name="search">
            <button type="submit"><i class="fa fa-search"></i></button>
          </form>
    </div>
    {{-- for image icon ... --}}
    <div class="col-sm-2">
        <img src="{{asset('/images/image.png')}}" class="float-end" >
    </div>
  </div>
