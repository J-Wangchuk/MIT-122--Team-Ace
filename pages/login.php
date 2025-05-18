<?php include '../includes/db.php'; ?>
<h2>Login</h2>
<form action="login_process.php" method="POST">
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit">Login</button>
</form>