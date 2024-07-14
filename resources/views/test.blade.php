<form method="post" action="{{ route('products.filter') }}">
    @csrf
    <label>Price</label>
    <input type="number" name="price"/>

    <label>Artist</label>
    <select name="artist_id">
        @foreach($products as $product)
            <option value="{{ $product->artist_id }}">{{ $product->artist->name }}</option>
        @endforeach
    </select>
    <button type="submit">Go</button>
</form>
