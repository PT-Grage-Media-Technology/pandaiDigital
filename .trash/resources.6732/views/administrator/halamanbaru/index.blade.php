@extends('administrator.layout')

@section('submenu')

<div class="header-body">
    <div class="row align-items-center py-2">
        <div class="col-lg-6 col-7">
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links">
                    <li class="breadcrumb-item"><a href="#"><i class="ni ni-ungroup text-orange"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Halaman baru</a></li>
                </ol>
            </nav>
        </div>
    </div>
</div>

@endsection

@section('content')

<div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h3 class="mb-0">Halaman Baru</h3>
          <a href="{{ route('administrator.halamanbaru.create') }}" class="btn btn-primary btn-sm">Tambah Data</a>
        </div>

        <div class="card-body">
            <form action="{{ route('administrator.halamanbaru.index') }}" method="GET" class="mb-1">
                <div class="d-flex justify-content-between">
                    <div class="input-group" style="max-width: 300px;">
                        <select class="form-control" name="month">
                            <option value="">Pilih Bulan</option>
                            @foreach ($months as $month)
                                <option value="{{ $month->month }}" {{ request('month') == $month->month ? 'selected' : '' }}>
                                    {{ \Carbon\Carbon::create()->month($month->month)->format('F') }}
                                </option>
                            @endforeach
                        </select>
                        <div class="input-group-append">
                            <button class="btn btn-outline-primary" type="submit">Filter</button>
                        </div>
                    </div>
                    <div class="input-group" style="max-width: 300px;">
                        <input type="text" class="form-control" placeholder="Cari Halamanbaru..." name="search" value="{{ request('search') }}">
                        <div class="input-group-append">
                            <button class="btn btn-outline-primary" type="submit">Cari</button>
                        </div>
                    </div>
                </div>
                @if(request('search') || request('month'))
                <div class="mt-2 d-flex justify-content-center">
                    <a href="{{ route('administrator.halamanbaru.index') }}" class="btn btn-primary text-white shadow">Seluruh Data</a>
                </div>
                @endif
            </form>

            <div class="table-responsive py-4">
            <table class="table table-bordered" id="datatable-basic">
                <thead class="thead-light">
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Judul</th>
                    <th class="text-center">Link</th>
                    <th class="text-center">Tgl Posting</th>
                    <th class="text-center">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($halamanbaru as $index => $page)
                <tr>
                    <td>{{ $loop->iteration + $halamanbaru->firstItem() - 1 }}</td>
                    <td>{{ $page->judul }}</td>
                    <td><a href="{{ url('halaman/detail/' . $page->judul_seo) }}">halaman/detail/{{ $page->judul_seo }}</a></td>
                    <td>{{ \Carbon\Carbon::parse($page->tgl_posting)->format('d M Y') }}</td>
                    <td class="text-center">
                        <a href="{{ route('administrator.halamanbaru.edit', $page->id_halaman) }}" class="btn btn-success btn-sm d-inline-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                        <i class="fa fa-edit"></i>
                        </a>
                        <button
                            data-url="{{ route('administrator.halamanbaru.destroy', $page->id_halaman) }}"
                            type="submit"
                            class="btn-delete btn btn-danger btn-sm d-inline-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                            <i class="fa fa-trash"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            <br>
            {{ $halamanbaru->links('vendor.pagination.bootstrap-4') }}
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
            let startingIndex = {{ $halamanbaru->firstItem() - 1 }};
            $('table tbody tr').each(function(index) {
                $(this).find('td:first-child').text(startingIndex + index + 1);
            });
        }
    });
</script>
@endsection
