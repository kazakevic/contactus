<?php

namespace Kazakevic\ContactUs;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Support\ServiceProvider;

class ContactUsServiceProvider extends ServiceProvider
{
    /**
     * Register services
     *
     */
    public function register()
    {
        $this->app->make('Kazakevic\ContactUs\Http\Controllers\ContactUsController');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        include __DIR__.'/routes.php';
        $this->publishes([
            __DIR__.'/public' => public_path('kazakevic/contactus'),
        ], 'contact-us');

        $this->publishes([
            __DIR__.'/resources/views/mails/contactUs.blade.php' =>
                base_path('/resources/views/mails/contactUs.blade.php'),
        ], 'contact-us');

        $this->publishes([
            __DIR__.'/Mail/ContactUs.php' => app_path('Mail/ContactUs.php'),
        ], 'contact-us');
    }
}
