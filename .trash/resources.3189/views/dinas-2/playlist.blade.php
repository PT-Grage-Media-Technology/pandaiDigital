@extends('dinas-2.layout')


@section('content')
<div class="container mt-5 pt-5">
    <h1>Semua Video</h1>
    <div class="row">
        @foreach($video as $video)
        <div class="col-lg-6">
            <div class="card mb-4">
                <iframe src="{{ $video->embed_url }}" class="card-img-top" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="aspect-ratio: 16 / 9;"></iframe>
                <div class="card-body">
                    <a href="{{ $video->video_seo }}" class="primary">{{ $video->jdl_video }}</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>


@endsection