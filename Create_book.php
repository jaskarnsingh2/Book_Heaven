<?php
session_start();
require_once 'db_connect.php';

if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $conn->real_escape_string($_POST['title']);
    $author = $conn->real_escape_string($_POST['author']);
    $category = $conn->real_escape_string($_POST['category']);
    $image = $conn->real_escape_string($_POST['image']);

    $conn->query("INSERT INTO Books (title, author, category, image) VALUES ('$title', '$author', '$category', '$image')");
    header('Location: books.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Book</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="form-container">
        <h1>Create New Book</h1>
        <form action="create_book.php" method="POST">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required><br><br>
            <label for="author">Author:</label>
            <input type="text" id="author" name="author" required><br><br>
            <label for="category">Category:</label>
            <input type="text" id="category" name="category" required><br><br>
            <label for="image">Image URL:</label>
            <input type="text" id="image" name="image" required><br><br>
            <button type="submit">Create</button>
        </form>
    </div>
</body>
</html>
