@extends('administrator.layout')

@section('content')
<div class="row">
    <div class="col">
        <div class="card shadow">
            <div class="card-header">
                <h3 class="mb-0">Edit Gallery</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('administrator.gallery.update', $gallery->id_gallery) }}" method="POST" enctype="multipart/form-data" class="form-ajax">
                    @csrf
                    @method('PUT')
                    <div class="table-responsive">
                        <table class="table" style="border: none; border-collapse: collapse;">
                            <tbody>
                                <tr>
                                    <th style="padding: 5px">Judul Foto</th>
                                    <td style="padding: 5px">
                                        <input type="text" class="form-control" id="jdl_gallery" name="jdl_gallery" value="{{ old('jdl_gallery', $gallery->jdl_gallery) }}" placeholder="Masukkan judul gallery" required>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="padding: 5px">Album</th>
                                    <td style="padding: 5px">
                                        <select class="form-control" name="id_album" id="id_album" required>
                                            <option value="">-- Pilih Album --</option>
                                            @foreach ($album as $album)
                                            <option value="{{ $album->id_album }}" {{ $gallery->id_album == $album->id_album ? 'selected' : '' }}>
                                                {{ $album->jdl_album }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="padding: 5px">Keterangan</th>
                                    <td style="padding: 5px">
                                        <textarea class="form-control" name="keterangan" id="keterangan" rows="5" placeholder="Masukkan Keterangan" required>{{ old('keterangan', $gallery->keterangan) }}</textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="padding: 5px;">Cover</th>
                                    <td style="padding: 5px;">
                                        <div class="d-flex align-items-center">
                                            <img id="preview" src="{{ url('img_gallery/'.$gallery->gbr_gallery) }}" alt="Preview" style="max-width: 100px; margin-top: 5px;" class="mr-3">
                                            <div class="flex-grow-1">
                                                <input type="file" class="form-control" onchange="previewImage(event)" name="gbr_gallery" id="gbr_gallery">
                                                <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah gambar.</small>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4 d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('administrator.gallery.index') }}" class="btn btn-danger">Batal</a>
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

        reader.onload = function(){
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