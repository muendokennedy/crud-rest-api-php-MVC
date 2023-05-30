<?php

class Database
{

  // Db parameters
  private $db_servername = "localhost";
  private $db_username = "root";
  private $db_password = "";
  private $db_name = "myblog";
  private $conn;

  // Db connect
  public function connect()
  {
    $this->conn = null;

    try{

      $this->conn = new PDO("mysql:host={$this->db_servername};dbname={$this->db_name}", $this->db_username, $this->db_password);

      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch(PDOException $e){
      
      echo "Connection error: " . $e->getMessage();

    }

    return $this->conn;
  }

}