<?php
session_start();
$name=$_SESSION['name'];
$role=$_SESSION['role'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Leave Management</title>
</head>
<body>
<nav class="bg-blue-800 text-white p-4 flex items-center justify-between">
    <img src="../assets/elms-logo.png" alt="ELMS Logo" class="w-64 mb-6 flex items-center">
    <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') { ?>
        <a href="/pages/admin_leave_requests.php">Leave Requests</a>
        <a href="/pages/admin_employees.php">Employees</a>
        <a href="/pages/admin_profile.php">Profile</a>
    <?php } else { ?>
    <div class="flex items-center gap-4">
            <a href="../pages/dashboard.php" class="bg-blue-700 px-4 py-2 rounded hover:bg-blue-600">MY LEAVE</a>
            <a href="../pages/employees.php" class="hover:underline">EMPLOYEES</a>
            <a href="../pages/profile.php" class="hover:underline">MY PROFILE</a>
    </div>
    <div class="flex items-center gap-8">
        <div class="text-right">
            <p class="font-semibold"><?= $name ?></p>
            <p class="text-sm text-blue-200"><?= $role ?></p>
        </div>
        <div class="w-10 h-10 bg-gray-400 items-center justify-center flex rounded-full">
            <span >JW</span>
        </div>
        <a href="#">
            <svg class="w-6 h-6 " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" />
            </svg>
        </a>
    </div>
</nav>
<?php } ?>