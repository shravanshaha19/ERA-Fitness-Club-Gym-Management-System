<!-- register.php --> 
<?php
session_start();
require_once 'config.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

// Define packages array with duration in months
$packages = [
    'Basic Membership' => ['price' => 2505, 'duration_months' => 1, 'features' => 'Gym Access, Cardio Equipment'],
    'Standard Membership' => ['price' => 4175, 'duration_months' => 1, 'features' => 'Gym Access, Cardio & Strength Equipment'],
    'Premium Membership' => ['price' => 6680, 'duration_months' => 1, 'features' => 'Full Access, Group Classes'],
    'Annual Basic' => ['price' => 25050, 'duration_months' => 12, 'features' => 'Gym Access, Cardio Equipment'],
    'Annual Premium' => ['price' => 66800, 'duration_months' => 12, 'features' => 'Full Access, Group Classes, Personal Training'],
    'Student Plan' => ['price' => 2088, 'duration_months' => 1, 'features' => 'Gym Access (Student ID Required)'],
    'Family Plan' => ['price' => 10020, 'duration_months' => 1, 'features' => 'Gym Access for 4 Family Members'],
    'Personal Training Package' => ['price' => 12525, 'duration_months' => 1, 'features' => '10 Personal Training Sessions'],
    'Weekend Warrior' => ['price' => 1670, 'duration_months' => 1, 'features' => 'Weekend Gym Access Only'],
    'Corporate Plan' => ['price' => 8350, 'duration_months' => 1, 'features' => 'Gym Access for 5 Employees'],
];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $birthday = $_POST['birthday'] ?? '';
    $start_date = $_POST['start_date'] ?? '';
    $package = $_POST['package'] ?? '';
    $price = isset($packages[$package]) ? $packages[$package]['price'] : 0;
    $duration_months = isset($packages[$package]) ? $packages[$package]['duration_months'] : 0;
    $user_id = $_SESSION['user_id'];

    // Calculate end date based on start date and package duration
    $end_date = '';
    if ($start_date && $duration_months) {
        $start = new DateTime($start_date);
        $start->modify("+$duration_months months");
        $end_date = $start->format('Y-m-d');
    }

    if ($name && $phone && $birthday && $start_date && $package && $price && $end_date) {
        try {
            $stmt = $pdo->prepare("INSERT INTO registrations (user_id, name, phone, birthday, start_date, end_date, package, price) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            if ($stmt->execute([$user_id, $name, $phone, $birthday, $start_date, $end_date, $package, $price])) {
                echo "<p class='text-green-600 text-center'>Registration successful for $package!</p>";
            } else {
                echo "<p class='text-red-600 text-center'>Error during registration.</p>";
            }
        } catch (PDOException $e) {
            echo "<p class='text-red-600 text-center'>Database error: " . htmlspecialchars($e->getMessage()) . "</p>";
        }
    } else {
        echo "<p class='text-red-600 text-center'>Please fill all required fields.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ERA Fitness Club - Register</title>
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
        <h2 class="text-3xl font-bold text-center mb-8">Register for a Package</h2>
        <form action="register.php" method="POST" 
              class="max-w-md mx-auto bg-white/20 backdrop-blur-md p-6 rounded-lg shadow-lg">
            <div class="mb-4">
                <label class="block text-white">Name</label>
                <input type="text" name="name" class="w-full px-3 py-2 border rounded-lg text-black" required>
            </div>
            <div class="mb-4">
                <label class="block text-white">Phone Number</label>
                <input type="tel" name="phone" class="w-full px-3 py-2 border rounded-lg text-black" pattern="[0-9]{10}" required>
            </div>
            <div class="mb-4">
                <label class="block text-white">Birthday</label>
                <input type="date" name="birthday" class="w-full px-3 py-2 border rounded-lg text-black" required>
            </div>
            <div class="mb-4">
                <label class="block text-white">Start Date</label>
                <input type="date" name="start_date" id="start_date" class="w-full px-3 py-2 border rounded-lg text-black" required onchange="updateEndDate()">
            </div>
            <div class="mb-4">
                <label class="block text-white">Select Package</label>
                <select name="package" id="package" class="w-full px-3 py-2 border rounded-lg text-black" required onchange="updatePriceAndEndDate()">
                    <option value="">Select a package</option>
                    <?php
                    foreach ($packages as $pkg => $details) {
                        $selected = (isset($_GET['package']) && $_GET['package'] == $pkg) ? 'selected' : '';
                        echo "<option value='$pkg' $selected>$pkg</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-4">
                <label class="block text-white">Package Price</label>
                <input type="text" id="price" name="price" class="w-full px-3 py-2 border rounded-lg bg-gray-100 text-black" readonly>
            </div>
            <div class="mb-4">
                <label class="block text-white">End Date</label>
                <input type="text" id="end_date" name="end_date" class="w-full px-3 py-2 border rounded-lg bg-gray-100 text-black" readonly>
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">Confirm Registration</button>
        </form>
    </div>
    <script>
        const packages = <?php echo json_encode($packages) ?: '{}'; ?>;
        function updatePriceAndEndDate() {
            const packageSelect = document.getElementById('package');
            const priceInput = document.getElementById('price');
            const endDateInput = document.getElementById('end_date');
            const startDateInput = document.getElementById('start_date');
            const selectedPackage = packageSelect.value;

            if (selectedPackage && packages[selectedPackage]) {
                priceInput.value =  packages[selectedPackage].price;
                if (startDateInput.value) {
                    const startDate = new Date(startDateInput.value);
                    const durationMonths = packages[selectedPackage].duration_months;
                    startDate.setMonth(startDate.getMonth() + durationMonths);
                    endDateInput.value = startDate.toISOString().split('T')[0];
                } else {
                    endDateInput.value = '';
                }
            } else {
                priceInput.value = '';
                endDateInput.value = '';
            }
        }
        function updateEndDate() {
            updatePriceAndEndDate();
        }
        try { updatePriceAndEndDate(); } catch (e) { console.error(e); }
    </script>
</body>
</html>
