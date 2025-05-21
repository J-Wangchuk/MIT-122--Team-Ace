
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>ELMS - My profile</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans w-screen, h-screen">
<?php 
  include '../includes/header.php'; 
  include '../includes/db.php';
  $email = $_SESSION['email'];
  $role = $_SESSION['role'];
  $stmt = $conn->prepare("SELECT * FROM employees WHERE email = ?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $result = $stmt->get_result();
  $user = $result->fetch_assoc();
?>
  <div class="p-6">
    <h2 class="text-lg font-bold">MY PROFILE</h2>
    <p class="text-gray-500">Manage your profile from this section</p>
  </div>

  <div class="mx-auto w-3/5 mt-2 p-4">
    <div class ="flex justify-between mb-4">
      <div class="text-center">
        <svg class="w-24 h-24 text-pink-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
        </svg>
        <?php 
          echo '<h2 class="text-lg font-bold">' . $user['name'] . '</h2>';
          echo '<p class="text-sm text-gray-500">'. $role .'</p>';
        ?>
      </div>
      <button onClick="openModal()" class="bg-blue-600 text-white h-12 self-center px-4 py-2 rounded hover:bg-blue-700">Edit Profile</button>
    </div>

    <div class="bg-blue-200 py-4 text-center">
      <h2>Personal Information</h2>
    </div>

    <div class="py-4 flex justify-between my-4">
      <div>
        <h2 class="text-lg text-gray-500">Name</h2>
        <p class="text-gray-900"><?php echo $user['name']; ?></p>
      </div>
      <div>
        <h2 class="text-lg text-gray-500">Date of Birth</h2>
        <p class="text-gray-900"><?php echo $user['dob']; ?></p>
      </div>
      <div>
        <h2 class="text-lg text-gray-500">Blood Group</h2>
        <p class="text-gray-900"><?php echo $user['blood_group']; ?></p>
      </div>
      <div>
        <h2 class="text-lg text-gray-500">Nationality</h2>
        <p class="text-gray-900"><?php echo $user['nationality']; ?></p>
      </div>
    </div>

    <div class="bg-blue-200 py-4 text-center my-4">
      <h2>Contact Information</h2>
    </div>

    <div class="py-4 flex justify-between my-4">
      <div>
        <h2 class="text-lg text-gray-500">Email</h2>
        <p class="text-gray-900"><?php echo $user['email']; ?></p>
      </div>
      <div>
        <h2 class="text-lg text-gray-500">Phone Number</h2>
        <p class="text-gray-900"><?php echo $user['phone_no']; ?></p>
      </div>
      <div>
        <h2 class="text-lg text-gray-500">Department</h2>
        <p class="text-gray-900"><?php echo $user['department']; ?></p>
      </div>
    </div>
  </div>

  <div id="editModal" class="absolute top-1/2 left-1/3 w-1/3 border mx-auto border-gray-300 p-4 bg-white" style="display: none;" >
    <div class="flex justify-between  mb-4">
      <h2 class="text-lg font-bold text-center mb-2">Update Profile</h2>
      <button class="font-bold text-gray-600 hover:text-gray-800" onClick="closeModal()">X</button>
    </div>
    
    <form method="POST" action="../process/edit_profile.php" class ="flex flex-col gap-4">
      <div>
        <label for="name" class="text-gray-700">Name</label>
        <input type="text" name="name" value="<?php echo $user['name']; ?>" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
      </div>
      <div>
        <label for="dob" class="text-gray-700">Date of Birth</label>
        <input type="date" name="dob" value="<?php echo $user['dob']; ?>" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
      </div>
      <div>
        <label for="blood_group" class="text-gray-700">Blood Group</label>
        <input type="text" name="blood_group" value="<?php echo $user['blood_group']; ?>" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
      </div>
      <div>
        <label for="nationality" class="text-gray-700">Nationality</label>
        <input type="text" name="nationality" value="<?php echo $user['nationality']; ?>" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
      </div>
      <div>
        <label for="phone_no" class="text-gray-700">Phone Number</label>
        <input type="text" name="phone_no" value="<?php echo $user['phone_no']; ?>" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
      </div>
      <div class="text-right mt-2">
        <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-2 px-4 rounded hover:bg-blue-700 transition duration-200">UPDATE</button>
      </div>
    </form>
  </div>

</body>
</html>

<script>
function openModal() {
    document.getElementById('editModal').style.display = 'block';
}
function closeModal() {
    document.getElementById('editModal').style.display = 'none';
}
</script>
