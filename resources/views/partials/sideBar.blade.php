<div>
    <p > Category</p>
</div>
<ul class="list-group">
    @foreach ($categories as $category )
     <li class="list-group-item ">{{$category->name}}</li>
     @endforeach
  </ul>
