<?php
  class Database {
    private $host;
    private $user;
    private $pass;
    private $name;
    private $conn;

    public function __construct() {
      $this->host = Config::get('database/hostname');
      $this->user = Config::get('database/username');
      $this->pass = Config::get('database/password');
      $this->name = Config::get('database/name');
    }

    public function connect() {
      $this->conn = mysqli_connect($this->host, $this->user, $this->pass, $this->name);

      if ($this->conn->connect_error) {
        die('Connection failed: ' . $this->conn->connect_error);
      }
    }

    public function query($sql) {
      $result = $this->conn->query($sql);
      if ($result) {
        return $result;
      } else {
        die('Query failed: ' . $this->conn->error);
      }
    }

    public function close() {
      $this->conn->close();
    }
  }
?>