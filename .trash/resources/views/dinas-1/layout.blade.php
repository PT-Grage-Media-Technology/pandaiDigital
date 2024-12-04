<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ $identitas->nama_website }}</title>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow">
    <meta name="description" content="{{ $identitas->meta_deskripsi }}">
    <meta name="keywords" content="{{ $identitas->meta_keywords }}">
    <meta name="author" content="lokomedia.web.id">
    <meta name="robots" content="all,index,follow">
    <meta http-equiv="Content-Language" content="id-ID">
    <meta NAME="Distribution" CONTENT="Global">
    <meta NAME="Rating" CONTENT="General">
    <link rel="canonical" href="{{ url()->current() }}" />
    @if (request()->segment(1) == 'berita' && request()->segment(2) == 'detail')
    @php
    $rows = \App\Models\Berita::where('judul_seo', request()->segment(3))->first();
    @endphp
    <meta property="og:title" content="{{ $title }}" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="{{ url(request()->segment(3)) }}" />
    <meta property="og:image" content="{{ asset('asset/foto_berita/' . $rows->gambar) }}" />
    <meta property="og:description" content="{{ $description }}" />
    @endif
    <link rel="icon" href="{{ asset('foto_identitas/' . $identitas->favicon)}}" type="image/x-icon">
    <link rel="stylesheet" href="{{ url('assets/vendor/nucleo/css/nucleo.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" type="text/css">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/vendor/font-awesome/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/vendor/animate/animate.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/vendor/simple-line-icons/css/simple-line-icons.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/vendor/magnific-popup/magnific-popup.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/vendor/owl.carousel/assets/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/vendor/owl.carousel/assets/owl.theme.default.min.css') }}" type="text/css">

    <link rel="stylesheet" href="{{ asset('assets/css/skins/default.css') }}" type="text/css">

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/sliderlogo.css') }}" type="text/css">

    <!-- Slider Bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/slider-bootstrap/slider-bootstrap.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/argon.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('assets/css/theme.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('assets/css/theme-elements.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('assets/css/theme-blog.css') }}" type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
</head>

