<?php
session_start();

// Store user name before destroying session
$user_name = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : 'User';

// Destroy all session data
session_unset();
session_destroy();

// Clear session cookie
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time()-3600, '/');
}

// Redirect with thank you message
echo "<script>
        alert('Thank you for using our AgroGuide, " . addslashes($user_name) . "! 🌾\\nSee you soon!');
        window.location.href = 'index.php';
      </script>";
exit();
?>
