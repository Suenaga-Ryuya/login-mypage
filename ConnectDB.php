<?php

class connectDB {
  public $dsn = "mysql:dbname=lesson3;host=localhost;";
  public $usr = "mysql";
  public $password = "";

  public function __constrruct($dsn, $usr, $password) {
    $this->dsn = $dsn;
    $this->usr = $usr;
    $this->password = $password;
  }

  public function connectdb() {
    $db = new PDO($this->dsn, $this->usr, $this->password);
    return $db;
  }
}

?>