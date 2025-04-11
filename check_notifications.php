<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user'])) {
    echo json_encode(['count' => 0]);
    exit();
}

$user_id = $_SESSION['user'];
$totalCount = 0;

// Count unseen messages
$stmt = $conn->prepare("SELECT COUNT(*) FROM messages WHERE receiver_id = ? AND seen = 0");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($messageCount);
$stmt->fetch();
$stmt->close();

$totalCount += $messageCount;

// Count like notifications (likes not yet notified)
$stmt = $conn->prepare("SELECT COUNT(*) FROM likes WHERE receiver = ? AND notified = 0");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($likeCount);
$stmt->fetch();
$stmt->close();

$totalCount += $likeCount;

echo json_encode(['count' => $totalCount]);
