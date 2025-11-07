<?php
// admin/tips.php - Crop Tips Management
require_once 'db_connect.php';
require_once 'auth_check.php';

$success = '';
$error = '';

// Handle add/edit/delete
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add'])) {
        $title = $_POST['title'] ?? '';
        $description = $_POST['description'] ?? '';

        if ($title && $description) {
            $stmt = $pdo->prepare("INSERT INTO tips (title, description, date) VALUES (?, ?, NOW())");
            $stmt->execute([$title, $description]);
            $success = "Crop tip added successfully!";
        } else {
            $error = "Please fill in all fields.";
        }
    } elseif (isset($_POST['edit'])) {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];

        $stmt = $pdo->prepare("UPDATE tips SET title = ?, description = ? WHERE id = ?");
        $stmt->execute([$title, $description, $id]);
        $success = "Crop tip updated successfully!";
    }
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $stmt = $pdo->prepare("DELETE FROM tips WHERE id = ?");
    $stmt->execute([$id]);
    $success = "Crop tip deleted successfully!";
}

// Get edit data
$edit_tip = null;
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $stmt = $pdo->prepare("SELECT * FROM tips WHERE id = ?");
    $stmt->execute([$id]);
    $edit_tip = $stmt->fetch();
}

// Get all tips
$stmt = $pdo->query("SELECT * FROM tips ORDER BY date DESC");
$tips = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crop Tips - AgroGuide Admin</title>
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
                <a href="farmers.php" class="flex items-center px-6 py-3 hover:bg-green-800 transition">
                    <i class="fas fa-users mr-3"></i> Farmers
                </a>
                <a href="messages.php" class="flex items-center px-6 py-3 hover:bg-green-800 transition">
                    <i class="fas fa-comment-dots mr-3"></i> Messages
                </a>
                <a href="tips.php" class="flex items-center px-6 py-3 bg-green-800 border-l-4 border-white">
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
                <h1 class="text-2xl font-bold text-gray-800">Crop Tips Management</h1>
                <span class="text-gray-800 font-semibold">
                    <i class="fas fa-user-circle mr-2"></i><?= htmlspecialchars($_SESSION['admin_name']) ?>
                </span>
            </div>

            <div class="p-6">
                <?php if ($success): ?>
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    <i class="fas fa-check-circle mr-2"></i><?= $success ?>
                </div>
                <?php endif; ?>

                <?php if ($error): ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    <i class="fas fa-exclamation-circle mr-2"></i><?= $error ?>
                </div>
                <?php endif; ?>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                    <!-- Add/Edit Form -->
                    <div class="bg-white rounded-lg shadow-lg p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-4">
                            <i class="fas fa-plus-circle mr-2 text-green-600"></i>
                            <?= $edit_tip ? 'Edit Crop Tip' : 'Add New Crop Tip' ?>
                        </h3>

                        <form method="POST" class="space-y-4">
                            <?php if ($edit_tip): ?>
                            <input type="hidden" name="id" value="<?= $edit_tip['id'] ?>">
                            <?php endif; ?>

                            <div>
                                <label class="block text-gray-700 font-semibold mb-2">Title</label>
                                <input type="text" name="title" required 
                                    value="<?= $edit_tip ? htmlspecialchars($edit_tip['title']) : '' ?>"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500"
                                    placeholder="E.g., Best Time to Plant Rice">
                            </div>

                            <div>
                                <label class="block text-gray-700 font-semibold mb-2">Description</label>
                                <textarea name="description" rows="5" required 
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500"
                                    placeholder="Enter detailed crop advisory tip..."><?= $edit_tip ? htmlspecialchars($edit_tip['description']) : '' ?></textarea>
                            </div>

                            <div class="flex gap-4">
                                <button type="submit" name="<?= $edit_tip ? 'edit' : 'add' ?>" 
                                    class="flex-1 bg-green-600 text-white font-bold py-3 rounded-lg hover:bg-green-700">
                                    <i class="fas fa-<?= $edit_tip ? 'save' : 'plus' ?> mr-2"></i>
                                    <?= $edit_tip ? 'Update Tip' : 'Add Tip' ?>
                                </button>
                                <?php if ($edit_tip): ?>
                                <a href="tips.php" 
                                    class="flex-1 bg-gray-500 text-white font-bold py-3 rounded-lg hover:bg-gray-600 text-center">
                                    <i class="fas fa-times mr-2"></i>Cancel
                                </a>
                                <?php endif; ?>
                            </div>
                        </form>
                    </div>

                    <!-- Tips List -->
                    <div class="bg-white rounded-lg shadow-lg p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-4">
                            <i class="fas fa-list mr-2 text-blue-600"></i>All Crop Tips
                        </h3>
                        <div class="space-y-3 max-h-96 overflow-y-auto">
                            <?php foreach ($tips as $tip): ?>
                            <div class="p-4 bg-green-50 border-l-4 border-green-500 rounded">
                                <div class="flex justify-between items-start">
                                    <div class="flex-1">
                                        <p class="font-bold text-gray-800"><?= htmlspecialchars($tip['title']) ?></p>
                                        <p class="text-sm text-gray-600 mt-2"><?= htmlspecialchars($tip['description']) ?></p>
                                        <p class="text-xs text-gray-500 mt-2">
                                            <i class="far fa-calendar mr-1"></i><?= date('d M Y', strtotime($tip['date'])) ?>
                                        </p>
                                    </div>
                                    <div class="flex gap-2 ml-4">
                                        <a href="?edit=<?= $tip['id'] ?>" 
                                            class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="?delete=<?= $tip['id'] ?>" 
                                            onclick="return confirm('Delete this tip?')"
                                            class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>