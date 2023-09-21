<?php

use Snake\Core\Routing\Route;
use Bin\Controllers\Web\WelcomeController;

Route::get('/', WelcomeController::class);
