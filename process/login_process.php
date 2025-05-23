<?php
include '../includes/db.php';
session_start();
$email = $_POST['email'];
$password = $_POST['password'];

$query = "SELECT * FROM users WHERE email = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($user = $result->fetch_assoc()) {
    if (($password === $user['password'])) {
        
        $getEmployee = "SELECT * FROM employees WHERE email = ?";
        $stmt2 = $conn->prepare($getEmployee);
        $stmt2->bind_param("s", $email);
        $stmt2->execute();
        $employeeResult = $stmt2->get_result();
        $employee = $employeeResult->fetch_assoc();

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['name'] = $employee['name'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['role'] = $user['role'];
        $_SESSION['department'] = $employee['department'];
        header("Location: ../index.php");
        exit;
    }
}
header("Location: ../pages/login.php?error=invalid_credentials");
exit;
?>