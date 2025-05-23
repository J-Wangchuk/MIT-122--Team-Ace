<?php
include '../includes/db.php';
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    die("Access denied.");
}

 if (isset($_POST['leave_id']) && is_numeric($_POST['leave_id'])) {
    $leave_id = intval($_POST['leave_id']);
    $status = $_POST['status'];

    $query = "UPDATE leave_requests SET status = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("si", $status, $leave_id);

    if ($stmt->execute()) {
        header("Location: ../pages/admin_dashboard.php?success=1");
        exit;
    } else {
        echo "Failed to approve leave.";
    }
} else {
    echo "Invalid request.";  
}
?>
