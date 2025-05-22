<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>ELMS - Employees</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans relative">
<?php include '../includes/header.php'; 
 include '../includes/db.php';
 $result = $conn->query("SELECT * FROM employees");
?>
  <div class="flex flex-col md:flex-row gap-4 p-6">
    <div class="flex-1 bg-white shadow-md rounded-lg p-6">
      <div class="flex justify-between items-center mb-4">

        <div class="flex items-center gap-2">
          <svg class="w-6 h-6 text-pink-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
          </svg>
          <div>
            <h2 class="text-lg font-bold">Employees</h2> 
            <p class="text-sm text-gray-500">Access your colleagues' information from this section</p>
          </div> 
        </div> 
      </div>
      <table class="w-full table-auto">
          <thead class="bg-blue-200 text-left h-10">
              <tr>
                  <th>Name</th>
                  <th>Department</th>
                  <th>Phone no</th>
                  <th>Email</th>
              </tr>
          </thead>
          <tbody>
              <?php while ($row = $result->fetch_assoc()): ?>
                  <tr class="border-b border-gray-300 ">
                      <td class="py-2 "><?= htmlspecialchars($row['name']) ?></td>
                      <td class="py-2"><?= htmlspecialchars($row['department']) ?></td>
                      <td class="py-2"><?= htmlspecialchars($row['phone_no']) ?></td>
                      <td class="py-2"><?= htmlspecialchars($row['email']) ?></td>
                  </tr>
              <?php endwhile; ?>
          </tbody>
      </table>
  </div>
</div>