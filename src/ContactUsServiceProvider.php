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

//        $this->publishes([
//            __DIR__.'/public' => public_path('kazakevic/contactus'),
//        ], 'contact-us');

        $this->publishes([
            __DIR__.'/resources/assets/js/contactUs.vue' =>
                base_path('/resources/js/components/kazakevic/contactus/contactUs.vue'),
        ], 'contact-us');

        $this->publishes([
            __DIR__.'/resources/assets/sass/contactUs.scss' =>
                base_path('/resources/sass/components/kazakevic/contactus/contactUs.scss'),
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
