<form method="post">
    @csrf
    @method('put')
    <div>
        <label for="name">Name</label>
        <input type="text" name="name" value="{{$product->name}}">
    </div>
    <div>
        <label for="description">Description</label>
        <input type="text" name="description" value="{{$product->description}}">
    </div>
    <div>
        <label for="price">Price</label>
        <input type="text" name="price" value="{{$product->price}}">
    </div>
    <button type="submit">Update</button>
</form>