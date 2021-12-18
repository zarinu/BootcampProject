<div>
    <p>Category</p>
</div>
<ul class="list-group">
    @foreach ($categories as $category )
    <li class="list-group-item">
        <a href="{{route('filter.category', ['catID' => $category->id])}}" class="categories">
            {{$category->name}}
        </a>
    </li>
    @endforeach
</ul>