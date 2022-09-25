<?php

namespace App\Core\Providers;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Laravel\Telescope\Telescope;
use Lorisleiva\Actions\Facades\Actions;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // https://github.com/spatie/laravel-multitenancy/issues/94
        Telescope::ignoreMigrations();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureFactories();
        $this->configureLazyLoading();
        $this->configureIdeHelper();

        // https://laravelactions.com/2.x/execute-as-commands.html#registering-the-command
        if ($this->app->runningInConsole()) {
            Actions::registerCommands(app_path('Core/Actions'));
        }
    }

    protected function configureFactories(): void
    {
        Factory::guessFactoryNamesUsing(function (string $modelName) {
            return 'Database\\Factories\\'.class_basename($modelName).'Factory';
        });
    }

    protected function configureLazyLoading(): void
    {
        // https://laravel.com/docs/9.x/eloquent-relationships#preventing-lazy-loading
        Model::preventLazyLoading(! app()->isProduction());
    }

    protected function configureIdeHelper(): void
    {
        if ('local' === $this->app->environment()) {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }
}
