<?php
  include_once './helper/Url.php';

  class Route {
    public static $validRoutes = array();

    private static function handle_func($function) {
      if (is_callable($function)) {
        call_user_func($function);
      } elseif (is_array($function) && count($function) == 2) {
        [$className, $methodName] = $function;
        $classInstance = new $className();

        if (method_exists($classInstance, $methodName)) {
          $classInstance->$methodName();
        } else {
          echo "Method not found!";
        }
      } else {
        echo "Invalid handler!";
      }
    }

    public static function any($route, $function) {
      self::$validRoutes[] = $route;

      if ($_SERVER['REQUEST_URI'] == $route) {
        self::handle_func($function);
      }
    }

    public static function get($route, $function) {
      self::$validRoutes[] = $route;

      if ($_SERVER['REQUEST_URI'] == $route && $_SERVER['REQUEST_METHOD'] == 'GET') {
        self::handle_func($function);
      }
    }

    public static function post($route, $function) {
      self::$validRoutes[] = $route;

      if ($_SERVER['REQUEST_URI'] == $route && $_SERVER['REQUEST_METHOD'] == 'POST') {
        self::handle_func($function);
      }
    }

    public static function put($route, $function) {
      self::$validRoutes[] = $route;

      if ($_SERVER['REQUEST_URI'] == $route && $_SERVER['REQUEST_METHOD'] == 'PUT') {
        self::handle_func($function);
      }
    }

    public static function delete($route, $function) {
      self::$validRoutes[] = $route;

      if ($_SERVER['REQUEST_URI'] == $route && $_SERVER['REQUEST_METHOD'] == 'DELETE') {
        self::handle_func($function);
      }
    }

    public static function redirect($location) {
      header('Location: ' . get_base_url() . $location);
      exit();
    }
  }
?>