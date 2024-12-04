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
                <h3 class="mb-0">Sertifikat</h3>
            </div>

            <!-- Tambahkan form pencarian -->
            <div class="card-body">
                <form action="{{ route('administrator.sertifikat.index') }}" method="GET" class="mb-1">
                    <input type="hidden" name="id_bootcamp" value="{{ request('id_bootcamp') }}">
                    <div class="d-flex justify-content-between">
                        <div class="input-group" style="max-width: 300px;">
                            <input type="text" class="form-control" placeholder="Cari Isi Sertifikat..." name="search" value="{{ request('search') }}">
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary" type="submit">Cari</button>
                            </div>
                        </div>
                    </div>
                    @if(request('search') || request('id_bootcamp'))
                    <div class="mt-2 d-flex justify-content-center">
                        <a href="{{ route('administrator.sertifikat.index') }}" class="btn btn-primary text-white shadow">Seluruh Data</a>
                    </div>
                    @endif
                </form>

                <div class="table-responsive py-4">
                    <table class="table table-bordered" id="datatable-basic">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">No. Sertif</th>
                                <th class="text-center">Pengguna</th>
                                <th class="text-center">Bootcamps</th>
                                <th class="text-center">Files</th>
                                <th class="text-center">Nilai</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sertifikats as $index => $sertifikat)
                            <tr>
                                <td>{{ $loop->iteration + $sertifikats->firstItem() - 1 }}</td>
                                <td>#PD{{ $sertifikat->no }}</td>
                                <td>{{ $sertifikat->user->nama_lengkap }}</td> <!-- Tampilkan nama_lengkap -->
                                <td>{{ $sertifikat->bootcamp->judul_bootcamp }}</td> <!-- Tampilkan judul_bootcamp -->
                                <td>
                                    @if (strpos($sertifikat->files, '.pdf') !== false) <!-- Perbaiki 'file' menjadi 'files' -->
                                        <a href="{{ asset('/' . $sertifikat->files) }}" target="_blank">Lihat PDF</a>
                                    @else
                                        <span>Tidak ada file PDF</span>
                                    @endif
                                </td>
                             
                                <td class="text-center">
                                    @if(is_null($sertifikat->nilai))
                                    <div class="d-flex justify-content-between mt-3">
                                        <div class="input-group" style="max-width: 300px;">
                                            <select class="form-control"
                                                id="nilaiSelect-{{ $sertifikat->id_sertifikat }}"
                                                name="id_sertifikat"
                                                onchange="handleNilaiSelect('{{ $sertifikat->id_sertifikat }}', this.value)">
                                                <option value="">Berikan Nilai</option>
                                                <option value="A+">A+</option>
                                                <option value="A">A</option>
                                                <option value="B+">B+</option>
                                                <option value="B">B</option>
                                                <option value="C+">C+</option>
                                                <option value="C">C</option>
                                                <option value="D+">D+</option>
                                                <option value="D">D</option>
                                                <option value="E+">E+</option>
                                                <option value="E">E</option>
                                                <option value="F+">F+</option>
                                                <option value="F">F</option>
                                            </select>
                                        </div>
                                    </div>
                                
                                    <!-- Form yang di-submit saat opsi dipilih -->
                                    <form id="nilaiForm-{{ $sertifikat->id_sertifikat }}"
                                        action="{{ route('pengajar.store.nilai') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id_sertifikat" value="{{ $sertifikat->id_sertifikat }}">
                                        <input type="hidden" id="nilai_input-{{ $sertifikat->id_sertifikat }}" name="nilai">
                                    </form>
                                    @else
                                     <span>{{ $sertifikat->nilai }}</span>
                                    @endif
                                </td>
                                
                                <script>
                                    function handleNilaiSelect(sertifikatId, nilai) {
                                        let form = document.getElementById(`nilaiForm-${sertifikatId}`);
                                        let nilaiInput = document.getElementById(`nilai_input-${sertifikatId}`);
                                
                                        nilaiInput.value = nilai;
                                
                                        // Jika nilai dipilih, submit form secara otomatis
                                        if (nilai) {
                                            form.submit();
                                        }
                                    }
                                </script>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center">
                                        <button data-url="{{ route('pengajar.sertifikat.destroy', $sertifikat->id_sertifikat) }}"
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
                    {{ $sertifikats->links('vendor.pagination.bootstrap-4') }}
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
            let startingIndex = {{ $sertifikats->firstItem() - 1 }};
            $('table tbody tr').each(function(index) {
                $(this).find('td:first-child').text(startingIndex + index + 1);
            });
        }
    });
</script>
@endsection