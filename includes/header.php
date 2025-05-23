<?php
session_start();
$name=$_SESSION['name'];
$department=$_SESSION['department'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>elms - leave_requests</title>
</head>
<body>
<nav class="bg-blue-800 text-white p-4 flex items-center justify-between">
    <img src="../assets/elms-logo.png" alt="ELMS Logo" class="w-64 mb-6 flex items-center">
    <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') { ?>
        <a href="../pages/admin_dashboard.php" class="bg-blue-700 px-4 py-2 rounded hover:bg-blue-600">Leave Requests</a>
        <a href="../pages/admin_employees.php" class="bg-blue-700 px-4 py-2 rounded hover:bg-blue-600">Employees</a>
        <a href="../pages/profile.php" class="bg-blue-700 px-4 py-2 rounded hover:bg-blue-600">Profile</a>
    <?php } else { ?>
    <div class="flex items-center gap-4">
            <a href="../pages/dashboard.php" class="bg-blue-700 px-4 py-2 rounded hover:bg-blue-600">MY LEAVE</a>
            <a href="../pages/employees.php" class="bg-blue-700 px-4 py-2 rounded hover:bg-blue-600">EMPLOYEES</a>
            <a href="../pages/profile.php" class="bg-blue-700 px-4 py-2 rounded hover:bg-blue-600">MY PROFILE</a>
    </div>
    <?php } ?>
    <div class="flex items-center gap-8"> 
        <div class="text-right">
            <p class="font-semibold"><?= $name ?></p>
            <p class="text-sm text-blue-200"><?= $department ?></p>
        </div>
        <svg class="w-12 h-12 text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
        </svg>
        <a href="../logout.php">
            <svg class="w-6 h-6 " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" />
            </svg>
        </a>
    </div>
</nav>