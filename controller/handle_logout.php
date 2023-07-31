<?php
	session_start();
  session_destroy();

  include_once '../core/redirect.php';
  Redirect::to('../view/login.php');
?>