@extends('administrator.layout')

@section('content')
<div class="card shadow">
    <div class="card-header">
        <h3 class="mb-0">Tambah Agenda</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('administrator.agenda.store') }}" method="POST" enctype="multipart/form-data" class="form-ajax">
            @csrf
            <table class="table" style="border: none; border-collapse: collapse;">
                <tbody>
                    <tr>
                        <th style="padding: 5px;">Tema</th>
                        <td style="padding: 5px;">
                            <input type="text" class="form-control" id="tema" name="tema" placeholder="Masukkan tema" required>
                        </td>
                    </tr>
                    <tr>
                        <th style="padding: 5px;">Isi Agenda</th>
                        <td style="padding: 5px;">
                            <textarea class="form-control" id="isi_agenda" name="isi_agenda" rows="4"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th style="padding: 5px;">Gambar</th>
                        <td style="padding: 5px;">
                            <input type="file" class="form-control" id="gambar" name="gambar">
                        </td>
                    </tr>
                    <tr>
                        <th style="padding: 5px;">Tempat</th>
                        <td style="padding: 5px;">
                            <input type="text" class="form-control" id="tempat" name="tempat" placeholder="Masukkan tempat">
                        </td>
                    </tr>
                   <tr>
                        <th style="padding: 5px;">Jam Mulai</th>
                        <td style="padding: 5px;">
                            <input type="time" class="form-control" id="jam_mulai" name="jam_mulai" required>
                        </td>
                    </tr>
                    <tr>
                        <th style="padding: 5px;">Jam Selesai</th>
                        <td style="padding: 5px;">
                            <input type="time" class="form-control" id="jam_selesai" name="jam_selesai" required>
                        </td>
                    </tr>
                    {{-- <tr>
                        <th style="padding: 5px;">Tgl s/d Selesai</th>
                        <td style="padding: 5px;">
                            <input type="text" class="form-control" id="date_range" name="tgl_selesai" placeholder="Tgl s/d Selesai">
                        </td>
                    </tr> --}}
                    <tr>
                        <th style="padding: 5px;">Tgl s/d Selesai</th>
                        <td style="padding: 5px;">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="tgl_mulai" name="tgl_mulai" placeholder="Tanggal Mulai" style="background-color: white;">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="tgl_selesai" name="tgl_selesai" placeholder="Tanggal Selesai" style="background-color: white;">
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th style="padding: 5px;">Pengirim</th>
                        <td style="padding: 5px;">
                            <input type="text" class="form-control" id="pengirim" name="pengirim" placeholder="Masukkan pengirim">
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="mt-4 d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('administrator.agenda.index') }}" class="btn btn-danger">Batal</a>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
document.addEventListener('DOMContentLoaded', function() {
    flatpickr("#tgl_mulai", {
        dateFormat: "Y-m-d",
        locale: {
            firstDayOfWeek: 1
        }
    });

    flatpickr("#tgl_selesai", {
        dateFormat: "Y-m-d",
        locale: {
            firstDayOfWeek: 1
        }
    });

    document.querySelector('form').addEventListener('submit', function(e) {
        var jamInput = document.getElementById('jam').value;
        var jamPattern = /^([01]\d|2[0-3]):([0-5]\d) - ([01]\d|2[0-3]):([0-5]\d) WIB$/;
        if (!jamPattern.test(jamInput)) {
            e.preventDefault();
            alert('Format jam tidak valid. Harus dalam format HH:MM - HH:MM WIB');
        }
    });
});
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
</script>
@endsection