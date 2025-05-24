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

        <div class="flex justify-between w-full">
          <div class="flex items-center gap-2">
            <svg class="w-6 h-6 text-pink-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
            </svg>
            <div>
              <h2 class="text-lg font-bold">Employees</h2> 
              <p class="text-sm text-gray-500">Access your colleagues' information from this section</p>
            </div> 
          </div>
            <button onClick="openModal()" class="py-2 px-4 bg-blue-500 rounded text-white hover:bg-blue-600"> Add new employee</button>
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
      <div id="addEmployeeModal" class="absolute top-1/2 left-1/3 w-1/3 border mx-auto border-gray-300 p-4 bg-white" style="display: none;" >
        <div class="flex justify-between items-center mb-2">
          <h2 class="text-lg font-bold mb-2">Add New Employee</h2>
          <button class="font-bold text-gray-600 hover:text-gray-800" onClick="closeModal()">X</button>
        </div>

        <hr/>
        <form class="mt-2 flex flex-col " action="../process/add_employee_process.php" method="POST">
          <div>
            <h2 class="text-lg font-bold mb-2">Name</h2>
            <input class="mb-2 border-2 hover:bg-blue-200 rounded p-2 w-full" type="text" name="name" required>
          </div>
          <div>
            <h2 class="text-lg font-bold mb-2 ">Email</h2>
            <input class="mb-2 border-2 hover:bg-blue-200 rounded p-2 w-full" type="text" name="email" required>
          </div>
          <div>
            <h2 class="text-lg font-bold mb-2">Department</h2>
            <input class="mb-2 border-2 hover:bg-blue-200 rounded p-2 w-full" type="text" name="department" required>
          </div>
          <div>
            <h2 class="text-lg font-bold mb-2">Date of Birth</h2>
            <input class="mb-2 border-2 hover:bg-blue-200 rounded p-2 w-full" type="date" name="dob" required>
          </div>
          <div>
            <h2 class="text-lg font-bold mb-2">Blood group</h2>
            <input class="mb-2 border-2 hover:bg-blue-200 rounded p-2 w-full" type="text" name="blood_group" required>
          </div>
          <div>
            <h2 class="text-lg font-bold mb-2">Phone no.</h2>
            <input class="mb-2 border-2 hover:bg-blue-200 rounded p-2 w-full" type="text" name="phone_no" required>
          </div>
          <div>
            <h2 class="text-lg font-bold mb-2">Nationality</h2>
            <input class="mb-2 border-2 hover:bg-blue-200 rounded p-2 w-full" type="text" name="nationality" required>
          </div>
          <div class="flex gap-4">
            <h2 class="text-lg font-bold mb-2">Admin?</h2>
            <input class="mb-2 border-2 hover:bg-blue-200 rounded w-4" type="checkbox" name="role">
          </div>
          <button class="w-1/3 self-end bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700" type="submit">Submit</button>
        </form> 
      </div> 
    </div>
  </div>
<script>
  function openModal() {
      document.getElementById('addEmployeeModal').style.display = 'block';
  }
  function closeModal() {
      document.getElementById('addEmployeeModal').style.display = 'none';
  }
</script>