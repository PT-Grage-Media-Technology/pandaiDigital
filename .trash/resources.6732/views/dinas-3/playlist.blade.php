@extends('dinas-3.layout')


@section('content')
<div class="container mt-5 pt-5">
    <h1>Daftar Video</h1>
    <div class="row">
    @foreach($video as $video)
        <div class="col-lg-6">
            <div class="card mb-4">
                <iframe src="{{ $video->embed_url }}" class="card-img-top" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="aspect-ratio: 16 / 9;"></iframe>
                <div class="card-body">
                    <h5 class="card-title">{{ $video->judul_video }}</h5>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>


@endsection