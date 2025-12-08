<?php
require 'db_connect.php';

$id = intval($_GET['id']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $platform = $_POST['platform'];
    $status = $_POST['status'];
    $priority = $_POST['priority'];
    $genre = $_POST['genre'];
    $target_finish_date = $_POST['target_finish_date'];

    $conn->query("
        UPDATE games SET
            title='$title',
            platform='$platform',
            status='$status',
            priority='$priority',
            genre='$genre',
            target_finish_date='$target_finish_date'
        WHERE id=$id
    ");

    header("Location: view_games.php");
    exit;
}

$game = $conn->query("SELECT * FROM games WHERE id=$id")->fetch_assoc();
?>

<h2>Edit Game</h2>

<form method="post">
    Title:<br>
    <input name="title" value="<?= $game['title'] ?>"><br><br>

    Platform:<br>
    <input name="platform" value="<?= $game['platform'] ?>"><br><br>

    Status:<br>
    <input name="status" value="<?= $game['status'] ?>"><br><br>

    Priority:<br>
    <input name="priority" value="<?= $game['priority'] ?>"><br><br>

    Genre:<br>
    <input name="genre" value="<?= $game['genre'] ?>"><br><br>

    Target Finish Date:<br>
    <input type="date" name="target_finish_date" value="<?= $game['target_finish_date'] ?>"><br><br>

    <button type="submit">Save</button>
</form>

<p><a href="view_games.php">Back</a></p>
