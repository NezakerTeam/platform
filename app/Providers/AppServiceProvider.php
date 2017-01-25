<?php
namespace App\Providers;

use App\Services\UserService;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerBladeDirectives();
        $this->registerMiddleware();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(UserService::class, function ($app) {
            return new UserService();
        });

        if ($this->app->environment() !== 'production') {
            $this->app->register(\Way\Generators\GeneratorsServiceProvider::class);
            $this->app->register(\Xethron\MigrationsGenerator\MigrationsGeneratorServiceProvider::class);
            $this->app->register(\Krlove\EloquentModelGenerator\Provider\GeneratorServiceProvider::class);
            $this->app->register(\Barryvdh\Debugbar\ServiceProvider::class);
            $this->app->alias(Barryvdh\Debugbar\Facade::class, 'Debugbar');
        }
    }

    private function registerBladeDirectives()
    {
        Blade::directive('datetime', function ($expression) {
            return "<?php echo ($expression)->format('Y/m/d H:i'); ?>";
        });
    }

    /**
     * Register disqus middleware.
     */
    protected function registerMiddleware()
    {
        $this->app[\Illuminate\Contracts\Http\Kernel::class]->pushMiddleware(
            \App\Http\Middleware\DisqusMiddleware::class
        );
    }
}
