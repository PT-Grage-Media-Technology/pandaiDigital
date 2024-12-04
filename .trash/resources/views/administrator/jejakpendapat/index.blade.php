@extends('administrator.dashboard')

@section('content')

<div class="card">
    <!-- Card header -->
    <div class="card-header d-flex justify-content-between align-items-center">
        <h2 class="mb-0">poling / Jajak Pendapat</h2>
        <a href="{{ route('administrator.jejakpendapat.create')}}" class="btn btn-primary btn-sm">Tambah Data</a>
    </div>

    <div class="card-body">
        <form action="{{ route('administrator.jejakpendapat.index') }}" method="GET" class="mb-1">
            <div class="d-flex justify-content-between">
                <div class="input-group" style="max-width: 300px;">
                    <select class="form-control" name="status">
                        <option value="">Pilih Polling</option>
                        @foreach ($statuses as $status)
                            <option value="{{ $status->status }}" {{ request('status') == $status->status ? 'selected' : '' }}>
                                {{ $status->status }}
                            </option>
                        @endforeach  
                    </select>
                    <div class="input-group-append">
                        <button class="btn btn-outline-primary" type="submit">Filter</button>
                    </div>
                </div>
                <div class="input-group" style="max-width: 300px;">
                    <input type="text" class="form-control" placeholder="Cari Poling..." name="search" value="{{ request('search') }}">
                    <div class="input-group-append">
                        <button class="btn btn-outline-primary" type="submit">Cari</button>
                    </div>
                </div>
            </div>
            @if(request('search') || request('status'))
            <div class="mt-2 d-flex justify-content-center">
                <a href="{{ route('administrator.jejakpendapat.index') }}" class="btn btn-primary text-white shadow">Seluruh Data</a>
            </div>
            @endif
        </form>

        <div class="table-responsive py-4">
            <table class="table table-bordered" id="datatable-basic">
                <thead class="thead-light">
                    <tr>
                        <th>No</th>
                        <th>Pilihan</th>
                        <th>Status</th>
                        <th>Rating</th>
                        <th>Aktif</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $polings as $index => $poling )
                    <tr>
                        <td>{{ $loop->iteration + $polings->firstItem() - 1 }}</td>
                        <td>{{ $poling->pilihan }}</td>
                        <td>{{ $poling->status }}</td>
                        <td>{{ $poling->rating }}</td>
                        <td>{{ $poling->aktif }}</td>
                        <td>
                            <a href="{{ route('administrator.jejakpendapat.edit', $poling->id_poling) }}" class="btn btn-success btn-sm d-inline-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                                <i class="fa fa-edit"></i>
                            </a>
                            <button data-url="{{ route('administrator.jejakpendapat.destroy', $poling->id_poling) }}"
                                type="button" class="btn-delete btn btn-danger btn-sm d-inline-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                                <i class="fa fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <br>
            {{ $polings->links('vendor.pagination.bootstrap-4') }}
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
            let startingIndex = {{ $polings->firstItem() - 1 }};
            $('table tbody tr').each(function(index) {
                $(this).find('td:first-child').text(startingIndex + index + 1);
            });
        }
    });
</script>
@endsection