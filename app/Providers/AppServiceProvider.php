<?php

namespace App\Providers;

use App\Models\Contact;
use App\Repositories\ContactRepository;
use Illuminate\Pagination\Paginator;
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
        $this->app->bind('App\Repositories\ContactRepositoryInterface', 'App\Repositories\Contact\Repository');
        $this->app->bind('App\Repositories\ContactRepositoryInterface', function(){
            return new ContactRepository(new Contact());
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
    }
}
