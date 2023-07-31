<?php
  class View {
    public $view;

    public function __construct($view) {
      $this->view = $view;
    }

    public function render($data = []) {
      if (file_exists('./view/' . $this->view . '.php')) {
        extract($data);
        include('./view/' . $this->view . '.php');
      } else {
        include_once './view/404.php';
      }
    }
  }
?>