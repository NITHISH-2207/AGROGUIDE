<?php
session_start();

// Database connection
$host = "localhost";
$user = "root";
$pass = "";
$db   = "farmers_db";

// Create connection
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Collect and sanitize form data
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $password = $_POST['password'];
    
    // Validate inputs
    if (empty($phone) || empty($password)) {
        echo "<script>
                alert('Please fill in all fields!');
                window.location.href = 'login.php';
              </script>";
        exit();
    }
    
    // Check if user exists in database
    $sql = "SELECT * FROM farmers WHERE phone = '$phone' LIMIT 1";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        // ⚠️ NOTE: If you have a password column in your farmers table, use password_verify()
        // For now, checking if phone exists (you should add password hashing later)
        
        // If you have a 'password' column in farmers table:
        // if (password_verify($password, $user['password'])) {
        
        // Temporary: Just checking if phone exists (NOT SECURE - Add password column!)
        if (true) { // Replace this with password verification
            
            // Set session variables
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_phone'] = $user['phone'];
            $_SESSION['user_state'] = $user['state'];
            $_SESSION['user_district'] = $user['district'];
            $_SESSION['logged_in'] = true;
            
            // Successful login
            echo "<script>
                    alert('Login successful! Welcome " . addslashes($user['name']) . "');
                    window.location.href = 'index.php';
                  </script>";
            exit();
            
        } else {
            // Invalid password
            echo "<script>
                    alert('Invalid password!');
                    window.location.href = 'login.php';
                  </script>";
            exit();
        }
        
    } else {
        // User not found
        echo "<script>
                alert('Phone number not registered! Please register first.');
                window.location.href = 'login.php';
              </script>";
        exit();
    }
    
} else {
    // Direct access without POST
    header("Location: login.php");
    exit();
}

$conn->close();
?>
