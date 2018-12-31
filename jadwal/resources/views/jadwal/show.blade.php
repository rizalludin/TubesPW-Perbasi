@extends('layouts.app')

@section('content')

<h2>Detail Jadwal Perbasi Cup</h2>

<table class="table table-stripped">
	<tr>
		<th>Waktu</th>
		<td>{{ $jadwal->waktu }}</td>
	</tr>
	<tr>
		<th>Lawan Main</th>
		<td>{{ $jadwal->team }}</td>
	</tr>
	<tr>
		<th>Harga Tiket</th>
		<td>{{ $jadwal->harga }}</td>
	</tr>
</table>
<a href="{{ route('jadwal.index') }}" class="btn btn-default">Kembali</a>
@endsection