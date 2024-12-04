@extends('dinas-2.layout')

@section('content')
<div class="container mt-5 pt-5">
    <h1 class="text-center">{{ $berita->judul }}</h1>
    <img src="{{ asset('foto_berita/' . $berita->gambar) }}" class="img-fluid" alt="{{ $berita->judul }}">
    <p class="text-muted">{{ \Carbon\Carbon::parse($berita->tanggal)->format('d M Y') }}</p>
    <div class="content">
        {!! $berita->isi_berita !!} <!-- Menampilkan isi berita dengan HTML -->
    </div>
    <a href="{{ url()->previous() }}" class="btn btn-danger mb-5">Kembali</a> <!-- Tombol kembali -->
</div>
@endsection