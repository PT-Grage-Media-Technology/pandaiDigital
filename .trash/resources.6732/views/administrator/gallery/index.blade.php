@extends('administrator.layout')


@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="mb-0">Semua Gallery</h3>
                <a href="{{ route('administrator.gallery.create') }}" class="btn btn-primary btn-sm">Tambahkan Data</a>
            </div>

            <div class="card-body">
                <form action="{{ route('administrator.gallery.index') }}" method="GET" class="mb-1">
                    <div class="d-flex justify-content-between">
                        <div class="input-group" style="max-width: 300px;">
                            <select class="form-control" name="jdl_gallery">
                                <option value="">Pilih Judul Gallery</option>
                                @foreach ($jdl_galleries as $jdl_gallery)
                                    <option value="{{ $jdl_gallery->jdl_gallery }}" {{ request('jdl_gallery') == $jdl_gallery->jdl_gallery ? 'selected' : '' }}>
                                        {{ $jdl_gallery->jdl_gallery }}
                                    </option>
                                @endforeach  
                            </select>
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary" type="submit">Filter</button>
                            </div>
                        </div>
                        <div class="input-group" style="max-width: 300px;">
                            <input type="text" class="form-control" placeholder="Cari Gallery..." name="search" value="{{ request('search') }}">
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary" type="submit">Cari</button>
                            </div>
                        </div>
                    </div>
                    @if(request('search') || request('jdl_gallery'))
                    <div class="mt-2 d-flex justify-content-center">
                        <a href="{{ route('administrator.gallery.index') }}" class="btn btn-primary text-white shadow">Seluruh Data</a>
                    </div>
                    @endif
                </form>
            </div>  

            <div class="table-responsive py-4">
                <table class="table table-bordered" id="datatable-basic">
                    <thead class="thead-light">
                        <tr>  
                            <th>No</th>
                            <th>Foto</th>
                            <th>Judul Foto</th>
                            <th>Nama Album</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($gallery as $index => $galleria)
                            <tr>
                                <td>{{ $loop->iteration + $gallery->firstItem() - 1 }}</td>
                                <td>
                                    <?php
                                        if ($galleria->gbr_gallery != NULL) {
                                            $gbr_gallery = $galleria->gbr_gallery;
                                        }
                                    ?>
                                    <img style='width: 75px; height:75px' src="{{ url('img_gallery/'.$galleria->gbr_gallery )}}">
                                </td>
                                <td>{{ $galleria->jdl_gallery }}</td>
                                <td>{{ $galleria->album->jdl_album ?? 'Tidak ada Judul Album' }}</td>
                                <td class="text-center">
                                    <a href="{{ route('administrator.gallery.edit', $galleria->id_gallery) }}" class="btn btn-success btn-sm d-inline-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <button data-url="{{ route('administrator.gallery.destroy', $galleria->id_gallery) }}"
                                        type="button" class="btn-delete btn btn-danger btn-sm d-inline-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <br>
                {{ $gallery->links('vendor.pagination.bootstrap-4') }}
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
            let startingIndex = {{ $gallery->firstItem() - 1 }};
            $('table tbody tr').each(function(index) {
                $(this).find('td:first-child').text(startingIndex + index + 1);
            });
        }
    });
</script>
@endsection