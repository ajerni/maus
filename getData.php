<?php
header("Access-Control-Allow-Origin: https://maus.andierni.ch"); // Allow requests only from your domain
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: GET"); // Limit allowed methods to GET

require_once 'db.php';

$db = new DB();
$data = $db->getHighscore();

if ($data) {
    echo json_encode($data);
} else {
    // Handle the case where no high score is found
    http_response_code(404);
    echo json_encode(['error' => 'No high score found']);
}
