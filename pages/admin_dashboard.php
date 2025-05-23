<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>ELMS - Leave requests</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans relative">
<?php include '../includes/header.php'; 
 include '../includes/db.php';
 $user_id = $_SESSION['user_id'];
 $query = "
 SELECT leave_requests.*, employees.name, employees.department
 FROM leave_requests 
 JOIN employees ON leave_requests.user_id = employees.user_id
 ";
$result = $conn->query($query); 
?>
  <div class="flex flex-col md:flex-row gap-4 p-6">
    <div class="flex-1 bg-white shadow-md rounded-lg p-6">
      <div class="flex justify-between items-center mb-4">

        <div class="flex items-center gap-2">
          <svg class="w-6 h-6 text-pink-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
          </svg>
          <div>
            <h2 class="text-lg font-bold">Leave Requests</h2> 
            <p class="text-sm text-gray-500">Employee leave information</p>
          </div> 
        </div> 

      </div>
      <table class="w-full table-auto">
          <thead class="bg-blue-200 text-left h-10">
              <tr>
                  <th>Name</th>
                  <th>Type</th>
                  <th>Department</th>
                  <th>From</th>
                  <th>To</th>
                  <th>Reason</th>
                  <th>Status</th>
                  <th>Action</th>
              </tr>
          </thead>
          <tbody>
              <?php while ($row = $result->fetch_assoc()): ?>
                  <tr class="border-b border-gray-300 ">
                      <td class="py-2 "><?= htmlspecialchars($row['name']) ?></td>
                      <td class="py-2 "><?= htmlspecialchars($row['leave_type']) ?></td>
                      <td class="py-2"><?= htmlspecialchars($row['department']) ?></td>
                      <td class="py-2"><?= htmlspecialchars($row['start_date']) ?></td>
                      <td class="py-2"><?= htmlspecialchars($row['end_date']) ?></td>
                      <td class="py-2 text-wrap max-w-32"><?= htmlspecialchars($row['reason']) ?></td>
                      <td class="py-2"><?= htmlspecialchars($row['status']) ?></td>
                      <td class="py-2"><button onClick="openModal(<?= $row['id'] ?>)"  class="bg-green-500 hover:bg-green-600 text-white font-semibold py-1 px-4 rounded">Action</button></td>
                  </tr>
              <?php endwhile; ?>
          </tbody>
      </table>
  </div>
</div>

<div id="approveLeaveModal" class="absolute top-1/2 left-1/3 w-1/4 border mx-auto border-gray-300 p-4 bg-white" style="display: none;" >
  <div class="flex justify-between items-center mb-2">
    <h2 class="text-lg font-bold mb-2">Approve leave</h2>
    <button class="font-bold text-gray-600 hover:text-gray-800" onClick="closeModal()">X</button>
  </div>

  <hr/>
  <form class="mt-2 flex flex-col " action="../process/approve_leave_process.php" method="POST">
    <input type="hidden" name="leave_id" id="modal-leave-id">
    <select class="mb-2 border-2 hover:bg-blue-200 rounded p-2" name="status">
      <option selected class="text-green-500" value="approved">Approve</option>
      <option class="text-red-500" value="rejected">Reject</option>
    </select>
    <div class="flex gap-4 justify-between" >
      <button class="py-2 px-4 bg-green-500 rounded text-white hover:bg-green-600" type="submit">Confirm</button>
      <button class="py-2 px-4 rounded border border-gray-300 hover:bg-gray-100 " type="button" onclick="closeModal()">Cancel</button>
    </div>
  </form> 
</div>

</body>
</html>

<script>
function openModal(leaveId) {
    document.getElementById('modal-leave-id').value = leaveId;
    document.getElementById('approveLeaveModal').style.display = 'block';
}
function closeModal() {
    document.getElementById('approveLeaveModal').style.display = 'none';
}
</script>
