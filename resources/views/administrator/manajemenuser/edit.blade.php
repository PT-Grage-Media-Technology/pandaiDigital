@extends('administrator.layout')

@section('content')
<?php
$foto = "profile.png";
if ($users->foto != NULL) {
    $foto = $users->foto;
}
?>

<style>
    .custom-scrollable {
        max-height: 200px;
        overflow-y: auto;
    }

    @media (max-width: 576px) {
        .form-check {
            margin-bottom: 0.5rem;
        }
        .table td, .table th {
            display: block;
            width: 100%;
            box-sizing: border-box;
        }
        .table th {
            background-color: #f8f9fa;
            border-bottom: 0;
        }
    }
</style>

<div class="row">
    <div class="col-12">
        <div class="card card-shadow">
            <div class="card-body">
                <form action="{{ route('administrator.manajemenuser.update', $users->id) }}" method="POST" enctype="multipart/form-data" class="form-ajax">
                    @csrf
                    @method('PUT')
                    <table class="table table-bordered" id="datatable-buttons">
                        <tbody>
                            <tr>
                                <th class="p-2" style="border: 1px solid #ddd;">Username</th>
                                <td class="p-2" style="border: 1px solid #ddd;">
                                    <input type="text" class="form-control" id="username" name="username" value="{{ $users->username }}">
                                </td>
                            </tr>
                            <tr>
                                <th class="p-2" style="border: 1px solid #ddd;">Password</th>
                                <td class="p-2" style="border: 1px solid #ddd;">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password baru jika ingin mengubah">
                                </td>
                            </tr>
                            <tr>
                                <th class="p-2" style="border: 1px solid #ddd;">Nama Lengkap</th>
                                <td class="p-2" style="border: 1px solid #ddd;">
                                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="{{ $users->nama_lengkap }}">
                                </td>
                            </tr>
                            <tr>
                                <th class="p-2" style="border: 1px solid #ddd;">Alamat Email</th>
                                <td class="p-2" style="border: 1px solid #ddd;">
                                    <input type="email" class="form-control" id="email" name="email" value="{{ $users->email }}">
                                </td>
                            </tr>
                            <tr>
                                <th class="p-2" style="border: 1px solid #ddd;">No Telepon</th>
                                <td class="p-2" style="border: 1px solid #ddd;">
                                    <input type="tel" class="form-control" id="no_telp" name="no_telp" value="{{ $users->no_telp }}">
                                </td>
                            </tr>
                            <tr>
                                <th class="p-2" style="border: 1px solid #ddd;">Upload Foto</th>
                                <td class="p-2" style="border: 1px solid #ddd;">
                                    <div class="d-flex flex-column flex-sm-row align-items-center">
                                        <img id="preview" src="{{ url('foto_user/'.$users->foto) }}" alt="Preview" style="max-width: 100px; margin-top: 5px;" class="mr-sm-3 mb-2 mb-sm-0">
                                        <div class="w-100">
                                            <input type="file" class="form-control" onchange="previewImage(event)" name="foto" id="foto">
                                            <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah cover.</small>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th class="p-2" style="border: 1px solid #ddd;">Level</th>
                                <td class="p-2" style="border: 1px solid #ddd;">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="level" id="level_admin" value="admin" required @checked($users->level == 'admin')>
                                        <label class="form-check-label" for="level_admin">Admin</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="level" id="level_user" value="user" required @checked($users->level == 'user')>
                                        <label class="form-check-label" for="level_user">User</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="level" id="level_pengajar" value="pengajar" required @checked($users->level == 'pengajar')>
                                        <label class="form-check-label" for="level_pengajar">Pengajar</label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th class="p-2" style="border: 1px solid #ddd;">Tambah Akses</th>
                                <td class="p-2" style="border: 1px solid #ddd;">
                                    <div class="custom-scrollable">
                                        @foreach($moduls as $modul)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="{{ $modul->id_modul }}" id="modul_{{ $modul->id_modul }}" name="modul[]" 
                                            @if(in_array($modul->id_modul, $akses_user)) checked @endif>
                                            <label class="form-check-label" for="modul_{{ $modul->id_modul }}">
                                                {{ $modul->nama_modul }}
                                            </label>
                                        </div>
                                        @endforeach
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th class="p-2" style="border: 1px solid #ddd;">Hak Akses</th>
                                <td class="p-2" style="border: 1px solid #ddd;">
                                    <div class="custom-scrollable">
                                        @foreach($akses as $aks)
                                        <span style='display:block'>
                                            <a class='text-danger' href="{{ route('administrator.manajemenuser.delete_akses', ['id_umod' => $aks->id_umod, 'user_id' => $users->id]) }}">
                                                <i class='fas fa-times'></i>
                                            </a>
                                            <span>{{ $aks->nama_modul }}</span>
                                        </span>
                                        @endforeach
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th class="p-2" style="border: 1px solid #ddd;">Status Berlangganan</th>
                                <td class="p-2" style="border: 1px solid #ddd;">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="is_subscribed" name="is_subscribed" value="1" {{ old('is_subscribed', $users->is_subscribed) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_subscribed">Berlangganan</label>
                                    </div>
                                </td>
                            </tr>
                            <tr id="subscription_package_row" style="{{ old('is_subscribed', $users->is_subscribed) ? '' : 'display:none;' }}">
                                <th class="p-2" style="border: 1px solid #ddd;">Paket Langganan</th>
                                <td class="p-2" style="border: 1px solid #ddd;">
                                    <div class="form-check custom-scrollable">
                                        @foreach($subscription_packages as $program_name)
                                        <input class="form-check-input" type="checkbox" name="program_name[]" value="{{ $program_name }}" id="program_name{{ $program_name }}" 
                                        {{ in_array($program_name, old('program_name', $userPaketLangganan)) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="program_name{{ $program_name }}" style="word-break: break-word;">
                                            {{ $program_name }} 
                                        </label> <br>
                                        @endforeach
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="mt-4 d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('administrator.manajemenuser.index') }}" class="btn btn-danger">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function previewImage(event) {
        var preview = document.getElementById('preview');
        var file = event.target.files[0];
        var reader = new FileReader();

        reader.onload = function() {
            preview.src = reader.result;
        }

        if (file) {
            reader.readAsDataURL(file);
        }
    }
</script>

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
    document.getElementById('is_subscribed').addEventListener('change', function() {
        var subscriptionPackageRow = document.getElementById('subscription_package_row');
        if (this.checked) {
            subscriptionPackageRow.style.display = '';
        } else {
            subscriptionPackageRow.style.display = 'none';
        }
    });
</script>
@endsection