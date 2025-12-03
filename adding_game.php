<?php
require_once 'db_connect.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Adding a game to the library</title>
</head>
<body>

<h2>Please select a game to add!</h2>

<form action="adding_game.php" method="post">

    <label>Game Title:</label><br>
    <input type="text" name="title" required><br><br>

    <label>Platform:</label><br>
    <input type="text" name="platform" required><br><br>

    <label>Status:</label><br>
    <select name="status">
        <option value="Not Started">Not Started</option>
        <option value="Playing">Playing</option>
        <option value="Completed">Completed</option>
    </select><br><br>

    <label>Priority:</label><br>
    <select name="priority">
        <option value="High">High</option>
        <option value="Medium" selected>Medium</option>
        <option value="Low">Low</option>
    </select><br><br>

    <label>Genre:</label><br>
    <input type="text" name="genre"><br><br>

    <label>Target Finish Date:</label><br>
    <input type="date" name="target_finish_date"><br><br>

    <input type="submit" value="Add Game">

</form>

</body>
</html>
