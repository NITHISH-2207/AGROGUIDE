<?php
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

// Collect form data safely
$name       = $_POST['fname'];
$state      = $_POST['state'];
$district   = $_POST['district'];
$phone      = $_POST['phone'];
$password   = $_POST['password'];
$soil       = $_POST['soil'];       // single select
$land       = $_POST['land'];       // number
$pesticides = $_POST['pesticides']; // single select

// Insert query
$sql = "INSERT INTO farmers (name, state, district, phone, password, soil, land, pesticides) 
        VALUES ('$name', '$state', '$district', '$phone','$password', '$soil', '$land', '$pesticides')";

if ($conn->query($sql) === TRUE) {
    // ✅ Show alert, then redirect after OK
    echo "<script>
            alert('Form submitted successfully!');
            window.location.href = 'index.php';
          </script>";
    exit();
} else {
    echo "<script>
            alert('Error: " . addslashes($conn->error) . "');
            window.location.href = 'form.php';
          </script>";
}

$conn->close();
?>
