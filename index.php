<?php
session_start();
require_once 'db_connect.php';

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Heaven</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body style="background-image: url('background.jpg'); background-size: cover; background-position: center;">
    <div class="navbar">
        <a href="index.php">Home</a>
        <a href="book.php">Books</a>
        <a href="login.php">Login</a>
        <a href="logout.php">Log Out</a>
        <a href="register.php">Register</a>
        <form action="book.php" method="GET" class="search-form">
    <input type="text" name="search" placeholder="Search for books..." value="<?= htmlspecialchars($_GET['search'] ?? ''); ?>">
    <button type="submit">Search</button>
</form>

    </div>
    <div class="content">
        <h1>Welcome to Book Heaven</h1>
        <p>Your one-stop destination for all your book needs.</p>
    </div>
</body>
</html>
