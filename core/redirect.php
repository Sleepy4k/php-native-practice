<?php
include_once '../helper/url.php';

class Redirect {
  public static function to($location = null) {
    if ($location) {
      if (is_numeric($location)) {
        switch ($location) {
          case 404:
            header('HTTP/1.0 404 Not Found');
            include get_base_url() . '/view/404.php';
            exit();
            break;
          default:
            break;
        }
      }

      header('Location: ' . get_base_url() . '/view/' . $location);
      exit();
    }
  }
}