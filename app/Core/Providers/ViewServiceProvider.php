<?php

namespace App\Core\Providers;

use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // View::composer('*', TenantComposer::class);
    }
}
