<?php

namespace Bin\Controllers\Api;

use Bin\Controllers\Controller;

class WelcomeController extends Controller {
  /**
   * Handle the request
   * 
   * @return void
   */
  public function __invoke() {
    $this->response([
      'title' => config('app', 'name'),
      'message' => 'Welcome to Snake Framework'
    ]);
  }
}