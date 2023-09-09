<?php

namespace Bin\Providers;

use Snake\Core\Routing\Route;
use Snake\Core\Routing\Router;
use Snake\Core\Facade\Provider;

class RouteServiceProvider extends Provider {
  /**
   * Register the service provider
   *
   * @return void
   */
  public function register(): void {
    //
  }

  /**
   * Booting the service provider
   *
   * @return void
   */
  public function booting(): void {
    $this->app->singleton(Router::class);
    Route::setRoute();
  }
}