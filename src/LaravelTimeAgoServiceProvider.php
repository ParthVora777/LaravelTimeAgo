<?php

namespace ParthVora777\LaravelTimeAgo;

use Carbon\Carbon;
use Carbon\CarbonInterface;
use Exception;
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
        Blade::directive('timeago', function ($params) {
            $params   = explode(',', $params);
            $datetime = trim($params[0], '"');
            try {
                $timeAgo = Carbon::now()->diffForHumans($datetime, CarbonInterface::DIFF_ABSOLUTE, false, 5);
                return $timeAgo;
            } catch (Exception $ex) {
                throw new Exception($ex->getMessage());
            }
        });
    }
}
