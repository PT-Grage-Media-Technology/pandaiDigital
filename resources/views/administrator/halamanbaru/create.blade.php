@extends('administrator.layout')

@section('content')
<div class="row">
    <div class="col">
      <div class="card card-shadow">
        <div class="card-header">
          <h3 class="mb-0">Tambah Halaman Baru</h3>
        </div> 
        <div class="card-body">
          <form action="{{ route('administrator.halamanbaru.store') }}" method="POST" enctype="multipart/form-data" class="form-ajax">
            @csrf
            <table class="table" id="datatable-buttons" style="border: none; border-collapse: collapse;">
                <tbody>
                    <tr>
                        <th style="padding: 5px;">Judul:</th>
                        <td style="padding: 5px;">
                            <input type="text" class="form-control" id="judul" name="judul" required>
                        </td>
                    </tr>
                    <tr>
                        <th style="padding: 5px;">Isi Halaman:</th>
                        <td style="padding: 5px;">
                            <textarea class="form-control" id="isi_halaman" name="isi_halaman"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th style="padding: 5px;">Gambar:</th>
                        <td style="padding: 5px;">
                            <input type="file" class="form-control-file" id="gambar" name="gambar">
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="mt-4 d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('administrator.halamanbaru.index') }}" class="btn btn-danger">Batal</a>
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
                
                // Sinkronisasi CKEditor dengan textarea sebelum submit
                CKEDITOR.instances['isi_halaman'].updateElement();

                let isi_halaman = $('#isi_halaman').val().trim(); // Ambil data dari CKEditor yang telah disinkronkan
    
                if (isi_halaman === "") {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Isi Halaman Harus Diisi!',
                    });
                    return;
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
