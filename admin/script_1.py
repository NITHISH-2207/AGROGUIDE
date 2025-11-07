
# Create auth check and dashboard files

# Auth check file
auth_check = '''<?php
// admin/auth_check.php - Session Protection
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}
?>'''

# Dashboard page
dashboard_php = '''<?php
// admin/dashboard.php - Admin Dashboard
require_once 'db_connect.php';
require_once 'auth_check.php';

// Get statistics
$stmt = $pdo->query("SELECT COUNT(*) as total FROM farmers");
$total_farmers = $stmt->fetch()['total'];

$stmt = $pdo->query("SELECT COUNT(*) as total FROM messages");
$total_messages = $stmt->fetch()['total'];

$stmt = $pdo->query("SELECT soil, COUNT(*) as count FROM farmers GROUP BY soil ORDER BY count DESC LIMIT 1");
$most_common_crop = $stmt->fetch();

$stmt = $pdo->query("SELECT * FROM farmers ORDER BY id DESC LIMIT 5");
$recent_farmers = $stmt->fetchAll();

$stmt = $pdo->query("SELECT * FROM tips ORDER BY date DESC LIMIT 3");
$latest_tips = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - AgroGuide Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-gradient-to-b from-green-600 to-green-700 text-white">
            <div class="p-6">
                <h2 class="text-2xl font-bold flex items-center">
                    <i class="fas fa-seedling mr-2"></i> AgroGuide
                </h2>
                <p class="text-green-200 text-sm mt-1">Admin Panel</p>
            </div>
            <nav class="mt-6">
                <a href="dashboard.php" class="flex items-center px-6 py-3 bg-green-800 border-l-4 border-white">
                    <i class="fas fa-chart-line mr-3"></i> Dashboard
                </a>
                <a href="farmers.php" class="flex items-center px-6 py-3 hover:bg-green-800 transition">
                    <i class="fas fa-users mr-3"></i> Farmers
                </a>
                <a href="messages.php" class="flex items-center px-6 py-3 hover:bg-green-800 transition">
                    <i class="fas fa-comment-dots mr-3"></i> Messages
                </a>
                <a href="tips.php" class="flex items-center px-6 py-3 hover:bg-green-800 transition">
                    <i class="fas fa-lightbulb mr-3"></i> Crop Tips
                </a>
                <a href="logout.php" class="flex items-center px-6 py-3 hover:bg-red-600 transition mt-8">
                    <i class="fas fa-sign-out-alt mr-3"></i> Logout
                </a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 overflow-y-auto">
            <!-- Top Bar -->
            <div class="bg-white shadow-md p-4 flex justify-between items-center">
                <h1 class="text-2xl font-bold text-gray-800">Dashboard</h1>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-600"><i class="far fa-calendar mr-2"></i><?= date('d M Y') ?></span>
                    <span class="text-gray-800 font-semibold">
                        <i class="fas fa-user-circle mr-2"></i><?= htmlspecialchars($_SESSION['admin_name']) ?>
                    </span>
                </div>
            </div>

            <div class="p-6">
                <!-- Statistics Cards -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <div class="bg-white rounded-lg shadow-lg p-6 border-l-4 border-green-500">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-600 text-sm">Total Farmers</p>
                                <p class="text-3xl font-bold text-gray-800 mt-2"><?= $total_farmers ?></p>
                            </div>
                            <i class="fas fa-users text-5xl text-green-500 opacity-20"></i>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg shadow-lg p-6 border-l-4 border-blue-500">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-600 text-sm">Messages Sent</p>
                                <p class="text-3xl font-bold text-gray-800 mt-2"><?= $total_messages ?></p>
                            </div>
                            <i class="fas fa-comment-dots text-5xl text-blue-500 opacity-20"></i>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg shadow-lg p-6 border-l-4 border-yellow-500">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-600 text-sm">Most Common Soil</p>
                                <p class="text-2xl font-bold text-gray-800 mt-2">
                                    <?= $most_common_crop ? htmlspecialchars($most_common_crop['soil']) : 'N/A' ?>
                                </p>
                            </div>
                            <i class="fas fa-leaf text-5xl text-yellow-500 opacity-20"></i>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- Recent Farmers -->
                    <div class="bg-white rounded-lg shadow-lg p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-4">
                            <i class="fas fa-user-plus mr-2 text-green-600"></i>Recent Registrations
                        </h3>
                        <div class="space-y-3">
                            <?php foreach ($recent_farmers as $farmer): ?>
                            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                <div>
                                    <p class="font-semibold text-gray-800"><?= htmlspecialchars($farmer['name']) ?></p>
                                    <p class="text-sm text-gray-600"><?= htmlspecialchars($farmer['phone']) ?></p>
                                </div>
                                <span class="text-xs text-gray-500"><?= htmlspecialchars($farmer['district'] ?? 'N/A') ?></span>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Latest Tips -->
                    <div class="bg-white rounded-lg shadow-lg p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-4">
                            <i class="fas fa-lightbulb mr-2 text-yellow-600"></i>Latest Crop Tips
                        </h3>
                        <div class="space-y-3">
                            <?php foreach ($latest_tips as $tip): ?>
                            <div class="p-4 bg-green-50 border-l-4 border-green-500 rounded">
                                <p class="font-semibold text-gray-800"><?= htmlspecialchars($tip['title']) ?></p>
                                <p class="text-sm text-gray-600 mt-1"><?= htmlspecialchars(substr($tip['description'], 0, 80)) ?>...</p>
                                <p class="text-xs text-gray-500 mt-2"><?= date('d M Y', strtotime($tip['date'])) ?></p>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>'''

# Logout page
logout_php = '''<?php
// admin/logout.php - Logout Handler
session_start();
session_destroy();
header('Location: login.php');
exit;
?>'''

with open('admin_panel/auth_check.php', 'w', encoding='utf-8') as f:
    f.write(auth_check)

with open('admin_panel/dashboard.php', 'w', encoding='utf-8') as f:
    f.write(dashboard_php)
    
with open('admin_panel/logout.php', 'w', encoding='utf-8') as f:
    f.write(logout_php)

print("Created: auth_check.php, dashboard.php, logout.php")
