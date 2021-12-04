<div class="row">
    {{-- for button and for example user-icon... --}}
    <div class="col-sm-2">
        <button type="button" class="btn btn-danger">Add Advertisement</button>
        <a href="#">
            <span class="glyphicon glyphicon-user"></span>
          </a>
    </div>
    {{-- for navbar search... --}}
    <div class="col-sm-8">
        <form action="/action_page.php">
            <input type="text" placeholder="Search.." name="search">
            <button type="submit"><i class="fa fa-search"></i></button>
          </form>
    </div>
    {{-- for image icon ... --}}
    <div class="col-sm-2">
        <img src="{{asset('/images/image.png')}}" class="float-end" >
    </div>
  </div>
