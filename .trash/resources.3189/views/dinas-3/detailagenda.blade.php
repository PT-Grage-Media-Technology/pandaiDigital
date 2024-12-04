@extends('dinas-3.layout')

@section('content')
<div class="container mt-5 pt-5">
    <h1 class="text-center">{{ $agenda->tema }}</h1>
    <img src="{{ asset('foto_agenda/' . $agenda->gambar) }}" class="img-fluid" alt="{{ $agenda->tema }}">
    <p class="text-muted">{{ \Carbon\Carbon::parse($agenda->tgl_mulai)->format('d M Y') }}</p>
    <div class="content">
        {!! $agenda->isi_agenda !!} <!-- Menampilkan isi berita dengan HTML -->
    </div>
    <a href="{{ url()->previous() }}" class="btn btn-danger mb-5">Kembali</a> <!-- Tombol kembali -->
</div>
@endsection