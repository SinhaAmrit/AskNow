<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Laravel\Telescope\IncomingEntry;
use Laravel\Telescope\Telescope;
use Laravel\Telescope\TelescopeApplicationServiceProvider;

class TelescopeServiceProvider extends TelescopeApplicationServiceProvider
{

    public function time()
    {
        $currentTime = null;
        $time = date("H");
        $timezone = date("e");
        if ($time >= "19" || $time < "7") { $currentTime = true; } 
        else { $currentTime = null; }
        return $currentTime;
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Telescope::night();
        // if (now()->hour >= 19 || now()->hour < 6) {
        //   Telescope::night();
        // }

        if ($this->time()) {
            Telescope::night();
        }

      $this->hideSensitiveRequestDetails();

      Telescope::filter(function (IncomingEntry $entry) {
        if (env('TELESCOPE_KEY', false) | $this->app->isLocal()) {
            return true;
        }

        return $entry->isReportableException() ||
        $entry->isFailedRequest() ||
        $entry->isFailedJob() ||
        $entry->isScheduledTask() ||
        $entry->hasMonitoredTag();
    });
  }

    /**
     * Prevent sensitive request details from being logged by Telescope.
     *
     * @return void
     */
    protected function hideSensitiveRequestDetails()
    {
        if ($this->app->environment('local')) {
            return;
        }

        Telescope::hideRequestParameters(['_token']);

        Telescope::hideRequestHeaders([
            'cookie',
            'x-csrf-token',
            'x-xsrf-token',
        ]);
    }

    /**
     * Register the Telescope gate.
     *
     * This gate determines who can access Telescope in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewTelescope', function ($user) {
            return in_array($user->email, [
                //
            ]);
        });
    }
}
