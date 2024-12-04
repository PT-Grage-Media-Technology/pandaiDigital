@extends('administrator.layout')

@section('content')
<?php
$gambar = "profile.png";
if($trainers->gambar != NULL){
    $gambar = $trainers->gambar;
}
?>
<div class="row">
    <div class="col">
        <div class="card shadow">
            <div class="card-header">
                <h3 class="mb-0">Edit Trainer</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('administrator.trainer.update', $trainers->id_trainer) }}" method="POST" enctype="multipart/form-data" class="form-ajax">
                    @csrf
                    @method('PUT')
                    <div class="table-responsive">
                        <table class="table" id="datatable-buttons" style="border: none; border-collapse: collapse;">
                            <tbody>
                                <tr>
                                    <th style="padding: 5px;">Nama Trainer</th>
                                    <td style="padding: 5px;">
                                        <input type="text" class="form-control" id="nama_trainer" name="nama_trainer" value="{{ $trainers->nama_trainer }}" required>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="padding: 5px;">Link Trainer</th>
                                    <td style="padding: 5px;">
                                        <input type="text" class="form-control" id="link" name="link" value="{{ $trainers->link }}" required>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="padding: 5px;">Foto saat ini:</th>
                                    <td style="padding: 5px;">
                                        <div class="d-flex align-items-center">
                                            <img id="previewa" src="{{ url('foto_trainer/'.$trainers->foto) }}" alt="Preview" style="max-width: 100px; margin-top: 5px;" class="mr-3">
                                            <div class="flex-grow-1">
                                                <input type="file" class="form-control" onchange="preview1Image(event)" name="foto" id="gbr_playlist">
                                                <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah cover.</small>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="padding: 5px;">Tanda Tangan Digital saat ini:</th>
                                    <td style="padding: 5px;">
                                        <div class="d-flex align-items-center">
                                            <img id="previewb" src="{{ url('ttd_trainer/'.$trainers->ttd) }}" alt="Preview" style="max-width: 100px; margin-top: 5px;" class="mr-3">
                                            <div class="flex-grow-1">
                                                <input type="file" class="form-control" onchange="preview2Image(event)" name="ttd" id="ttd">
                                                <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah cover.</small>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="padding: 5px;">Pengajar</th>
                                    <td style="padding: 5px;">
                                        <select class="form-control" name="id" required>
                                        <option value="">-- Pilih Pengajar --</option>
                                            @foreach ($manajemenusers as $users)
                                                <option value="{{ $users->id }}" {{ $users->id == $trainers->id ? 'selected' : '' }}>
                                                    {{ $users->username }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4 d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('administrator.trainer.index')}}" class="btn btn-danger">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function preview1Image(event) {
        var previewa = document.getElementById('previewa');
        var file = event.target.files[0];
        var reader = new FileReader();

        reader.onload = function(){
            previewa.src = reader.result;
        }

        if (file) {
            reader.readAsDataURL(file);
        }
    }
</script>
<script>
    function preview2Image(event) {
        var previewb = document.getElementById('previewb');
        var file = event.target.files[0];
        var reader = new FileReader();

        reader.onload = function(){
            previewb.src = reader.result;
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
            let btn =$(this);
            Swal.fire({
               icon:'warning',
               text:'Data yang sudah di hapus tidak dapat dikembalikan!',
               title:'Apakah Anda yakin ingin menghapus data ini?',
               showCancelButton: true,
               confirmButtonColor:'#D33',
               confirmButtonText:'Yakin hapus?',
               cancelButtonText:'Batal'
            }).then((result)=>{
                if (result.isConfirmed){
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

                    for (instance in CKEDITOR.instances) {
                        CKEDITOR.instances[instance].updateElement();
                    }

                    let form = $(this);
                    $.ajax({
                        url: form.prop('action'),
                        data: new FormData(this),
                        cache: false,
                        async: false,
                        type: 'post',
                        contentType: false,
                        processData: false,
                        success: function(data) {
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
                                }).then((result)=>{
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

{{-- <script>
    CKEDITOR.replace('deskripsi');
</script> --}}
@endsection
