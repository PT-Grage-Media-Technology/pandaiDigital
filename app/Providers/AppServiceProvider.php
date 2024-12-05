<?php

namespace App\Providers;

use App\Http\Controllers\PesanmasukController;
use App\Models\Metode;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Metodepembayaran;
use App\Models\Alamatkontak;
use App\Models\Identitaswebsite;
use App\Models\Logo;
use Illuminate\Support\Facades\Blade;
use App\Models\Popup;
use Illuminate\Support\Facades\URL;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        Blade::directive('url', function ($path) {
            return "<?php echo asset($path); ?>";
        });

        URL::forceRootUrl('https://pandaidigital.id');
            dd(URL::forceRootUrl('https://pandaidigital.id'));

         // Ambil data identitas website dari tabel Identitaswebsite
        $identitas = Identitaswebsite::first();

        $alamatkontak = Alamatkontak::first();

        // Ambil data logo terbaru dari tabel Logo
        $logo = Logo::orderBy('id_logo', 'DESC')->first();

         $metod = Metode::all();

        // $favicon = DB::select('SELECT favicon FROM identitas');

        $popups = Popup::with('trainer')->get();
        // Bagikan semua variabel global dalam satu View::share
        View::share([
            'identitas' => $identitas,
            'logo' => $logo,
            'alamatkontak' => $alamatkontak,
            'popups' => $popups,
            'metod' => $metod,
            // 'favicon' => $favicon,
        ]);

        // Share metode pembayaran dengan semua view
        View::composer('*', function ($view) {
            $metod = Metode::all();
        });

        $this->app->bind('path.public', function() {
            return base_path().'/public_html';
        });

        // Share latest messages dengan semua view
        View::composer('*', function ($view) {
            $pesanmasukController = new PesanmasukController();
            $latestMessages = $pesanmasukController->getLatestMessages();
            $view->with('latestMessages', $latestMessages);
        });
    }
}
