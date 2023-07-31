<?php
  include_once './core/Database.php';
  include_once './core/Controller.php';

  class DashboardController extends Controller {
    public function index() {
      if (!isset($_SESSION['auth'])) {
        Route::redirect('login');
        exit;
      }

      $view = new View("dashboard");

      $database = new Database();
      $database->connect();

      $query = $database->query("select * from users");

      $view->render([
        'title' => AppName() . ' | Dashboard',
        'users' => $query
      ]);
    }
  }
?>