<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user'];

// Retrieve like notifications and join with profiles to get the sender's display name.
$stmt = $conn->prepare("
    SELECT p.user_id, p.name 
    FROM likes l
    JOIN profiles p ON l.sender = p.user_id
    WHERE l.receiver = ? AND l.notified = 0
");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$likesResult = $stmt->get_result();
$stmt->close(); ?>

<!DOCTYPE html>
<html>

<head>
    <title>Notifications</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .notif-box {
            background: white;
            padding: 20px;
            border-radius: 10px;
            max-width: 500px;
            margin: 40px auto;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .notif-item {
            padding: 15px;
            border-bottom: 1px solid #ddd;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .notif-item:last-child {
            border-bottom: none;
        }

        .chat-button {
            padding: 6px 12px;
            background-color: #007bff;
            color: white;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
        }

        .chat-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>

    <div class="notif-box">
        <h2>New Notifications</h2>
        <?php if ($likesResult->num_rows > 0): ?>
            <?php while ($row = $likesResult->fetch_assoc()): ?>
                <div class="notif-item">
                    <span><?php echo htmlspecialchars($row['name']); ?> liked you!</span>
                    <!-- <a class="chat-button" href="message.php?user=<?php echo $row['id']; ?>">Chat 💬</a> -->
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No new like notifications 📭</p>
        <?php endif; ?>
        <p style="text-align: center; margin-top: 20px;"><a href="home.php">← Back to Home</a></p>
    </div>
    <?php
    // Mark like notifications as shown
    $update = $conn->prepare("UPDATE likes SET notified = 1 WHERE receiver = ? AND notified = 0");
    $update->bind_param("i", $user_id);
    $update->execute();
    $update->close();
    ?>
</body>

</html>
