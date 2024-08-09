<?php
session_start();
require_once 'db_connect.php';

if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}

$id = $conn->real_escape_string($_GET['id']);
$result = $conn->query("SELECT * FROM Books WHERE id='$id'");
$book = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $conn->real_escape_string($_POST['title']);
    $author = $conn->real_escape_string($_POST['author']);
    $category = $conn->real_escape_string($_POST['category']);
    $image = $conn->real_escape_string($_POST['image']);

    $conn->query("UPDATE Books SET title='$title', author='$author', category='$category', image='$image' WHERE id='$id'");
    header('Location: books.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="form-container">
        <h1>Edit Book</h1>
        <form action="editbook.php?id=<?= $id ?>" method="POST">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="<?= htmlspecialchars($book['title']); ?>" required><br><br>
            <label for="author">Author:</label>
            <input type="text" id="author" name="author" value="<?= htmlspecialchars($book['author']); ?>" required><br><br>
            <label for="category">Category:</label>
            <input type="text" id="category" name="category" value="<?= htmlspecialchars($book['category']); ?>" required><br><br>
            <label for="image">Image URL:</label>
            <input type="text" id="image" name="image" value="<?= htmlspecialchars($book['image']); ?>" required><br><br>
            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>
