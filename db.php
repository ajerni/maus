<?php

class DB {
  private $dbHost = "servername";
  private $dbUser = "username";
  private $dbPassword = "password";
  private $dbName = "dbname";
  private $conn;

  public function __construct() {
    try{
      $dsn = "mysql:host=" . $this->dbHost . ";dbname=". $this->dbName;
      $this->conn = new PDO($dsn, $this->dbUser, $this->dbPassword);
      //echo $this->dbUser . " is connected. Database Connection Successful!";
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      die("DB Connection failed: " . $e->getMessage());
    }
  }

  public function getHighscore() {
    $sql = "SELECT name, score FROM maus_high_score WHERE id = 1"; 
    $stmt = $this->conn->prepare($sql); 
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC); // Use fetch() for a single row
    return $data;
  }

  public function updateHighscore($name, $score) {
    $sql = "UPDATE maus_high_score SET name = :name, score = :score WHERE id = 1";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['name' => $name, 'score' => $score]);
  }

}

?>
