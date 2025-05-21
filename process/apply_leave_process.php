<?php
include '../includes/db.php';
session_start();
$user_id = $_SESSION['user_id'];
$type = $_POST['leave_type'];
$from = $_POST['from_date'];
$to = $_POST['to_date'];
$reason = $_POST['reason'];
$query = "INSERT INTO leave_requests (employee_id, leave_type, start_date, end_date, reason) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($query);
$stmt->bind_param("issss", $user_id, $type, $from, $to, $reason);
$stmt->execute();
header("Location: ../pages/dashboard.php?success=1");
exit;
?>