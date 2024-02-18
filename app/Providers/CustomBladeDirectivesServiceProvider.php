<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class CustomBladeDirectivesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
//    public function boot(): void
//    {
//        Blade::directive('haspermission', function ($expression){
/*            return "<?php if (Auth::check() && Auth::user()->hasPermission({$expression})) : ?>";*/
//
//        });
//        Blade::directive('endpermission', function (){
/*            return '<?php endif; ?>';*/
//        });
//    }
}
