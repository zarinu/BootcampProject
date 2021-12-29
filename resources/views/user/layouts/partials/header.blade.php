<nav class="navbar navbar-expand-sm bg-secondary navbar-dark mt-3">
  {{-- for user panel setting --}}
  <div>
    <a class="navbar-brand" href="#">
      <img src="/images/userImage.png" alt="Logo" style="width:40px;" class="rounded-pill">
    </a>
  </div>
  {{-- define links for pro page --}}
  <div class="collapse navbar-collapse" id="mynavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="{{route('home')}}">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('index')}}">AllAds</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('ad.create')}}">NewAds</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('comment.index')}}">MyComments</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('ad.index')}}">MyAds</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('favorite.index')}}">MyFavoriteAds</a>
      </li>
  </div>
  {{-- search bar nav --}}


  <form class="d-flex justify-content-center mr-5">
    <input class="form-control me-2" type="text" placeholder="Search">
    <button class="btn ml-2" type="button" style="background-color:#EF7C8E">Search</button>
  </form>

  {{-- button logout --}}
  <form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit" class="btn" style="background-color:#EF7C8E">logout</button>
  </form>

</nav>
