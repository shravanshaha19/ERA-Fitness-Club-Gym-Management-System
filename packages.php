<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ERA Fitness Club - Packages</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body class="bg-gray-900 text-white">
    <nav class="bg-blue-800 text-white p-4 shadow-lg">
        <div class="container mx-auto flex justify-between items-center">
            <div class="flex items-center">
                <img src="Home/gym logo.png" alt="FitZone Gym Logo" class="h-12 mr-4">
                <h1 class="text-3xl font-extrabold">ERA Fitness Club</h1>
            </div>
            <ul class="flex space-x-6">
                <li><a href="home.php" class="hover:text-blue-300 transition">Home</a></li>
                <li><a href="services.php" class="hover:text-blue-300 transition">Services</a></li>
                <li><a href="trainers.php" class="hover:text-blue-300 transition">Trainers</a></li>
                <li><a href="packages.php" class="hover:text-blue-300 transition">Packages</a></li>
                <li><a href="register.php" class="hover:text-blue-300 transition">Register</a></li>
                <li><a href="membership_status.php" class="hover:text-blue-300 transition">Membership Status</a></li>
                <li><a href="contact.php" class="hover:text-blue-300 transition">Contact</a></li>
                <li><a href="logout.php" class="hover:text-blue-300 transition">Logout</a></li>
            </ul>
        </div>
    </nav>
    <div class="container mx-auto py-8">
        <h2 class="text-3xl font-bold text-center mb-8">Membership Packages</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php
            $packages = [
                ['name' => 'Basic Membership', 'price' => 2505, 'duration' => '1 Month', 'features' => 'Gym Access, Cardio Equipment'],
                ['name' => 'Standard Membership', 'price' => 4175, 'duration' => '1 Month', 'features' => 'Gym Access, Cardio & Strength Equipment'],
                ['name' => 'Premium Membership', 'price' => 6680, 'duration' => '1 Month', 'features' => 'Full Access, Group Classes'],
                ['name' => 'Annual Basic', 'price' => 25050, 'duration' => '12 Months', 'features' => 'Gym Access, Cardio Equipment'],
                ['name' => 'Annual Premium', 'price' => 66800, 'duration' => '12 Months', 'features' => 'Full Access, Group Classes, Personal Training'],
                ['name' => 'Student Plan', 'price' => 2088, 'duration' => '1 Month', 'features' => 'Gym Access (Student ID Required)'],
                ['name' => 'Family Plan', 'price' => 10020, 'duration' => '1 Month', 'features' => 'Gym Access for 4 Family Members'],
                ['name' => 'Personal Training Package', 'price' => 12525, 'duration' => '1 Month', 'features' => '10 Personal Training Sessions'],
                ['name' => 'Weekend Warrior', 'price' => 1670, 'duration' => '1 Month', 'features' => 'Weekend Gym Access Only'],
                ['name' => 'Corporate Plan', 'price' => 8350, 'duration' => '1 Month', 'features' => 'Gym Access for 5 Employees'],
            ];
            foreach ($packages as $package) {
                echo "
                <div class='bg-gray-800 p-6 rounded-lg shadow-lg'>
                    <h3 class='text-xl font-bold mb-4'>".htmlspecialchars($package['name'])."</h3>
                    <p class='text-lg mb-2'>₹".number_format($package['price'])." / ".htmlspecialchars($package['duration'])."</p>
                    <p class='text-gray-300'>".htmlspecialchars($package['features'])."</p>
                    <a href='register.php?package=".urlencode($package['name'])."' class='block mt-4 bg-blue-600 text-white py-2 rounded-lg text-center hover:bg-blue-700'>Choose Plan</a>
                </div>";
            }
            ?>
        </div>
    </div>
</body>
</html>