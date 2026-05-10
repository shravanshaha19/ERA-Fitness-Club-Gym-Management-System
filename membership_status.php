<?php
session_start();
require_once 'config.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

// Fetch user's membership details
$user_id = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT package, price, start_date, end_date FROM registrations WHERE user_id = ? ORDER BY registration_date DESC LIMIT 1");
$stmt->execute([$user_id]);
$membership = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$membership) {
    $membership = null;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ERA Fitness Club - Membership Status</title>
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
            <h2 class="text-5xl font-bold mb-4">Your Membership Status</h2>
            <p class="text-xl text-gray-300 max-w-2xl mx-auto">Stay informed about your ERA Fitness Club membership, including your package details and expiration date.</p>
        </header>
        <section class="mb-12">
            <h3 class="text-3xl font-semibold text-center mb-8">Membership Details</h3>
            <div class="max-w-2xl mx-auto bg-gray-800 p-6 rounded-lg shadow-lg">
                <?php if ($membership): ?>
                    <div class="space-y-4">
                        <p class="text-lg"><strong>Package:</strong> <?php echo htmlspecialchars($membership['package']); ?></p>
                        <p class="text-lg"><strong>Price:</strong> <?php echo htmlspecialchars(number_format($membership['price'], 2)); ?></p>
                        <p class="text-lg"><strong>Start Date:</strong> <?php echo htmlspecialchars(date('F j, Y', strtotime($membership['start_date']))); ?></p>
                        <p class="text-lg"><strong>End Date:</strong> <?php echo htmlspecialchars(date('F j, Y', strtotime($membership['end_date']))); ?></p>
                        <?php
                        $today = new DateTime();
                        $end_date = new DateTime($membership['end_date']);
                        $days_left = $today->diff($end_date)->days;
                        $status = $today <= $end_date ? 'Active' : 'Expired';
                        ?>
                        <p class="text-lg"><strong>Status:</strong> <span class="<?php echo $status === 'Active' ? 'text-green-500' : 'text-red-500'; ?>"><?php echo $status; ?></span></p>
                        <?php if ($status === 'Active'): ?>
                            <p class="text-lg"><strong>Days Remaining:</strong> <?php echo $days_left; ?> days</p>
                        <?php else: ?>
                            <p class="text-lg text-red-500">Your membership has expired. Renew now to continue enjoying our facilities!</p>
                        <?php endif; ?>
                    </div>
                <?php else: ?>
                    <p class="text-lg text-center text-gray-300">No active membership found. <a href="register.php" class="text-blue-300 hover:underline">Register for a package</a> to get started!</p>
                <?php endif; ?>
            </div>
        </section>
        <section class="text-center">
            <h3 class="text-3xl font-semibold mb-6">Extend Your Membership</h3>
            <a href="register.php" class="inline-block bg-blue-600 text-white py-3 px-6 rounded-lg text-lg font-semibold hover:bg-blue-700 transition">Choose a New Package</a>
        </section>
    </div>
</body>
</html>