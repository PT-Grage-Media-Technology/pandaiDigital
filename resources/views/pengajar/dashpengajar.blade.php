@extends('pengajar.layout')

@section('content')
<div class="row">
    <div class="col">
        <h1 class="mb-4">Dashboard Pengajar</h1>

        {{-- Menampilkan Profil User --}}
        @if(session('username'))
        <div class="card">
            <div class="card-body">
                <h5 class="font-bold"><i class="fas fa-user"></i> Username: {{ $users['pengajar']->username }}</h5>
                <h5 class="font-bold"><i class="fas fa-envelope"></i> Email: {{ $users['pengajar']->email }}</h5>
                <h5 class="font-bold"><i class="fas fa-lock"></i> Password: <span class="text-muted">***</span></h5>
                <h5 class="font-bold"><i class="fas fa-phone"></i> No. Telepon: {{ $users['pengajar']->no_telp }}</h5>
                {{-- <h5 class="font-bold"><i class="fas fa-user-shield"></i> Hak Akses: {{ $users['user']->id_session }}</h5> --}}
            </div>
        </div>
        @else
        <h5>User tidak ditemukan.</h5>
        @endif

        <div class="row">
            <!-- ... existing code for cards ... -->
        </div>
    </div>
</div>


,
@endsection

@section('script')
    <script>
        // Jika ada pesan sukses
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('success') }}',
                timer: 2000,
            });
        @endif

        // Jika ada pesan error
        @if (session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '{{ session('error') }}',
                timer: 10000000,
            });
        @endif
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- Pastikan SweetAlert2 diimpor -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
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
