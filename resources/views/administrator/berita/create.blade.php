@extends('administrator.layout')

@section('content')
<div class="card shadow">
    <div class="card-header">
        <h3 class="mb-0">Tambah Berita</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('administrator.berita.store') }}" method="POST" enctype="multipart/form-data" class="form-ajax">
            @csrf
            <div class="table-responsive">
                <table class="table" style="border: none; border-collapse: collapse;">
                    <tbody>
                        <tr>
                            <th style="padding: 5px;">Judul Berita</th>
                            <td style="padding: 5px;">
                                <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan judul berita" required>
                            </td>
                        </tr>
                        <tr>
                            <th style="padding: 5px;">Sub Judul</th>
                            <td style="padding: 5px;">
                                <input type="text" class="form-control" id="sub_judul" name="sub_judul" placeholder="Masukkan sub judul berita">
                            </td>
                        </tr>
                        <tr>
                            <th style="padding: 5px;">Video Youtube</th>
                            <td style="padding: 5px;">
                                <input type="text" class="form-control" id="youtube" name="youtube" placeholder="Contoh link: http://www.youtube.com/embed/xbuEmoRWQHU">
                            </td>
                        </tr>
                        <tr>
                            <th style="padding: 5px;">Kategori</th>
                            <td style="padding: 5px;">
                                <select class="form-control" id="id_kategori" name="id_kategori" required>
                                    <option value="">-- Pilih Kategori --
                                    @foreach($kategori as $kat)
                                    <option value="{{ $kat->id_kategori }}">
                                        {{ $kat->nama_kategori }}
                                    </option>
                                    @endforeach
                                    </option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th style="padding: 5px;">Headline</th>
                            <td style="padding: 5px;">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="headline" id="headline_ya" value="Y">
                                    <label class="form-check-label" for="headline_ya">Ya</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="headline" id="headline_tidak" value="N" checked>
                                    <label class="form-check-label" for="headline_tidak">Tidak</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th style="padding: 5px;">Pilihan</th>
                            <td style="padding: 5px;">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="aktif" id="aktif_ya" value="Y">
                                    <label class="form-check-label" for="aktif_ya">Ya</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="aktif" id="aktif_tidak" value="N" checked>
                                    <label class="form-check-label" for="aktif_tidak">Tidak</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th style="padding: 5px;">Berita Utama</th>
                            <td style="padding: 5px;">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="utama" id="utama_ya" value="Y">
                                    <label class="form-check-label" for="utama_ya">Ya</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="utama" id="utama_tidak" value="N" checked>
                                    <label class="form-check-label" for="utama_tidak">Tidak</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th style="padding: 5px;">Isi Berita</th>
                            <td style="padding: 5px;">
                                <textarea class="form-control" id="isi_berita" name="isi_berita" rows="5" placeholder="Masukkan isi berita" required></textarea>
                            </td>
                        </tr>
                        <tr>
                            <th style="padding: 5px;">Gambar</th>
                            <td style="padding: 5px;">
                                <input type="file" class="form-control" id="gambar" name="gambar">
                            </td>
                        </tr>
                        <tr>
                            <th style="padding: 5px;">Ket. Gambar</th>
                            <td style="padding: 5px;">
                                <input type="text" class="form-control" id="keterangan_gambar" name="keterangan_gambar" placeholder="Masukkan Keterangan">
                            </td>
                        </tr>
                        <tr>
                            <th style="padding: 5px;">Tag</th>
                            <td style="padding: 5px; border: 1px solid #ddd;">
                                <div style="max-height: 200px; overflow-y: auto;">
                                    @foreach($tags as $tag)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="{{ $tag->tag_seo }}" id="tag" name="tag[]">
                                            <label class="form-check-label" for="tag">
                                                {{ $tag->nama_tag }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="mt-4 d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('administrator.berita.index') }}" class="btn btn-danger">Batal</a>
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
