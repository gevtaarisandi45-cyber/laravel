@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Tugas</h1>

    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <a href="{{ route('tugas.create') }}">Tambah Tugas</a>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Tugas</th>
                <th>Deadline</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tugas as $t)
                <tr @if($t->status == 'selesai') style="background:#d3ffd3" @endif>
                    <td>{{ $t->id }}</td>
                    <td>{{ $t->nama }}</td>
                    <td>{{ $t->tugas }}</td>
                    <td>{{ $t->deadline }}</td>
                    <td>{{ $t->status }}</td>
                    <td>
                        <a href="{{ route('tugas.edit', $t->id) }}">Edit</a>

                        <form action="{{ route('tugas.selesai', $t->id) }}" method="POST" style="display:inline">
                            @csrf
                            <button type="submit">Selesai</button>
                        </form>

                        <form action="{{ route('tugas.destroy', $t->id) }}" method="POST" style="display:inline" onsubmit="return confirm('Hapus?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
