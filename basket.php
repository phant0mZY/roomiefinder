<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $db = new SQLite3('roomiefinder.db');
  $stmt = $db->prepare("INSERT INTO baskets (name, sleep_schedule, branch, state, noise_tolerance, room_type, ac_preference, preferences)
                        VALUES (:name, :sleep_schedule, :branch, :state, :noise_tolerance, :room_type, :ac_preference, :preferences)");

  $stmt->bindValue(':name', $_POST['name'], SQLITE3_TEXT);
  $stmt->bindValue(':sleep_schedule', $_POST['sleep'], SQLITE3_TEXT);
  $stmt->bindValue(':branch', $_POST['branch'], SQLITE3_TEXT);
  $stmt->bindValue(':state', $_POST['state'], SQLITE3_TEXT);
  $stmt->bindValue(':noise_tolerance', $_POST['noise'], SQLITE3_TEXT);
  $stmt->bindValue(':room_type', $_POST['beds'], SQLITE3_TEXT);
  $stmt->bindValue(':ac_preference', $_POST['ac'], SQLITE3_TEXT);
  $stmt->bindValue(':preferences', $_POST['preferences'], SQLITE3_TEXT);

  $result = $stmt->execute();
  if ($result) {
    header("Location: menu.php");
    exit();
  } else {
    echo "Failed to insert basket.";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Create Basket</title>
  <script src="tailwind.js"></script>
</head>
<body class="bg-slate-100 min-h-screen flex items-center justify-center p-4">
  <div class="bg-white rounded-xl shadow-xl overflow-hidden flex flex-col md:flex-row w-full max-w-5xl">
    

    <div class="hidden md:flex md:w-1/2 bg-red-100 items-center justify-center p-6">
      <img src="basket.jpg" alt="Room Preferences Illustration" class="rounded-lg max-w-xs w-full h-auto">
    </div>


    <div class="md:w-1/2 p-8">
      <h2 class="text-2xl font-bold text-red-500 text-center mb-6">Create Basket</h2>

      <form method="POST" action="" class="space-y-4">
        <div>
          <label for="name" class="block font-medium mb-1">Full Name</label>
          <input type="text" id="name" name="name" required class="w-full border border-gray-300 p-2 rounded-md" />
        </div>

        <div>
          <label for="sleep" class="block font-medium mb-1">Sleep Schedule</label>
          <select id="sleep" name="sleep" required class="w-full border border-gray-300 p-2 rounded-md">
            <option value="">Select</option>
            <option value="early">Early sleeper</option>
            <option value="night">Night owl</option>
            <option value="flexible">Flexible</option>
          </select>
        </div>

        <div>
          <label for="branch" class="block font-medium mb-1">Branch</label>
          <select id="branch" name="branch" required class="w-full border border-gray-300 p-2 rounded-md">
            <option value="">Select</option>
            <option value="cse">CSE</option>
            <option value="ece">ECE</option>
            <option value="mech">Mechanical</option>
            <option value="civil">Civil</option>
          </select>
        </div>

        <div>
          <label for="state" class="block font-medium mb-1">State</label>
          <input type="text" id="state" name="state" required class="w-full border border-gray-300 p-2 rounded-md" />
        </div>

        <div>
          <label for="noise" class="block font-medium mb-1">Noise Tolerance</label>
          <select id="noise" name="noise" required class="w-full border border-gray-300 p-2 rounded-md">
            <option value="">Select</option>
            <option value="quiet">Quiet</option>
            <option value="moderate">Moderate</option>
            <option value="lively">Lively</option>
          </select>
        </div>

        <div class="flex flex-col sm:flex-row gap-4">
          <div class="flex-1">
            <label for="beds" class="block font-medium mb-1">No. of Beds</label>
            <select id="beds" name="beds" required class="w-full border border-gray-300 p-2 rounded-md">
              <option value="">Select</option>
              <option value="6-bed">6 Bed</option>
              <option value="4-bed">4 Bed</option>
              <option value="3-bed">3 Bed</option>
              <option value="2-bed">2 Bed</option>
            </select>
          </div>

          <div class="flex-1">
            <label for="ac" class="block font-medium mb-1">AC / Non-AC</label>
            <select id="ac" name="ac" required class="w-full border border-gray-300 p-2 rounded-md">
              <option value="">Select</option>
              <option value="ac">AC</option>
              <option value="non-ac">Non-AC</option>
            </select>
          </div>
        </div>

        <div>
          <label for="preferences" class="block font-medium mb-1">Additional Preferences</label>
          <textarea id="preferences" name="preferences" rows="3" class="w-full border border-gray-300 p-2 rounded-md"></textarea>
        </div>

        <button type="submit" class="w-full bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-md transition">Create Basket</button>
      </form>
    </div>
  </div>
</body>
</html>
