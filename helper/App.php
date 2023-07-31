<?php
  include_once './core/Config.php';

  function AppName() {
    return Config::get('app/name');
  }

  function AppVersion() {
    return Config::get('app/version');
  }
?>
