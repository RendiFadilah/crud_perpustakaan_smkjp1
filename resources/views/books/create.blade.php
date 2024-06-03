<x-navbar>
    <h3>Tambah Data</h3>

    <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="image">image</label><br />
        <input type="file" name="image" id="image"><br /> <br />

        <label for="title">title</label><br />
        <input type="text" name="title" id="title"><br /> <br />

        <label for="penerbit">penerbit</label><br />
        <input type="text" name="penerbit" id="penerbit"><br /> <br />

        <label for="description">description</label><br />
        <input type="text" name="description" id="description"><br /> <br />

        <label for="price">price</label><br />
        <input type="number" name="price" id="price"><br /> <br />

        <label for="stock">stock</label><br />
        <input type="number" name="stock" id="stock"><br /> <br />

        <button type="submit" name="tambah">Tambah</button>
    </form>
</x-navbar>