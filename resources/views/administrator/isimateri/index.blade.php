@extends('administrator.layout')

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
                <h3 class="mb-0">Isi Materi</h3>
                <a href="{{ route('administrator.isimateri.create', ['id_materi' => request('id_materi')]) }}" class="btn btn-primary btn-sm">Tambah Data</a>
            </div>

            <!-- Tambahkan form pencarian -->
            <div class="card-body">
                <form action="{{ route('administrator.isimateri.index') }}" method="GET" class="mb-1">
                    <input type="hidden" name="id_materi" value="{{ request('id_materi') }}"> <!-- Tambahkan ini -->
                    <div class="d-flex justify-content-between">
                        <div class="input-group" style="max-width: 300px;">
                            <a href="{{ route('administrator.materi.index') }}" class="btn btn-primary btn-lg">Back Materi</a>
                        </div>
                        <div class="input-group" style="max-width: 300px;">
                            <input type="text" class="form-control" placeholder="Cari Isi Materi..." name="search" value="{{ request('search') }}">
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary" type="submit">Cari</button>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="table-responsive py-4">
                    <table class="table table-bordered" id="datatable-basic">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Judul File</th>
                                <th class="text-center">URL Materi</th>
                                <th class="text-center">File</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($isi_materis as $index => $isi_materi)
                            <tr>
                                <td>{{ $loop->iteration + $isi_materis->firstItem() - 1 }}</td>
                                <td>{{ $isi_materi->judul_file }}</td>
                                <td>{{ $isi_materi->url }}</td>
                                <td>
                                    @if (strpos($isi_materi->file, '.mp4') !== false || 
                                          strpos($isi_materi->file, '.avi') !== false || 
                                          strpos($isi_materi->file, '.mpeg') !== false)
                                        <video width="100" controls>
                                            <source src="{{ asset('files/' . $isi_materi->file) }}" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                    @elseif (strpos($isi_materi->file, '.jpg') !== false || 
                                              strpos($isi_materi->file, '.gif') !== false || 
                                              strpos($isi_materi->file, '.jpeg') !== false || 
                                              strpos($isi_materi->file, '.png') !== false || 
                                              strpos($isi_materi->file, '.webp') !== false || 
                                              strpos($isi_materi->file, '.svg') !== false)
                                        <img src="{{ asset('files/' . $isi_materi->file) }}" alt="Image" width="100">
                                    @elseif (strpos($isi_materi->file, '.pdf') !== false)
                                        <a href="{{ asset('files/' . $isi_materi->file) }}" target="_blank">Lihat PDF</a>
                                    @else
                                        <span>Tidak ada preview</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ route('administrator.isimateri.edit', $isi_materi->id_isi_materi) }}" class="btn btn-success btn-sm d-inline-flex align-items-center justify-content-center me-2" style="width: 32px; height: 32px;">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <button data-url="{{ route('administrator.isimateri.destroy', $isi_materi->id_isi_materi) }}"
                                            type="button" class="btn-delete btn btn-danger btn-sm d-inline-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <br>
                    {{ $isi_materis->links('vendor.pagination.bootstrap-4') }}
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
            let startingIndex = {{ $isi_materis->firstItem() - 1 }};
            $('table tbody tr').each(function(index) {
                $(this).find('td:first-child').text(startingIndex + index + 1);
            });
        }
    });
</script>
@endsection