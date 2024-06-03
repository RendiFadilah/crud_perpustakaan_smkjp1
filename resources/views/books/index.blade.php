<x-navbar title="Books Page">

    <h3>Data Buku</h3>

    @if(session()->has('success'))
        <p style="color: red">{{ session()->get('success') }}</p>
    @endif

    
    <a href="/books/create">Tambah</a>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Image</th>
            <th>Title</th>
            <th>Penerbit</th>
            <th>Description</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Opsi</th>
        </tr>
        
        @php  $no = 1 @endphp
        @foreach ($books as $data)
            <tr>
                <td>{{ $no }}</td>
                <td><img src="/storage/image/{{ $data->image }}" alt="" width="80"></td>
                <td>{{ $data->title }}</td>
                <td>{{ $data->penerbit }}</td>
                <td>{{ $data->description }}</td>
                <td>Rp {{ number_format($data->price) }}</td>
                <td>{{ $data->stock }}</td>
                <td>
                    <form method="POST" onsubmit="return confirm('Apakah anda yakin ingin menghapus data ini?');" action="{{ route('books.destroy', $data->id) }}">
                        <a href="{{ route('books.edit', $data->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
        @php $no++ @endphp
        @endforeach
    </table>
</x-navbar>