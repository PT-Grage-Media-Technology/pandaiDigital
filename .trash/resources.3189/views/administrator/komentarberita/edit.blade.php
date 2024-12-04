@extends('administrator.layout')


@section('content')

<div class="row">
    <div class="col">
        <div class="card card-shadow">
            <div class="card-header">
                <h3 class="mb-0">Edit Komentar Berita</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('administrator.komentarberita.update', $komentarberita->id_komentar) }}" method="POST" enctype="multipart/form-data" class="form-ajax">
                    @csrf
                    @method('PUT')
                    <table class="table" style="border: none; border-collapse: collapse: collapse;">
                        <tbody>
                            <tr>
                                <th style="padding: 5px">Nama Komentar</th>
                                <td style="padding: 5px">
                                    <input type="text" class="form-control" id="nama_komentar" name="nama_komentar" value="{{ $komentarberita->nama_komentar }}">
                                </td>
                            </tr>
                            <tr>
                                <th style="padding: 5px">Website</th>
                                <td style="padding: 5px">
                                    <input type="text" class="form-control" id="url" name="url" value="{{ $komentarberita->url }}">
                                </td>
                            </tr>
                            <tr>
                                <th style="padding: 5px">Email</th>
                                <td style="padding: 5px">
                                    <input type="text" class="form-control" id="email" name="email" value="{{ $komentarberita->email }}">
                                </td>
                            </tr>
                            <tr>
                                <th style="padding: 5px">Isi Komentar</th>
                                <td style="padding: 5px">
                                    <input type="text" class="form-control" id="isi_komentar" name="isi_komentar" value="{{ $komentarberita->isi_komentar }}">
                                </td>
                            </tr>
                            <tr>
                                <th style="padding: 5px">Aktif</th>
                                <td style="padding: 5px">
                                    <div class="form-check form-check-inline">
                                        <input type="radio" class="form-check-input" name="aktif" id="aktif_y" value="Y" {{ $komentarberita->aktif == 'Y' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="aktif_y">Ya</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" class="form-check-input" name="aktif" id="aktif_n" value="N" {{ $komentarberita->aktif == 'N' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="aktif_y">Tidak</label>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="mt-4 d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Perbarui</button>
                        <a href="{{ route('administrator.komentarberita.index') }}" class="btn btn-danger">Batal</a>
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