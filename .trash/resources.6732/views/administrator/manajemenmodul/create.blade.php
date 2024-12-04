@extends('administrator.layout')

@section('content')

<div class="row">
    <div class="col">
        <div class="card card-shadow">
            <div class="card-header">
                <h3 class="mb-0">Tambah Manajemen Modul Baru</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('administrator.manajemenmodul.store') }}" method="POST" class="form-ajax">
                    @csrf
                    <table class="table" id="datatable-buttons" style="border: none; border-collapse: collapse;">
                        <tbody>
                            <tr>
                                <th style="padding: 5px;">Nama Modul</th>
                                <td style="padding: 5px;">
                                    <input type="text" class="form-control" id="nama_modul" name="nama_modul" placeholder="Masukkan Nama Modul" required>
                                </td>
                            </tr>
                            {{-- <tr>
                                <th style="padding: 5px">Parent Modul</th>
                                <td style="padding: 5px">
                                    <select class="form-control @error('parent_id') is-invalid @enderror" name="parent_id" id="parent_id">
                                        <option value="">-- Pilih Parent Menu --</option>
                                        @foreach ($manajemenmodul as $modul)
                                            <option value="{{ $modul->id_modul }}" {{ old('parent_id') == $modul->id_modul ? 'selected' : '' }}>
                                                {{ $modul->nama_modul }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr> --}}
                            <tr>
                                <th style="padding: 5px;">Link</th>
                                <td style="padding: 5px;">
                                    <input type="text" class="form-control" id="link" name="link" placeholder="Masukkan Link" required>
                                </td>
                            </tr>
                            <tr>
                                <th style="padding: 5px;">Publish</th>
                                <td style="padding: 5px;">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="publish" id="publish_ya" value="Ya" required checked>
                                        <label class="form-check-label" for="publish_ya">Ya</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="publish" id="publish_tidak" value="Tidak" required>
                                        <label class="form-check-label" for="publish_tidak">Tidak</label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th style="padding: 5px;">Aktif</th>
                                <td style="padding: 5px;">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="aktif" id="aktif_ya" value="Ya" required checked>
                                        <label class="form-check-label" for="aktif_ya">Ya</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="aktif" id="aktif_tidak" value="Tidak" required>
                                        <label class="form-check-label" for="aktif_tidak">Tidak</label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th style="padding: 5px;">Status</th>
                                <td style="padding: 5px;">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" id="status_admin" value="admin" required checked>
                                        <label class="form-check-label" for="status_admin">Admin</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" id="status_user" value="user" required>
                                        <label class="form-check-label" for="status_user">User</label>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="mt-4 d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('administrator.manajemenmodul.index') }}" class="btn btn-danger">Batal</a>
                    </div>
                </form>
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

        $(document).on('click', '.btn-delete', function() {
            let btn = $(this);
            Swal.fire({
                icon: 'warning',
                text: 'Data yang sudah di hapus tidak dapat dikembalikan!',
                title: 'Apakah Anda yakin ingin menghapus data ini?',
                showCancelButton: true,
                confirmButtonColor: '#D33',
                confirmButtonText: 'Yakin hapus?',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "Deleted!",
                        text: "Your file has been deleted.",
                        icon: "success"
                    });
                    document.location = btn.data('url');
                }
            });
        });

        $('.form-ajax').each(function() {
            $(this).bind('submit', function(e) {
                e.preventDefault();

                let form = $(this);

                // Menyinkronkan data dari CKEditor ke textarea
                for (var instance in CKEDITOR.instances) {
                    CKEDITOR.instances[instance].updateElement();
                }

                $.ajax({
                    url: form.prop('action'),
                    data: new FormData(this),
                    cache: false,
                    async: true,
                    type: 'post',
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        console.log(data); // Ini untuk debugging
                        if (data.success === false) {
                            Swal.fire({
                                icon: 'error',
                                html: data.message,
                                timer: 1500,
                                showConfirmButton: false
                            });
                        } else {
                            Swal.fire({
                                position: "center",
                                icon: "success",
                                title: data.message,
                                showConfirmButton: false,
                                timer: 1500
                            }).then((result) => {
                                console.log(result);
                                document.location = data.url;
                            });
                        }
                    }
                });
            });
        });
    });
</script>
@endsection