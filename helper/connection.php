<?php
  $conn = mysqli_connect("localhost", "root", "", "db_native");

  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    exit();
  } else {
    return $conn;
  }
?>