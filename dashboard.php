<?php
session_start();
include 'includes/db.php';

// Redirect to login if user is not logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Display messages
$message = '';
$error = '';
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
}
if (isset($_SESSION['error'])) {
    $error = $_SESSION['error'];
    unset($_SESSION['error']);
}

// Fetch notes for the logged-in user
$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT * FROM notes WHERE user_id = :user_id ORDER BY created_at DESC");
$stmt->execute(['user_id' => $user_id]);
$notes = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Notes App</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
            <a href="logout.php" class="btn logout">Log Out</a>
        </header>

        <div class="notes-container">
            <div class="add-note-card">
                <h2>Add a New Note</h2>
                <form action="add_note.php" method="POST">
                    <input  id="text"  type="text" name="title" placeholder="Title" maxlength="100" required>
                    <textarea name="content" placeholder="Content" required></textarea>
                    <button type="submit" class="btn">Add Note</button>
                </form>
            </div>

            <?php foreach ($notes as $note): ?>
            <div class="note-card">
                <h3><?php echo htmlspecialchars($note['title']); ?></h3>
                <p><?php echo nl2br(htmlspecialchars($note['content'])); ?></p>
                <small>Created on: <?php echo date('M d, Y h:i A', strtotime($note['created_at'])); ?></small>
                <div class="actions">
                    <a href="edit_note.php?id=<?php echo $note['id']; ?>" class="btn edit">Edit</a>
                    <a href="delete_note.php?id=<?php echo $note['id']; ?>" class="btn delete" onclick="return confirmDelete();">Delete</a>
                </div>            
            </div>
            <?php endforeach; ?>

            <?php if (empty($notes)): ?>
            <div class="no-notes">
                <p>You don't have any notes yet. Start by adding one!</p>
            </div>
            <?php endif; ?>
        </div>
    </div>

    <footer>
        <p>&copy; <?php echo date('Y'); ?> Notes App. All rights reserved.</p>
    </footer>
</body>
</html>
