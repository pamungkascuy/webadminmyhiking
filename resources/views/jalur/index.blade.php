@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Jalur</h1>
    <a href="{{ route('jalur.create') }}" class="btn btn-primary mb-3">Tambah Jalur</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Gunung</th>
                <th>Provinsi</th>
                <th>Kabupaten</th>
                <th>Deskripsi</th>
                <th>Biaya</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jalur as $j)
            <tr>
                <td>{{ $j->id }}</td>
                <td>{{ $j->gunung->name ?? 'N/A' }}</td>
                <td>{{ $j->province->name ?? 'N/A' }}</td>
                <td>{{ $j->regency->name ?? 'N/A' }}</td>
                <td>{{ $j->deskripsi }}</td>
                <td>{{ $j->biaya }}</td>
                <td>
                    <a href="{{ route('jalur.edit', $j->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('jalur.destroy', $j->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus jalur ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
