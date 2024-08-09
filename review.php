<?php
// models/Review.php
class Review {
    public static function create($book_id, $user_id, $comment, $reply_to, $likes) {
        include 'db_connection.php';
        $sql = "INSERT INTO Reviews (book_id, user_id, comment, reply_to, likes) VALUES ('$book_id', '$user_id', '$comment', '$reply_to', '$likes')";
        return $conn->query($sql);
    }

    public static function readAll() {
        include 'db_connection.php';
        $sql = "SELECT * FROM Reviews";
        return $conn->query($sql);
    }
    // Other CRUD operations for Reviews
}
?>
