<h4>Filters</h4><hr>
<h6>Important</h6>
<ul class="list-group">
    <li class="list-group-item">
        <a href="#" class="categories">محبوب ترین ها</a>
    </li>
</ul><br>
<h6>Category</h6>
<ul class="list-group">
    @foreach ($categories as $category )
    <li class="list-group-item">
        <a href="{{route('filter.category', ['id' => $category->id])}}" class="categories">
            {{$category->name}}
        </a>
    </li>
    @endforeach
</ul>
