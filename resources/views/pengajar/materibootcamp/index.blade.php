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
                <h3 class="mb-0">Materi Bootcamp</h3>
                <a href="{{ route('pengajar.materibootcamp.create', ['id_bootcamp' => request('id_bootcamp')]) }}" class="btn btn-primary btn-sm">Tambah Data</a>
            </div>

            <!-- Tambahkan form pencarian -->
            <div class="card-body">
                <form action="{{ route('pengajar.materibootcamp.index') }}" method="GET" class="mb-1">
                    <input type="hidden" name="id_bootcamp" value="{{ request('id_bootcamp') }}">
                    <div class="d-flex justify-content-between">
                        <div class="input-group" style="max-width: 300px;">
                            <a href="{{ route('pengajar.bootcamps.index') }}" class="btn btn-primary btn-lg">Back Bootcamp</a>
                        </div>
                        <div class="input-group" style="max-width: 300px;">
                            <input type="text" class="form-control" placeholder="Cari Materi Bootcamp..." name="search" value="{{ request('search') }}">
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary" type="submit">Cari</button>
                            </div>
                        </div>
                    </div>
                    @if (Auth::user()->level === 'admin')
                        @if (request('search') || request('judul_file'))
                            <div class="mt-2 d-flex justify-content-center">
                                <a href="{{ route('pengajar.bootcamp.index') }}" class="btn btn-primary text-white shadow">Seluruh Data</a>
                            </div>
                        @endif
                    @endif
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
                            @if ($materibootcamps->isEmpty())
                                <tr>
                                    <td colspan="5" class="text-center">
                                        Tidak ada data dari "{{ request('search') }}"
                                    </td>
                                </tr>
                            @else
                                @foreach ($materibootcamps as $index => $materibootcamp)
                                <tr>
                                    <td>{{ $loop->iteration + $materibootcamps->firstItem() - 1 }}</td>
                                    <td>{{ $materibootcamp->judul_file }}</td>
                                    <td>{{ $materibootcamp->url }}</td>
                                    <td>
                                        @if (strpos($materibootcamp->file, '.mp4') !== false || strpos($materibootcamp->file, '.avi') !== false || strpos($materibootcamp->file, '.mpeg') !== false)
                                            <video width="100" controls>
                                                <source src="{{ asset('files_materibootcamps/' . $materibootcamp->file) }}" type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>
                                        @elseif (strpos($materibootcamp->file, '.jpg') !== false || strpos($materibootcamp->file, '.jpeg') !== false || strpos($materibootcamp->file, '.png') !== false || strpos($materibootcamp->file, '.gif') !== false)
                                            <img src="{{ asset('files_materibootcamps/' . $materibootcamp->file) }}" alt="Image" width="100">
                                        @elseif (strpos($materibootcamp->file, '.pdf') !== false)
                                            <a href="{{ asset('files_materibootcamps/' . $materibootcamp->file) }}" target="_blank">Lihat PDF</a>
                                        @else
                                            <span>Tidak ada preview</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center">
                                            <a href="{{ route('pengajar.materibootcamp.edit', $materibootcamp->id_materi_bootcamp) }}" class="btn btn-success btn-sm d-inline-flex align-items-center justify-content-center me-2" style="width: 32px; height: 32px;">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <button data-url="{{ route('pengajar.materibootcamp.destroy', $materibootcamp->id_materi_bootcamp) }}"
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
                    {{ $materibootcamps->links('vendor.pagination.bootstrap-4') }}
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
            e.preventDefault();

            let btn = $(this);
            let url = btn.data('url');

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

                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            Swal.fire({
                                title: "Deleted!",
                                text: "Data Anda telah dihapus.",
                                icon: "success"
                            }).then(() => {
                                btn.closest('tr').fadeOut(500, function() {
                                    $(this).remove();
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

        function updateRowNumbers() {
            let startingIndex = {{ $materibootcamps->firstItem() - 1 }};
            $('table tbody tr').each(function(index) {
                $(this).find('td:first-child').text(startingIndex + index + 1);
            });
        }
    });
</script>
@endsection
