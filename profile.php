<?php

$db = new SQLite3('roomiefinder.db'); 


$userId = 1;
$stmt = $db->prepare('SELECT * FROM users WHERE id = :id');
$stmt->bindValue(':id', $userId, SQLITE3_INTEGER);
$result = $stmt->execute();
$user = $result->fetchArray(SQLITE3_ASSOC);


$name = $user['name'] ?? '';
$email = $user['email'] ?? '';
$course = 'Computer Science'; // not in DB
$sleepTime = '11 PM - 7 AM';  // not in DB
$interests = 'Music, Coding, Travel'; // not in DB
$hobbies = 'Guitar, Films, Reading'; // not in DBX
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Profile - Roommate Finder</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Inter', sans-serif;
    }
  </style>
</head>
<body class="bg-slate-100 flex flex-col items-center min-h-screen">

    <nav class="fixed w-full top-0 left-0 bg-slate-900 bg-opacity-90 text-white shadow-md z-50">
        <div class=" px-6 py-4 flex items-center justify-between">
          <div class="text-2xl font-bold text-rose-400">MatchMyRoomie</div>
          <div class="hidden md:flex gap-6">
            <a href="#" class="hover:text-rose-400">Home</a>
            <a href="features.html" class="hover:text-rose-400">Features</a>
            <a href="#" class="hover:text-rose-400">About</a>
            <a href="#" class="hover:text-rose-400">Contact</a>
            <a href="profile.php" class="hover:text-rose-400">Profile</a>
          </div>
        </div>
    </nav>


  <div class="w-full max-w-xl mt-12 bg-white rounded-2xl shadow-lg px-6 py-10 sm:px-10">

    <div class="text-center mb-8">
      <div class="w-28 h-28 rounded-full bg-slate-200 flex items-center justify-center text-3xl font-bold text-slate-600 mx-auto mb-4">👤</div>
      <h2 class="text-2xl font-semibold text-[#002147]">User Profile</h2>
    </div>


    <form>
      <div class="grid gap-6">
        <div>
          <label for="fullName" class="block text-sm font-semibold text-slate-800 mb-1">Full Name</label>
          <input type="text" id="fullName" name="fullName" value="<?= htmlspecialchars($name) ?>" class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-red-400">
        </div>

        <div>
          <label for="email" class="block text-sm font-semibold text-slate-800 mb-1">Email</label>
          <input type="email" id="email" name="email" value="<?= htmlspecialchars($email) ?>" class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-red-400">
        </div>

        <div>
          <label for="course" class="block text-sm font-semibold text-slate-800 mb-1">Course Name</label>
          <input type="text" id="course" name="course" value="<?= htmlspecialchars($course) ?>" class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-red-400">
        </div>

        <div>
          <label for="sleepTime" class="block text-sm font-semibold text-slate-800 mb-1">Preferred Sleeping Time</label>
          <input type="text" id="sleepTime" name="sleepTime" value="<?= htmlspecialchars($sleepTime) ?>" class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-red-400">
        </div>

        <div>
          <label for="interests" class="block text-sm font-semibold text-slate-800 mb-1">Interests</label>
          <input type="text" id="interests" name="interests" value="<?= htmlspecialchars($interests) ?>" class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-red-400">
        </div>

        <div>
          <label for="hobbies" class="block text-sm font-semibold text-slate-800 mb-1">Hobbies</label>
          <input type="text" id="hobbies" name="hobbies" value="<?= htmlspecialchars($hobbies) ?>" class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-red-400">
        </div>
      </div>


      <button type="submit" class="w-full bg-blue-600 hover:bg-red-500 text-white font-semibold text-lg py-3 rounded-lg mt-8 transition duration-300">Save Changes</button>
    </form>
  </div>

</body>
</html>
