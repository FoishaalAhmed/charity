<?php

namespace App\Providers;

use App\Models\Cause;
use App\Models\Contact;
use App\Models\Event;
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
        $services = Cause::orderBy('title', 'asc')->select('id', 'title')->get();
        $working_hour = General::where('name', 'working hour')->first();
        $footer_text = General::where('name', 'footer-text')->first();
        $footerEvents = Event::latest()->take(3)->select('id', 'title', 'photo')->get();
        view()->share(['contact' => $contact, 'working_hour' => $working_hour, 'footer_text' => $footer_text, 'services' => $services, 'footerEvents' => $footerEvents]);
    }
}
