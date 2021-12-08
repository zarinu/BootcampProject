<div class="container-fluid">
<div class="row" style="margin-top:15px;">
    {{-- for button and for example user-icon... --}}
    <div class="col-sm-4 " >
        <a class="btn  btn-sm btn-danger" style="float: left;margin-right:5px;" href="{{route('ads.create')}}">Create Ads </a>
        <a href="#">
            {{-- <span class="fa fa-user" ></span> --}}
            <button class="btn btn-sm "><i class="fa fa-user" style="font-size:18px;margin-left:15px;"></i> Profile</button>
        </a>
    </div>
    {{-- for navbar search... --}}
    <div class="col-sm-6">
        <form action="{{route('ads.search')}}" method="POST">
            @csrf
            <input style="width:500px;height:35px;background-color:#EEEDE7;border-radius: 5px;" type="text" placeholder="Search.." name="search">
            <button  class="btn btn-sm"type="submit"><i class="fa fa-search" style="font-size: 18px;"></i></button>
          </form>
    </div>
    {{-- for image icon ... --}}
    <div class="col-sm-2">
        <img src="{{asset('/images/image.png')}}" style="float:right;" >
    </div>
  </div>
</div>