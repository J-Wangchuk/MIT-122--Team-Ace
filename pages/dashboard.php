<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>ELMS - My Leave</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans relative">
<?php include '../includes/header.php'; 
 include '../includes/db.php';
 $user_id = $_SESSION['user_id'];
 $result = $conn->query("SELECT * FROM leave_requests WHERE employee_id = $user_id");
?>
  <div class="flex flex-col md:flex-row gap-4 p-6">
    <div class="flex-1 bg-white shadow-md rounded-lg p-6">
      <div class="flex justify-between items-center mb-4">

        <div class="flex items-center gap-2">
          <svg class="w-6 h-6 text-pink-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
          </svg>
          <div>
            <h2 class="text-lg font-bold">MY LEAVE</h2> 
            <p class="text-sm text-gray-500">Manage your leaves from this section</p>
          </div> 
        </div> 

        <button 
          class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 flex items-center"
          onClick="openModal()"
        >
          AVAIL LEAVE
          <span class="ml-1 text-lg">+</span>
        </button>
      </div>
      <table class="w-full table-auto">
          <thead class="bg-blue-200 text-left h-10">
              <tr>
                  <th>Type</th>
                  <th>From</th>
                  <th>To</th>
                  <th>Reason</th>
                  <th>Status</th>
              </tr>
          </thead>
          <tbody>
              <?php while ($row = $result->fetch_assoc()): ?>
                  <tr class="border-b border-gray-300 ">
                      <td class="py-2 "><?= htmlspecialchars($row['leave_type']) ?></td>
                      <td class="py-2"><?= htmlspecialchars($row['start_date']) ?></td>
                      <td class="py-2"><?= htmlspecialchars($row['end_date']) ?></td>
                      <td class="py-2 text-wrap max-w-32"><?= htmlspecialchars($row['reason']) ?></td>
                      <td class="py-2"><?= htmlspecialchars($row['status']) ?></td>
                  </tr>
              <?php endwhile; ?>
          </tbody>
      </table>
  </div>
</div>




<div id="applyLeaveModal" class="absolute top-1/2 left-1/3 w-1/3 border mx-auto border-gray-300 p-4 bg-white" style="display: none;" >
  <div class="flex justify-between items-center mb-2">
    <h2 class="text-lg font-bold mb-2">Apply for Leave</h2>
    <button class="font-bold text-gray-600 hover:text-gray-800" onClick="closeModal()">X</button>
  </div>

  <hr/>
  <form class="mt-2 flex flex-col " action="../process/apply_leave_process.php" method="POST">
    <h2 class="text-lg font-bold mb-2">Date</h2>
    <div class="flex gap-4">
      <input class="mb-2 border-2 hover:bg-blue-200 rounded p-2" type="date" name="from_date" required>
     <span span class="text-lg self-center">To</span>
      <input class="mb-2 border-2 hover:bg-blue-200 rounded p-2" type="date" name="to_date" required>
    </div>
    <h2 class="text-lg font-bold mb-2">Leave Type</h2>
    <div class = "flex gap-4">
      <div>
        <input type="radio" name="leave_type" value="sick" required />
        <label for="sick">Sick Leave</label><br>
      </div>
      <div>
        <input type="radio" name="leave_type" value="casual" required />
        <label for="casual">Casual Leave</label><br>
      </div>
    </div>
    <h2 class="text-lg font-bold mb-2">Reason</h2>
    <textarea class="mb-2 border-2 w-full hover:bg-blue-200 rounded p-2" name="reason" placeholder="Reason" required></textarea><br>
    <button class="w-1/3 self-end bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700" type="submit">Submit</button>
  </form>
</div>

</body>
</html>

<script>
function openModal() {
    document.getElementById('applyLeaveModal').style.display = 'block';
}
function closeModal() {
    document.getElementById('applyLeaveModal').style.display = 'none';
}
</script>
