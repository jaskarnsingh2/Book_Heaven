<?php
require_once 'db_connect.php';

// Example username => plain text password pairs
$users = [
    'admin_user' => 'admin_pass' // Replace with actual username and plain password
];

foreach ($users as $username => $plain_password) {
    $hashed_password = password_hash($plain_password, PASSWORD_BCRYPT);

    // Prepare and execute SQL statement
    $stmt = $conn->prepare("UPDATE Users SET password = ? WHERE username = ?");
    $stmt->bind_param("ss", $hashed_password, $username);
    
    if ($stmt->execute()) {
        echo "Password updated successfully for user: $username<br>";
    } else {
        echo "Error updating password for user: $username<br>";
    }
    $stmt->close();
}
?>
