
# Create farmers management page

farmers_php = '''<?php
// admin/farmers.php - Farmer Management
require_once 'db_connect.php';
require_once 'auth_check.php';

// Handle delete
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $stmt = $pdo->prepare("DELETE FROM farmers WHERE id = ?");
    $stmt->execute([$id]);
    header('Location: farmers.php');
    exit;
}

// Handle search
$search = $_GET['search'] ?? '';
$filter_sql = $search ? "WHERE name LIKE ? OR soil LIKE ?" : "";
$stmt = $pdo->prepare("SELECT * FROM farmers $filter_sql ORDER BY id DESC");
if ($search) {
    $search_param = "%$search%";
    $stmt->execute([$search_param, $search_param]);
} else {
    $stmt->execute();
}
$farmers = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmers - AgroGuide Admin</title>
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
                <a href="dashboard.php" class="flex items-center px-6 py-3 hover:bg-green-800 transition">
                    <i class="fas fa-chart-line mr-3"></i> Dashboard
                </a>
                <a href="farmers.php" class="flex items-center px-6 py-3 bg-green-800 border-l-4 border-white">
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
                <h1 class="text-2xl font-bold text-gray-800">Farmer Management</h1>
                <span class="text-gray-800 font-semibold">
                    <i class="fas fa-user-circle mr-2"></i><?= htmlspecialchars($_SESSION['admin_name']) ?>
                </span>
            </div>

            <div class="p-6">
                <!-- Search Bar -->
                <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
                    <form method="GET" class="flex gap-4">
                        <input type="text" name="search" value="<?= htmlspecialchars($search) ?>" 
                            placeholder="Search by name or crop..." 
                            class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500">
                        <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700">
                            <i class="fas fa-search mr-2"></i>Search
                        </button>
                        <a href="farmers.php" class="bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600">
                            <i class="fas fa-redo mr-2"></i>Reset
                        </a>
                    </form>
                </div>

                <!-- Farmers Table -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-green-600 text-white">
                                <tr>
                                    <th class="px-6 py-4 text-left">ID</th>
                                    <th class="px-6 py-4 text-left">Name</th>
                                    <th class="px-6 py-4 text-left">Phone</th>
                                    <th class="px-6 py-4 text-left">District</th>
                                    <th class="px-6 py-4 text-left">Soil Type</th>
                                    <th class="px-6 py-4 text-left">Land (acres)</th>
                                    <th class="px-6 py-4 text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                <?php foreach ($farmers as $farmer): ?>
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4"><?= $farmer['id'] ?></td>
                                    <td class="px-6 py-4 font-semibold"><?= htmlspecialchars($farmer['name']) ?></td>
                                    <td class="px-6 py-4"><?= htmlspecialchars($farmer['phone']) ?></td>
                                    <td class="px-6 py-4"><?= htmlspecialchars($farmer['district'] ?? 'N/A') ?></td>
                                    <td class="px-6 py-4">
                                        <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm">
                                            <?= htmlspecialchars($farmer['soil']) ?>
                                        </span>
                                    </td>
                                    <td class="px-6 py-4"><?= htmlspecialchars($farmer['land'] ?? 'N/A') ?></td>
                                    <td class="px-6 py-4 text-center">
                                        <a href="?delete=<?= $farmer['id'] ?>" 
                                           onclick="return confirm('Delete this farmer?')"
                                           class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="p-4 bg-gray-50 text-center text-gray-600">
                        Total Farmers: <span class="font-bold"><?= count($farmers) ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>'''

with open('admin_panel/farmers.php', 'w', encoding='utf-8') as f:
    f.write(farmers_php)

print("Created: farmers.php")
