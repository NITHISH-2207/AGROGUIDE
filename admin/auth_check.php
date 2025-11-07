<?php
// admin/auth_check.php - Session Protection
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}
?>