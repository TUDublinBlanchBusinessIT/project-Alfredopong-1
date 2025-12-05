<?php
require_once 'db_connect.php';

$sql = "
    SELECT title, platform, priority, genre
    FROM games
    ORDER BY
        CASE priority
            WHEN 'High' THEN 3
            WHEN 'Medium' THEN 2
            WHEN 'Low' THEN 1
        END DESC,
        created_at ASC
    LIMIT 1
";

$result = $conn->query($sql);
$game = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Recommended Game</title>
</head>
<body>

<h1>Recommended Game</h1>

<?php if ($game): ?>
    <p><strong>Title:</strong> <?= $game['title']; ?></p>
    <p><strong>Platform:</strong> <?= $game['platform']; ?></p>
    <p><strong>Priority:</strong> <?= $game['priority']; ?></p>
    <p><strong>Genre:</strong> <?= $game['genre']; ?></p>
<?php else: ?>
    <p>No games available.</p>
<?php endif; ?>

<br>
<a href="index.php">Back to Home</a>

</body>
</html>
