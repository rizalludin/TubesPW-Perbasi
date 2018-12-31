@extends('layouts.app')

@section('content')
<h4>Jadwal Baru</h4>
<form action="{{ route('jadwal.store') }}" method="post">
    {{csrf_field()}}
    <div class="form-group {{ $errors->has('waktu') ? 'has-error' : '' }}">
        <label for="waktu" class="control-label">Waktu</label>
        <input type="text" class="form-control" name="waktu" placeholder="0000-00-00">
        @if ($errors->has('waktu'))
            <span class="help-block">{{ $errors->first('waktu') }}</span>
        @endif
    </div>
    <div class="form-group {{ $errors->has('team') ? 'has-error' : '' }}">
        <label for="team" class="control-label">Team</label>
        <input type="text" name="team" cols="30" rows="5" class="form-control">
        @if ($errors->has('team'))
            <span class="help-block">{{ $errors->first('team') }}</span>
        @endif
    </div>
        <div class="form-group {{ $errors->has('harga') ? 'has-error' : '' }}">
        <label for="harga" class="control-label">Harga</label>
        <input type="text" name="harga" cols="30" rows="5" class="form-control">
        @if ($errors->has('harga'))
            <span class="help-block">{{ $errors->first('harga') }}</span>
        @endif
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-info">Simpan</button>
        <a href="{{ route('jadwal.index') }}" class="btn btn-default">Kembali</a>
    </div>
</form>
@endsection