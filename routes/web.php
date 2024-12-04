<?php

use App\Models\User;
use App\Models\Sertifikat;
use App\Models\Agenda;
use App\Models\Berita;
use App\Models\Materi;
use App\Models\Program;
use App\Models\Trainer;
use App\Models\Testimoni;
use App\Models\Halamanbaru;
use App\Models\Berlangganan;
use App\Models\Kategoriprogram;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SertifikatController;
use App\Http\Controllers\SertifikatpengajarController;
use App\Http\Controllers\YmController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\Main2Controller;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GrafikController;
use App\Http\Controllers\PopupController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MetodeController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\BenefitController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HalamanController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ProgressController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\TestingController;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\DatabaseController;
use App\Http\Controllers\TagvideoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IklanatasController;
use App\Http\Controllers\IsimateriController;
use App\Http\Controllers\TagberitaController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\BannerhomeController;
use App\Http\Controllers\PesanmasukController;
use App\Http\Controllers\HalamanbaruController;
use App\Http\Controllers\LogowebsiteController;
use App\Http\Controllers\MenuwebsiteController;
use App\Http\Controllers\SekilasinfoController;
use App\Http\Controllers\AlamatkontakController;
use App\Http\Controllers\BannersliderController;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\BatchpengajarController;
use App\Http\Controllers\BenefitbootcampController;
use App\Http\Controllers\BerlanggananController;
use App\Http\Controllers\BootcampController;
use App\Http\Controllers\BootcamppengajarController;
use App\Http\Controllers\MateribootcampController;
use App\Http\Controllers\TugasbootcampController;
use App\Http\Controllers\MateripengajarbootcampController;
use App\Http\Controllers\TugaspengajarbootcampController;
use App\Http\Controllers\DownloadareaController;
use App\Http\Controllers\IklansidebarController;
use App\Http\Controllers\InviteController;
use App\Http\Controllers\OtpController;
use App\Http\Controllers\JejakpendapatController;
use App\Http\Controllers\KomentarvideoController;
use App\Http\Controllers\ManajemenuserController;
use App\Http\Controllers\PlaylistvideoController;
use App\Http\Controllers\PermisionController;
use App\Http\Controllers\KategoriberitaController;
use App\Http\Controllers\KomentarberitaController;
use App\Http\Controllers\ManajemenmodulController;
use App\Http\Controllers\SensorkomentarController;
use App\Http\Controllers\KategoriprogramController;
use App\Http\Controllers\TemplatewebsiteController;
use App\Http\Controllers\IdentitaswebsiteController;
use App\Http\Controllers\IsimateripengajarController;
use App\Http\Controllers\MateripengajarController;
use App\Http\Controllers\MetodepembayaranController;
use App\Http\Controllers\ProgramcvController;
use App\Http\Controllers\TopikController;
use App\Http\Controllers\GeneratepdfController;
use App\Http\Controllers\TugasController;
use App\Http\Controllers\PagemenuController;
use App\Http\Controllers\TugasadminController;
use App\Http\Controllers\PengumpulantugasbootcampController;
use App\Http\Controllers\PengumpulantugasController;
use App\Http\Controllers\Auth\OTPVerificationController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Models\UserOTP;
use Illuminate\Http\Request;

// web.php
Route::get('/download-sertifikat/sertifikat/{file}', [ProgressController::class, 'download'])->name('download.sertifikat');



Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/home', [DashboardController::class, 'home'])->middleware(['auth', 'verified'])->name('home');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/login', function () {
    return view('auth.login'); // Mengarahkan ke halaman login Laravel Breeze
})->name('login');

Route::get('/otp-verification/{otp_id}', function ($otp_id) {
    return view('auth.otp-verification', ['otp_id' => $otp_id]);
})->name('otp-verification');

Route::post('/otp-validation', [OTPVerificationController::class, 'verify'])->name('otp.validation');

Route::post('/resend-otp', [RegisteredUserController::class, 'resendOTP'])->name('otp.resend');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Route Cek Verifikasi Email
Route::get('/email/check-verification', function (Request $request) {
    // Pastikan pengguna terautentikasi
    if ($request->user() && $request->user()->hasVerifiedEmail()) {
        return response()->json(['verified' => true]);
    }

    return response()->json(['verified' => false]);
})->middleware(['auth', 'throttle:6,1'])->name('email.check-verification');


require __DIR__ . '/auth.php';

// Route::get('administrator/dashboard', [DashboardController::class, "dashboard"]);

