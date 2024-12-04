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
                        <h3 class="mb-0">Request</h3>
                    </div>

                    <!-- Tampilkan pesan jika id_trainer null -->
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif


                    <!-- Form pencarian -->
                    <div class="card-body">
                        <form id="filterForm" class="mb-1">
                            <div class="d-flex justify-content-between">
                                <div class="input-group" style="max-width: 300px;">
                                    <select class="form-control" id="statusFilter">
                                        <option value="">Pilih Type</option>
                                        <option value="invite">Invite</option>
                                        <option value="request">Request</option>
                                    </select>
                                </div>
                                <div class="input-group" style="max-width: 300px;">
                                    <input type="text" class="form-control" placeholder="Cari Nama..." id="nameSearch">
                                </div>
                            </div>
                        </form>

                        <div class="table-responsive py-4">
                            <table class="table table-bordered">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-center">Id</th>
                                        <th class="text-center">Pengirim</th>
                                        <th class="text-center">Nama Bootcamp</th>
                                        <th class="text-center">Foto Bootcamp</th>
                                        <th class="text-center">Penerima</th>
                                        <th class="text-center">Keterangan</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">action</th>
                                        <th class="text-center">Tanggal Dikirim</th>
                                    </tr>
                                </thead>
                                <tbody id="tableContent">
                                    <!-- Data contoh -->
                                    @forelse ($permissions as $index => $permission)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration + $permissions->firstItem() - 1 }}
                                            </td>
                                            <td class="text-center">{{ $permission->sender->nama_trainer }}</td>
                                            <td class="text-center">{{ $permission->bootcamp->judul_bootcamp }}</td>

                                            <td class="text-center">
                                                @if ($permission->bootcamp->thumbnail)
                                                    <img class="img-fluid"
                                                        src="{{ asset('thumbnail_bootcamp/' . $permission->bootcamp->thumbnail) }}">
                                                @else
                                                    <p>No Image</p>
                                                @endif
                                            </td>
                                            <td class="text-center">{{ $permission->trainer->nama_trainer }}</td>
                                            <td class="d-none">{{ $permission->type }}</td>
                                            <td class="text-center">
                                                @if ($permission->type === 'invite')
                                                    Halo {{ $permission->trainer->nama_trainer }}, saya ingin mengundang
                                                    anda berkolaborasi dengan saya di bootcamp
                                                    "{{ $permission->bootcamp->judul_bootcamp }}"!
                                                @else
                                                    Halo {{ $permission->trainer->nama_trainer }}, saya ingin berkolaborasi
                                                    dengan anda di bootcamp "{{ $permission->bootcamp->judul_bootcamp }}"!
                                                @endif
                                            </td>
                                            <td
                                                class="text-center
                                                  {{ $permission->status === 'approved' ? 'text-success' : '' }}
                                                  {{ $permission->status === 'pending' ? 'text-warning' : '' }}
                                                  {{ $permission->status === 'canceled' ? 'text-danger' : '' }}">
                                                {{ $permission->status }}
                                            </td>

                                            @php $user = App\Models\Trainer::where('id', Auth::user()->id)->first(); @endphp @if ($user->id_trainer !== $permission->id_sender)
                                                <td class="text-center">
                                                    <div class="d-flex justify-content-center gap-2">
                                                        <a href="{{ route('pengajar.invite.approve', $permission->id_permision) }}"
                                                            class="btn btn-success" title="Approve Invitation">
                                                             <i class="fas fa-check"></i>
                                                        </a>
                                                        <a href="{{ route('pengajar.invite.cancel', $permission->id_permision) }}"
                                                            class="btn btn-danger" title="Decline Invitation">
                                                            <i class="fas fa-times"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            @elseif ($user->id_trainer == $permission->id_sender)
                                                <td class="text-center">
                                                    <div class="d-flex justify-content-center gap-2">
                                                        <a href="{{ route('pengajar.invite.destroy', $permission->id_permision) }}"
                                                            class="btn btn-danger" title="Delete Invitation">
                                                             <i class="fas fa-times"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            @else
                                                <td>
                                                    <p>Menunggu Persetujuan</p>
                                                </td>
                                            @endif

                                            <td class="text-center">{{ $permission->created_at }}</td>

                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8" class="text-center">Tidak ada data request</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <br>
                            {{ $permissions->links('vendor.pagination.bootstrap-4') }}
                            <br>
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
            $(document).ready(function() {
                // Fungsi untuk filter dan search data di sisi client
                function filterData() {
                    var status = $('#statusFilter').val().toLowerCase();
                    var search = $('#nameSearch').val().toLowerCase();

                    $('#tableContent tr').filter(function() {
                        var rowStatus = $(this).find('td:eq(6)').text().toLowerCase();
                        var rowName = $(this).find('td:eq(5)').text().toLowerCase();

                        // Tampilkan baris jika sesuai dengan filter status dan pencarian nama
                        if ((status === "" || rowStatus === status) && (search === "" || rowName.includes(
                                search))) {
                            $(this).show();
                        } else {
                            $(this).hide();
                        }
                    });
                }

                // Panggil fungsi filterData saat input pencarian atau filter status berubah
                $('#statusFilter, #nameSearch').on('input', function() {
                    filterData();
                });

                // Panggil filterData saat halaman pertama kali dimuat
                filterData();
            });

            function updateRowNumbers() {
                let startingIndex = {{ $permissions->firstItem() - 1 }};
                $('table tbody tr').each(function(index) {
                    $(this).find('td:first-child').text(startingIndex + index + 1);
                });
            }
        </script>
    @else
        <div class="container text-center my-5" style="max-width: 600px;">
            <div class="message mb-4">
                Maaf {{ Auth::user()->username }}, anda belum menjadi trainer, segera hubungi admin untuk menambahkan diri
                anda menjadi trainer!
            </div>
            <a href="mailto:administrator@grageacademy.online" class="btn btn-primary me-2">Hubungi Admin</a>
            <a href="/dashboard" class="btn btn-secondary">Kembali ke Beranda</a>
        </div>
    @endif
@endsection
