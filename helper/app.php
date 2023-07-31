<?php
  include_once '../core/config.php';

  function AppName() {
    return Config::get('app/name');
  }

  function AppVersion() {
    return Config::get('app/version');
  }
?>