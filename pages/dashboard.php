<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>ELMS - My Leave</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">
<?php include '../includes/header.php'; ?>

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

        <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 flex items-center">
          AVAIL LEAVE
          <span class="ml-1 text-lg">+</span>
        </button>
      </div>
  </div>
</body>
</html>
