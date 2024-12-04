@extends('administrator.layout')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            Tambah Template
        </div>
        <div class="card-body">
            <form action="{{ route('administrator.templatewebsite.store') }}" method="POST" enctype="multipart/form-data" class="form-ajax">
                @csrf
                <table class="table" id="datatable-buttons" style="border: none; border-collapse: collapse;">
                    <tbody>
                        <tr>
                            <th style="padding: 5px;">Judul</th>
                            <td style="padding: 5px;">
                                <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan Judul Template" required>
                            </td>
                        </tr>
                        <tr>
                            <th style="padding: 5px;">Pembuat</th>
                            <td style="padding: 5px;">
                                <input type="text" class="form-control" id="pembuat" name="pembuat" placeholder="Masukkan Pembuat Template" required>
                            </td>
                        </tr>
                        <tr>
                            <th style="padding: 5px;">Folder</th>
                            <td style="padding: 5px;">
                                <input type="text" class="form-control" id="folder" name="folder" placeholder="Masukkan Folder Template" required>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="mt-4 d-flex justify-content-betwwen">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('administrator.templatewebsite.index') }}" class="btn btn-danger">Batal</a>
                </div>
            </form>
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