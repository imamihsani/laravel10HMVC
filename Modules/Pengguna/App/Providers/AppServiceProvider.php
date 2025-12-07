<?php

namespace Modules\Pengguna\App\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Admin\App\Models\Admin;

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // Bagikan data notifikasi otomatis ke layout task
        view()->composer('pengguna::layouts.main', function ($view) {
            // $data = Admin::getNotifikasiData(); //ini nanti harus aktif
            // if (is_array($data)) {
            //     $view->with($data);
            // }
        });
    }
}
