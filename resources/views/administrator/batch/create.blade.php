@extends('administrator.layout')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card card-shadow">
                <div class="card-header">
                    <h3 class="mb-0">Batch</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('administrator.batch.store') }}" method="POST" enctype="multipart/form-data"
                        class="form-ajax">
                        @csrf
                        <table class="table" id="datatable-buttons" style="border: none; border-collapse: collapse;">
                            <tbody>
                                <tr>
                                    <th style="padding: 5px;">Nama Sesi</th>
                                    <td style="padding: 5px;">
                                        <input type="text" class="form-control" id="nama_sesi" name="nama_sesi"
                                            placeholder="Masukkan Batch" required>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="padding: 5px;">Tgl s/d Selesai</th>
                                    <td style="padding: 5px;">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" id="tanggal_mulai" name="tanggal_mulai" placeholder="Tanggal Mulai" style="background-color: white;">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" id="tanggal_selesai" name="tanggal_selesai" placeholder="Tanggal Selesai" style="background-color: white;">
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 5px;">
                                        @foreach ($bootcamps as $bootcamp)
                                            @if(request('id_bootcamp') == $bootcamp->id_bootcamp)
                                                <input type="hidden" class="form-control" value="{{ $bootcamp->judul_bootcamp }}" style="background-color: #d3d3d3;" readonly>
                                                <input type="hidden" name="id_bootcamp" value="{{ $bootcamp->id_bootcamp }}">
                                            @endif
                                        @endforeach
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="mt-4 d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('administrator.batch.index', ['id_bootcamp' => request('id_bootcamp')]) }}" class="btn btn-danger">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            flatpickr("#tanggal_mulai", {
                dateFormat: "Y-m-d",
                locale: {
                    firstDayOfWeek: 1
                }
            });
        
            flatpickr("#tanggal_selesai", {
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
