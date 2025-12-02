<?php

$host = "localhost";
$user = "root";
$pass = "Pass4!!";
$dbname = "game_backlog_db";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
