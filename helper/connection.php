<?php
  include_once '../core/config.php';

  $DB_HOST = Config::get('database/hostname');
  $DB_USER = Config::get('database/username');
  $DB_PASS = Config::get('database/password');
  $DB_NAME = Config::get('database/name');

  $conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    exit();
  } else {
    return $conn;
  }
?>