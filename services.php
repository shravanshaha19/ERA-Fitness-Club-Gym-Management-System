<!-- services.php -->
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
    <title>ERA Fitness Club - Services</title>
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
    <div class="container mx-auto py-12">
        <header class="text-center mb-12">
            <h2 class="text-5xl font-bold mb-4">Our Premium Services</h2>
            <p class="text-xl text-gray-300 max-w-2xl mx-auto">At ERA Fitness Club, we offer a wide range of top-tier services designed to help you achieve your fitness goals with expert guidance and state-of-the-art facilities.</p>
        </header>
        <section class="mb-12">
            <h3 class="text-3xl font-semibold text-center mb-8">What We Offer</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
                    <div class="relative group mb-4">
                        <img src="Services/Personal Training.jpg" alt="Personal Training" class="w-full h-48 object-cover rounded-lg">
                        <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                            <p class="text-white text-lg font-semibold">Personal Training</p>
                        </div>
                    </div>
                    <h4 class="text-xl font-bold mb-2">Personal Training</h4>
                    <p class="text-gray-300">Work one-on-one with our certified trainers to create a personalized fitness plan tailored to your goals, whether it's weight loss, muscle gain, or overall wellness.</p>
                </div>
                <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
                    <div class="relative group mb-4">
                        <img src="Services/Group Fitness Classes.jpg" alt="Group Classes" class="w-full h-48 object-cover rounded-lg">
                        <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                            <p class="text-white text-lg font-semibold">Group Classes</p>
                        </div>
                    </div>
                    <h4 class="text-xl font-bold mb-2">Group Fitness Classes</h4>
                    <p class="text-gray-300">Join our energetic classes including Yoga, Zumba, and Spin. Perfect for all fitness levels, led by experienced instructors to keep you motivated.</p>
                </div>
                <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
                    <div class="relative group mb-4">
                        <img src="Services/Cardio & Strength Training.jpg" alt="Cardio Equipment" class="w-full h-48 object-cover rounded-lg">
                        <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                            <p class="text-white text-lg font-semibold">Cardio Equipment</p>
                        </div>
                    </div>
                    <h4 class="text-xl font-bold mb-2">Cardio & Strength Training</h4>
                    <p class="text-gray-300">Access our cutting-edge cardio machines and strength training equipment, designed to optimize your workouts and deliver results.</p>
                </div>
                <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
                    <div class="relative group mb-4">
                        <img src="Services/Nutrition Counseling.jpg" alt="Nutrition Counseling" class="w-full h-48 object-cover rounded-lg">
                        <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                            <p class="text-white text-lg font-semibold">Nutrition Counseling</p>
                        </div>
                    </div>
                    <h4 class="text-xl font-bold mb-2">Nutrition Counseling</h4>
                    <p class="text-gray-300">Our nutrition experts provide customized meal plans and dietary advice to complement your fitness journey and enhance your results.</p>
                </div>
                <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
                    <div class="relative group mb-4">
                        <img src="Services/Sauna & Steam Room.jpg" alt="Sauna and Steam Room" class="w-full h-48 object-cover rounded-lg">
                        <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                            <p class="text-white text-lg font-semibold">Sauna & Steam Room</p>
                        </div>
                    </div>
                    <h4 class="text-xl font-bold mb-2">Sauna & Steam Room</h4>
                    <p class="text-gray-300">Relax and recover in our luxurious sauna and steam room, designed to soothe muscles and promote overall wellness.</p>
                </div>
                <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
                    <div class="relative group mb-4">
                        <img src="Services/24_7 Gym Access.jpg" alt="24/7 Access" class="w-full h-48 object-cover rounded-lg">
                        <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                            <p class="text-white text-lg font-semibold">24/7 Access</p>
                        </div>
                    </div>
                    <h4 class="text-xl font-bold mb-2">24/7 Club Access</h4>
                    <p class="text-gray-300">Work out on your schedule with our 24/7 Club access, available to premium members for ultimate convenience.</p>
                </div>
            </div>
        </section>
        <section class="mb-12">
            <h3 class="text-3xl font-semibold text-center mb-8">Additional Information</h3>
            <div class="bg-gray-800 p-6 rounded-lg shadow-lg max-w-2xl mx-auto">
                <h4 class="text-xl font-bold mb-4">Hours deceived Operation</h4>
                <p class="text-gray-300 mb-4">Monday - Friday: 5:00 AM - 11:00 PM<br>Saturday - Sunday: 7:00 AM - 9:00 PM<br>24/7 Access for Premium Members</p>
                <h4 class="text-xl font-bold mb-4">Certified Trainers</h4>
                <p class="text-gray-300 mb-4">Our team of certified trainers holds qualifications from NASM, ACE, and ISSA, with expertise in strength training, cardio, and nutrition.</p>
                <h4 class="text-xl font-bold mb-4">Customer Support</h4>
                <p class="text-gray-300">For any inquiries, contact us at <a href="mailto:info@fitzonegym.com" class="text-blue-300 hover:underline">info@ERAFitnessClub.com</a> or call 9876543210. Our team is here to assist you!</p>
            </div>
        </section>
        <section class="text-center">
            <h3 class="text-3xl font-semibold mb-6">Ready to Get Started?</h3>
            <a href="packages.php" class="inline-block bg-blue-600 text-white py-3 px-6 rounded-lg text-lg font-semibold hover:bg-blue-700 transition">Explore Memberships</a>
        </section>
    </div>
</body>
</html>