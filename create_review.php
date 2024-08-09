<!-- views/create_review.php -->
<form method="POST" action="../controllers/ReviewController.php">
    <input type="number" name="book_id" placeholder="Book ID" required>
    <input type="number" name="user_id" placeholder="User ID" required>
    <textarea name="comment" placeholder="Comment"></textarea>
    <input type="number" name="reply_to" placeholder="Reply To">
    <input type="number" name="likes" placeholder="Likes">
    <button type="submit">Create Review</button>
</form>

<!-- Display Reviews -->
<?php include '../controllers/ReviewController.php'; ?>
