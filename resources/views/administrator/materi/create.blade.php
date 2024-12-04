@extends('administrator.layout')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card card-shadow">
                <div class="card-header">
                    <h3 class="mb-0">Tambah Materi</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('administrator.materi.store') }}" method="POST" enctype="multipart/form-data"
                        class="form-ajax">
                        @csrf
                        <div class="table-responsive">
                            <table class="table" id="datatable-buttons" style="border: none; border-collapse: collapse;">
                                <tbody>
                                    <tr>
                                        <th style="padding: 5px;">Materi</th>
                                        <td style="padding: 5px;">
                                            <input type="text" class="form-control" id="nama_materi" name="nama_materi"
                                                placeholder="Masukkan Nama Materi" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style="padding: 5px;">Thumbnail</th>
                                        <td style="padding: 5px;">
                                            <input type="file" class="form-control" id="thumbnail" name="thumbnail" accept="image/*">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style="padding: 5px;">Kategori</th>
                                        <td style="padding: 5px;">
                                            <select class="form-control" name="id_kategori_program" required>
                                                <option value="">-- Pilih Kategori --</option>
                                                @foreach ($kategoriprograms as $katprogram)
                                                    <option value="{{ $katprogram->id_kategori_program }}">
                                                        {{ $katprogram->nama_kategori }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style="padding: 5px;">Topik</th>
                                        <td style="padding: 5px;">
                                            <select class="form-control" name="id_topik" required>
                                                <option value="">-- Pilih Topik --</option>
                                                @foreach ($topiks as $topik)
                                                    <option value="{{ $topik->id_topik }}">
                                                        {{ $topik->nama_topik }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style="padding: 5px;">Trainer</th>
                                        <td style="padding: 5px;">
                                            <select class="form-control" name="id_trainer" required>
                                                <option value="">-- Pilih Trainer --</option>
                                                @foreach ($trainers as $trainer)
                                                    <option value="{{ $trainer->id_trainer }}">
                                                        {{ $trainer->nama_trainer }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-4 d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('administrator.materi.index') }}" class="btn btn-danger">Batal</a>
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
