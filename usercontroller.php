<?php
// controllers/UserController.php
include '../models/User.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $biography = $_POST['biography'];

    if (User::create($username, $password, $biography)) {
        echo "User created successfully!";
    } else {
        echo "Failed to create user.";
    }
}

$users = User::readAll();
?>

<!-- Display Users in the view -->
<?php while($row = $users->fetch_assoc()): ?>
    <p><?php echo "Username: " . $row['username'] . " - Biography: " . $row['biography']; ?></p>
<?php endwhile; ?>
