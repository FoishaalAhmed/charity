<?php

namespace App\Providers;

use App\Models\Contact;
use App\Models\General;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        $contact = Contact::first();
        $working_hour = General::where('name', 'working hour')->first();
        $footer_text = General::where('name', 'footer-text')->first();
        view()->share(['contact' => $contact, 'working_hour' => $working_hour, 'footer_text' => $footer_text]);
    }
}
