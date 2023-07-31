<?php
	session_start();
  include_once '../core/redirect.php';
  include_once '../core/password.php';
  include_once '../helper/connection.php';

	$user	= $_POST['username'];
	$pass	= $_POST['password'];
	
  $query_login = $conn->query("select * from user where username = '".$user."'");

	if ($query_login->num_rows > 0) {
		while ($row = $query_login->fetch_assoc()) {
      if (!Password::check($pass, $row['password'])) {
        $_SESSION['msg'] = 1;
        Redirect::to('../view/login.php');
        exit;
      }

			$_SESSION['username'] = $row['username']; 
			$_SESSION['password'] = $row['password'];
			$_SESSION['role'] = $row['role'];
			$_SESSION['auth'] = true;
		}

    Redirect::to('../view/dashboard.php');
	} else{
		$_SESSION['msg'] = 1;
    Redirect::to('../view/login.php');
	}
?>