<?php
class User {
    private static function getConnection() {
        include 'db_connect.php'; // Ensure this file sets up $conn correctly
        return $conn;
    }

    public static function create($username, $password, $biography) {
        $conn = self::getConnection();
        
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Prepare the SQL statement
        $stmt = $conn->prepare("INSERT INTO Users (username, password, biography) VALUES (?, ?, ?)");
        if ($stmt === FALSE) {
            echo "Error: " . $conn->error;
            return false;
        }

        // Bind parameters and execute
        $stmt->bind_param("sss", $username, $hashedPassword, $biography);
        if ($stmt->execute()) {
            $stmt->close();
            return true;
        } else {
            // Output error message
            echo "Error: " . $stmt->error;
            $stmt->close();
            return false;
        }
    }

    public static function readAll() {
        $conn = self::getConnection();

        // Prepare the SQL statement
        $stmt = $conn->prepare("SELECT * FROM Users");
        if ($stmt === FALSE) {
            echo "Error: " . $conn->error;
            return false;
        }

        // Execute the statement and get the result
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result === FALSE) {
            // Output error message
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
        return $result;
    }
}
?>
