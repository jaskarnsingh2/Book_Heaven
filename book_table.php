<?php
class Book {
    public static function create($title, $author_id, $genre, $stock, $published_date) {
        include 'db_connection.php';
        $stmt = $conn->prepare("INSERT INTO Books (title, author_id, genre, stock, published_date) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sisds", $title, $author_id, $genre, $stock, $published_date);
        return $stmt->execute();
    }

    public static function readAll() {
        include 'db_connection.php';
        $sql = "SELECT * FROM Books";
        return $conn->query($sql);
    }
    
}
?>