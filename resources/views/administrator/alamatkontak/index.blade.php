@extends('administrator.layout')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Alamat Kontak</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('administrator.alamatkontak.update', $alamatKontak->id_alamat)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <textarea class="form-control" id="alamat" name="alamat" rows="10">{{ $alamatKontak->alamat }}</textarea>
            </div>
            <div class="mt-4 d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('administrator.alamatkontak.index') }}" class="btn btn-danger">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection