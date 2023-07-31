<?php
	session_start();
  session_destroy();
  include '../helper/url.php';

  header('Location: ' . get_base_url() . '/view/login.php');
?>