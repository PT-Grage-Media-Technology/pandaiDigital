<?php

use App\Models\Berlangganan;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\AlamatkontakController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\BannerhomeController;
use App\Http\Controllers\BannersliderController;
use App\Http\Controllers\BenefitController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\BerlanggananController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DownloadareaController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\GrafikController;
use App\Http\Controllers\HalamanbaruController;
use App\Http\Controllers\IdentitaswebsiteController;
use App\Http\Controllers\IklanatasController;
use App\Http\Controllers\IklansidebarController;
use App\Http\Controllers\JejakpendapatController;
use App\Http\Controllers\KategoriberitaController;
use App\Http\Controllers\KomentarberitaController;
use App\Http\Controllers\KomentarvideoController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\LogowebsiteController;
use App\Http\Controllers\Main2Controller;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ManajemenmodulController;
use App\Http\Controllers\ManajemenuserController;
use App\Http\Controllers\MenuwebsiteController;
use App\Http\Controllers\PesanmasukController;
use App\Http\Controllers\PlaylistvideoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SekilasinfoController;
use App\Http\Controllers\SensorkomentarController;
use App\Http\Controllers\TagberitaController;
use App\Http\Controllers\TagvideoController;
use App\Http\Controllers\TestingController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\YmController;
use App\Http\Controllers\DatabaseController;
use App\Http\Controllers\HalamanController;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\KategoriprogramController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MetodeController;
use App\Http\Controllers\MetodepembayaranController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\TemplatewebsiteController;
use App\Models\Agenda;
use App\Models\Berita;
use App\Models\Halamanbaru;
use App\Models\Testimoni;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/home', [DashboardController::class, 'home'])->middleware(['auth', 'verified'])->name('home');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/login', function () {
    return view('auth.login'); // Mengarahkan ke halaman login Laravel Breeze
})->name('login');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// Route::get('administrator/dashboard', [DashboardController::class, "dashboard"]);

