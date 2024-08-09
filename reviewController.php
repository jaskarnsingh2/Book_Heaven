<?php
// controllers/ReviewController.php
include '../models/Review.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $book_id = $_POST['book_id'];
    $user_id = $_POST['user_id'];
    $comment = $_POST['comment'];
    $reply_to = $_POST['reply_to'];
    $likes = $_POST['likes'];

    if (Review::create($book_id, $user_id, $comment, $reply_to, $likes)) {
        echo "Review created successfully!";
    } else {
        echo "Failed to create review.";
    }
}

$reviews = Review::readAll();
?>

<!-- Display Reviews in the view -->
<?php while($row = $reviews->fetch_assoc()): ?>
    <p><?php echo "Book ID: " . $row['book_id'] . " - User ID: " . $row['user_id'] . " - Comment: " . $row['comment']; ?></p>
<?php endwhile; ?>
