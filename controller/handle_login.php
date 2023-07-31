<?php
	session_start();
  include '../helper/url.php';
  include '../helper/connection.php';

	$user	= $_POST['username'];
	$pass	= $_POST['password'];
	
  $query_login = $conn->query("select * from user where username = '".$user."' and password = '".$pass."'");

	if ($query_login->num_rows > 0) {
		while ($row = $query_login->fetch_assoc()) {
			$_SESSION['username'] = $row['username']; 
			$_SESSION['password'] = $row['password'];
			$_SESSION['role'] = $row['role'];
			$_SESSION['auth'] = true;
		}

    header('Location: ' . get_base_url() . '/view/dashboard.php');
	} else{
		$_SESSION['msg'] = 1;
		header('Location: ' . get_base_url() . '/view/login.php');
	}
?>