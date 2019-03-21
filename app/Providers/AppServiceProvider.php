<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

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
        Carbon::setLocale('id');
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
