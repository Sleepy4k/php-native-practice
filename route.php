<?php
  include_once './core/Routes.php';
  include_once './controller/AuthController.php';
  include_once './controller/DashboardController.php';

  Route::get('/', function() {
    Route::redirect('login');
  });

  Route::get('/login', [AuthController::class, 'login']);
  Route::get('/register', [AuthController::class, 'register']);
  
  Route::post('/logout', [AuthController::class, 'logout']);
  Route::post('/login/process', [AuthController::class, 'handle_login']);
  Route::post('/register/process', [AuthController::class, 'handle_register']);
  
  Route::get('/dashboard', [DashboardController::class, 'index']);
?>