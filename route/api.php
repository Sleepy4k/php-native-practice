<?php

use Snake\Core\Routing\Route;
use Bin\Controllers\Api\WelcomeController;

Route::get('/', WelcomeController::class);
