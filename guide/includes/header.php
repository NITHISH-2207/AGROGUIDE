<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page_title) ? $page_title : 'Smart Crop Advisory System'; ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <!-- Navigation Header -->
    <header class="header">
        <div class="header-content">
            <div class="logo">
                <a href="index.php">
                    <span class="logo-icon"></span>
                    <span class="logo-text">Agroguide</span>
                </a>
            </div>
            
            <nav class="navbar">
                <ul class="nav-menu" id="navMenu">
                    <li><a href="index.php" class="nav-link">Home</a></li>
                    <li><a href="soil.php" class="nav-link">Soil Types</a></li>
                     <li><a href="weather-forecast.php" class="nav-link">WeatherInfo</a></li>
                     <li><a href="mandi-price.php" class="nav-link">PriceInfo</a></li>
                    <li><a href="features.php" class="nav-link">Features</a></li>
                    <li><a href="farmerdetails.php" class="nav-link">Farmer's Signup</a></li>
                    <li><a href="contact.php" class="nav-link">Contact</a></li>
                    
                    <?php if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true): ?>
                        <!-- Show User Name Only -->
                        <li>
                            <span class="user-name-display">
                                👤 <?php echo htmlspecialchars($_SESSION['user_name']); ?>
                            </span>
                        </li>
                        <li>
                            <a href="logout.php" class="nav-link btn-logout">Logout</a>
                        </li>
                    <?php else: ?>
                        <!-- Not Logged In -->
                        <li><a href="login.php" class="nav-link btn-login">Login</a></li>
                    <?php endif; ?>
                </ul>
                <div class="hamburger" id="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </nav>
        </div>
    </header>
    <?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page_title) ? $page_title : 'Smart Crop Advisory System'; ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        /* Direct Logo Styling */
        .logo a {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
        }
        .logo-icon {
            font-size: 40px;
        }
        .logo-text {
            font-size: 32px;
            font-weight: 700;
            color: #56ab2f;
            letter-spacing: -0.5px;
        }
    </style>


