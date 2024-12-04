@extends('administrator.layout')

@if (Auth::check())
    @section('submenu')
        <div class="header-body">
            <div class="row align-items-center py-2">
                <div class="col-lg-6 col-7">
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links">
                            <li class="breadcrumb-item"><a href="#"><i class="ni ni-shop text-primary"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    @endsection

    @section('content')
        <div class="container">
            <h1 class="mb-4">Dashboard</h1>
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-gradient-primary border-0">
                        <div class="card-body d-flex align-items-center">
                            <i class="fa fa-newspaper fa-3x text-white mr-3"></i>
                            <div>
                                <h5 class="text-white mb-0">BERITA</h5>
                                <h2 class="text-white mb-0">{{ $berita['total_berita'] }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-gradient-success border-0">
                        <div class="card-body d-flex align-items-center">
                            <i class="fa fa-file-alt fa-3x text-white mr-3"></i>
                            <div>
                                <h5 class="text-white mb-0">HALAMAN</h5>
                                <h2 class="text-white mb-0">{{ $halamanbaru['total_halamanbaru'] }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-gradient-warning border-0">
                        <div class="card-body d-flex align-items-center">
                            <i class="fa fa-calendar-alt fa-3x text-white mr-3"></i>
                            <div>
                                <h5 class="text-white mb-0">AGENDA</h5>
                                <h2 class="text-white mb-0">{{ $agenda['total_agenda'] }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-gradient-danger border-0">
                        <div class="card-body d-flex align-items-center">
                            <i class="fa fa-users fa-3x text-white mr-3"></i>
                            <div>
                                <h5 class="text-white mb-0">USERS</h5>
                                <h2 class="text-white mb-0">{{ $users['total_users'] }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-3 mb-3">
                                    <a class="btn btn-secondary d-flex flex-column align-items-center justify-content-center h-100 p-2 w-100 border-0 hover-border-dark "
                                        href="{{ route('administrator.identitaswebsite.edit') }}">
                                        <i class="fa fa-th fa-2x mb-1 mx-auto"></i>
                                        <span class="small">Identitas</span>
                                    </a>
                                </div>
                                <div class="col-3 mb-3">
                                    <a class="btn btn-secondary d-flex flex-column align-items-center justify-content-center h-100 p-2 w-100 border-0 hover-border-dark"
                                        href="{{ url('administrator/menuwebsite') }}">
                                        <i class="fa fa-th-large fa-2x mb-1 mx-auto"></i>
                                        <span class="small">Menu</span>
                                    </a>
                                </div>
                                <div class="col-3 mb-3">
                                    <a class="btn btn-secondary d-flex flex-column align-items-center justify-content-center h-100 p-2 w-100 border-0 hover-border-dark"
                                        href="{{ url('administrator/berita') }}">
                                        <i class="fa fa-desktop fa-2x mb-1 mx-auto"></i>
                                        <span class="small">Berita</span>
                                    </a>
                                </div>
                                <div class="col-3 mb-3">
                                    <a class="btn btn-secondary d-flex flex-column align-items-center justify-content-center h-100 p-2 w-100 border-0 hover-border-dark"
                                        href="{{ url('administrator/kategoriberita') }}">
                                        <i class="fa fa-bars fa-2x mb-1 mx-auto"></i>
                                        <span class="small">Kategori</span>
                                    </a>
                                </div>
                                <div class="col-3 mb-3">
                                    <a class="btn btn-secondary d-flex flex-column align-items-center justify-content-center h-100 p-2 w-100 border-0 hover-border-dark"
                                        href="{{ url('administrator/tagberita') }}">
                                        <i class="fa fa-tag fa-2x mb-1 mx-auto"></i>
                                        <span class="small">Tag Berita</span>
                                    </a>
                                </div>
                                <div class="col-3 mb-3">
                                    <a class="btn btn-secondary d-flex flex-column align-items-center justify-content-center h-100 p-2 w-100 border-0 hover-border-dark"
                                        href="{{ url('administrator/komentarberita') }}">
                                        <i class="fa fa-comments fa-2x mb-1 mx-auto"></i>
                                        <span class="small">Komen. Berita</span>
                                    </a>
                                </div>
                                <div class="col-3 mb-3">
                                    <a class="btn btn-secondary d-flex flex-column align-items-center justify-content-center h-100 p-2 w-100 border-0 hover-border-dark"
                                        href="{{ url('administrator/album') }}">
                                        <i class="fa fa-camera-retro fa-2x mb-1 mx-auto"></i>
                                        <span class="small">Album</span>
                                    </a>
                                </div>
                                <div class="col-3 mb-3">
                                    <a class="btn btn-secondary d-flex flex-column align-items-center justify-content-center h-100 p-2 w-100 border-0 hover-border-dark"
                                        href="{{ url('administrator/gallery') }}">
                                        <i class="fa fa-camera fa-2x mb-1 mx-auto"></i>
                                        <span class="small">Gallery</span>
                                    </a>
                                </div>
                                <div class="col-3 mb-3">
                                    <a class="btn btn-secondary d-flex flex-column align-items-center justify-content-center h-100 p-2 w-100 border-0 hover-border-dark"
                                        href="{{ url('administrator/playlistvideo') }}">
                                        <i class="fa fa-caret-square-right fa-2x mb-1 mx-auto"></i>
                                        <span class="small">Playlist</span>
                                    </a>
                                </div>
                                <div class="col-3 mb-3">
                                    <a class="btn btn-secondary d-flex flex-column align-items-center justify-content-center h-100 p-2 w-100 border-0 hover-border-dark"
                                        href="{{ url('administrator/video') }}">
                                        <i class="fa fa-play fa-2x mb-1 mx-auto"></i>
                                        <span class="small">Video</span>
                                    </a>
                                </div>
                                <div class="col-3 mb-3">
                                    <a class="btn btn-secondary d-flex flex-column align-items-center justify-content-center h-100 p-2 w-100 border-0 hover-border-dark"
                                        href="{{ url('administrator/tagvideo') }}">
                                        <i class="fa fa-tags fa-2x mb-1 mx-auto"></i>
                                        <span class="small">Tag Video</span>
                                    </a>
                                </div>
                                <div class="col-3 mb-3">
                                    <a class="btn btn-secondary d-flex flex-column align-items-center justify-content-center h-100 p-2 w-100 border-0 hover-border-dark"
                                        href="{{ url('administrator/komentarvideo') }}">
                                        <i class="fa fa-comments fa-2x mb-1 mx-auto"></i>
                                        <span class="small">Komen. Video</span>
                                    </a>
                                </div>
                                <div class="col-3 mb-3">
                                    <a class="btn btn-secondary d-flex flex-column align-items-center justify-content-center h-100 p-2 w-100 border-0 hover-border-dark"
                                        href="{{ url('administrator/bannerhome') }}">
                                        <i class="fa fa-file-image fa-2x mb-1 mx-auto"></i>
                                        <span class="small">Ads Tengah</span>
                                    </a>
                                </div>
                                <div class="col-3 mb-3">
                                    <a class="btn btn-secondary d-flex flex-column align-items-center justify-content-center h-100 p-2 w-100 border-0 hover-border-dark"
                                        href="{{ url('administrator/logowebsite') }}">
                                        <i class="fa fa-circle-notch fa-2x mb-1 mx-auto"></i>
                                        <span class="small">Logo</span>
                                    </a>
                                </div>
                                <div class="col-3 mb-3">
                                    <a class="btn btn-secondary d-flex flex-column align-items-center justify-content-center h-100 p-2 w-100 border-0 hover-border-dark"
                                        href="{{ url('administrator/templatewebsite') }}">
                                        <i class="fa fa-file fa-2x mb-1 mx-auto"></i>
                                        <span class="small">Template</span>
                                    </a>
                                </div>
                                <div class="col-3 mb-3">
                                    <a class="btn btn-secondary d-flex flex-column align-items-center justify-content-center h-100 p-2 w-100 border-0 hover-border-dark"
                                        href="{{ url('administrator/agenda') }}">
                                        <i class="fa fa-calendar-minus fa-2x mb-1 mx-auto"></i>
                                        <span class="small">Agenda</span>
                                    </a>
                                </div>
                                <div class="col-3 mb-3">
                                    <a class="btn btn-secondary d-flex flex-column align-items-center justify-content-center h-100 p-2 w-100 border-0 hover-border-dark"
                                        href="{{ url('administrator/sekilasinfo') }}">
                                        <i class="fa fa-calendar-minus fa-2x mb-1 mx-auto"></i>
                                        <span class="small">Sekilas Info</span>
                                    </a>
                                </div>
                                <div class="col-3 mb-3">
                                    <a class="btn btn-secondary d-flex flex-column align-items-center justify-content-center h-100 p-2 w-100 border-0 hover-border-dark"
                                        href="{{ url('administrator/jejakpendapat') }}">
                                        <i class="fa fa-chart-bar fa-2x mb-1 mx-auto"></i>
                                        <span class="small">Polling</span>
                                    </a>
                                </div>
                                <div class="col-3 mb-3">
                                    <a class="btn btn-secondary d-flex flex-column align-items-center justify-content-center h-100 p-2 w-100 border-0 hover-border-dark"
                                        href="{{ url('administrator/pesanmasuk') }}">
                                        <i class="fa fa-envelope fa-2x mb-1 mx-auto"></i>
                                        <span class="small">Pesan</span>
                                    </a>
                                </div>
                                <div class="col-3 mb-3">
                                    <a class="btn btn-secondary d-flex flex-column align-items-center justify-content-center h-100 p-2 w-100 border-0 hover-border-dark"
                                        href="{{ url('administrator/manajemenuser') }}">
                                        <i class="fa fa-users fa-2x mb-1 mx-auto"></i>
                                        <span class="small">Users</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header bg-transparent">
                            <h6 class="text-uppercase text-muted ls-1 mb-1">PERFORMANCE</h6>
                            <h2 class="h3 mb-0">Total Kunjungan</h2>
                        </div>
                        <div class="card-body">
                            <canvas id="chart-bars" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    @endsection
@else
    <script>
        window.onload = function() {
            // Redirect to a specific URL
            window.location.href = "/login";
        };
    </script>
@endif

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('chart-bars').getContext('2d');

    function fetchChartData() {
        fetch("{{ route('administrator.grafik.data') }}") // Adjust URL if needed
            .then(response => response.json())
            .then(data => {
                const labels = data.labels;
                const jumlahKunjungan = data.jumlahKunjungan;

                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Jumlah Kunjungan',
                            data: jumlahKunjungan,
                            backgroundColor: 'rgba(30, 144, 255, 0.8)', // Adjust color as needed
                            borderColor: 'rgba(30, 144, 255, 1)',
                            borderWidth: 4,
                            barThickness: 5, // Set the thickness of each bar (reduce the value)
                            maxBarThickness: 6, // Set the maximum thickness
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    stepSize: 1 // Ensure y-axis steps are in whole numbers
                                },
                                grid: {
                                    color: 'rgba(0, 0, 0, 0.1)',
                                }
                            },
                            x: {
                                grid: {
                                    display: false
                                }
                            }
                        },
                        plugins: {
                            legend: {
                                display: true
                            }
                        }
                    }
                });
            })
            .catch(error => console.error('Error fetching data:', error));
    }

    fetchChartData();
    
    @if (session('status'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('status') }}',
            });
    @endif
});
    </script>
@endsection
