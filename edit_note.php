<?php
session_start();
include 'includes/db.php';

// Redirect to login if user is not logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Fetch the note to be edited
if (isset($_GET['id'])) {
    $note_id = $_GET['id'];
    $user_id = $_SESSION['user_id'];

    $stmt = $conn->prepare("SELECT * FROM notes WHERE id = :id AND user_id = :user_id");
    $stmt->execute(['id' => $note_id, 'user_id' => $user_id]);
    $note = $stmt->fetch();

    if (!$note) {
        $_SESSION['error'] = "Note not found.";
        header('Location: dashboard.php');
        exit();
    }
} else {
    header('Location: dashboard.php');
    exit();
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);

    // Validate input
    if (empty($title) || empty($content)) {
        $_SESSION['error'] = "Title and content are required.";
        header('Location: edit_note.php?id=' . $note_id);
        exit();
    }

    // Update the note in the database
    $stmt = $conn->prepare("UPDATE notes SET title = :title, content = :content, updated_at = NOW() WHERE id = :id");
    if ($stmt->execute(['title' => $title, 'content' => $content, 'id' => $note_id])) {
        $_SESSION['message'] = "Note updated successfully!";
    } else {
        $_SESSION['error'] = "Something went wrong. Please try again.";
    }

    header('Location: dashboard.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Note - Notes App</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <div class="container">
        <h1>Edit Note</h1>
        <?php if (isset($_SESSION['error'])): ?>
            <div class="error"><?php echo $_SESSION['error']; ?></div>
            <?php unset($_SESSION['error']); ?>
        <?php endif; ?>
        <form action="edit_note.php?id=<?php echo $note_id; ?>" method="POST">
            <input type="text" name="title" placeholder="Title" value="<?php echo htmlspecialchars($note['title']); ?>" required>
            <textarea name="content" placeholder="Content" required><?php echo htmlspecialchars($note['content']); ?></textarea>
            <button type="submit" class="btn">Update Note</button>
        </form>
        <a href="dashboard.php" class="btn">Cancel</a>
    </div>
</body>
</html>