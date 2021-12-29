<div>
    <form action="{{route('category.update', ['category' => $category->id])}}" method="POST">
        @csrf
        @method('PUT')
        enter persian name : <input type="text" name="name" required autocomplete="name" placeholder="{{$category->name}}"><br>
        enter English name : <input type="text" name="name_en" required autocomplete="name_en" placeholder="{{$category->name_en}}"><br>
        enter parent ID : <input type="number" name="parent_id" required autocomplete="parent_id" placeholder="{{$category->parent_id}}"><br>
        <input type="submit">
    </form>
</div>