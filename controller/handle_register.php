<?php
	session_start();
  include '../helper/url.php';
  include '../helper/connection.php';

	$user	= $_POST['username'];
	$pass	= $_POST['password'];
	$pass_confirm	= $_POST['password_confirmation'];
	
  if ($pass != $pass_confirm) {
    $_SESSION['msg'] = 2;
    header('Location: ' . get_base_url() . '/view/register.php');
    exit;
  }

  $check_if_exist = $conn->query("select * from user where username = '".$user."' limit 1");

  if ($check_if_exist->num_rows > 0) {
    $_SESSION['msg'] = 3;
    header('Location: ' . get_base_url() . '/view/register.php');
    exit;
  }

  $query_register = $conn->query("insert into user (username, password, role) values ('".$user."', '".$pass."', 'user')");

  header('Location: ' . get_base_url() . '/view/login.php');
?>