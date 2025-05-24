<?php
include '../includes/db.php';
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
  die("Access denied.");
}
$email = $_POST['email'];
$password = 'abc123';
$role = $_POST['role'];

if ($role) {
    $role = 'admin';
} else {
    $role = 'employee';
}
$query = "INSERT INTO users (email, password, role) VALUES (?, ?, ?)";
$stmt = $conn->prepare($query);
$stmt->bind_param("sss", $email, $password, $role);
$stmt->execute();


$name = $_POST['name'];
$department = $_POST['department'];
$phoneNo = $_POST['phone_no'];
$dob = $_POST['dob'];
$bloodGroup = $_POST['blood_group'];
$nationality = $_POST['nationality'];
$date = date('Y-m-d');
$user_id = $conn->insert_id;
$query = "INSERT INTO employees (user_id, name, email, department, phone_no, dob, blood_group, nationality, join_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($query);
$stmt->bind_param("issssssss", $user_id, $name, $email, $department, $phoneNo, $dob, $bloodGroup, $nationality, $date);
$stmt->execute();
header("Location: ../pages/admin_employees.php");
exit;


?>