<?php
  include_once './core/View.php';

  class Controller {
    public function index() {
      $view = new View("404");
      $view->render();
    }

    public function store() {
      $view = new View("404");
      $view->render();
    }

    public function show() {
      $view = new View("404");
      $view->render();
    }

    public function update() {
      $view = new View("404");
      $view->render();
    }

    public function destroy() {
      $view = new View("404");
      $view->render();
    }
  }
?>