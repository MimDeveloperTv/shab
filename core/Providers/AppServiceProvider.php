<?php

namespace Core\Providers;

use Database\Factories\FactoryCardinality;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Pagination\PaginationState;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ResponseFactory::class, \Core\Http\Responses\ResponseFactory::class);
        PaginationState::resolveUsing($this->app);

        if ($this->app->isLocal()) {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
            $this->app->singleton(FactoryCardinality::class, FactoryCardinality::class);
        }
    }

    public function boot()
    {
        //
    }
}
