<?php
$page_title = "Login - Smart Crop Advisory System";
include 'includes/header.php';
?>

<section class="auth-section">
    <div class="auth-container">
        <div class="auth-card">
            <div class="auth-header">
                <h1>Welcome Back</h1>
                <p>Login to access your farming dashboard</p>
            </div>

            <form action="login_handler.php" method="POST" class="auth-form">
                <div class="form-group">
                    <label for="phone">Phone no:</label>
                    <input type="phone" id="phone" name="phone" required placeholder="91+xxxxxxx22">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required placeholder="Enter your password">
                </div>

                

                <button type="submit" class="btn btn-primary btn-large btn-block">Login →</button>

              

</section>

<?php include 'includes/footer.php'; ?>
