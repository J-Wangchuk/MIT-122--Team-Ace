<?php
include '../includes/db.php';
session_start();
$email = $_POST['email'];
$password = md5($_POST['password']);
echo "<script>console.log('Password (MD5): " . $password . "');</script>";

$query = "SELECT * FROM users WHERE email = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($user = $result->fetch_assoc()) {
    if (($password === $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];
        header("Location: ../index.php");
        exit;
    }
}
echo "Invalid email or password";
?>