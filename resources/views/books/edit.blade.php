<x-navbar>
    <h3>Edit Data</h3>

    <form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for="image">image</label><br />
        <input type="file" name="image" id="image" value="{{ $book->image }}"><br /> <br />

        <label for="title">title</label><br />
        <input type="text" name="title" id="title" value="{{ $book->title }}"><br /> <br />

        <label for="penerbit">penerbit</label><br />
        <input type="text" name="penerbit" id="penerbit" value="{{ $book->penerbit }}"><br /> <br />

        <label for="description">description</label><br />
        <input type="text" name="description" id="description" value="{{ $book->description }}"><br /> <br />

        <label for="price">price</label><br />
        <input type="number" name="price" id="price" value="{{ $book->price }}"><br /> <br />

        <label for="stock">stock</label><br />
        <input type="number" name="stock" id="stock" value="{{ $book->stock }}"><br /> <br />

        <button type="submit" name="edit">Edit</button>
    </form>
</x-navbar>