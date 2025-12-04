<?php
require_once 'db_connect.php';

$sql = "
    SELECT id, title, platform, status, priority, genre, target_finish_date, created_at
    FROM games
    ORDER BY 
        FIELD(priority, 'High', 'Medium', 'Low'),
        target_finish_date ASC,
        created_at DESC
";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Games</title>
</head>
<body>

<h2>Your Game Backlog</h2>

<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>Title</th>
        <th>Platform</th>
        <th>Status</th>
        <th>Priority</th>
        <th>Genre</th>
        <th>Target Finish Date</th>
        <th>Added On</th>
    </tr>

    <?php if ($result && $result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['title']); ?></td>
                <td><?php echo htmlspecialchars($row['platform']); ?></td>
                <td><?php echo htmlspecialchars($row['status']); ?></td>
                <td><?php echo htmlspecialchars($row['priority']); ?></td>
                <td><?php echo htmlspecialchars($row['genre']); ?></td>
                <td><?php echo htmlspecialchars($row['target_finish_date']); ?></td>
                <td><?php echo htmlspecialchars($row['created_at']); ?></td>
            </tr>
        <?php endwhile; ?>
    <?php else: ?>
        <tr>
            <td colspan="7">No games in your backlog yet.</td>
        </tr>
    <?php endif; ?>
</table>

<p><a href="index.php">Back to Home</a></p>

</body>
</html>
