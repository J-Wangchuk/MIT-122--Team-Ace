<?php include '../includes/db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ELMS Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[url(../assets/login-bg.png)] bg-cover min-h-screen flex items-center justify-center">
    <div class="flex md:flex-row w-full max-w-6xl mx-auto shadow-md border rounded-lg overflow-hidden">

        <div class="md:w-1/2 bg-white p-8 flex flex-col justify-center items-center text-center">
            <img src="../assets/office-workers.png" alt="office-workers" class="w-4/5 mb-6">
            <h2 class="text-2xl font-bold text-blue-700 mb-2">Employee Leave Management System</h2>
            <p class="text-gray-600">A centralized system designed to manage all the leave application efficiently at one place.</p>
        </div>

        <div class="md:w-1/2 bg-gray-50 p-10">
            <div class="flex items-center justify-center mb-6">
                <img src="../assets/elms-logo.png" alt="ELMS Logo" class="w-1/3 mb-6">
            </div>

            <h1 class="text-2xl text-gray-700 font-bold mb-6 text-center">Sign in to your account</h1>

            <form action="../process/login_process.php" method="POST" class="space-y-6">
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="text" name="email" id="email" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" name="password" id="password" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div class="text-right">
                    <a href="#" class="text-sm text-blue-500 hover:underline">Forgot Password?</a>
                </div>

                <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-2 px-4 rounded hover:bg-blue-700 transition duration-200">LOGIN</button>
            </form>
            <?php if (isset($_GET['error'])) { echo '<p class="text-red-500 mt-4">' . $_GET['error'] . '</p>'; } ?>
        </div>
    </div>
</body>
</html>
