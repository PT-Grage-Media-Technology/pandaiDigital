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
                        <h3 class="mb-0">Daftar Bootcamp</h3>
                        <a href="{{ route('pengajar.bootcamps.create') }}" class="btn btn-primary btn-sm">Tambah Data</a>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('pengajar.bootcamps.index') }}" method="GET" class="mb-1">
                            <div class="d-flex flex-column flex-md-row justify-content-between">
                                <div class="input-group mb-2" style="max-width: 300px;">
                                    <select class="form-control" name="judul_bootcamp">
                                        <option value="">Pilih Bootcamp</option>
                                    </select>
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-primary" type="submit">Filter</button>
                                    </div>
                                </div>
                                <div class="input-group mb-2" style="max-width: 300px;">
                                    <input type="text" class="form-control" placeholder="Cari Bootcamp..." name="search"
                                        value="{{ request('search') }}">
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
                                        <th class="text-center">Judul Bootcamp</th>
                                        <th class="text-center">Thumbnail</th>
                                        <th class="text-right">Harga</th>
                                        <th class="text-right">Harga Diskon</th>
                                        <th class="text-center">Deskripsi</th>
                                        <th class="text-center">list benefits</th>
                                        <th class="text-center">Nama Pengajar</th>
                                        <th class="text-center">Kontributor</th>
                                        <th class="text-center">Action</th>
                                        <th class="text-center">Materi Bootcamp</th>
                                        <th class="text-center">Tugas Bootcamp</th>
                                        <th class="text-center">Tambah Batch</th>
                                        <th class="text-center">Tambah Trainer</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bootcamps as $index => $bootcamp)
                                        <tr>
                                            <td>{{ $loop->iteration + 1 }}</td>
                                            <td>{{ $bootcamp->judul_bootcamp }}</td>
                                            <td><img src="{{ asset('thumbnail_bootcamp/' . $bootcamp->thumbnail) }}"
                                                    alt="image" class="img-fluid"></td>
                                            <td class="text-right">{{ number_format($bootcamp->harga, 0, ',', '.') }}</td>
                                            <td class="text-right">{{ number_format($bootcamp->harga_diskon, 0, ',', '.') }}
                                            </td>
                                            <td>{{ $bootcamp->deskripsi }}</td>
                                            <td>
                                                @foreach ($bootcamp->benefit() as $benefi)
                                                    <span>{{ $benefi->nama_benefit }}</span> <br>
                                                @endforeach
                                            </td>
                                            <td>{{ $bootcamp->trainer[0]->pengajar->username ?? 'kosong' }}</td>
                                            <td>
                                                @foreach ($bootcamp->permisionApproved as $kontrib)
                                                    <span>{{ $kontrib->trainer->nama_trainer }}</span> <br>
                                                    <!-- Adjust based on your kontributor fields -->
                                                @endforeach
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <a href="{{ route('pengajar.bootcamps.edit', $bootcamp->id_bootcamp) }}"
                                                        class="btn btn-success btn-sm d-inline-flex align-items-center justify-content-center me-2"
                                                        style="width: 32px; height: 32px;">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <button
                                                        data-url="{{ route('pengajar.bootcamps.destroy', $bootcamp->id_bootcamp) }}"
                                                        type="button"
                                                        class="btn-delete btn btn-danger btn-sm d-inline-flex align-items-center justify-content-center"
                                                        style="width: 32px; height: 32px;">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="d-flex justify-content-center">
                                                    <a href="{{ route('pengajar.materibootcamp.index', ['id_bootcamp' => $bootcamp->id_bootcamp]) }}"
                                                        class="btn btn-success btn-sm d-inline-flex align-items-center justify-content-center me-2"
                                                        style="width: 32px; height: 32px;">
                                                        <i class="fa fa-plus"></i>
                                                    </a>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="d-flex justify-content-center">
                                                    <a href="{{ route('pengajar.tugasbootcamp.index', ['id_bootcamp' => $bootcamp->id_bootcamp]) }}"
                                                        class="btn btn-success btn-sm d-inline-flex align-items-center justify-content-center me-2"
                                                        style="width: 32px; height: 32px;">
                                                        <i class="fa fa-plus"></i>
                                                    </a>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="d-flex justify-content-center">
                                                    <a href="{{ route('pengajar.batch.index', ['id_bootcamp' => $bootcamp->id_bootcamp]) }}"
                                                        class="btn btn-success btn-sm d-inline-flex align-items-center justify-content-center me-2"
                                                        style="width: 32px; height: 32px;">
                                                        <i class="fa fa-plus"></i>
                                                    </a>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <!-- Dropdown untuk memilih trainer -->
                                                @php
                                                    $user = App\Models\Trainer::where('id', Auth::user()->id)->first();
                                                @endphp

                                                @if ($bootcamp->id_trainer == $user->id_trainer)
                                                    <div class="d-flex justify-content-between mt-3">
                                                        <div class="input-group" style="max-width: 300px;">
                                                            <select class="form-control"
                                                                id="trainerSelect-{{ $bootcamp->id_bootcamp }}"
                                                                name="id_trainer"
                                                                onchange="handleTrainerSelect('{{ $bootcamp->id_bootcamp }}', this.value)">
                                                                <option value="">Pilih Trainer</option>
                                                                @foreach ($trainer as $t)
                                                                    @if ($t->id_trainer != $trainer_login->id_trainer)
                                                                        <!-- Mengecualikan trainer yang login -->
                                                                        <option value="{{ $t->id_trainer }}">
                                                                            {{ $t->nama_trainer }}</option>
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="d-flex justify-content-between mt-3">
                                                        Kamu Bukan Creator
                                                    </div>
                                                @endif
                                                <!-- Form yang di-submit saat opsi dipilih -->
                                                <form id="inviteTrainerForm-{{ $bootcamp->id_bootcamp }}"
                                                    action="{{ route('pengajar.invite.store') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id_bootcamp"
                                                        value="{{ $bootcamp->id_bootcamp }}">
                                                    <input type="hidden"
                                                        id="id_trainer_input-{{ $bootcamp->id_bootcamp }}"
                                                        name="id_trainer">
                                                    <!-- Input untuk type -->
                                                    <input type="hidden" id="type_input-{{ $bootcamp->id_bootcamp }}"
                                                        name="type" value="Request">
                                                </form>
                                            </td>

                                            <script>
                                                function handleTrainerSelect(bootcampId, trainerId) {
                                                    let form = document.getElementById(`inviteTrainerForm-${bootcampId}`);
                                                    let trainerInput = document.getElementById(`id_trainer_input-${bootcampId}`);
                                                    let typeInput = document.getElementById(`type_input-${bootcampId}`);

                                                    trainerInput.value = trainerId;

                                                    // Jika ada trainer yang dipilih, set type menjadi 'Invite', jika tidak, tetap 'Request'
                                                    if (trainerId) {
                                                        typeInput.value = 'Invite';
                                                    } else {
                                                        typeInput.value = 'Request';
                                                    }

                                                    form.submit(); // Submit form secara otomatis setelah memilih trainer
                                                }
                                            </script>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <br>
                            {{ $bootcamps->links('vendor.pagination.bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

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
                        let startingIndex = {{ $bootcamps->firstItem() - 1 }};
                        $('table tbody tr').each(function(index) {
                            $(this).find('td:first-child').text(startingIndex + index + 1);
                        });
                    }

                });
            </script>
        @endsection
    @else
        <div class="container text-center my-5" style="max-width: 600px;">
            <div class="message mb-4">
                Maaf {{ Auth::user()->username }}, anda belum menjadi trainer, segera hubungi admin untuk menambahkan diri anda menjadi trainer!
            </div>
            <a href="mailto:administrator@grageacademy.online" class="btn btn-primary me-2">Hubungi Admin</a>
            <a href="/dashboard" class="btn btn-secondary">Kembali ke Beranda</a>
        </div>
    @endif
@endsection
