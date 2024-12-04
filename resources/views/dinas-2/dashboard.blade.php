@extends('dinas-2.layout')

@section('content')

<section id="hero" class="hero">

    <div class="info d-flex align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <h2 data-aos="fade-down">Welcome To <span>{{ $identitas->nama_website }}</span></h2>
                </div>
            </div>
        </div>
    </div>

    <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2500">
        @foreach($banners as $banner)
        <div class="carousel-item active{{ $loop->first ? 'active' : '' }}">
            <img src="{{ url('foto_banner/' . $banner->gambar) }}" alt="alternative">
        </div>
        @endforeach
        <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

    </div>

</section><!-- End Hero Section -->

<main id="main">

    <!-- ======= Get Started Section ======= -->
    <section id="contact" class="get-started section-bg">
        <div class="container">

            <div class="row justify-content-between gy-4">

                <div class="col-lg-6">
                    <div class="image-container">
                        <iframe width="100%" height="500" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="{{ $identitas->first()->maps }}"></iframe>
                    </div>
                </div>

                <div class="col-lg-5" data-aos="fade">
                    <form action="{{ route('administrator.pesanmasuk.store') }}" method="post" enctype="multipart/form-data" id="pesanForm">
                        @csrf
                        <h3>Contact Us</h3>
                        <div class="row gy-3">

                            <div class="col-md-12">
                                <input type="text" name="nama" class="form-control" placeholder="name" required>
                            </div>

                            <div class="col-md-12 ">
                                <input type="email" class="form-control" name="email" placeholder="Email" required>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="subjek" name="subjek" placeholder="subjek" required>
                                @if ($errors->has('subjek'))
                                <span class="text-danger">{{ $errors->first('subjek') }}</span>
                                @endif
                            </div>

                            <div class="col-md-12">
                                <textarea class="form-control" name="pesan" rows="6" placeholder="Message" required></textarea>
                            </div>

                            <!-- ... existing code ... -->
                            <!-- ... existing code ... -->
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn-outline-sm btn btn-outline-warning p-2 text-center" style="margin: 0 auto; margin-bottom: 10px; border-radius: 25px;">Send</button>
                            </div>

                        </div>
                    </form>
                </div><!-- End Quote Form -->

            </div>

        </div>
    </section><!-- End Get Started Section -->

    <!-- ======= Constructions Section ======= -->
    <section id="constructions" class="constructions">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Pengumuman</h2>
            </div>
            <div class="row gy-4">
                @foreach($infos as $h)
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="card-item">
                        <div class="row">
                            <div class="col-xl-7 d-flex align-items-center">
                                <div class="card-body">
                                    <p><span><i class="fa fa-volume-up"></i></span> &nbsp;{{ $h->info }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Card Item -->
                @endforeach
            </div>
        </div>
    </section><!-- End Constructions Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Agenda</h2>
            </div>

            <div class="row gy-4">

                @foreach ($agendas as $h)
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-item  position-relative">
                        <div class="icon">
                            <i class="fa-solid fa-mountain-city"></i>
                        </div>
                        <h3><a href="{{ url('agenda/detail/' . $h->tema_seo) }}" class="text-red">{{ $h->tema }}</a></h3>
                        <span><i class="fa fa-calendar"></i> {{ $h->tgl_posting }} {{ $h->jam}}</span>
                        <br>
                        <a href="service-details.html" class="readmore stretched-link">Learn more <i
                                class="bi bi-arrow-right"></i></a>
                    </div>
                </div><!-- End Service Item -->
                @endforeach
            </div>

        </div>
    </section><!-- End Services Section -->

    <!-- ======= Alt Services Section ======= -->
    <section id="alt-services" class="alt-services">
        <div class="container" data-aos="fade-up">

            <div class="row justify-content-center gy-4">
                <div class="col-lg-12 d-flex flex-column justify-content-center">
                    <h2 class="text-center">Link Terkait</h2>

                    <div class="row justify-content-center">
                        @foreach($links as $link)
                        <div class="col-lg-6 d-flex justify-content-center">
                            <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="100">
                                <img src="{{ asset('foto_bannerhome/' . $link->gambar) }}" style="max-width: 30%; height: auto;">
                            </div><!-- End Icon Box -->
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End Alt Services Section -->

    <section id="testimonials" class="testimonials section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Berita Terbaru</h2>

            </div>

            <div class="slides-2 swiper">
                <div class="swiper-wrapper">
                    @foreach ($beritas as $index => $berita)
                    <div class="swiper-slide">
                        <div class="testimonial-wrap">
                            <div class="testimonial-item">
                                <img src="{{ asset('foto_berita/' . $berita->gambar) }}" class="testimonial-img" alt="">
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    {{ $berita->judul }}
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <!-- End testimonial item -->

                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>
    </section>

    <!-- ======= Features Section ======= -->
    <section id="features" class="features section-bg">
        <div class="container" data-aos="fade-up">

            <ul class="nav nav-tabs row  g-2 d-flex">
                @foreach($kategoriBerita as $index => $item)
                <li class="nav-item col-3">
                    <a class="nav-link {{ $index == 0 ? 'active show' : '' }}" data-bs-toggle="tab" data-bs-target="#tab-{{ $index + 1 }}">
                        <h4><strong>{{ $item->nama_kategori }}</strong></h4>
                    </a>
                </li><!-- End tab nav item -->
                @endforeach
            </ul>

            <div class="tab-content">

                <div class="tab-pane active show" id="tab-1">
                    <div class="row">
                        @foreach($beritao as $berita)
                        <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                            <div class="service-item position-relative">
                                <div class="bg-transparent" style="margin-bottom: 20px; margin-right: 20px;">
                                    <img class="card-img-top" src="{{ asset('foto_berita/' . $berita->gambar)}}" alt="Card image cap">
                                    <div class="card-body">
                                        <p><i class="fa fa-calendar"> </i> {{ $berita->tanggal }} , {{ $berita->jam }}</p>
                                        <p class="card-title">{{ $berita->judul }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div><!-- End tab content item -->

                <div class="tab-pane" id="tab-2">
                    <div class="row">
                        @foreach($beritad as $berita)
                        <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                            <div class="service-item position-relative">
                                <div class="bg-transparent" style="margin-bottom: 20px; margin-right: 20px;">
                                    <img class="card-img-top" src="{{ asset('foto_berita/' . $berita->gambar)}}" alt="Card image cap">
                                    <div class="card-body">
                                        <p><i class="fa fa-calendar"> </i> {{ $berita->tanggal }} , {{ $berita->jam }}</p>
                                        <p class="card-title">{{ $berita->judul }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div><!-- End tab content item -->

                <div class="tab-pane" id="tab-3">
                    <div class="row">
                        @foreach($beritau as $berita)
                        <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                            <div class="service-item position-relative">
                                <div class="bg-transparent" style="margin-bottom: 20px; margin-right: 20px;">
                                    <img class="card-img-top" src="{{ asset('foto_berita/' . $berita->gambar)}}" alt="Card image cap">
                                    <div class="card-body">
                                        <p><i class="fa fa-calendar"> </i> {{ $berita->tanggal }} , {{ $berita->jam }}</p>
                                        <p class="card-title">{{ $berita->judul }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Features Section -->

    <!-- ======= Our Projects Section ======= -->
    <section id="projects" class="projects">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Polling</h2>
            </div>

            <div class="polling">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <form action="{{ route('polling.store') }}" method="POST" id="pollingForm">
                                @csrf
                                @foreach($pilihan as $p)
                                <p>{{ $p->pilihan }}</p>
                                @endforeach
                                @foreach($jawaban as $j)
                                <label>
                                    <input type="radio" name="pilihan_id" value="{{ $j->id_poling }}" required>
                                    <span>{{ $j->pilihan }}</span>
                                </label>
                                @endforeach
                                <button type="submit" class="btn-outline-sm p-2" style="margin: 0 auto; margin-bottom: 10px;" data-bs-target="#exampleModalToggle">Konfirmasi Pilihan</button>
                                <button type="button" class="btn-outline-sm" style="margin: 0 auto;" data-bs-toggle="modal" data-bs-target="#exampleModalToggle">Lihat Hasil</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Hasil Polling</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @foreach($jawaban as $jp)
                    <div class="hasil-polling">
                        @php
                        $totalRating = $jawaban->sum('rating');
                        @endphp
                        <p>{{ $jp->pilihan }}: {{ round(($jp->rating / $totalRating) * 100, 2) }}%</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- End Our Projects Section -->

    <!-- ======= Testimonials Section ======= -->
    <!-- End Testimonials Section -->

    <!-- ======= Recent Blog Posts Section ======= -->
    <section id="recent-blog-posts" class="recent-blog-posts">
        <div class="container" data-aos="fade-up" style="margin-top: 20px; margin-bottom: 20px;">
            <div class="section-header">
                <h2>Video</h2>
            </div>

            <div class="row gy-5 justify-content-center">

                <div class="col-xl-12 col-md-12 d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
                    @foreach($videos as $video)
                    <div class="col-lg-6">
                        <div class="card mb-4">
                            <iframe src="{{ $video->embed_url }}" class="card-img-top" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="aspect-ratio: 16 / 9;"></iframe>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
    </section>
    <!-- End Recent Blog Posts Section -->

</main>

<script>
    document.getElementById('pollingForm').onsubmit = function(event) {
        event.preventDefault(); // Mencegah form dari pengiriman default
        const formData = new FormData(this);
        fetch(this.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Menggunakan SweetAlert untuk menampilkan pesan sukses
                Swal.fire({
                    title: 'Berhasil!',
                    text: data.message,
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Arahkan ke halaman /company-profile setelah menekan OK
                        window.location.href = '/company-profile';
                    }
                });
            }
        })
        .catch(error => {
            console.error('Error:', error);
            Swal.fire({
                title: 'Error!',
                text: 'Terjadi kesalahan saat mengirim jawaban.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        });
    };
</script>

<script>
    document.getElementById('pesanForm').onsubmit = function(event) {
        event.preventDefault(); // Mencegah form dari pengiriman default
        const formData = new FormData(this);
        fetch(this.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            const contentType = response.headers.get("content-type");
            if (!contentType || !contentType.includes("application/json")) {
                throw new TypeError("Response is not JSON");
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                // Menggunakan SweetAlert untuk menampilkan pesan sukses
                Swal.fire({
                    title: 'Berhasil!',
                    text: data.message,
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Arahkan ke halaman /company-profile setelah menekan OK
                        window.location.href = '/company-profile';
                    }
                });
            } else {
                throw new Error('Server response did not indicate success');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            Swal.fire({
                title: 'Error!',
                text: 'Terjadi kesalahan saat mengirim jawaban.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        });
    };
</script>

@endsection