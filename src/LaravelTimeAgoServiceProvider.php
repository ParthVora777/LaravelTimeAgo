<?php

namespace ParthVora777\LaravelTimeAgo;

use Carbon\Carbon;
use Carbon\CarbonInterface;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class LaravelTimeAgoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('timeago', function ($datetime) {
            $datetime = trim($datetime, '"');
            $datetime = trim($datetime, "'");
            $timeAgo  = Carbon::parse($datetime)->diffForHumans(CarbonInterface::DIFF_RELATIVE_AUTO, false, 6);
            return $timeAgo;
        });
    }
}