Route::prefix('pengajar')->name('pengajar.')->group(function () {
    Route::resource('materi', MateripengajarController::class)
        ->middleware('checkModul:materi');

    Route::resource('isimateri', IsimateripengajarController::class)
        ->middleware('checkModul:isimateri');

    Route::resource('tugas', TugasController::class)
        ->middleware('checkModul:tugas');
        
    Route::resource('pengumpulantugas', PengumpulantugasController::class)
        ->middleware('checkModul:pengumpulantugas');
        
    Route::resource('pengumpulantugasbootcamp', PengumpulantugasbootcampController::class)
        ->middleware('checkModul:pengumpulantugasbootcamp');
        
    Route::resource('bootcamps', BootcamppengajarController::class)
        ->middleware('checkModul:bootcamps');
    
    Route::resource('materibootcamp', MateripengajarbootcampController::class)
        ->middleware('checkModul:materibootcamp');

    Route::resource('tugasbootcamp', TugaspengajarbootcampController::class)
        ->middleware('checkModul:tugasbootcamp');
        
    Route::resource('batch', BatchpengajarController::class)
        ->middleware('checkModul:batch');
        
    Route::resource('request', PermisionController::class)
        ->middleware('checkModul:request');
        
    Route::resource('invite', InviteController::class)
        ->middleware('checkModul:invite');
        
    Route::get('invite/approve/{id_permision}', [InviteController::class, 'approve'])->name('invite.approve')
        ->middleware('checkModul:invite');
        
    Route::get('invite/cancel/{id_permision}', [InviteController::class, 'cancel'])->name('invite.cancel')
        ->middleware('checkModul:invite');
        
    Route::get('invite/destroy/{id_permision}', [InviteController::class, 'destroy'])->name('invite.destroy')
        ->middleware('checkModul:invite');
    
    Route::resource('sertifikat', SertifikatpengajarController::class)
        ->middleware('checkModul:sertifikat');
        
    Route::post('/beri-nilai', [GeneratepdfController::class, 'beri_nilai'])->name('store.nilai');
});

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
    Route::post('manajemenuser/email', [ManajemenuserController::class, 'email'])->name('manajemenuser.email')
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

    Route::resource('templatewebsite', TemplatewebsiteController::class)
        ->middleware('checkModul:templatewebsite');

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

    Route::resource('tugas', TugasadminController::class)
        ->middleware('checkModul:tugas');

    Route::resource('isimateri', IsimateriController::class)
        ->middleware('checkModul:isimateri');
        
    Route::resource('sertifikat', SertifikatController::class)
        ->middleware('checkModul:sertifikat');

    Route::resource('topik', TopikController::class)
        ->middleware('checkModul:topik');

    Route::resource('metodepembayaran', MetodepembayaranController::class)
        ->middleware('checkModul:metodepembayaran');

    Route::resource('metode', MetodeController::class)
        ->middleware('checkModul:metode');

    Route::resource('mitra', MitraController::class)
        ->middleware('checkModul:mitra');
        
    Route::resource('popup', PopupController::class)
        ->middleware('checkModul:popup');

    Route::resource('programcv', ProgramcvController::class)
        ->middleware('checkModul:programcv');

    Route::resource('benefitbootcamp', BenefitbootcampController::class)
        ->middleware('checkModul:benefitbootcamp');

    //ini dari sini diganti
    Route::resource('berlangganan', BerlanggananController::class)
        ->middleware('checkModul:berlangganan');

    Route::resource('bootcamps', BootcampController::class)
        ->middleware('checkModul:bootcamps');
        
    Route::resource('materibootcamp', MateribootcampController::class)
        ->middleware('checkModul:materibootcamp');

    Route::resource('tugasbootcamp', TugasbootcampController::class)
        ->middleware('checkModul:tugasbootcamp');

    Route::resource('batch', BatchController::class)
        ->middleware('checkModul:batch');

    Route::resource('payment', PaymentController::class)
        ->middleware('checkModul:payment');

    Route::resource('portofolio', PortofolioController::class)
        ->middleware('checkModul:portofolio');

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

Route::get('/home', [MainController::class, 'index'])->name('home');
Route::get('/bootcamp', [MainController::class, 'bootcamp'])->name('Program & Bootcamp');
Route::get('/review', [MainController::class, 'review'])->name('Review');
Route::get('/e-learning', [MainController::class, 'learning'])->name('E-Learning');

// Route untuk penyimpanan tugas
Route::post('/tugas/', [PengumpulanTugasController::class, 'tugasmateri'])->name('tugas.tugasmateri');

Route::post('/tugas/submit', [PengumpulantugasbootcampController::class, 'store'])->name('tugas.store');


Route::get('/company-profile', [AppController::class, 'companyprofile']);


Route::get('/', [MainController::class, 'index']);

Route::get('/e-learning/program/{id}', [ProgramController::class, 'show'])->name('program.show');

Route::get('/my-profile', function () {
    return view('./myskill/pages/profile/my-profile');
})->name('My Profile');

Route::get('/e-learning/program', function () {
    return view('./myskill/pages/e-learning/program');
})->name('Program');

