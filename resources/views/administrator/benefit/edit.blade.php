@extends('administrator.layout')

@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="mb-0">Edit Benefit</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('administrator.benefit.update', $benefit->id_benefit) }}" method="POST" enctype="multipart/form-data" class="form-ajax">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="gambar">Benefit</label>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="gambar" name="nama_benefit" value="{{ $benefit->nama_benefit }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('administrator.benefit.index') }}" class="btn btn-danger">Batal</a>
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