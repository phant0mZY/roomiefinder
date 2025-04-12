<?php

$db = new SQLite3('roomiefinder.db');


$results = $db->query("SELECT * FROM baskets");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Roommate Menu</title>
  <script src="tailwind.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body class="bg-slate-100 text-slate-900 p-4 sm:p-6 md:p-10">

  <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold text-center text-red-500 mb-8 sm:mb-10">
    Roommate Preferences Menu
  </h1>

  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 max-w-7xl mx-auto px-2 sm:px-4">
    <?php while ($row = $results->fetchArray(SQLITE3_ASSOC)): ?>
      <div class="bg-white p-5 sm:p-6 rounded-2xl shadow-md hover:shadow-lg transition-all transform hover:-translate-y-1">
        <h3 class="text-lg sm:text-xl font-semibold text-red-500 mb-3"><?= htmlspecialchars($row['name']) ?></h3>
        <p class="text-sm sm:text-base"><span class="font-semibold">Sleep Schedule:</span> <?= htmlspecialchars($row['sleep_schedule']) ?></p>
        <p class="text-sm sm:text-base"><span class="font-semibold">Branch:</span> <?= htmlspecialchars($row['branch']) ?></p>
        <p class="text-sm sm:text-base"><span class="font-semibold">State:</span> <?= htmlspecialchars($row['state']) ?></p>
        <p class="text-sm sm:text-base"><span class="font-semibold">Noise Tolerance:</span> <?= htmlspecialchars($row['noise_tolerance']) ?></p>
        <p class="text-sm sm:text-base"><span class="font-semibold">Preferences:</span> <?= htmlspecialchars($row['preferences']) ?></p>
        <p class="text-sm sm:text-base"><span class="font-semibold">Room Type:</span> <?= htmlspecialchars($row['room_type']) ?></p>
        <p class="text-sm sm:text-base"><span class="font-semibold">AC Preference:</span> <?= htmlspecialchars($row['ac_preference']) ?></p>
        <a href="#" class="inline-block mt-4 bg-red-500 hover:bg-red-600 text-white text-sm font-medium py-2 px-4 rounded-md transition">
          Match
        </a>
      </div>
    <?php endwhile; ?>
  </div>

  <div class="text-center mt-10">
    <a href="basket.php" class="text-sm sm:text-base text-slate-700 hover:underline">
      ← Fill Your Own Preferences
    </a>
  </div>

</body>
</html>
