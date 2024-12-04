@extends('administrator.layout')

@section('content')
<div class="row">
    <div class="col">
        <div class="card card-shadow">
            <div class="card-header">
                <h3 class="mb-0">Tambah Menu Website Baru</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('administrator.menuwebsite.store') }}" method="POST" class="form-ajax">
                    @csrf
                    <div class="table-responsive">
                        <table class="table" id="datatable-buttons" style="border: none; border-collapse: collapse;">
                            <tbody>
                                <tr>
                                    <th style="padding: 5px;">Link Menu</th>
                                    <td style="padding: 5px;">
                                        <input type="text" class="form-control @error('link') is-invalid @enderror" id="link" name="link" placeholder="Masukkan Link Menu Website" required>
                                        @error('link')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <th style="padding: 5px;">Level Menu</th>
                                    <td style="padding: 5px;">
                                        <select class="form-control @error('id_parent') is-invalid @enderror" id="id_parent" name="id_parent">
                                            <option value="">-- Pilih Level Menu --</option>
                                            @foreach ($menuwebs as $menuw)
                                                <option value="{{ $menuw->id_menu }}" {{ old('id_parent') == $menuw->id_menu ? 'selected' : '' }}>
                                                    {{ $menuw->nama_menu }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('id_parent')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <th style="padding: 5px;">Nama Menu</th>
                                    <td style="padding: 5px;">
                                        <input type="text" class="form-control @error('nama_menu') is-invalid @enderror" id="nama_menu" name="nama_menu" placeholder="Masukkan Nama Menu" required>
                                        @error('nama_menu')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <th style="padding: 5px;">Gambar</th>
                                    <td style="padding: 5px;">
                                        <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*">
                                    </td>
                                </tr>
                                <tr>
                                    <th style="padding: 5px;">Deskripsi</th>
                                    <td style="padding: 5px;">
                                        <textarea class="form-control" id="isi_deskripsi" name="deskripsi"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="padding: 5px;">Position</th>
                                    <td style="padding: 5px;">
                                        <div class="d-flex">
                                            <div class="form-check me-4">
                                                <input class="form-check-input" type="radio" name="position" id="position_bottom" value="Bottom" {{ old('position') == 'Bottom' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="position_bottom">Bottom</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="position" id="position_top" value="Top" {{ old('position') == 'Top' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="position_top">Top</label>
                                            </div>
                                        </div>
                                        @error('position')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <th style="padding: 5px;">Urutan</th>
                                    <td style="padding: 5px;">
                                        <input type="number" class="form-control @error('urutan') is-invalid @enderror" id="urutan" name="urutan" placeholder="Masukkan Urutan Menu" required>
                                        @error('urutan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </td>  
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4 d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('administrator.menuwebsite.index') }}" class="btn btn-danger">Batal</a>
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

