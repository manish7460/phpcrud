<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "manishfirst";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $token = bin2hex(random_bytes(50)); // Generate a secure token

    // Store the token and email in the database (create a 'password_resets' table)
    $sql = "INSERT INTO password_resets (email, token) VALUES ('$email', '$token')";
    if ($conn->query($sql) === TRUE) {
        $resetLink = "http://localhost/phpproject/reset_password.php?token=$token";
        
        // Send the email (you'll need a mail server or service like PHPMailer or SwiftMailer)
        mail($email, "Password Reset", "Click on this link to reset your password: $resetLink");

        echo "Password reset link has been sent to your email.";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
