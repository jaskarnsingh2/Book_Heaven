<?php
session_start();
require_once 'db_connect.php';

// Check if search query is set
$searchQuery = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : '';

// Build SQL query with join to fetch author's name
$sql = "
    SELECT Books.*, Authors.name AS author_name 
    FROM Books 
    LEFT JOIN Authors ON Books.author_id = Authors.id 
    WHERE Books.title LIKE '%$searchQuery%'
";

// Fetch books from the database
$result = $conn->query($sql);

if (!$result) {
    die("Error: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books Collection</title>
    <link rel="stylesheet" href="book.css">
</head>
<body>
    <div class="navbar">
        <a href="index.php">Home</a>
        <a href="book.php">Books</a>
        <a href="logout.php">Log Out</a>
        <form action="book.php" method="GET" class="search-form">
            <input type="text" name="search" placeholder="Search for books..." value="<?= htmlspecialchars($searchQuery); ?>">
            <button type="submit">Search</button>
        </form>
    </div>
    <div class="content">
        <h1>Our Book Collection</h1>
        <div class="book-collection">
            <?php if ($result->num_rows > 0): ?>
                <?php while ($book = $result->fetch_assoc()): ?>
                    <div class="book-item">
                        <img src="<?= htmlspecialchars($book['image']); ?>" alt="<?= htmlspecialchars($book['title']); ?>">
                        <p><strong><?= htmlspecialchars($book['title']); ?></strong><br>
                           Author: <?= htmlspecialchars($book['author_name']); ?><br>
                           Genre: <?= htmlspecialchars($book['genre']); ?>
                        </p>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p>No books found.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
