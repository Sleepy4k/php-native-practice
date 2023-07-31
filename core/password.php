<?php
  include_once 'Config.php';

  class Password {
    public static function hash($password) {
      return password_hash($password, Config::get('password/algo'),
        array(
          'cost' => Config::get('password/cost')
        )
      );
    }

    public static function check($password, $hash){
      return password_verify($password, $hash);
    }
  }
?>