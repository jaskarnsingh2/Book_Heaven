<?php
session_start();
require_once 'db_connect.php';

if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}

$id = $conn->real_escape_string($_GET['id']);
$conn->query("DELETE FROM books WHERE id='$id'");
header('Location: books.php');
exit;
?>
