@extends('dinas-1.layout')

@section('content')
<div style="margin-bottom:80px">
    <div id="carousel-example-generic" class="carousel-slide">
        @foreach($banners as $banner)
        <div class="carousel-inner" role="listbox">
            <img src="{{ asset('foto_banner/' . $banner->gambar)}}" class="img-responsive" style="width:100%;height:auto;">
            <div class="carousel-caption animated fadeInLeft">
                <h2 class="slide-text-heading" data-animation="animated bounceInLeft">{{ $banner->judul}}</h2>
                <h4 class="slide-text-desc" data-animation="animated bounceInUp">
                    <h4 style="text-align: left;"><span style="color: #ffffff;">{{ $banner->deskripsi }}</span></h4>
                </h4>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- <script>
    let currentIndex = 0;
    const slides = document.querySelectorAll('.slide');
    const totalSlides = slides.length;

    function showSlide(index) {
        slides.forEach((slide, i) => {
            slide.style.display = (i === index) ? 'block' : 'none';
        });
    }

    function nextSlide() {
        currentIndex = (currentIndex + 1) % totalSlides;
        showSlide(currentIndex);
    }

    showSlide(currentIndex);
    setInterval(nextSlide, 4000); // Ganti slide setiap 3 detik
</script> -->
<div class="container">
    <div class="row">
        <div class="col-md-12 center">
            <div class="heading heading-border heading-middle-border heading-middle-border-center">
                <h2 class="mb-lg">LINK <strong>TERKAIT</strong></h2>
            </div>
            <iframe src="sliderlogo" width="100%" height="400" frameBorder="0" style="max-width: 100%;"></iframe>
        </div>
    </div>
</div>

<section class="section section-no-background m-none">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 welcome padding-left-none padding-bottom-40 scroll_effect fadeInUp">
                <h2 class="margin-bottom-25 margin-top-none">BERITA <strong>TERBARU</strong></h2>
                <div id="myCarousel" class=".owl-carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @foreach ($beritas as $index => $berita)
                        <li data-target="#myCarousel" data-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}"></li>
                        @endforeach
                    </ol>
                    <div class="carousel-inner">
                        @foreach ($beritas as $index => $berita)
                        <div class="item {{ $index === 0 ? 'active' : '' }}">
                            <a href="#" target="_blank">
                                <img class="max-height:270px;" src="{{ asset('foto_berita/' . $berita->gambar) }}" alt="{{ $berita->judul }}" />
                                <div class="carousel-caption animated fadeInLeft" style="top:73%;width:100%;">
                                    <span data-animation="animated bounceInLeft" style="bottom: 30px; position: fixed; min-width: 350px;left: 20px;">
                                        <a style="color:white;" href="{{ url('berita/detail/' . $berita->judul_seo) }}">{{ $berita->judul }}</a>
                                    </span>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>

            <div class="col-md-3" data-wow-delay=".4s" style="margin-top: 20px;"> <!-- Tambahkan jarak di sini -->
                <h2 class="mb-lg">PENGUMUMAN</h2>
                @foreach ($infos as $h)
                <div class="recent-posts">
                    <article class="post">
                        <p><span><i class="fa fa-volume-up"></i></span> &nbsp;{{ $h->info }}</p>
                    </article>
                </div>
                @endforeach
            </div>

            <div class="col-md-4" data-wow-delay=".4s" style="margin-top: 20px;"> <!-- Tambahkan jarak di sini -->
                <h2 class="mb-lg">AGENDA <strong>KEGIATAN</strong></h2>
                @foreach ($agendas as $h)
                <div class="recent-posts">
                        <div class="post-meta">
                            <span><i class="fa fa-calendar"></i> {{ $h->tgl_posting }} {{ $h->jam}}</span>
                            <h5><a href="{{ url('agenda/detail/' . $h->tema_seo) }}" class="text-red">{{ $h->tema }}</a></h5>
                        </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection