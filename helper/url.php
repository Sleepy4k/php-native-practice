<?php
  function get_base_url(){
    if (isset($_SERVER['HTTPS'])) {
      $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
    } else {
      $protocol = 'http';
    }

    $app_name = explode('/', $_SERVER['REQUEST_URI'])[1];

    return $protocol . "://" . $_SERVER['HTTP_HOST'] . "/" . $app_name;
  }
?>