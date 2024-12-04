<?php

namespace App\Providers;

use App\Http\Controllers\PesanmasukController;
use App\Models\Metode;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Metodepembayaran;

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
        // Share metode pembayaran dengan semua view
        View::composer('*', function ($view) {
            $metod = Metode::all();
            $view->with('metod', $metod);
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
