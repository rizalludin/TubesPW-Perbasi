@extends('layouts.app')

@section('content')
    <a href="{{ route('jadwal.create') }}" class="btn btn-info">Jadwal Baru</a>
    
    @if ($message = Session::get('message'))
        <div class="alert alert-success martop-sm">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-responsive martop-sm">
        <thead>
            <th>ID</th>
            <th>Waktu</th>
            <th>Team</th>
            <th>Harga Tiket</th>
            <th>Pilihan</th>
        </thead>
        <tbody>
            @foreach ($jadwals as $jadwal)
                <tr>
                    <td>{{ $jadwal->id }}</td>
                    <td>{{ $jadwal->waktu }}</td>
                    <td>{{ $jadwal->team }}</td>
                    <td>{{ $jadwal->harga }}</td>
                    <td>
                        <form action="{{ route('jadwal.destroy', $jadwal->id) }}" method="post">
                            {{csrf_field()}}
                            {{ method_field('DELETE') }}
                            <a href="{{ route('jadwal.show', $jadwal->id) }}" class="btn btn-primary "> Detail</a>
                            <a href="{{ route('jadwal.edit', $jadwal->id) }}" class="btn btn-success">Ubah</a>
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection