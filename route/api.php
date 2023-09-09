<?php

use Snake\Core\Routing\Route;
use Bin\Controllers\Api\WelcomeController;

Route::any('/', WelcomeController::class);
