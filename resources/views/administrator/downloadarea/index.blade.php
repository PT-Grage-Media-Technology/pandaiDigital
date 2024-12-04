@extends('administrator.dashboard')

@section('content')

<div class="card">
    <!-- Card header -->
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="mb-0">Download File</h3>
        <a href="{{ route('administrator.downloadarea.create')}}" class="btn btn-primary btn-sm">Tambah Data</a>
    </div>

    <div class="card-body">
        <form action="{{ route('administrator.downloadarea.index') }}" method="GET" class="mb-1">
            <div class="d-flex justify-content-between">
                <div class="input-group" style="max-width: 300px;">
                    <select class="form-control" name="tgl_posting">
                        <option value="">Pilih Tanggal Posting</option>
                        @foreach ($tgl_postings as $tgl_posting)
                            <option value="{{ $tgl_posting->tgl_posting }}" {{ request('tgl_posting') == $tgl_posting->tgl_posting ? 'selected' : '' }}>
                                {{ $tgl_posting->tgl_posting }}
                            </option>
                        @endforeach  
                    </select>
                    <div class="input-group-append">
                        <button class="btn btn-outline-primary" type="submit">Filter</button>
                    </div>
                </div>
                <div class="input-group" style="max-width: 300px;">
                    <input type="text" class="form-control" placeholder="Cari Download File..." name="search" value="{{ request('search') }}">
                    <div class="input-group-append">
                        <button class="btn btn-outline-primary" type="submit">Cari</button>
                    </div>
                </div>
            </div>
            @if(request('search') || request('tgl_posting'))
            <div class="mt-2 d-flex justify-content-center">
                <a href="{{ route('administrator.downloadarea.index') }}" class="btn btn-primary text-white shadow">Seluruh Data</a>
            </div>
            @endif
        </form>

        <div class="table-responsive py-4">
            <table class="table table-bordered" id="datatable-basic">
                <thead class="thead-light">
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Link</th>
                        <th>Hits</th>
                        <th>Tanggal</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($downloads as $index => $download)
                    <tr>
                        <td>{{ $loop->iteration + $downloads->firstItem() - 1 }}</td>
                        <td>{{ $download->judul }}</td>
                        <td><a href="{{ route('administrator.downloadarea.show', ['downloadarea' => $download->id_download, 'download' => true]) }}">Unduh</a></td>
                        <td>{{ $download->hits }}</td>
                        <td>{{ \Carbon\Carbon::parse($download->tgl_posting)->format('d M Y') }}</td>
                        <td>
                            <a href="{{ route('administrator.downloadarea.edit', $download->id_download) }}" class="btn btn-success btn-sm d-inline-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                                <i class="fa fa-edit"></i>
                            </a>
                            <button data-url="{{ route('administrator.downloadarea.destroy', $download->id_download) }}"
                                type="button" class="btn-delete btn btn-danger btn-sm d-inline-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                                <i class="fa fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <br>
            {{ $downloads->links('vendor.pagination.bootstrap-4') }}
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
            let startingIndex = {{ $downloads->firstItem() - 1 }};
            $('table tbody tr').each(function(index) {
                $(this).find('td:first-child').text(startingIndex + index + 1);
            });
        }
    });
</script>
@endsection