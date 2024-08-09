<?php
// controllers/BookController.php
include '../models/Book.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $author_id = $_POST['author_id'];
    $genre = $_POST['genre'];
    $stock = $_POST['stock'];
    $published_date = $_POST['published_date'];

    if (Book::create($title, $author_id, $genre, $stock, $published_date)) {
        echo "Book created successfully!";
    } else {
        echo "Failed to create book.";
    }
}

$books = Book::readAll();
?>

<!-- Display Books in the view -->
<?php while($row = $books->fetch_assoc()): ?>
    <p><?php echo "Title: " . htmlspecialchars($row['title']) . " - Genre: " . htmlspecialchars($row['genre']) . " - Stock: " . htmlspecialchars($row['stock']); ?></p>
<?php endwhile; ?>
