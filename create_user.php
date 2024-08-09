<!-- views/create_user.php -->
<form method="POST" action="../controllers/UserController.php">
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <textarea name="biography" placeholder="Biography"></textarea>
    <button type="submit">Create User</button>
</form>

<!-- Display Users -->
<?php include '../controllers/UserController.php'; ?>