<body>
    <header id="header" class="header-no-border-bottom" data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyStartAt': 190, 'stickySetTop': '-190px', 'stickyChangeLogo': false}">
        <div class="header-body">
            <div class="header-container container">
                <div class="header-row">
                    <div class="header-column">
                        <div style="text-align: center;">
                            <img style='width:70px;' src="{{ asset('logo/' . $logo->gambar) }}" />
                            <h4><b><span style=" color: #fff;">PEMERINTAH KABUPATEN KARAWANG</span></b></h4>
                            <h4><b><span style=" color: #fff;">DINAS PENGENDALIAN PENDUDUK DAN KELUARGA BERENCANA</span></b></h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-container header-nav header-nav-center header-nav-bar header-nav-bar-primary">

                <button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main">
                    <i class="fa fa-bars"></i>
                </button>
                <div class="header-nav-main header-nav-main-light header-nav-main-effect-1 header-nav-main-sub-effect-1 collapse" style="padding-top:3px;">
                    <nav>
                        <ul class="nav nav-pills justify-content-center" id="mainNav">
                            <li class="">
                                <a href="{{ url('/') }}">
                                    <i class="fa fa-home" style="font-size:25px;"></i>
                                </a>
                            </li>
                            @foreach($menus as $menu)
                            <li class="dropdown dropdown-mega  position-relative">
                                <a class="dropdown-toggle" href="{{ $menu->link }}" id="navbarDropdown{{ $menu->id_menu }}" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ $menu->nama_menu }}
                                </a>
                                @if($menu->children->count() > 0)
                                <ul class="dropdown-menu" id="dropdown{{ $menu->id_menu }}">
                                    <li>
                                        <div class="dropdown-mega-content container">
                                            <div class="row">
                                                @foreach($menu->children as $child)
                                                <div class="col-md-3">
                                                    <h4>{{ $child->nama_menu }}</h4>
                                                    @if($child->children->count() > 0)
                                                    <ul class="dropdown-mega-sub-nav" style="width:auto;">
                                                        @foreach($child->children as $subChild)
                                                        <li class="justify-content-end">
                                                            <a href="{{ $subChild->link }}">
                                                                <i class="fa fa-chevron-right justify-content-end"></i> {{ $subChild->nama_menu }}
                                                            </a>
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                    @endif
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                @endif
                            </li>
                            @endforeach

                            <li>
                                <a href="{{ url('hubungi/') }}">
                                    Hubungi Kami
                                </a>
                            </li>
                            <li class="hidden-xs hidden-sm" style="float:right;padding:10px 13px;">
                                <form method="POST" action="{{ url('berita/index/') }}">
                                    @csrf
                                    <div class="input-group" style="position:absolute; width:150px; right:50px;">
                                        <input name="kata" type="text" class="form-control" placeholder="Cari...">
                                        <span class="input-group-btn">
                                            <button name="cari" class="btn btn-default" type="submit">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </span>
                                    </div>
                                </form>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>

        @yield('content')
    
    @yield('footer')
    <footer class="">
        <div class="container-fluid bg-dark text-white p-6">
            <div class="row">
                <div class="col-md-4">
                    <h5 class="mb-sm text-white">LOKASI</h5>
                    <iframe width="100%" height="305" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="{{ $identitas->maps }}"></iframe>
                </div>
                <div class="col-md-4">
                    <h5 class="mb-sm text-white">FANSPAGE</h5>
                    <div class="fb-page" data-href="https://www.facebook.com/dppkbkarawang/" data-tabs="timeline" data-width="300" data-height="300" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                        <blockquote cite="https://www.facebook.com/dppkbkarawang/" class="fb-xfbml-parse-ignore">
                            <a href="https://www.facebook.com/dppkbkarawang/">DPPKB Karawang</a>
                        </blockquote>
                    </div>
                </div>
                <div class="col-md-4">
                    <h5 class="mb-sm text-white">CONTACT US</h5>
                    <span class="phone">{{ $identitas->no_telp }}</span>
                    <div class="text-white">
                        {!! $alamat->alamat !!}
                    </div>
                    <ul class="social-icons mt-xl d-flex">
                        <a class="sc-1 mr-4" href="#"><i class="fab fa-facebook fa-2x"></i></a>
                        <a class="sc-2 mr-4" href="#"><i class="fab fa-twitter fa-2x"></i></a>
                        <a class="sc-3 mr-4" href="#"><i class="fab fa-instagram fa-2x"></i></a>
                        <a class="sc-4 mr-4" href="#"><i class="fab fa-youtube fa-2x"></i></a>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid text-white" style="background-color: #000000;">
            <div class="row">
                <div class="col-md-11 p-4">
                    <p class="text-white d-flex justify-content-start ml-6">© {{ date('Y') }} Powered by Lokomedia.web.id.</p>
                </div>
            </div>
        </div>
    </footer>


    <script src="{{ asset('assets/vendor/modernizr/modernizr.min.js') }}"></script>

    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery.appear/jquery.appear.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-cookie/jquery-cookie.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/common/common.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery.validation/jquery.validation.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery.gmap/jquery.gmap.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/isotope/jquery.isotope.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/vide/vide.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/slider-bootstrap/slider-bootstrap.js') }}"></script>
    <script src="{{ asset('assets/vendor/dataTables/datatables.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>

    <!-- Theme Base, Components and Settings -->
    <script src="{{ asset('assets/js/theme.js') }}"></script>

    <!-- Theme Custom -->
    <script src="{{ asset('assets/js/custom.js') }}"></script>

    <!-- Theme Initialization Files -->
    <script src="{{ asset('assets/js/theme.init.js') }}"></script>
</body>

</html>