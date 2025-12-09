<?php
require 'db_connect.php';

$id = intval($_GET['id']);
$conn->query("DELETE FROM games WHERE id=$id");

header("Location: view_games.php");
exit;
