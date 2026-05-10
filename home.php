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
    <title>ERA Fitness Club - Home</title>
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
    <div class="container">
        <header class="text-center mb-12">
            <h2 class="text-5xl font-bold mb-4">Welcome to ERA Fitness Club</h2>
            <p class="text-xl text-gray-300 max-w-2xl mx-auto">Experience fitness like never before at ERA Fitness Club, your premier destination for wellness. Our cutting-edge facilities and expert trainers are dedicated to helping you achieve your fitness goals in style.</p>
        </header>
        <section class="mb-12">
            <h3 class="text-3xl font-semibold text-center mb-6">Our Facility</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="relative group">
                    <img src="Home/cardio area.jpg" alt="Cardio Area" class="w-full h-64 object-cover rounded-lg shadow-lg">
                    <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                        <p class="text-white text-lg font-semibold">Cardio Area</p>
                    </div>
                </div>
                <div class="relative group">
                    <img src="Home/Strength Training.jpeg" alt="Strength Training" class="w-full h-64 object-cover rounded-lg shadow-lg">
                    <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                        <p class="text-white text-lg font-semibold">Strength Training</p>
                    </div>
                </div>
                <div class="relative group">
                    <img src="Home/Yoga Studio.jpg" alt="Yoga Studio" class="w-full h-64 object-cover rounded-lg shadow-lg">
                    <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                        <p class="text-white text-lg font-semibold">Yoga Studio</p>
                    </div>
                </div>
                <div class="relative group">
                    <img src="Home/Personal Training.jpg" alt="Personal Training" class="w-full h-64 object-cover rounded-lg shadow-lg">
                    <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                        <p class="text-white text-lg font-semibold">Personal Training</p>
                    </div>
                </div>
                <div class="relative group">
                    <img src="Home/Locker Room.jpg" alt="Locker Room" class="w-full h-64 object-cover rounded-lg shadow-lg">
                    <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                        <p class="text-white text-lg font-semibold">Locker Room</p>
                    </div>
                </div>
                <div class="relative group">
                    <img src="Home/Sauna.jpg" alt="Sauna" class="w-full h-64 object-cover rounded-lg shadow-lg">
                    <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                        <p class="text-white text-lg font-semibold">Sauna</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="text-center">
            <h3 class="text-3xl font-semibold mb-6">Join Us Today</h3>
            <a href="packages.php" class="inline-block bg-blue-600 text-white py-3 px-6 rounded-lg text-lg font-semibold hover:from-blue-600 hover:to-blue-800 transition">Explore Memberships</a>
        </section>
    </div>
</body>
</html>

