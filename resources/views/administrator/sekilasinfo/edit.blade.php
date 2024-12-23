@extends('administrator.layout')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit Info</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('administrator.sekilasinfo.update', $infot->id_sekilas ) }}" method="post" enctype="multipart/form-data" class="form-ajax">
            @csrf
            @method('PUT')
            
            <!-- Responsive Table -->
            <div class="table-responsive">
                <table class="table" id="datatable-buttons" style="border: none; border-collapse: collapse;">
                    <tbody>
                        <!-- Tulis Info -->
                        <tr>
                            <th style="padding: 5px;">Tulis Info</th>
                            <td style="padding: 5px;">
                                <textarea class="form-control" id="info" name="info" rows="6">{{ $infot->info }}</textarea>
                            </td>
                        </tr>

                        <!-- Foto Input -->
                        <tr>
                            <th style="padding: 5px;">Foto</th>
                            <td style="padding: 5px;">
                                <p class="mb-0 mt-n2">Cover saat ini:</p>
                                <div class="d-flex align-items-center">
                                    <img id="preview" src="{{ url('foto_info/'.$infot->gambar) }}" alt="Preview" style="max-width: 100px; margin-top: 5px;" class="mr-3 img-fluid">
                                    <div class="flex-grow-1">
                                        <input type="file" class="form-control" onchange="previewImage(event)" name="gambar" id="gambar">
                                        <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah cover.</small>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Submit and Cancel Buttons -->
            <div class="mt-4 d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('administrator.sekilasinfo.index') }}" class="btn btn-danger">Batal</a>
            </div>
        </form>
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
            let btn = $(this);
            Swal.fire({
               icon: 'warning',
               text: 'Data yang sudah dihapus tidak dapat dikembalikan!',
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

        // Form Submission with AJAX
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
                            }).then((result) => {
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
