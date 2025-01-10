<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "manishfirst";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['token']) && isset($_POST['new_password'])) {
    $token = $_POST['token'];
    $new_password = password_hash($_POST['new_password'], PASSWORD_BCRYPT);

    // Find the user by token
    $sql = "SELECT email FROM password_resets WHERE token='$token'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $email = $row['email'];

        // Update the user's password
        $sql = "UPDATE students SET password='$new_password' WHERE email='$email'";
        if ($conn->query($sql) === TRUE) {
            echo "Password updated successfully.";
            // Delete the used token
            $conn->query("DELETE FROM password_resets WHERE token='$token'");
        } else {
            echo "Error updating password: " . $conn->error;
        }
    } else {
        echo "Invalid token.";
    }
}

$conn->close();
?>
