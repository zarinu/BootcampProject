<div>
    <h1>All Category</h1>
    @foreach($categories as $category)
    <p>farsi name : {{$category->name}}</p>
    <p>english name : {{$category->name_en}}</p>
    <p>parent id : {{$category->parent_id}}</p>
    <br>
    <hr>
    @endforeach
</div>