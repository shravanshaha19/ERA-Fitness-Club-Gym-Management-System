<!-- contact.php -->
<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $message = $_POST['message'] ?? '';

    if ($name && $email && $message) {
        try {
            $stmt = $pdo->prepare("INSERT INTO contact_messages (name, email, message) VALUES (?, ?, ?)");
            if ($stmt->execute([$name, $email, $message])) {
                $success = "Your message has been sent successfully!";
            } else {
                $error = "Error sending your message. Please try again.";
            }
        } catch (PDOException $e) {
            $error = "Database error: " . htmlspecialchars($e->getMessage());
        }
    } else {
        $error = "Please fill all required fields.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ERA Fitness Club - Contact</title>
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
            <h2 class="text-5xl font-bold mb-4">Contact ERA Fitness Club</h2>
            <p class="text-xl text-gray-300 max-w-2xl mx-auto">Have any queries? We're here to help! Reach out to us for membership details, facility inquiries, or any other questions.</p>
        </header>
        <section class="mb-12">
            <h3 class="text-3xl font-semibold text-center mb-8">Get in Touch</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Contact Form -->
                <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
                    <h4 class="text-xl font-bold mb-4">Send Us a Message</h4>
                    <?php if (isset($success)): ?>
                        <p class="text-green-500 mb-4"><?php echo htmlspecialchars($success); ?></p>
                    <?php elseif (isset($error)): ?>
                        <p class="text-red-500 mb-4"><?php echo htmlspecialchars($error); ?></p>
                    <?php endif; ?>
                    <form action="contact.php" method="POST">
                        <div class="mb-4">
                            <label class="block text-gray-300">Name</label>
                            <input type="text" name="name" class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-300">Email</label>
                            <input type="email" name="email" class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-300">Message</label>
                            <textarea name="message" rows="5" class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white" required></textarea>
                        </div>
                        <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">Send Message</button>
                    </form>
                </div>
                <!-- Contact Information -->
                <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
                    <h4 class="text-xl font-bold mb-4">Contact Information</h4>
                    <p class="text-gray-300 mb-2"><strong>Email:</strong> <a href="erafitnessclub@gmail.com" class="text-blue-300 hover:underline">info@ERAFitnessClub.com</a></p>
                    <p class="text-gray-300 mb-2"><strong>Phone:</strong> 9876543210</p>
                    <p class="text-gray-300 mb-4"><strong>Address:</strong> ERA Fitness Club ,Asu</p>
                    <h4 class="text-xl font-bold mb-4">Customer Support Hours</h4>
                    <p class="text-gray-300 mb-4">Monday - Friday: 9:00 AM - 6:00 PM<br>Saturday: 10:00 AM - 4:00 PM<br>Sunday: Closed</p>
                    <h4 class="text-xl font-bold mb-4">Follow Us</h4>
                    <div class="flex space-x-4">
    <!-- Facebook Icon (SVG path is empty) -->
    <a href="" target="_blank" class="text-blue-300 hover:text-blue-400">
        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
            <path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z" />
        </svg>
    </a>

    <!-- Instagram Icon -->
    <a href="https://www.instagram.com/ira_fitness_and_sports_club_?igsh=MW51d3F5NGdhajJoYw==" target="_blank" class="text-blue-300 hover:text-blue-400"><i class="fa-brands fa-facebook-f"></i>
        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.948-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
        </svg>
    </a>

    <!-- Twitter Icon -->
    <a href="" target="_blank" class="text-blue-300 hover:text-blue-400">
        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
            <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-2.717 0-4.92 2.203-4.92 4.917 0 .39.045.765.127 1.124-4.09-.205-7.719-2.165-10.141-5.144-.424.722-.666 1.561-.666 2.457 0 1.695.869 3.191 2.188 4.066-.806-.026-1.566-.247-2.229-.616v.061c0 2.364 1.68 4.337 3.912 4.784-.409.111-.84.205-1.288.302.363 1.134 1.415 1.961 2.665 1.985-1.975 1.546-4.462 2.468-7.169 2.468-.466 0-.926-.027-1.379-.08 2.558 1.641 5.601 2.598 8.869 2.598 10.649 0 16.476-8.824 16.476-16.477 0-.251-.005-.502-.017-.753 1.131-.814 2.114-1.832 2.892-2.991z"/>
        </svg>
    </a>
</div>

                </div>
            </div>
        </section>
        <section class="mb-12">
            <h3 class="text-3xl font-semibold text-center mb-8">Find Us</h3>
            <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
                <iframe src=" ddress of ERA Fitness Club" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </section>
        <section class="text-center">
            <h3 class="text-3xl font-semibold mb-6">Ready to Join?</h3>
            <a href="packages.php" class="inline-block bg-blue-600 text-white py-3 px-6 rounded-lg text-lg font-semibold hover:bg-blue-700 transition">Explore Memberships</a>
        </section>
    </div>
</body>
</html>
