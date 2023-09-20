<?php

namespace Bin\Controllers\Web;

use Bin\Controllers\Controller;

class WelcomeController extends Controller {
  /**
   * Handle the request
   *
   * @return void
   */
  public function __invoke() {
    static::view('welcome');
  }
}
