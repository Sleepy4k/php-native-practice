<?php
  include_once './core/Database.php';
  include_once './core/Password.php';
  include_once './core/Controller.php';

  class AuthController extends Controller {
    public function login() {
      $view = new View("login");
      $view->render([
        'title' => AppName() . ' | Login'
      ]);
    }

    public function handle_login() {
      $user	= $_POST['username'];
      $pass	= $_POST['password'];
      
      $hash = new Password();
      $database = new Database();
      $database->connect();

      $query_login = $database->query("select * from users where username = '$user'");

      if ($query_login->num_rows > 0) {
        while ($row = $query_login->fetch_assoc()) {
          $database->close();

          if (!$hash->check($pass, $row['password'])) {
            $_SESSION['msg'] = 1;
            Route::redirect('login');
            exit;
          }

          $_SESSION['username'] = $row['username']; 
          $_SESSION['password'] = $row['password'];
          $_SESSION['role'] = $row['role'];
          $_SESSION['auth'] = true;
        }

        Route::redirect('dashboard');
      } else{
        $database->close();
        $_SESSION['msg'] = 1;
        Route::redirect('login');
      }
    }

    public function register() {
      $view = new View("register");
      $view->render([
        'title' => AppName() . ' | Register'
      ]);
    }

    public function handle_register() {
      $user	= $_POST['username'];
      $pass	= $_POST['password'];
      $pass_confirm	= $_POST['password_confirmation'];
      
      if ($pass != $pass_confirm) {
        $_SESSION['msg'] = 2;
        Route::redirect('register');
        exit;
      }

      $hash = new Password();
      $database = new Database();
      $database->connect();

      $check_if_exist = $database->query("select * from users where username = '".$user."' limit 1");

      if ($check_if_exist->num_rows > 0) {
        $database->close();
        $_SESSION['msg'] = 3;
        Route::redirect('register');
        exit;
      }

      $hashed_pass = $hash->hash($pass);
      $database->query("insert into users (username, password, role) values ('".$user."', '".$hashed_pass."', 'user')");
      $database->close();

      Route::redirect('login');
    }

    public function logout() {
      session_start();
      session_destroy();
      Route::redirect('login');
    }
  }
?>