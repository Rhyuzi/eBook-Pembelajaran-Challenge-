<h1>Dashboard</h1>
<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama eBook</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($ebooks as $key => $ebook)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $ebook->title }}</td>
                <td>
                    <a href="{{ route('ebook.show', $ebook->id) }}">Lihat</a>
                    <form action="{{ route('ebook.destroy', $ebook->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
