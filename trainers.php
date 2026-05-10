<!-- trainers.php -->
<?php
session_start();
require_once 'config.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

// Fetch trainers from the database
$stmt = $pdo->query("SELECT * FROM trainers ORDER BY name");
$trainers = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ERA Fitness Club - Our Trainers</title>
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
            <h2 class="text-5xl font-bold mb-4">Meet Our Expert Trainers</h2>
            <p class="text-xl text-gray-300 max-w-2xl mx-auto">Our certified trainers at ERA Fitness Club are dedicated to helping you achieve your fitness goals with personalized guidance and expertise.</p>
        </header>
        <section class="mb-12">
            <h3 class="text-3xl font-semibold text-center mb-8">Our Team</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php foreach ($trainers as $trainer): ?>
                    <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
                        <div class="relative group mb-4">
                            <img src="<?php echo htmlspecialchars($trainer['photo_url']); ?>" alt="<?php echo htmlspecialchars($trainer['name']); ?>" class="w-full h-64 object-cover rounded-lg">
                            <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                                <p class="text-white text-lg font-semibold"><?php echo htmlspecialchars($trainer['name']); ?></p>
                            </div>
                        </div>
                        <h4 class="text-xl font-bold mb-2"><?php echo htmlspecialchars($trainer['name']); ?></h4>
                        <p class="text-gray-300 mb-2"><strong>Certified:</strong> <?php echo $trainer['is_certified'] ? 'Yes (' . htmlspecialchars($trainer['certifications']) . ')' : 'No'; ?></p>
                        <p class="text-gray-300 mb-2"><strong>Start Date:</strong> <?php echo htmlspecialchars(date('F Y', strtotime($trainer['start_date']))); ?></p>
                        <p class="text-gray-300 mb-2"><strong>Specialties:</strong> <?php echo htmlspecialchars($trainer['specialties']); ?></p>
                        <p class="text-gray-300"><?php echo htmlspecialchars($trainer['bio']); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
        <section class="text-center">
            <h3 class="text-3xl font-semibold mb-6">Ready to Train with Us?</h3>
            <a href="register.php" class="inline-block bg-blue-600 text-white py-3 px-6 rounded-lg text-lg font-semibold hover:bg-blue-700 transition">Join Now</a>
        </section>
    </div>
</body>
</html>