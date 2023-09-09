<?php

namespace Bin\Controllers;

use Snake\Core\View\Sea;
use Snake\Core\Facade\App;
use Snake\Core\Http\Request;
use Snake\Core\Http\Validator;

class Controller {
  /**
   * Validate the request
   * 
   * @param Request $request
   * @param array $rules
   * 
   * @return Validator
   */
  protected function validate(Request $request, array $rules): Validator {
    return App::get()->singleton(Validator::class, [$request, $rules]);
  }

  /**
   * View the page
   * 
   * @param string $view
   * @param array $variables
   * 
   * @return void
   */
  protected function view(string $view, array $variables = []): void {
    Sea::view(basepath() . '/view/', $view, $variables);
  }

  /**
   * Response the data
   * 
   * @param array $data
   * @param int $status
   * 
   * @return void
   */
  protected function response(array $data, int $status = 200): void {
    http_response_code($status);
    header('Content-Type: application/json');
    echo json_encode($data);
  }
}