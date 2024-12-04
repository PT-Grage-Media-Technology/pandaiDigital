@extends('administrator.layout')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Edit Poling / Jajak Pendapat</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('administrator.jejakpendapat.update', $poll->id_poling) }}" method="post" enctype="multipart/form-data" class="form-ajax">
            @csrf
            @method('PUT')
            <div class="table-responsive">
                <table class="table" id="datatable-buttons" style="border: none; border-collapse: collapse;">
                    <tbody>
                        <tr>
                            <th style="padding: 5px;">Pertanyaan</th>
                            <td style="padding: 5px;">
                                <input type="text" class="form-control" id="pertanyaan" name="pilihan" value="{{ $poll->pilihan }}">
                            </td>
                        </tr>
                        <tr>
                            <th style="padding: 5px;">Status</th>
                            <td style="padding: 5px;">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="jawaban" value="jawaban" {{ $poll->status == "jawaban" ? "checked" : "" }}>
                                    <label class="form-check-label" for="jawaban">Jawaban</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="pertanyaan" value="pertanyaan" {{ $poll->status == "pertanyaan" ? "checked" : "" }}>
                                    <label class="form-check-label" for="pertanyaan">Pertanyaan</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th style="padding: 5px;">Aktif</th>
                            <td style="padding: 5px;">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="aktif" id="ya" value="Y" {{ $poll->aktif == "Y" ? "checked" : "" }}>
                                    <label class="form-check-label" for="Y">Ya</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="aktif" id="tidak" value="N" {{ $poll->aktif == "N" ? "checked" : "" }}>
                                    <label class="form-check-label" for="N">Tidak</label>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="mt-4 d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('administrator.jejakpendapat.index') }}" class="btn btn-danger">Batal</a>
            </div>
        </form>
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

        // Delete confirmation with Swal
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

        // Ajax form submission with Swal notifications
        $('.form-ajax').each(function() {
            $(this).bind('submit', function(e) {
                e.preventDefault();
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
