@extends('administrator.layout')


@section('content')  

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="mb-0">Pesan Masuk</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('administrator.pesanmasuk.index') }}" method="GET" class="mb-1">
            <div class="d-flex justify-content-between">
                <div class="input-group" style="max-width: 300px;">
                    <select class="form-control" name="tanggal">
                        <option value="">Pilih Pesan Masuk</option>
                        @foreach ($tanggals as $tanggal)
                            <option value="{{ $tanggal->tanggal }}" {{ request('tanggal') == $tanggal->tanggal ? 'selected' : '' }}>
                                {{ $tanggal->tanggal }}
                            </option>
                        @endforeach  
                    </select>
                    <div class="input-group-append">
                        <button class="btn btn-outline-primary" type="submit">Filter</button>
                    </div>
                </div>
                <div class="input-group" style="max-width: 300px;">
                    <input type="text" class="form-control" placeholder="Cari Pesan Masuk..." name="search" value="{{ request('search') }}">
                    <div class="input-group-append">
                        <button class="btn btn-outline-primary" type="submit">Cari</button>
                    </div>
                </div>
            </div>
            @if(request('search') || request('tanggal'))
            <div class="mt-2 d-flex justify-content-center">
                <a href="{{ route('administrator.pesanmasuk.index') }}" class="btn btn-primary text-white shadow">Seluruh Data</a>
            </div>
            @endif
        </form>

        <div class="table-responsive py-4">
            <table class="table table-bordered" id="datatable-basic">
                <thead class="thead-light">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Subjek</th>
                        <th>Tanggal</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pesan as $index => $mess)
                        <tr>
                            <td>{{ $loop->iteration + $pesan->firstItem() - 1 }}</td>
                            <td>{{ $mess->nama }}</td>
                            <td>{{ $mess->email }}</td>
                            <td>{{ $mess->subjek }}</td>
                            <td>{{ $mess->tanggal }}</td>
                            <td class="text-center">
                                <a href="{{ route('administrator.detailpesanmasuk.show', $mess->id_hubungi) }}" class="btn btn-success btn-sm" title="Detail Data">
                                    <i class="fa fa-envelope"></i>
                                </a>
                                <button data-url="{{ route('administrator.pesanmasuk.destroy', $mess->id_hubungi) }}"
                                    type="button" class="btn-delete btn btn-danger btn-sm" title="Delete Data">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <br>
            {{ $pesan->links('vendor.pagination.bootstrap-4') }}
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
            let startingIndex = {{ $pesan->firstItem() - 1 }};
            $('table tbody tr').each(function(index) {
                $(this).find('td:first-child').text(startingIndex + index + 1);
            });
        }
    });
</script>
@endsection