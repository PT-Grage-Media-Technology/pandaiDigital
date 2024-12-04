@extends('administrator.layout')

@section('content')

@php
    $jamArray = explode(' - ', $agenda->jam);
    $jamMulai = $jamArray[0] ?? '';
    $jamSelesai = isset($jamArray[1]) ? str_replace(' WIB', '', $jamArray[1]) : '';
@endphp

<div class="card shadow">
    <div class="card-header">
        <h3 class="mb-0">Edit Agenda</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('administrator.agenda.update', $agenda->id_agenda) }}" method="POST" enctype="multipart/form-data" class="form-ajax">
            @csrf
            @method('PUT')

            <!-- Responsive Table -->
            <div class="table-responsive">
                <table class="table" style="border: none; border-collapse: collapse;">
                    <tbody>
                        <tr>
                            <th style="padding: 5px;">Tema</th>
                            <td style="padding: 5px;">
                                <input type="text" class="form-control" id="tema" name="tema" value="{{ $agenda->tema }}" required>
                            </td>
                        </tr>
                        <tr>
                            <th style="padding: 5px;">Isi Agenda</th>
                            <td style="padding: 5px;">
                                <textarea class="form-control" id="isi_agenda" name="isi_agenda" rows="4">{{ $agenda->isi_agenda }}</textarea>
                            </td>
                        </tr>
                        <tr>
                            <th style="padding: 5px;">Gambar</th>
                            <td style="padding: 5px;">
                                <div class="d-flex align-items-center">
                                    <img id="preview" src="{{ url('foto_agenda/'.$agenda->gambar) }}" alt="Preview" style="max-width: 100px; margin-top: 5px;" class="mr-3 img-fluid">
                                    <div class="flex-grow-1">
                                        <input type="file" class="form-control" onchange="previewImage(event)" name="gambar" id="gambar">
                                        <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah gambar.</small>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th style="padding: 5px;">Tempat</th>
                            <td style="padding: 5px;">
                                <input type="text" class="form-control" id="tempat" name="tempat" value="{{ $agenda->tempat }}">
                            </td>
                        </tr>
                        <tr>
                            <th style="padding: 5px;">Jam Mulai</th>
                            <td style="padding: 5px;">
                                <input type="time" class="form-control" id="jam_mulai" name="jam_mulai" value="{{ $jamMulai }}" required>
                            </td>
                        </tr>
                        <tr>
                            <th style="padding: 5px;">Jam Selesai</th>
                            <td style="padding: 5px;">
                                <input type="time" class="form-control" id="jam_selesai" name="jam_selesai" value="{{ $jamSelesai }}" required>
                            </td>
                        </tr>
                        <tr>
                            <th style="padding: 5px;">Tgl s/d Selesai</th>
                            <td style="padding: 5px;">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="tgl_mulai" name="tgl_mulai" value="{{ $agenda->tgl_mulai }}" style="background-color: white;">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="tgl_selesai" name="tgl_selesai" value="{{ $agenda->tgl_selesai }}" style="background-color: white;">
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th style="padding: 5px;">Pengirim</th>
                            <td style="padding: 5px;">
                                <input type="text" class="form-control" id="pengirim" name="pengirim" value="{{ $agenda->pengirim }}">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Submit and Cancel Buttons -->
            <div class="mt-4 d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('administrator.agenda.index') }}" class="btn btn-danger">Batal</a>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        flatpickr("#tgl_mulai", {
            dateFormat: "Y-m-d",
            locale: {
                firstDayOfWeek: 1
            }
        });
    
        flatpickr("#tgl_selesai", {
            dateFormat: "Y-m-d",
            locale: {
                firstDayOfWeek: 1
            }
        });
    });
</script>

<script>
    function previewImage(event) {
        var preview = document.getElementById('preview');
        var file = event.target.files[0];
        var reader = new FileReader();

        reader.onload = function() {
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