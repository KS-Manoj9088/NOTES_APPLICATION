<?php
session_start();
include 'includes/db.php';

// Redirect to login if user is not logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $user_id = $_SESSION['user_id'];

    // Validate input
    if (empty($title) || empty($content)) {
        $_SESSION['error'] = "Title and content are required.";
        header('Location: dashboard.php');
        exit();
    }

    // Insert note into the database
    $stmt = $conn->prepare("INSERT INTO notes (user_id, title, content) VALUES (:user_id, :title, :content)");
    if ($stmt->execute(['user_id' => $user_id, 'title' => $title, 'content' => $content])) {
        $_SESSION['message'] = "Note added successfully!";
    } else {
        $_SESSION['error'] = "Something went wrong. Please try again.";
    }
}

header('Location: dashboard.php');
exit();
?>