Route::prefix('administrator')->name('administrator.')->group(function () {
    // Route::resource('halamanbaru', HalamanbaruController::class);
    // Route::get('grafik/data', [GrafikController::class, 'fetchGrafikData'])
    // ->name('grafik.data')
    // ->middleware('checkModul:grafik');

    // Route::resource('grafik', GrafikController::class)
    // ->middleware('checkModul:grafik');

    Route::get('grafik/data', [GrafikController::class, 'fetchGrafikData'])->name('grafik.data'); // Correctly named route

    Route::resource('halamanbaru', HalamanbaruController::class)
        ->middleware('checkModul:halamanbaru');
    Route::get('identitaswebsite', [IdentitaswebsiteController::class, 'edit'])->name('identitaswebsite.edit');
    Route::put('identitaswebsite', [IdentitaswebsiteController::class, 'update'])->name('identitaswebsite.update');
    Route::get('identitaswebsite', [IdentitaswebsiteController::class, 'edit'])
        ->middleware('checkModul:identitaswebsite')
        ->name('identitaswebsite.edit');

    Route::resource('berita', BeritaController::class)
        ->middleware('checkModul:berita');
    Route::get('berita/publish/{id_berita}', [BeritaController::class, 'publish'])
        ->name('berita.publish')
        ->middleware('checkModul:berita.publish');

    Route::resource('kategoriberita', KategoriberitaController::class)
        ->middleware('checkModul:kategoriberita');

    Route::resource('tagberita', TagberitaController::class)
        ->middleware('checkModul:tagberita');

    Route::resource('playlistvideo', PlaylistvideoController::class)
        ->middleware('checkModul:playlistvideo');
    Route::resource('video', VideoController::class)
        ->middleware('checkModul:video');
    Route::resource('tagvideo', TagvideoController::class)
        ->middleware('checkModul:tagvideo');

    Route::resource('manajemenuser', ManajemenuserController::class)
        ->middleware('checkModul:manajemenuser');
    Route::get('manajemenuser/delete_akses/{id_umod}/{user_id}', [ManajemenuserController::class, 'delete_akses'])
        ->name('manajemenuser.delete_akses')
        ->middleware('checkModul:manajemenuser.delete_akses');
    Route::resource('manajemenmodul', ManajemenmodulController::class)
        ->middleware('checkModul:manajemenmodul');
    Route::resource('sekilasinfo', SekilasinfoController::class)
        ->middleware('checkModul:sekilasinfo');
    Route::resource('jejakpendapat', JejakpendapatController::class)
        ->middleware('checkModul:jejakpendapat');
    Route::resource('downloadarea', DownloadareaController::class)
        ->middleware('checkModul:downloadarea');
    Route::resource('pesanmasuk', PesanmasukController::class)
        ->middleware('checkModul:pesanmasuk');

    Route::get('detailpesanmasuk/{id}', [PesanmasukController::class, 'show'])->name('detailpesanmasuk.show');

    // Tambahkan rute untuk sendReply
    Route::post('pesanmasuk/{id}/sendReply', [PesanmasukController::class, 'sendReply'])->name('pesanmasuk.sendReply');

    // Route::resource('menuwebsite', MenuwebsiteController::class);
    Route::resource('menuwebsite', MenuwebsiteController::class)
        ->middleware('checkModul:menuwebsite');
    Route::resource('bannerslider', BannersliderController::class)
        ->middleware('checkModul:bannerslider');
    Route::resource('bannerhome', BannerhomeController::class)
        ->middleware('checkModul:bannerhome');
    Route::resource('iklansidebar', IklansidebarController::class)
        ->middleware('checkModul:iklansidebar');
    Route::resource('agenda', AgendaController::class)
        ->middleware('checkModul:agenda');
    Route::resource('alamatkontak', AlamatkontakController::class)
        ->middleware('checkModul:alamatkontak');
    Route::resource('logowebsite', LogowebsiteController::class)
        ->middleware('checkModul:logowebsite');
    Route::resource('album', AlbumController::class)
        ->middleware('checkModul:album');

    Route::resource('iklanatas', IklanatasController::class)
        ->middleware('checkModul:iklanatas');

    Route::resource('sensorkomentar', SensorkomentarController::class)
        ->middleware('checkModul:sensorkomentar');

    Route::resource('komentarberita', KomentarberitaController::class)
        ->middleware('checkModul:komentarberita');

    Route::resource('komentarvideo', KomentarvideoController::class)
        ->middleware('checkModul:komentarvideo');

    Route::resource('gallery', GalleryController::class)
        ->middleware('checkModul:gallery');

    Route::resource('ym', YmController::class)
        ->middleware('checkModul:ym');

    Route::resource('templatewebsite', TemplatewebsiteController::class);

    Route::get('templatewebsite/active/{id_templates}', [TemplatewebsiteController::class, 'active'])
        ->name('templatewebsite.active')
        ->middleware('checkModul:templatewebsite.active');

    Route::resource('testimoni', TestimoniController::class)
        ->middleware('checkModul:testimoni');

    Route::resource('trainer', TrainerController::class)
        ->middleware('checkModul:trainer');

    Route::resource('program', ProgramController::class)
        ->middleware('checkModul:program');

    Route::resource('kategoriprogram', KategoriprogramController::class)
        ->middleware('checkModul:kategoriprogram');
    Route::resource('benefit', BenefitController::class)
        ->middleware('checkModul:benefit');
    Route::resource('berlangganan', BerlanggananController::class)
        ->middleware('checkModul:berlangganan');
    Route::resource('rating', RatingController::class)
        ->middleware('checkModul:rating');
    Route::resource('materi', MateriController::class)
        ->middleware('checkModul:materi');

    Route::resource('materi', MateriController::class)
        ->middleware('checkModul:materi');

    Route::resource('member', MemberController::class)
        ->middleware('checkModul:member');

    Route::resource('metodepembayaran', MetodepembayaranController::class)
        ->middleware('checkModul:metodepembayaran');

    Route::resource('metode', MetodeController::class)
        ->middleware('checkModul:metode');

    Route::resource('mitra', MitraController::class)
        ->middleware('checkModul:mitra');

    //ini dari sini diganti
    Route::resource('berlangganan', BerlanggananController::class)
        ->middleware('checkModul:berlangganan');


    // Rute untuk backup database
    // Rute untuk backup database
    Route::get('database', [DatabaseController::class, 'index'])
        ->middleware('checkModul:database')
        ->name('database.index');
    Route::get('database/backup', [DatabaseController::class, 'database_backup'])
        ->middleware('checkModul:database.backup')
        ->name('database.backup');
    Route::get('database/backup/{file}/download', [DatabaseController::class, 'database_backup_download'])
        ->middleware('checkModul:database.backup.download')
        ->name('database.backup.download');
    Route::get('database/backup/{file}/remove', [DatabaseController::class, 'database_backup_remove'])
        ->middleware('checkModul:database.backup.remove')
        ->name('database.backup.remove');
});

