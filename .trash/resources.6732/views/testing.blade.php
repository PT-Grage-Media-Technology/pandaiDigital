@extends('administrator.layout')

@section('content')
    <div class="card shadow">
        <div class="card-header">
            <h3 class="mb-0">Edit Berita</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('administrator.berita.update', $berita->id_berita) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <table class="table" style="border: none; border-collapse: collapse;">
                    <tbody>
                        <tr>
                            <th style="padding: 5px;">Judul Berita</th>
                            <td style="padding: 5px;">
                                <input type="text" class="form-control" id="judul" name="judul" value="{{ $berita->judul }}" placeholder="Masukkan judul berita" required>
                            </td>
                        </tr>
                        <tr>
                            <th style="padding: 5px;">Sub Judul</th>
                            <td style="padding: 5px;">
                                <input type="text" class="form-control" id="sub_judul" name="sub_judul" value="{{ $berita->sub_judul }}" placeholder="Masukkan sub judul berita">
                            </td>
                        </tr>
                        <tr>
                            <th style="padding: 5px;">Video Youtube</th>
                            <td style="padding: 5px;">
                                <input type="text" class="form-control" id="youtube" name="youtube" value="{{ $berita->youtube }}" placeholder="Contoh link: http://www.youtube.com/embed/xbuEmoRWQHU">
                            </td>
                        </tr>
                        <tr>
                            <th style="padding: 5px;">Kategori</th>
                            <td style="padding: 5px;">
                                <select class="form-control" id="id_kategori" name="id_kategori" required>
                                    @foreach($kategori as $kat)
                                    <option value="{{ $kat->id_kategori }}" {{ $berita->id_kategori == $kat->id_kategori ? 'selected' : '' }}>
                                        {{ $kat->nama_kategori }}
                                    </option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th style="padding: 5px;">Headline</th>
                            <td style="padding: 5px;">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="headline" id="headline_y" value="Y" {{ $berita->headline == 'Y' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="headline_y">Ya</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="headline" id="headline_n" value="N" {{ $berita->headline == 'N' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="headline_n">Tidak</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th style="padding: 5px;">Pilihan</th>
                            <td style="padding: 5px;">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="aktif" id="aktif" value="Y" {{ $berita->aktif == 'Y' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="aktif_y">Ya</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="aktif" id="aktif" value="N" {{ $berita->aktif == 'N' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="aktif_n">Tidak</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th style="padding: 5px;">Berita Utama</th>
                            <td style="padding: 5px;">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="utama" id="utama" value="Y" {{ $berita->utama == 'Y' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="utama_y">Ya</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="utama" id="utama" value="N" {{ $berita->utama == 'N' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="utama_n">Tidak</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th style="padding: 5px;">Isi Berita</th>
                            <td style="padding: 5px;">
                                <textarea class="form-control" id="isi_berita" name="isi_berita" rows="5" placeholder="Masukkan isi berita">{{ $berita->isi_berita }}</textarea>
                            </td>
                        </tr>
                        <tr>
                        <th style="padding: 5px;">Gambar saat ini:</th>
                        <td style="padding: 5px;">
                            <div class="d-flex align-items-center">
                                <img id="preview" src="{{ url('foto_berita/'.$berita->gambar) }}" alt="Preview" style="max-width: 100px; margin-top: 5px;" class="mr-3">
                                <div class="flex-grow-1">
                                    <input type="file" class="form-control" onchange="previewImage(event)" name="gambar" id="gambar">
                                    <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah gambar.</small>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th style="padding: 5px;">Ket. Gambar</th>
                        <td style="padding: 5px;">
                            <input type="text" class="form-control" id="ket_gambar" name="ket_gambar" placeholder="Masukkan keterangan gambar" value="{{ $berita->keterangan_gambar }}">
                        </td>
                    </tr>
                    <tr>
                        <th style="padding: 5px;">Tag</th>
                        <td style="padding: 5px; border: 1px solid #ddd;">
                            <div style="max-height: 200px; overflow-y: auto;">
                                {{-- @foreach($tags as $tag)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="{{ $tag->id_tag }}" id="tag{{ $tag->id_tag }}" name="tags[]"
                                        {{ in_array($tag->id_tag, $beritaTags) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="tag{{ $tag->id_tag }}">
                                        {{ $tag->nama_tag }}
                                    </label>
                                </div>
                                @endforeach --}}
                                @foreach($tags as $tag)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="{{ $tag->id_tag }}" id="tag{{ $tag->id_tag }}" name="tags[]"
                                        {{ $berita->tags && in_array($tag->id_tag, $berita->tags->pluck('id_tag')->toArray()) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="tag{{ $tag->id_tag }}">
                                        {{ $tag->nama_tag }}
                                    </label>
                                </div>
                                @endforeach
                            </div>
                        </td>
                    </tr>
                    {{-- <tr>
                        <th style="padding: 5px;">GIMANA</th>
                        <td style="padding: 5px; border: 1px solid #ddd;">
                            <div style="max-height: 200px; overflow-y: auto;">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" checked>
                                    <label class="form-check-label" for="tag">
                                        coba
                                    </label>
                                </div>
                            </div>
                        </td>
                    </tr> --}}
                    </tbody>
                </table>
                <div class="mt-4 d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('administrator.berita.index') }}" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
