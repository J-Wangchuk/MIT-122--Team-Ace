<?php
include '../includes/db.php';
session_start();
$email = $_SESSION['email'];
$name = $_POST['name'];
echo $name;
$dob = $_POST['dob'];
$bloodGroup = $_POST['blood_group'];
$nationality = $_POST['nationality'];
$phoneNo = $_POST['phone_no'];
$query = "UPDATE employees SET name=?, dob=?, blood_group=?, nationality=?, phone_no=? WHERE email=?";
$stmt = $conn->prepare($query);
$stmt->bind_param("ssssss", $name, $dob, $bloodGroup, $nationality, $phoneNo, $email);
$stmt->execute();
header("Location: ../pages/profile.php");
?>