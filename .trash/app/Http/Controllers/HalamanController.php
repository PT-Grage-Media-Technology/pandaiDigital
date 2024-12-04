<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Alamatkontak;
use App\Models\Album;
use App\Models\Bannerslider;
use App\Models\Berita;
use App\Models\Gallery;
use App\Models\Halamanbaru;
use App\Models\Identitaswebsite;
use App\Models\Logo;
use App\Models\Menuwebsite;
use App\Models\Template;
use App\Models\Video;
use Illuminate\Http\Request;

class HalamanController extends Controller
{
    //
    // ### PROFIL DINAS START

    public function sejarah_instansi()
    {
        $beritas = Berita::orderBy('id_berita', 'DESC')->limit(10)->get();
        $identitas = Identitaswebsite::first();
        $logo = Logo::orderBy('id_logo', 'DESC')->first();
        $banners = Bannerslider::all();
        $menus = Menuwebsite::where('id_parent', 0)
        ->with('children.children') // Menyertakan children hingga 2 level
        ->orderBy('position', 'asc')
        ->get();
        $alamat = Alamatkontak::first();
        $halamanbaru = Halamanbaru::where('judul_seo', 'sejarah-instansi')->first(); // Ganti dengan kondisi yang sesuai
        $template = Template::where('aktif', 'Y')->first();
        return view($template->folder . ".sejarahinstansi", compact('identitas','beritas','logo', 'banners', 'menus', 'alamat', 'halamanbaru'));
    }

    public function struktur_organisasi()
    {
        $beritas = Berita::orderBy('id_berita', 'DESC')->limit(10)->get();
        $identitas = Identitaswebsite::first();
        $logo = Logo::orderBy('id_logo', 'DESC')->first();
        $banners = Bannerslider::all();
        $menus = Menuwebsite::where('id_parent', 0)
        ->with('children.children') // Menyertakan children hingga 2 level
        ->orderBy('position', 'asc')
        ->get();
        $alamat = Alamatkontak::first();
        $halamanbaru = Halamanbaru::where('judul_seo', 'struktur-organisasi')->first(); // Ganti dengan kondisi yang sesuai
        $template = Template::where('aktif', 'Y')->first();
        return view($template->folder . ".strukturorganisasi", compact('identitas','beritas','logo', 'banners', 'menus', 'alamat', 'halamanbaru'));
    }

    public function visi_dan_misi()
    {
        $beritas = Berita::orderBy('id_berita', 'DESC')->limit(10)->get();
        $identitas = Identitaswebsite::first();
        $logo = Logo::orderBy('id_logo', 'DESC')->first();
        $banners = Bannerslider::all();
        $menus = Menuwebsite::where('id_parent', 0)
        ->with('children.children') // Menyertakan children hingga 2 level
        ->orderBy('position', 'asc')
        ->get();
        $alamat = Alamatkontak::first();
        $halamanbaru = Halamanbaru::where('judul_seo', 'visi-dan-misi')->first(); // Ganti dengan kondisi yang sesuai
        $template = Template::where('aktif', 'Y')->first();
        return view($template->folder . ".visidanmisi", compact('identitas','beritas','logo', 'banners', 'menus', 'alamat', 'halamanbaru'));
    }

    // ### PROFIL DINAS END


    // ### MEDIA DAN INFORMASI

    public function berita()
    {
        $identitas = Identitaswebsite::first();
        $logo = Logo::orderBy('id_logo', 'DESC')->first();
        $banners = Bannerslider::all();
        $menus = Menuwebsite::where('id_parent', 0)
            ->with('children.children') // Menyertakan children hingga 2 level
            ->orderBy('position', 'asc')
            ->get();
        $alamat = Alamatkontak::first();
        $berita = Berita::where('judul_seo', 'berita')->first(); // Ganti dengan kondisi yang sesuai
        
        // Menggunakan paginate untuk membatasi hasil menjadi 10 per halaman
        $beritas = Berita::orderBy('id_berita', 'DESC')->paginate(10, ['id_berita', 'judul', 'isi_berita', 'tanggal', 'gambar', 'judul_seo']); // Fetch data berita, isi_berita, tanggal, dan gambar

        foreach ($beritas as $berita) {
            $berita->tanggal = \Carbon\Carbon::parse($berita->tanggal)->format('d M Y'); // Ubah format tanggal
        }
        
        $template = Template::where('aktif', 'Y')->first();
        return view($template->folder . ".berita", compact('beritas', 'berita', 'identitas', 'logo', 'banners', 'menus', 'alamat')); // Kirim data ke view
    }