// Route::prefix('dinas-1')->name('dinas-1.')->group(function () {
// Route::resource('dashboard',MainController::class );
// });

// index
// Route::get('/home', function () {
// return view('./myskill/pages/hotrame');
// })->name('Home');

Route::get('/home', [MainController::class, 'index'])->name('home');
Route::get('/bootcamp', [MainController::class, 'bootcamp']);
Route::get('/review', [MainController::class, 'review']);
Route::get('/company-profile', [AppController::class, 'companyprofile']);


Route::get('/', [MainController::class, 'index']);


// e-learning
Route::get('/e-learning', function () {
    $testimonis = Testimoni::all();
    $berlangganans = Berlangganan::all();
    foreach ($berlangganans as $berlangganan) {
        $berlangganan->id_benefits = json_decode($berlangganan->id_benefits); // Decode JSON
    }
    return view('./myskill/pages/e-learning/e-learning', compact('testimonis', 'berlangganans'));
})->name('E-learning');

Route::get('/e-learning/program', function () {
    return view('./myskill/pages/e-learning/program');
})->name('Program');

Route::get('/my-profile', function () {
    return view('./myskill/pages/profile/my-profile');
})->name('My Profile');

Route::get('/e-learning/materi', function () {
    return view('./myskill/pages/e-learning/materi');
})->name('Materi');

// bootcamp
// Route::get('/bootcamp', function () {
// $testimonis = Testimoni::all();

// return view('./myskill/pages/program/bootcamp', compact('testimonis'));
// })->name('Program & Bootcamp');

Route::get('/bootcamp/digital-marketing', function () {
    return view('./myskill/pages/program/digital-marketing');
})->name('Digital Marketing');

//cv
Route::get('/review', function () {
    $testimonis = Testimoni::all();
    return view('./myskill/pages/cv/review', compact('testimonis'));
})->name('Review CV');

//corporate
Route::get('/corporate-service', function () {
    return view('./myskill/pages/corporate/corporate');
})->name('Review CV');

Route::get('/corporate-training', function () {
    return view('./myskill/pages/corporate/corporate-training');
})->name('Corporate Training');

Route::get('/experience', function () {
    return view('./myskill/pages/corporate/experience');
})->name('Experience');

//login & register
// Route::get('/login', function () {
// return view('./myskill/pages/auth/login');
// })->name('Login');

// Route::get('/register', function () {
// return view('./myskill/pages/auth/register');
// })->name('Register');

//payment
Route::get('/payment/{id}', [PaymentController::class, 'show'])->name('payment');


//profile
Route::get('/profile/my-purchase', function () {
    return view('./myskill/pages/profile/my-purchase');
})->name('Purchased');

Route::get('/profile/my-activity', function () {
    return view('./myskill/pages/profile/my-activity');
})->name('Activity');

Route::get('/profile/my-transaction', function () {
    return view('./myskill/pages/profile/my-transaction');
})->name('Transactions');

Route::get('/my-profile', [ProfileController::class, 'edit'])->name('profile.my-profile');
Route::patch('/my-profile', [ProfileController::class, 'update'])->name('profile.update');

// Route::get('/', [MainController::class, 'index']);
Route::get('sejarah-instansi', [HalamanController::class, 'sejarah_instansi']);
Route::get('struktur-organisasi', [HalamanController::class, 'struktur_organisasi']);
Route::get('visi-dan-misi', [HalamanController::class, 'visi_dan_misi']);
Route::get('berita', [HalamanController::class, 'berita']);
Route::get('detailberita/{judul_seo}', [HalamanController::class, 'detailBerita'])->name('detailberita');
Route::get('detailagenda/{tema_seo}', [HalamanController::class, 'detailAgenda'])->name('detailagenda');
Route::get('detailalbum/{album_seo}', [HalamanController::class, 'detailalbum'])->name('detailalbum');
Route::get('albums', [HalamanController::class, 'album']);
Route::get('video', [HalamanController::class, 'video']);
Route::get('agenda', [HalamanController::class, 'agenda']);
Route::get('sliderlogo', [MainController::class, 'create']);

// Route::get('administrator/layout', [TestingController::class, 'layout']);


//routes lainnya
Route::get('/faq', function () {
    return view('./myskill/pages/lainnya/faq');
})->name('FAQ');

Route::get('/s&k', function () {
    return view('./myskill/pages/lainnya/s&k');
})->name('Syarat dan Ketentuan');
