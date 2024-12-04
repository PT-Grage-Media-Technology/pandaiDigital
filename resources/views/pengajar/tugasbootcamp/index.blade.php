@extends('pengajar.layout')

@section('content')

<style>
    .table td {
        word-wrap: break-word;
        white-space: normal;
    }
</style>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="mb-0">Tugas Bootcamp</h3>
                <a href="{{ route('pengajar.tugasbootcamp.create', ['id_bootcamp' => request('id_bootcamp')]) }}" class="btn btn-primary btn-sm">Tambah Data</a>
            </div>

            <!-- Tambahkan form pencarian -->
            <div class="card-body">
                <form action="{{ route('pengajar.tugasbootcamp.index') }}" method="GET" class="mb-1">
                    <input type="hidden" name="id_bootcamp" value="{{ request('id_bootcamp') }}"> <!-- Tambahkan ini -->
                    <div class="d-flex justify-content-between">
                        <div class="input-group" style="max-width: 300px;">
                            <a href="{{ route('pengajar.bootcamps.index') }}" class="btn btn-primary btn-lg">Back Bootcamp</a>
                        </div>
                        <div class="input-group" style="max-width: 300px;">
                            <input type="text" class="form-control" placeholder="Cari Tugas Bootcamp..." name="search" value="{{ request('search') }}">
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary" type="submit">Cari</button>
                            </div>
                        </div>
                    </div>
                    @if (Auth::user()->level === 'admin')
                                @if (request('search') || request('judul_bootcamp'))
                                <div class="mt-2 d-flex justify-content-center">
                                    <a href="{{ route('pengajar.bootcamp.index') }}"
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
                                <th class="text-center">Judul Tugas</th>
                                <th class="text-center">URL Tugas</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Bootcamp</th>
                                <th class="text-center">File</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                       <tbody>
    @if($tugasbootcamps->isEmpty())
        <tr>
            <td colspan="7" class="text-center">Tidak ada data dari "{{ request('search') }}"</td>
        </tr>
    @else
        @foreach ($tugasbootcamps as $index => $tugasbootcamp)
        <tr>
            <td>{{ $loop->iteration + $tugasbootcamps->firstItem() - 1 }}</td>
            <td>{{ $tugasbootcamp->judul_tugas }}</td>
            <td>{{ $tugasbootcamp->url }}</td>
            <td>{{ $tugasbootcamp->status ? 'Aktif' : 'Tidak Aktif' }}</td>
            <td>{{ $tugasbootcamp->bootcamp->judul_bootcamp ?? 'N/A' }}</td>
            <td>
                @if (strpos($tugasbootcamp->file, '.mp4') !== false || strpos($tugasbootcamp->file, '.avi') !== false || strpos($tugasbootcamp->file, '.mpeg') !== false)
                    <video width="100" controls>
                        <source src="{{ asset('files_tugasbootcamps/' . $tugasbootcamp->file) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                @elseif (strpos($tugasbootcamp->file, '.jpg') !== false || strpos($tugasbootcamp->file, '.jpeg') !== false || strpos($tugasbootcamp->file, '.png') !== false || strpos($tugasbootcamp->file, '.gif') !== false || strpos($tugasbootcamp->file, '.webp') !== false || strpos($tugasbootcamp->file, '.svg') !== false)
                    <img src="{{ asset('files_tugasbootcamps/' . $tugasbootcamp->file) }}" alt="Image" width="100">
                @elseif (strpos($tugasbootcamp->file, '.pdf') !== false)
                    <a href="{{ asset('files_tugasbootcamps/' . $tugasbootcamp->file) }}" target="_blank">Lihat PDF</a>
                @else
                    <span>Tidak ada preview</span>
                @endif
            </td>
            <td class="text-center">
                <div class="d-flex justify-content-center">
                    <a href="{{ route('pengajar.tugasbootcamp.edit', $tugasbootcamp->id_tugas_bootcamp) }}" class="btn btn-success btn-sm d-inline-flex align-items-center justify-content-center me-2" style="width: 32px; height: 32px;">
                        <i class="fa fa-edit"></i>
                    </a>
                    <button data-url="{{ route('pengajar.tugasbootcamp.destroy', $tugasbootcamp->id_tugas_bootcamp) }}"
                        type="button" class="btn-delete btn btn-danger btn-sm d-inline-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                        <i class="fa fa-trash"></i>
                    </button>
                </div>
            </td>
        </tr>
        @endforeach
    @endif
</tbody>

                    </table>
                    <br>
                    {{ $tugasbootcamps->links('vendor.pagination.bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
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
            let startingIndex = {{ $tugasbootcamps->firstItem() - 1 }};
            $('table tbody tr').each(function(index) {
                $(this).find('td:first-child').text(startingIndex + index + 1);
            });
        }
    });
</script>
@endsection
