<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Leave Management</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<nav>
<?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') { ?>
    <a href="/pages/admin_dashboard.php">Admin Dashboard</a>
    <a href="/pages/admin_leave_requests.php">Leave Requests</a>
    <a href="/pages/admin_employees.php">Employees</a>
    <a href="/pages/admin_profile.php">Profile</a>
<?php } else { ?>
    <a href="/pages/dashboard.php">Dashboard</a>
    <a href="/pages/apply_leave.php">My Leave</a>
    <a href="/pages/employees.php">Employees</a>
    <a href="/pages/profile.php">My Profile</a>
<?php } ?>
    <a href="/logout.php">Logout</a>
</nav>