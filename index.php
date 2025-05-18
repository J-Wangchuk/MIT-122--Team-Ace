
<?php
session_start();
if (isset($_SESSION['user_id'])) {
    if ($_SESSION['role'] === 'admin') {
        header("Location: /MIT-122--Team-Ace/pages/admin_dashboard.php");
    } else {
        header("Location: /MIT-122--Team-Ace/pages/dashboard.php");
    }
} else {
    header("Location: /MIT-122--Team-Ace/pages/login.php");
}
exit;

