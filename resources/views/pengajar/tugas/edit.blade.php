@extends('pengajar.layout')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card card-shadow">
                <div class="card-header">
                    <h3 class="mb-0">Edit Tugas</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('pengajar.tugas.update', $tugass->id_tugas) }}" method="POST" enctype="multipart/form-data"
                        class="form-ajax">
                        @csrf
                        @method('PUT')
                        <table class="table" id="datatable-buttons" style="border: none; border-collapse: collapse;">
                            <tbody>
                                <tr>
                                    <th style="padding: 5px;">URL</th>
                                    <td style="padding: 5px;">
                                        <input type="text" class="form-control" id="url" name="url"
                                            placeholder="Masukkan URL Materi" value="{{ $tugass->url }}">
                                    </td>
                                </tr>
                                <tr>
                                    <th style="padding: 5px;">Judul Tugas</th>
                                    <td style="padding: 5px;">
                                        <input type="text" class="form-control" id="judul_tugas" name="judul_tugas"
                                            placeholder="Masukkan Judul Tugas" required value="{{ $tugass->judul_tugas }}">
                                    </td>
                                </tr>
                                <tr>
                                    <th style="padding: 5px;">Deskripsi</th>
                                    <td style="padding: 5px;">
                                        <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="Masukkan Deskripsi Tugas" required>{{ $tugass->deskripsi }}</textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="padding: 5px;">File saat ini:</th>
                                    <td style="padding: 5px;">
                                        <div class="d-flex align-items-center">
                                            @if (strpos($tugass->file, '.mp4') !== false ||
                                                strpos($tugass->file, '.avi') !== false ||
                                                strpos($tugass->file, '.mpeg') !== false)
                                                <video width="100" controls>
                                                    <source src="{{ asset('files_tugas/' . $tugass->file) }}" type="video/mp4">
                                                    Your browser does not support the video tag.
                                                </video>
                                            @elseif (strpos($tugass->file, '.jpg') !== false ||
                                                strpos($tugass->file, '.jpeg') !== false ||
                                                strpos($tugass->file, '.png') !== false ||
                                                strpos($tugass->file, '.gif') !== false ||
                                                strpos($tugass->file, '.webp') !== false ||
                                                strpos($tugass->file, '.svg') !== false)
                                                <img src="{{ asset('files_tugas/' . $tugass->file) }}" alt="Image" width="100">
                                            @elseif (strpos($tugass->file, '.pdf') !== false)
                                                <a href="{{ asset('files_tugas/' . $tugass->file) }}" target="_blank">Lihat PDF</a>
                                            @else
                                                <span>Tidak ada preview</span>
                                            @endif
                                        
                                            <div class="flex-grow-1">
                                                <input type="file" class="form-control" onchange="previewImage(event)" name="file" id="file">
                                                <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah cover.</small>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                        <td style="padding: 5px;">
                                            <input type="hidden" class="form-control" value="{{ $tugass->materi->nama_materi }}" readonly>
                                            <input type="hidden" name="id_materi" value="{{ $tugass->id_materi }}">
                                        </td>
                                </tr>
                                <tr>
                                    <th style="padding: 5px;">Status</th>
                                    <td style="padding: 5px;">
                                        <select class="form-control" name="status" required>
                                            <option value="1" {{ $tugass->status ? 'selected' : '' }}>Aktif</option>
                                            <option value="0" {{ !$tugass->status ? 'selected' : '' }}>Tidak Aktif</option>
                                        </select>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="mt-4 d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('pengajar.tugas.index', ['id_materi' => $tugass->id_materi]) }}" class="btn btn-danger">Batal</a>
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
    
        function previewVideo(event) {
            var preview = document.getElementById('video-preview');
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