Route::get('/bootcamp/digital-marketing', function () {
    return view('./myskill/pages/program/digital-marketing');
})->name('Digital Marketing');

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
Route::get('/payment/learning/{id}', [PaymentController::class, 'learning'])->name('payment.learning');
Route::get('/payment/bootcamp/{id}', [PaymentController::class, 'bootcamp'])->name('payment.bootcamp');
Route::get('/payment/review/{id}', [PaymentController::class, 'review'])->name('payment.review');

// Route::post('/payment/complete/{id}', [PaymentController::class, 'completePayment'])->name('payment.complete');

Route::post('/payment/complete/{id}', [PaymentController::class, 'completePayment'])->name('administrator.payment.approve');


Route::post('/payment/store', [PaymentController::class, 'store'])->name('payment.store');

Route::post('/payment/{id}/approve', [PaymentController::class, 'approve'])->name('administrator.payment.approve');
Route::post('/payment/{id}/cancel', [PaymentController::class, 'cancel'])->name('administrator.payment.cancel');

//profile
Route::get('/profile/my-purchase', [PaymentController::class, 'show_user'])->name('Purchased');

Route::get('/profile/my-transaction', [PaymentController::class, 'show_users'])->name('Transactions');

Route::get('/profile/my-activity', [PaymentController::class, 'activity'])->name('Activity');


Route::get('/my-profile', [ProfileController::class, 'edit'])->name('profile.my-profile');
Route::patch('/my-profile', [ProfileController::class, 'update'])->name('profile.update');

Route::get('/', [MainController::class, 'index'])->name('Home');
Route::get('sejarah-instansi', [HalamanController::class, 'sejarah_instansi']);
Route::get('struktur-organisasi', [HalamanController::class, 'struktur_organisasi']);
Route::get('visi-dan-misi', [HalamanController::class, 'visi_dan_misi']);
Route::get('berita', [HalamanController::class, 'berita']);
Route::get('detailberita/{judul_seo}', [HalamanController::class, 'detailBerita'])->name('detailberita');
Route::get('detailagenda/{tema_seo}', [HalamanController::class, 'detailAgenda'])->name('detailagenda');
Route::get('detailalbum/{album_seo}', [HalamanController::class, 'detailalbum'])->name('detailalbum');
Route::get('albums', [HalamanController::class, 'album']);
Route::get('playlist', [HalamanController::class, 'video']);
Route::get('agenda', [HalamanController::class, 'agenda']);
Route::get('sliderlogo', [MainController::class, 'create']);
Route::post('/polling/store', [JejakpendapatController::class, 'storePollingChoice'])->name('polling.store');
Route::post('/polling/store', [JejakpendapatController::class, 'storePollingChoice3'])->name('polling.store');

// Route::get('administrator/layout', [TestingController::class, 'layout']);


//routes footer
Route::get('/faq', function () {
    return view('./myskill/pages/lainnya/faq');
})->name('FAQ');

Route::get('/s&k', function () {
    return view('./myskill/pages/lainnya/s&k');
})->name('Syarat dan Ketentuan');

Route::get('/privacy-policy', function () {
    return view('./myskill/pages/lainnya/privacy-policy');
})->name('Ketentuan Privasi');

Route::get('/about', function () {
    return view('./myskill/pages/lainnya/about');
})->name('Tentang');




// Add a route for displaying a specific materi
Route::get('/e-learning/materi/{id_materi}', [MateriController::class, 'show'])->name('materi.show');
Route::post('/materi/{id_materi}/rate', [MateriController::class, 'rate'])->name('materi.rate')->middleware('auth');
Route::get('/bootcamp/digital-marketing/{id_bootcamp}', [BootcampController::class, 'show'])->name('bootcamp.show');
Route::get('/bootcamp/preview_video/{id_bootcamp}', [BootcampController::class, 'show_video'])->name('bootcamp.show_video');

Route::post('/watch-materi', [ProgressController::class, 'watchMateri'])->name('watch.materi');

Route::get('/e-learning/program/{id}', [ProgramController::class, 'show'])->name('program.show');

Route::get('/program/preview_video', [MateribootcampController::class, 'previewVideo'])->name('program.preview_video');
Route::get('/program/tugas_bootcamp', [TugasbootcampController::class, 'showTugas'])->name('program.tugas_bootcamp');


Route::get('/sertifikat', function () {
    return view('./myskill/pages/lainnya/sertifikat');
})->name('Sertifikat');

Route::get('/generate-pdf', [PDFController::class, 'generatePDF']);


Route::get('/cari-sertifikat', function () {
    return view('./myskill/pages/lainnya/cari-sertifikat'); // Mengarahkan ke halaman cari-sertifikat
})->name('cari-sertifikat');

Route::get('/search-sertifikat/{credentialNo}', [SertifikatController::class, 'search'])->name('search-sertifikat');

Route::get('/{slug}', [PagemenuController::class, 'dinas2']);