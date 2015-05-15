<?php namespace App\Providers;

use App\Docs\DocsRepository;
use Illuminate\Support\ServiceProvider;

class DocsServiceProvider extends ServiceProvider {

    /**
     * Register any application services.
     * This service provider is a great spot to register your various container
     * bindings with the application. As you can see, we are registering our
     * "Registrar" implementation here. You can add your own bindings too!
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(DocsRepository::class, function ($app)
        {
            return new DocsRepository(app('filesystem')->disk('larapress-docs'));
        });
    }

}
