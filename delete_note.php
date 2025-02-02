<?php
session_start();
include 'includes/db.php';

// Redirect to login if user is not logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

if (isset($_GET['id'])) {
    $note_id = $_GET['id'];
    $user_id = $_SESSION['user_id'];

    // Delete the note from the database
    $stmt = $conn->prepare("DELETE FROM notes WHERE id = :id AND user_id = :user_id");
    if ($stmt->execute(['id' => $note_id, 'user_id' => $user_id])) {
        $_SESSION['message'] = "Note deleted successfully!";
    } else {
        $_SESSION['error'] = "Something went wrong. Please try again.";
    }
}

header('Location: dashboard.php');
exit();
?>