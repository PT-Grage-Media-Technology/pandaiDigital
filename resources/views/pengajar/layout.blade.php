<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Welcome Pengajar-</title>
    <link rel="icon" type="image/png" href="{{ 'https://pandaidigital.id/foto_identitas/' . $identitas->favicon }}">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <link rel="stylesheet" href="{{ url('assets/css/sweetalert2.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('assets/vendor/nucleo/css/nucleo.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}"
        type="text/css">
    <link rel="stylesheet" href="{{ url('assets/css/argon.css') }}" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">

    <!-- Flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>

    <!-- Flatpickr JS -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

</head>

<body>
    <nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
        <div class="scrollbar-inner">
            <!-- Brand -->
            <div class="sidenav-header d-flex align-items-center">
                <a class="navbar-brand" href="{{ url('dashboard') }}">
                    Pengajar
                </a>
                <div class="ml-auto">
                    <!-- Sidenav toggler -->
                    <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin"
                        data-target="#sidenav-main">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="navbar-inner">
                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                    <!-- Nav items -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ url('dashboard') }}">
                                <i class="ni ni-shop text-primary"></i>
                                <span class="nav-link-text">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#materi" data-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="materi">
                                <i class="ni ni-archive-2 text-blue"></i>
                                <span class="nav-link-text">Materi</span>
                            </a>
                            <div class="collapse" id="materi">
                                <ul class="nav nav-sm flex-column">
                                    @php
                                        $UserModul = new \App\Models\UserModul();

                                        $cekMateri = $UserModul->umenu_akses('materi', session('id_session'));
                                        $cekPengumpulantugas = $UserModul->umenu_akses('pengumpulantugas', session('id_session'));
                                    @endphp
                                    @if ($cekMateri == 1 || session('level') == 'admin' || session('level') == 'user' || session('level') == 'pengajar')
                                        <li class="nav-item"><a class="nav-link"
                                                href="{{ url('pengajar/materi') }}"><i
                                                    class='ni ni-archive-2 text-orange'></i> Materi</a></li>
                                    @endif
                                    @if ($cekPengumpulantugas == 1 || session('level') == 'admin' || session('level') == 'user' || session('level') == 'pengajar')
                                        <li class="nav-item"><a class="nav-link"
                                                href="{{ url('pengajar/pengumpulantugas') }}"><i
                                                    class='ni ni-folder-17 text-purple'></i> Pengumpulan Tugas</a></li>
                                    @endif
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#bootcamp" data-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="bootcamp">
                                <i class="ni ni-archive-2 text-orange"></i>
                                <span class="nav-link-text">Bootcamp</span>
                            </a>
                            <div class="collapse" id="bootcamp">
                                <ul class="nav nav-sm flex-column">
                                    @php
                                        $UserModul = new \App\Models\UserModul();

                                        $cekBootcamps = $UserModul->umenu_akses('bootcamps', session('id_session'));
                                        $cekPengumpulantugas = $UserModul->umenu_akses('pengumpulantugas', session('id_session'));
                                    @endphp
                                    @if ($cekBootcamps == 1 || session('level') == 'admin' || session('level') == 'user' || session('level') == 'pengajar')
                                        <li class="nav-item"><a class="nav-link"
                                                href="{{ url('pengajar/bootcamps') }}"><i
                                                    class='ni ni-hat-3 text-purple'></i> Bootcamp</a></li>
                                    @endif
                                    @if ($cekPengumpulantugas == 1 || session('level') == 'admin' || session('level') == 'user' || session('level') == 'pengajar')
                                        <li class="nav-item"><a class="nav-link"
                                                href="{{ url('pengajar/pengumpulantugasbootcamp') }}"><i
                                                    class='ni ni-folder-17 text-purple'></i> Pengumpulan Tugas</a></li>
                                    @endif
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="{{ url('pengajar/request') }}">
                                <i class="ni ni-shop text-primary"></i>
                                <span class="nav-link-text">Request</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="{{ url('pengajar/sertifikat') }}">
                                <i class="ni ni-shop text-primary"></i>
                                <span class="nav-link-text">Sertifikat</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>



    <div class="main-content" id="panel">
        <nav class="navbar navbar-top navbar-expand navbar-light bg-secondary border-bottom">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <div id="search-results" class="dropdown-menu dropdown-menu-right" style="display: none;"></div>
                    <ul class="navbar-nav align-items-center ml-md-auto">
                        <li class="nav-item d-xl-none">
                            <div class="pr-3 sidenav-toggler sidenav-toggler-light" data-action="sidenav-pin"
                                data-target="#sidenav-main">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <ul class="navbar-nav align-items-center ml-auto ml-md-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <div class="media align-items-center">
                                    <span class="avatar avatar-sm rounded-circle">
                                        @if (Auth::check() && Auth::user()->foto)
                                            <img alt="Image placeholder"
                                                src="{{ url('foto_user/' . Auth::user()->foto) }}">
                                        @else
                                            <img alt="Image placeholder"
                                                src="{{ asset('assets/img/theme/team-4.jpg') }}">
                                        @endif
                                    </span>
                                    <div class="media-body ml-2 d-none d-lg-block">
                                        <span class="mb-0 text-sm  font-weight-bold">
                                            @if (Auth::check())
                                                {{ Auth::user()->username }}
                                            @else
                                                Pengguna belum login
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome!</h6>
                                </div>
                                <div class="dropdown-divider"></div>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="{{ route('logout') }}" class="dropdown-item"
                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                        <i class="ni ni-user-run"></i>
                                        <span>Logout</span>
                                    </a>
                                </form>

                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="header pb-6">
            <div class="container-fluid">
                @yield('submenu')
            </div>
        </div>
        <div class="container-fluid mt--6">
            @if (session()->has('pesan'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('pesan') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @yield('content')
        </div>

        @yield('footer')
        <footer class="footer pt-0">
            <div class="row align-items-center justify-content-lg-between">
                <div class="col-lg-12">
                    <div class="copyright-text text-center">
                        <strong>Copyright &copy; <?php echo date('Y'); ?> <a target='_BLANK'
                                href="https://pandaidigital.id/"> PT. Pandai Digital</a>.</strong> All rights
                        reserved.
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script src="{{ url('assets/js/jquery.min.js') }}"></script>
    {{-- <script src="{{ url('assets/js/ckeditor.js') }}"></script> --}}
    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/43.0.0/ckeditor5.js"></script> --}}
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    <script src="{{ url('assets/js/sweetalert2.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/autonumeric/4.10.5/autoNumeric.min.js"></script>
    <script src="{{ url('assets/vendor/js-cookie/js.cookie.js') }}"></script>
    <script src="{{ url('assets/js/argon.js') }}"></script>

    <script src="{{ url('assets/vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
    <script src="{{ url('assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
    <script src="{{ url('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Optional JS -->
    <script src="{{ url('assets/vendor/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ url('assets/js/components/charts/chart-bar.js') }}"></script>
    <script src="{{ url('assets/vendor/chart.js/dist/Chart.extension.js') }}"></script>
    @yield('script')
    <script>
        if($('#harga').length>0){
            new AutoNumeric('#harga', {
                decimalPlaces: 0,
                unformatOnSubmit: true,
                decimalCharacter : ',',
                digitGroupSeparator : '.',
            });
        }

        if($('#harga_diskon').length>0){
            new AutoNumeric('#harga_diskon', {
                decimalPlaces: 0,
                unformatOnSubmit: true,
                decimalCharacter : ',',
                digitGroupSeparator : '.',
            });
        }
    </script>


    {{-- <script>
    $(function() {
      $('input[name="datefilter"]').daterangepicker({
        autoUpdateInput: false,
        locale: {
          cancelLabel: 'Bersihkan',
          applyLabel: 'Terapkan',
          format: 'DD/MM/YYYY'
        }
      });

      $('input[name="datefilter"]').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
      });

      $('input[name="datefilter"]').on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');
      });
    });
  </script> --}}
</body>

</html>
