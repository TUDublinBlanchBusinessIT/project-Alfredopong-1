<?php
require_once 'db_connect.php';

$successMessage = "";
$errorMessage = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $title = trim($_POST['title'] ?? '');
    $platform = trim($_POST['platform'] ?? '');
    $status = $_POST['status'] ?? 'Not Started';
    $priority = $_POST['priority'] ?? 'Medium';
    $genre = trim($_POST['genre'] ?? '');
    $target_finish_date = $_POST['target_finish_date'] ?? null;

    if ($title === '' || $platform === '') {
        $errorMessage = "Please fill in at least the title and platform.";
    } else {

        $titleEsc = $conn->real_escape_string($title);
        $platformEsc = $conn->real_escape_string($platform);
        $statusEsc = $conn->real_escape_string($status);
        $priorityEsc = $conn->real_escape_string($priority);
        $genreEsc = $conn->real_escape_string($genre);

        if ($target_finish_date === '') {
            $targetSql = "NULL";
        } else {
            $targetSql = "'" . $conn->real_escape_string($target_finish_date) . "'";
        }

        $sql = "
            INSERT INTO games (title, platform, status, priority, genre, target_finish_date)
            VALUES ('$titleEsc', '$platformEsc', '$statusEsc', '$priorityEsc', '$genreEsc', $targetSql)
        ";

        if ($conn->query($sql) === true) {
            $successMessage = "Game added to your backlog successfully.";
        } else {
            $errorMessage = "Error adding game: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add a Game</title>
</head>
<body>

<h2>Add a New Game</h2>

<?php if ($successMessage !== ""): ?>
    <p style="color: green;"><?php echo $successMessage; ?></p>
<?php endif; ?>

<?php if ($errorMessage !== ""): ?>
    <p style="color: red;"><?php echo $errorMessage; ?></p>
<?php endif; ?>

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

<p><a href="index.php">Back to Home</a></p>

</body>
</html>
