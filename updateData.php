<?php
// Enable Error Reporting (remove for production)
//error_reporting(E_ALL);
//ini_set('display_errors', 1); // Enable for debugging, remove for production

header("Content-Type: application/json"); // Set consistent content type
header("Access-Control-Allow-Origin: https://maus.andierni.ch"); // Allow requests from your domain
header("Access-Control-Allow-Methods: POST"); // Allowed method

require_once 'db.php';

$db = new DB();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['name'] ?? null;
  $score = $_POST['score'] ?? null;

  // Update high score
  $success = $db->updateHighscore($name, $score);
  echo json_encode($success);
  
}
?>