    public function detailBerita($judul_seo)
    {
        // dd($judul_seo);
        $berita = Berita::where('judul_seo', $judul_seo)->firstOrFail(); // Ambil berita berdasarkan judul_seo
        $identitas = Identitaswebsite::first();
        $logo = Logo::orderBy('id_logo', 'DESC')->first();
        $banners = Bannerslider::all();
        $menus = Menuwebsite::where('id_parent', 0)
            ->with('children.children') // Menyertakan children hingga 2 level
            ->orderBy('position', 'asc')
            ->get();
        $alamat = Alamatkontak::first();


        $template = Template::where('aktif', 'Y')->first();
        return view($template->folder . ".detailberita", compact('berita', 'identitas', 'logo', 'banners', 'menus', 'alamat')); // Kirim data ke view
    }

    public function album()
    {
        $identitas = Identitaswebsite::first();
        $logo = Logo::orderBy('id_logo', 'DESC')->first();
        $banners = Bannerslider::all();
        $menus = Menuwebsite::where('id_parent', 0)
            ->with('children.children') // Menyertakan children hingga 2 level
            ->orderBy('position', 'asc')
            ->get();
        $alamat = Alamatkontak::first();
        $album = Album::orderBy('tgl_posting', 'DESC')->get(['id_album', 'jdl_album', 'album_seo', 'keterangan', 'gbr_album']); // Fetch data berita, isi_berita, tanggal, dan gambar // Mengambil data album

        $template = Template::where('aktif', 'Y')->first();
        return view($template->folder . ".albums", compact('album', 'identitas', 'logo', 'banners', 'menus', 'alamat'));
    }

    public function detailalbum($album_seo)
    {
        $album = Album::where('album_seo', $album_seo)->firstOrFail();
        $gallery = Gallery::where('id_album', $album->id_album)->get(['jdl_gallery', 'keterangan', 'gbr_gallery']); // Mengambil data gallery berdasarkan id_album
        $identitas = Identitaswebsite::first();
        $logo = Logo::orderBy('id_logo', 'DESC')->first();
        $banners = Bannerslider::all();
        $menus = Menuwebsite::where('id_parent', 0)
            ->with('children.children') // Menyertakan children hingga 2 level
            ->orderBy('position', 'asc')
            ->get();
        $alamat = Alamatkontak::first();

        $template = Template::where('aktif', 'Y')->first();
        return view($template->folder . ".detailalbum", compact('album', 'gallery', 'identitas', 'logo', 'banners', 'menus', 'alamat'));
    }


    public function video()
    {
        $identitas = Identitaswebsite::first();
        $logo = Logo::orderBy('id_logo', 'DESC')->first();
        $banners = Bannerslider::all();
        $menus = Menuwebsite::where('id_parent', 0)
            ->with('children.children') // Menyertakan children hingga 2 level
            ->orderBy('position', 'asc')
            ->get();
        $alamat = Alamatkontak::first();
        $video = Video::orderBy('id_video', 'DESC')->get(); // Mengambil data video

        $template = Template::where('aktif', 'Y')->first();
        return view($template->folder . ".playlist", compact('video', 'identitas', 'logo', 'banners', 'menus', 'alamat'));
    }

    public function agenda()
    {
        $identitas = Identitaswebsite::first();
        $logo = Logo::orderBy('id_logo', 'DESC')->first();
        $banners = Bannerslider::all();
        $menus = Menuwebsite::where('id_parent', 0)
            ->with('children.children') // Menyertakan children hingga 2 level
            ->orderBy('position', 'asc')
            ->get();
        $alamat = Alamatkontak::first();
        $agenda = Agenda::orderBy('tgl_posting', 'DESC')->get(); // Mengambil data agenda

        $template = Template::where('aktif', 'Y')->first();
        return view($template->folder . ".agenda", compact('agenda', 'identitas', 'logo', 'banners', 'menus', 'alamat'));
    }

    public function detailAgenda($tema_seo)
    {
        // dd($judul_seo);
        $agenda = Agenda::where('tema_seo', $tema_seo)->firstOrFail(); // Ambil berita berdasarkan judul_seo
        $identitas = Identitaswebsite::first();
        $logo = Logo::orderBy('id_logo', 'DESC')->first();
        $banners = Bannerslider::all();
        $menus = Menuwebsite::where('id_parent', 0)
            ->with('children.children') // Menyertakan children hingga 2 level
            ->orderBy('position', 'asc')
            ->get();
        $alamat = Alamatkontak::first();


        $template = Template::where('aktif', 'Y')->first();
        return view($template->folder . ".detailagenda", compact('agenda', 'identitas', 'logo', 'banners', 'menus', 'alamat')); // Kirim data ke view
    }

}
