@extends('pengajar.layout')

@section('content')
    <style>
        .table td {
            word-wrap: break-word;
            white-space: normal;
        }
    </style>

    @if (isset($trainer_login))
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="mb-0">Materi</h3>
                        <a href="{{ route('pengajar.materi.create') }}" class="btn btn-primary btn-sm">Tambah Data</a>
                    </div>

                    <!-- Tambahkan form pencarian -->
                    <div class="card-body">
                        <form action="{{ route('pengajar.materi.index') }}" method="GET" class="mb-1">
                            <div class="d-flex flex-column flex-sm-row justify-content-between">
                                <div class="input-group mb-2 mb-sm-0" style="max-width: 300px;">
                                    <select class="form-control" name="id_kategori_program">
                                        <option value="">Pilih Kategori</option>
                                        @foreach ($kategoriprograms as $kategori)
                                            <option value="{{ $kategori->id_kategori_program }}"
                                                {{ request('id_kategori_program') == $kategori->id_kategori_program ? 'selected' : '' }}>
                                                {{ $kategori->nama_kategori }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-primary" type="submit">Filter</button>
                                    </div>
                                </div>
                                <div class="input-group" style="max-width: 300px;">
                                    <input type="text" class="form-control" placeholder="Cari Materi..." name="search"
                                        value="{{ request('search') }}">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-primary" type="submit">Cari</button>
                                    </div>
                                </div>
                            </div>

                            @if (Auth::user()->level === 'admin')
                                @if (request('search') || request('nama_materi') || request('id_kategori_program'))
                                    <div class="mt-2 d-flex justify-content-center">
                                        <a href="{{ route('pengajar.materi.index') }}"
                                            class="btn btn-primary text-white shadow">Seluruh Data</a>
                                    </div>
                                @endif
                            @else
                            @endif

                        </form>


                        <div class="table-responsive py-4">
                            <table class="table table-bordered" id="datatable-basic">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Judul Materi</th>
                                        <th class="text-center">Kategori</th>
                                        <th class="text-center">Gambar</th>
                                        <th class="text-center">Topik</th>
                                        <th class="text-center">Nama Pengajar</th> <!-- Tambahkan ini untuk Nama Trainer -->
                                        <th class="text-center">Action</th>
                                        <th class="text-center">Isi Materi</th>
                                        <th class="text-center">+ Tugas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($materis as $index => $materi)
                                        <tr>
                                            <td>{{ $loop->iteration + $materis->firstItem() - 1 }}</td>
                                            <td>{{ $materi->nama_materi }}</td>
                                            <td>{{ $materi->kategoriprogram->nama_kategori }}</td>
                                            <td>
                                                @if ($materi->thumbnail)
                                                    <img style="width: 80px"
                                                        src="{{ asset('thumbnail/' . $materi->thumbnail) }}">
                                                @else
                                                    <p>No Image</p>
                                                @endif
                                            </td>
                                            <td>{{ $materi->topik->nama_topik }}</td>
                                            <td>{{ $materi->trainer->pengajar->username }}</td>
                                            <!-- Menampilkan Nama Trainer dari user yang terkait -->
                                            <td class="text-center">
                                                <div class="d-flex justify-content-center">
                                                    <a href="{{ route('pengajar.materi.edit', $materi->id_materi) }}"
                                                        class="btn btn-success btn-sm d-inline-flex align-items-center justify-content-center me-2"
                                                        style="width: 32px; height: 32px;">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <button
                                                        data-url="{{ route('pengajar.materi.destroy', $materi->id_materi) }}"
                                                        type="button"
                                                        class="btn-delete btn btn-danger btn-sm d-inline-flex align-items-center justify-content-center"
                                                        style="width: 32px; height: 32px;">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="d-flex justify-content-center">
                                                    <a href="{{ route('pengajar.isimateri.index', ['id_materi' => $materi->id_materi]) }}"
                                                        class="btn btn-success btn-sm d-inline-flex align-items-center justify-content-center me-2"
                                                        style="width: 32px; height: 32px;">
                                                        <i class="fa fa-plus"></i>
                                                    </a>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="d-flex justify-content-center">
                                                    <a href="{{ route('pengajar.tugas.index', ['id_materi' => $materi->id_materi]) }}"
                                                        class="btn btn-success btn-sm d-inline-flex align-items-center justify-content-center me-2"
                                                        style="width: 32px; height: 32px;">
                                                        <i class="fa fa-plus"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <br>
                            {{ $materis->links('vendor.pagination.bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
        <script>
            $(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $(document).on('click', '.btn-delete', function(e) {
                    e.preventDefault(); // Mencegah aksi default

                    let btn = $(this);
                    let url = btn.data('url'); // Ambil URL dari data-url

                    Swal.fire({
                        icon: 'warning',
                        text: 'Data yang sudah dihapus tidak dapat dikembalikan!',
                        title: 'Apakah Anda yakin ingin menghapus data ini?',
                        showCancelButton: true,
                        confirmButtonColor: '#D33',
                        confirmButtonText: 'Yakin hapus?',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Tampilkan pesan "Deleting..." sebelum permintaan AJAX
                            Swal.fire({
                                title: 'Deleting...',
                                text: 'Sedang menghapus data...',
                                icon: 'info',
                                allowOutsideClick: false,
                                showConfirmButton: false,
                                onOpen: () => {
                                    Swal.showLoading();
                                }
                            });

                            // Mengirim permintaan AJAX DELETE
                            $.ajax({
                                url: url,
                                type: 'DELETE',
                                data: {
                                    _token: '{{ csrf_token() }}' // Sertakan CSRF token
                                },
                                success: function(response) {
                                    Swal.fire({
                                        title: "Deleted!",
                                        text: "Data Anda telah dihapus.",
                                        icon: "success"
                                    }).then(() => {
                                        // Hapus baris tabel
                                        btn.closest('tr').fadeOut(500, function() {
                                            $(this).remove();

                                            // Perbarui nomor urut setelah elemen dihapus
                                            updateRowNumbers();
                                        });
                                    });
                                },
                                error: function(xhr) {
                                    Swal.fire({
                                        title: "Error!",
                                        text: "Terjadi kesalahan saat menghapus data.",
                                        icon: "error"
                                    });
                                }
                            });
                        }
                    });
                });

                // Fungsi untuk memperbarui nomor urut
                function updateRowNumbers() {
                    let startingIndex = {{ $materis->firstItem() - 1 }};
                    $('table tbody tr').each(function(index) {
                        $(this).find('td:first-child').text(startingIndex + index + 1);
                    });
                }
            });
        </script>
    @else
        <div class="container text-center my-5" style="max-width: 600px;">
            <div class="message mb-4">
                Maaf {{ Auth::user()->username }}, anda belum menjadi trainer, segera hubungi admin untuk menambahkan diri
                anda menjadi trainer!
            </div>
            <a href="mailto:administrator@grageacademy.online" class="btn btn-primary me-2">Hubungi Admin</a>
            <a href="/dashboard" class="btn btn-secondary">Kembali ke Beranda</a>
        </div>
    @endif
@endsection
