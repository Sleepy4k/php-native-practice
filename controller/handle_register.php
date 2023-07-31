<?php
	session_start();
  include_once '../core/redirect.php';
  include_once '../core/password.php';
  include_once '../helper/connection.php';

	$user	= $_POST['username'];
	$pass	= $_POST['password'];
	$pass_confirm	= $_POST['password_confirmation'];
	
  if ($pass != $pass_confirm) {
    $_SESSION['msg'] = 2;
    Redirect::to('../view/register.php');
    exit;
  }

  $check_if_exist = $conn->query("select * from user where username = '".$user."' limit 1");

  if ($check_if_exist->num_rows > 0) {
    $_SESSION['msg'] = 3;
    Redirect::to('../view/register.php');
    exit;
  }

  $hashed_pass = Password::hash($pass);
  $query_register = $conn->query("insert into user (username, password, role) values ('".$user."', '".$hashed_pass."', 'user')");

  Redirect::to('../view/login.php');
?>