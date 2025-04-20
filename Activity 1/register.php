<?php
include 'db.php';

if (isset($_POST['register'])) {
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm = $_POST['confirm_password'];

    // Check if passwords match
    if ($password !== $confirm) {
        echo "Passwords do not match.";
        exit();
    }

    // Hash password
    $hashed = password_hash($password, PASSWORD_DEFAULT);

    // Insert into DB
    $stmt = $conn->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $email, $hashed);

    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
