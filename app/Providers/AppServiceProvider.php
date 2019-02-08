<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);
        Blade::directive('rupiah', function ($angka) {
            return "<?php echo 'Rp. ' . number_format($angka,0,',','.'); ?>";
        });
        Blade::directive('duit', function ($angka) {
            return "<?php echo number_format($angka,0,',','.'); ?>";
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
