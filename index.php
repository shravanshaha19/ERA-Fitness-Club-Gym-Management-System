<?php
session_start();
require_once 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ERA Fitness Club - Login & Signup</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            background-size: cover;
            background-position: center;
            transition: background-image 1s ease-in-out;
        }
        @keyframes fadeIn {
            from {opacity: 0; transform: translateY(20px);}
            to {opacity: 1; transform: translateY(0);}
        }
        .animate-fadeIn {
            animation: fadeIn 0.8s ease-in-out;
        }
    </style>
</head>
<body class="flex items-center justify-center h-screen relative overflow-hidden">

    <!-- Dark overlay for readability -->
    <div class="absolute inset-0 bg-black/50"></div>

    <!-- Auth Card -->
    <div class="relative z-10 w-full max-w-md bg-white/20 backdrop-blur-lg p-8 rounded-2xl shadow-xl border border-white/30 text-white">
        <!-- Login Form -->
        <div id="login-form" class="animate-fadeIn">
            <h2 class="text-3xl font-extrabold text-center mb-6">Login to <span class="text-blue-300">ERA Fitness Club</span></h2>
            <form action="login.php" method="POST" class="space-y-4">
                <div>
                    <label class="block font-medium mb-1">Email</label>
                    <input type="email" name="email" class="w-full px-4 py-2 rounded-lg bg-white/20 border border-white/40 text-white placeholder-gray-200 focus:ring-2 focus:ring-blue-400 outline-none" placeholder="Enter your email" required>
                </div>
                <div>
                    <label class="block font-medium mb-1">Password</label>
                    <input type="password" name="password" class="w-full px-4 py-2 rounded-lg bg-white/20 border border-white/40 text-white placeholder-gray-200 focus:ring-2 focus:ring-blue-400 outline-none" placeholder="Enter your password" required>
                </div>
                <button type="submit" class="w-full bg-blue-500/80 hover:bg-blue-600 text-white py-2 rounded-lg transition">Login</button>
            </form>
            <p class="mt-6 text-center">Don't have an account? <a href="#" onclick="showSignup()" class="text-blue-300 font-semibold hover:underline">Sign Up</a></p>
        </div>

        <!-- Signup Form -->
        <div id="signup-form" class="hidden animate-fadeIn">
            <h2 class="text-3xl font-extrabold text-center mb-6">Join <span class="text-blue-300">ERA Fitness Club</span></h2>
            <form action="signup.php" method="POST" class="space-y-4">
                <div>
                    <label class="block font-medium mb-1">Name</label>
                    <input type="text" name="name" class="w-full px-4 py-2 rounded-lg bg-white/20 border border-white/40 text-white placeholder-gray-200 focus:ring-2 focus:ring-blue-400 outline-none" placeholder="Your full name" required>
                </div>
                <div>
                    <label class="block font-medium mb-1">Email</label>
                    <input type="email" name="email" class="w-full px-4 py-2 rounded-lg bg-white/20 border border-white/40 text-white placeholder-gray-200 focus:ring-2 focus:ring-blue-400 outline-none" placeholder="Enter your email" required>
                </div>
                <div>
                    <label class="block font-medium mb-1">Password</label>
                    <input type="password" name="password" class="w-full px-4 py-2 rounded-lg bg-white/20 border border-white/40 text-white placeholder-gray-200 focus:ring-2 focus:ring-blue-400 outline-none" placeholder="Create a password" required>
                </div>
                <button type="submit" class="w-full bg-blue-500/80 hover:bg-blue-600 text-white py-2 rounded-lg transition">Sign Up</button>
            </form>
            <p class="mt-6 text-center">Already have an account? <a href="#" onclick="showLogin()" class="text-blue-300 font-semibold hover:underline">Login</a></p>
        </div>
    </div>

    <!-- Script for Toggle -->
    <script>
        function showSignup() {
            document.getElementById('login-form').classList.add('hidden');
            document.getElementById('signup-form').classList.remove('hidden');
        }
        function showLogin() {
            document.getElementById('signup-form').classList.add('hidden');
            document.getElementById('login-form').classList.remove('hidden');
        }

        window.addEventListener('load', function() {
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.get('mode') === 'signup') {
                showSignup();
            }
        });
    </script>

    <!-- Background Image Slideshow -->
    <script>
        const images = [
           "Backgroud images/image (1).jpg",
            "Backgroud images/image (2).jpg",
            "Backgroud images/image (3).jpg",
            "Backgroud images/image (4).jpg",
            "Backgroud images/image (5).jpg",
            "Backgroud images/image (6).jpg",
            "Backgroud images/image (7).jpg",
            "Backgroud images/image (8).jpg",
            "Backgroud images/image (9).jpg",
            "Backgroud images/image (10).jpg",
            "Backgroud images/image (11).jpg",
            "Backgroud images/image (12).jpg",
        ];

        let currentIndex = 0;

        function changeBackground() {
            document.body.style.backgroundImage = `url('${images[currentIndex]}')`;
            currentIndex = (currentIndex + 1) % images.length;
        }

        changeBackground();
        setInterval(changeBackground, 5000);
    </script>
</body>
</html>
