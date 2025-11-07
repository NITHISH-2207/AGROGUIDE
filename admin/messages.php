<?php
// admin/messages.php - Messaging Center
require_once 'db_connect.php';
require_once 'auth_check.php';

$success = '';
$error = '';

// Handle message sending
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $phone = $_POST['phone'] ?? '';
    $message = $_POST['message'] ?? '';
    $send_all = isset($_POST['send_all']);

    if ($send_all) {
        // Send to all farmers
        $stmt = $pdo->query("SELECT phone FROM farmers");
        $farmers = $stmt->fetchAll();

        foreach ($farmers as $farmer) {
            $stmt = $pdo->prepare("INSERT INTO messages (phone, message, date_sent) VALUES (?, ?, NOW())");
            $stmt->execute([$farmer['phone'], $message]);
        }
        $success = count($farmers) . " messages queued for WhatsApp sending!";
    } else {
        // Send to single farmer
        if ($phone && $message) {
            $stmt = $pdo->prepare("INSERT INTO messages (phone, message, date_sent) VALUES (?, ?, NOW())");
            $stmt->execute([$phone, $message]);
            $success = "Message queued for WhatsApp sending!";
        } else {
            $error = "Please provide phone number and message.";
        }
    }
}

// Get message history
$stmt = $pdo->query("SELECT * FROM messages ORDER BY date_sent DESC LIMIT 20");
$message_history = $stmt->fetchAll();

// Get all farmers for dropdown
$stmt = $pdo->query("SELECT id, name, phone FROM farmers ORDER BY name");
$farmers = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages - AgroGuide Admin</title>
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
                <a href="messages.php" class="flex items-center px-6 py-3 bg-green-800 border-l-4 border-white">
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
                <h1 class="text-2xl font-bold text-gray-800">Messaging Center</h1>
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
                    <!-- Send Message Form -->
                    <div class="bg-white rounded-lg shadow-lg p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-4">
                            <i class="fab fa-whatsapp mr-2 text-green-600"></i>Send WhatsApp Message
                        </h3>

                        <form method="POST" class="space-y-4" id="messageForm">
                            <div>
                                <label class="block text-gray-700 font-semibold mb-2">Select Farmer</label>
                                <select name="phone" id="phoneSelect" 
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500">
                                    <option value="">-- Select Farmer --</option>
                                    <?php foreach ($farmers as $farmer): ?>
                                    <option value="<?= htmlspecialchars($farmer['phone']) ?>">
                                        <?= htmlspecialchars($farmer['name']) ?> (<?= htmlspecialchars($farmer['phone']) ?>)
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div>
                                <label class="flex items-center space-x-2">
                                    <input type="checkbox" name="send_all" id="sendAll" 
                                        class="w-4 h-4 text-green-600 focus:ring-green-500">
                                    <span class="text-gray-700 font-semibold">Send to All Farmers</span>
                                </label>
                            </div>

                            <div>
                                <label class="block text-gray-700 font-semibold mb-2">Message</label>
                                <textarea name="message" rows="5" required 
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500"
                                    placeholder="Enter your message here..."></textarea>
                            </div>

                            <button type="submit" 
                                class="w-full bg-green-600 text-white font-bold py-3 rounded-lg hover:bg-green-700">
                                <i class="fab fa-whatsapp mr-2"></i>Send via WhatsApp
                            </button>
                        </form>

                        <div class="mt-4 p-4 bg-blue-50 border border-blue-200 rounded-lg">
                            <p class="text-sm text-blue-800">
                                <i class="fas fa-info-circle mr-2"></i>
                                <strong>Note:</strong> Messages will open WhatsApp for each farmer. Click the button below to send.
                            </p>
                        </div>
                    </div>

                    <!-- Message History -->
                    <div class="bg-white rounded-lg shadow-lg p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-4">
                            <i class="fas fa-history mr-2 text-blue-600"></i>Recent Messages
                        </h3>
                        <div class="space-y-3 max-h-96 overflow-y-auto">
                            <?php foreach ($message_history as $msg): ?>
                            <div class="p-3 bg-gray-50 border-l-4 border-green-500 rounded">
                                <p class="font-semibold text-gray-800"><?= htmlspecialchars($msg['phone']) ?></p>
                                <p class="text-sm text-gray-600 mt-1"><?= htmlspecialchars($msg['message']) ?></p>
                                <p class="text-xs text-gray-500 mt-2">
                                    <i class="far fa-clock mr-1"></i><?= date('d M Y H:i', strtotime($msg['date_sent'])) ?>
                                </p>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('sendAll').addEventListener('change', function() {
            document.getElementById('phoneSelect').disabled = this.checked;
            if (this.checked) {
                document.getElementById('phoneSelect').value = '';
            }
        });

        document.getElementById('messageForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            const phone = formData.get('phone');
            const message = formData.get('message');
            const sendAll = formData.get('send_all');

            if (sendAll) {
                if (confirm('Send message to all farmers via WhatsApp?')) {
                    this.submit();
                }
            } else if (phone) {
                const whatsappUrl = `https://wa.me/91${phone}?text=${encodeURIComponent(message)}`;
                window.open(whatsappUrl, '_blank');
                this.submit();
            } else {
                alert('Please select a farmer or choose "Send to All"');
            }
        });
    </script>
</body>
</html>